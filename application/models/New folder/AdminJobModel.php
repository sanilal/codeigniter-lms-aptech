<?php

class AdminJobModel extends CI_Model
{
    protected $table = 'jobs';
    protected $key = 'job_id';

    public function getJob($column, $value)
    {
        $this->db->where($column, $value);
        $this->db->select('
            jobs.*,
            GROUP_CONCAT(DISTINCT('.CF_DB_PREFIX.'job_traits.trait_id)) as traits,
            GROUP_CONCAT(DISTINCT('.CF_DB_PREFIX.'job_quizes.quiz_id)) as quizes,
            GROUP_CONCAT(DISTINCT('.CF_DB_PREFIX.'job_filter_value_assignments.job_filter_id)) as job_filter_ids,
            GROUP_CONCAT(DISTINCT('.CF_DB_PREFIX.'job_filter_value_assignments.job_filter_value_id)) as job_filter_value_ids,
        ');
        $this->db->join('job_traits', 'job_traits.job_id = jobs.job_id', 'left');
        $this->db->join('job_quizes', 'job_quizes.job_id = jobs.job_id', 'left');
        $this->db->join('job_filter_value_assignments', 'job_filter_value_assignments.job_id = jobs.job_id', 'left');
        $this->db->group_by('jobs.job_id');
        $result = $this->db->get('jobs');
        return ($result->num_rows() == 1) ? $result->row(0) : $this->emptyObject('jobs');
    }

    public function getAll($active = true, $srh = '')
    {
        if ($active) {
            $this->db->where('status', 1);
        }
        if ($srh) {
            $this->db->group_start()->like('username', $srh)->group_end();
        }
        $this->db->from($this->table);
        $query = $this->db->get();
        return objToArr($query->result());
    }

    public function getTotalJobs()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('jobs');
        return $query->num_rows();
    }

    public function getPopularJobs()
    {
        //Setting session for every parameter of the request
        $this->setSessionValues();
        $limit = setting('charts-limit');

        $applications_count = $this->getSessionValues('applied_check');
        $favorites_count = $this->getSessionValues('favorited_check');
        $referred_count = $this->getSessionValues('referred_check');

        $this->db->where('jobs.status', 1);
        $this->db->select('
            jobs.title as label,
            COUNT(DISTINCT(CONCAT('.CF_DB_PREFIX.'job_applications.job_application_id))) as applications_count,
            COUNT(DISTINCT(CONCAT('.CF_DB_PREFIX.'job_favorites.job_id,"-",'.CF_DB_PREFIX.'job_favorites.candidate_id))) as favorites_count,
            COUNT(DISTINCT(CONCAT('.CF_DB_PREFIX.'job_referred.job_id,"-",'.CF_DB_PREFIX.'job_referred.candidate_id))) as referred_count,
        ');
        $this->db->join('job_favorites', 'job_favorites.job_id = jobs.job_id', 'left');
        $this->db->join('job_applications', 'job_applications.job_id = jobs.job_id', 'left');
        $this->db->join('job_referred', 'job_referred.job_id = jobs.job_id', 'left');
        $this->db->group_by('jobs.job_id');
        $this->db->order_by('jobs.job_id', 'ASC');
        $this->db->limit($limit, 0);
        $result = $this->db->get('jobs');
        $result = $result->result();
        $consolidated = array();
        foreach ($result as $key => $value) {
            $total = 0;
            if ($applications_count) {
                $total = $total + $value->applications_count;
            }
            if ($favorites_count) {
                $total = $total + $value->favorites_count;
            }
            if ($referred_count) {
                $total = $total + $value->referred_count;
            }
            $consolidated[] = array('label' => $value->label, 'value' => $total);
        }
        return json_encode($consolidated);
        //return ($result->num_rows() == 1) ? $result->row(0) : $this->emptyObject('jobs');
    }

    public function storeJob($edit = null)
    {
        $data = $this->xssCleanInput();

        //Replacing &nbsp with space
        $string = htmlentities($data['description'], null, 'utf-8');
        $data['description'] = str_replace("&nbsp;", " ", $string);
        $data['description'] = html_entity_decode($data['description']);

        //Separating custom values
        $custom_field_ids = isset($data['custom_field_ids']) ? $data['custom_field_ids'] : array();
        $labels = isset($data['labels']) ? $data['labels'] : array();
        $values = isset($data['values']) ? $data['values'] : array();
        $customFields = array('custom_field_id' => $custom_field_ids, 'label' => $labels, 'value' => $values);

        //Separting traits and quizes and filters
        $traits = isset($data['traits']) ? $data['traits'] : array();
        $quizes = isset($data['quizes']) ? $data['quizes'] : array();
        $filters = isset($data['filters']) ? $data['filters'] : array();

        //Removing variables
        unset($data['traits'], $data['quizes'], $data['labels'], $data['values'], $data['custom_field_ids'], $data['filters']);

        if ($edit) {
            $this->db->where('job_id', $edit);
            $data['updated_at'] = date('Y-m-d G:i:s');
            $this->db->update('jobs', $data);
            $this->insertTraits($traits, $edit);
            $this->insertQuizes($quizes, $edit);
            $this->insertCustomFields($customFields, $edit);
            $this->assignJobFilterValues($filters, $edit);
        } else {
            $data['created_at'] = date('Y-m-d G:i:s');
            $data['status'] = 1;
            $this->db->insert('jobs', $data);
            $id = $this->db->insert_id();
            $this->insertTraits($traits, $id);
            $this->insertQuizes($quizes, $id);
            $this->insertCustomFields($customFields, $id);
            $this->assignJobFilterValues($filters, $id);
            return $id;
        }
    }

    public function insertTraits($traits, $job_id)
    {
        //First deleting
        $this->db->delete('job_traits', array('job_id' => $job_id));

        //Getting traits for new
        $this->db->where_in('trait_id', ($traits ? $traits : array(0)));
        $traits = $this->db->get('traits');
        $traits = objToArr($traits->result());

        //Inserting new traits
        foreach ($traits as $key => $value) {
            $data['created_at'] = date('Y-m-d G:i:s');
            $data['title'] = $value['title'];
            $data['trait_id'] = $value['trait_id'];
            $data['job_id'] = $job_id;
            $this->db->insert('job_traits', $data);
        }
    }

    public function insertQuizes($quizes, $job_id)
    {
        //First deleting
        $this->db->delete('job_quizes', array('job_id' => $job_id));

        //Second inserting quiz with quiz data
        foreach ($quizes as $quiz_id) {
            $quiz = $this->AdminQuizModel->getCompleteQuiz($quiz_id);
            $data['quiz_data'] = json_encode($quiz);
            $data['job_id'] = $job_id;
            $data['quiz_id'] = $quiz_id;
            $data['quiz_title'] = $quiz['quiz']['title'];
            $data['total_questions'] = count($quiz['questions']);
            $data['allowed_time'] = $quiz['quiz']['allowed_time'];
            $data['created_at'] = date('Y-m-d G:i:s');
            $this->db->insert('job_quizes', $data);
        }
    }

    public function insertCustomFields($customFields, $job_id)
    {
        $data = arrangeSections($customFields);
        foreach ($data as $d) {
            if ($d['custom_field_id']) {
                $this->db->where('job_custom_fields.custom_field_id', $d['custom_field_id']);
                $this->db->update('job_custom_fields', $d);
            } else {
                unset($d['custom_field_id']);
                $d['job_id'] = $job_id;
                $this->db->insert('job_custom_fields', $d);
            }
        }
    }

    public function assignJobFilterValues($filters, $job_id)
    {
        $all_value_ids = array();
        foreach ($filters as $job_filter_id => $job_filter_value_ids) {
            foreach ($job_filter_value_ids as $job_filter_value_id) {
                $existing_filter = $this->checkExistingJobFilter($job_filter_value_id, $job_id);
                if ($job_filter_value_id && !$existing_filter) {
                    $insert['job_id'] = $job_id;
                    $insert['job_filter_value_id'] = $job_filter_value_id;
                    $insert['job_filter_id'] = $job_filter_id;
                    $this->db->insert('job_filter_value_assignments', $insert);
                }
            }
            $all_value_ids = array_merge($all_value_ids, $job_filter_value_ids);
        }

        //Deleting any if not in input
        if ($all_value_ids) {
            $this->db->where('job_id', $job_id);
            $this->db->where_not_in('job_filter_value_id', array_values($all_value_ids));
            $this->db->delete('job_filter_value_assignments');
        }
    }

    private function checkExistingJobFilter($job_filter_value_id, $job_id)
    {
        $this->db->where('job_id', $job_id);
        $this->db->where('job_filter_value_id', $job_filter_value_id);
        $query = $this->db->get('job_filter_value_assignments');
        return $query->num_rows() > 0 ? true : false;
    }

    public function changeStatus($job_id, $status)
    {
        $this->db->where('job_id', $job_id);
        $this->db->update('jobs', array('status' => ($status == 1 ? 0 : 1)));
    }

    public function remove($job_id)
    {
        //First remove job
        $this->db->delete('jobs', array('job_id' => $job_id));

        //Second remove job quizes
        $this->db->delete('job_quizes', array('job_id' => $job_id));
        
        //Third remove job traits
        $this->db->delete('job_traits', array('job_id' => $job_id));

        //Forth remove custom fields
        $this->db->delete('job_custom_fields', array('job_id' => $job_id));

        //Fifth remove job applications
        $this->db->delete('job_applications', array('job_id' => $job_id));

        //Sixth remove job favorites
        $this->db->delete('job_favorites', array('job_id' => $job_id));

        //Seventh remove job referred
        $this->db->delete('job_referred', array('job_id' => $job_id));

        //Eighth remove candidate interviews
        $this->db->delete('candidate_interviews', array('job_id' => $job_id));

        //Ninth remove candidate quizes
        $this->db->delete('candidate_quizes', array('job_id' => $job_id));
    }

    public function bulkAction()
    {
        $data = objToArr(json_decode($this->xssCleanInput('data')));
        $action = $data['action'];
        $ids = $data['ids'];
        switch ($action) {
            case "activate":
                $this->db->where_in('job_id', $ids);
                $this->db->update('jobs', array('status' => 1));
            break;
            case "deactivate":
                $this->db->where_in('job_id', $ids);
                $this->db->update('jobs', array('status' => '0'));
            break;
        }
    }

    public function valueExist($field, $value, $edit = false)
    {
        $this->db->where($field, $value);
        if ($edit) {
            $this->db->where('job_id !=', $edit);
        }
        $query = $this->db->get('jobs');
        return $query->num_rows() > 0 ? true : false;
    }

    public function getFields($job_id)
    {
        $this->db->where('job_id', $job_id);
        $this->db->from('job_custom_fields');
        $query = $this->db->get();
        return $query->result();
    }

    public function getJobsForCSV($ids)
    {
        $this->db->from('jobs');
        $this->db->select('
            jobs.*,
            departments.title as department,
            COUNT(DISTINCT('.CF_DB_PREFIX.'job_applications.job_id)) as applications_count,
            COUNT(DISTINCT('.CF_DB_PREFIX.'job_favorites.job_id)) as favorites_count,
            COUNT(DISTINCT('.CF_DB_PREFIX.'job_referred.job_id)) as referred_count,
            GROUP_CONCAT(DISTINCT('.CF_DB_PREFIX.'job_traits.title)) as traits,
            GROUP_CONCAT(DISTINCT('.CF_DB_PREFIX.'job_filter_values.title) SEPARATOR ",") as job_filter_values
        ');
        $this->db->where_in('jobs.job_id', explode(',', $ids));
        $this->db->join('companies', 'companies.company_id = jobs.company_id', 'left');
        $this->db->join('departments', 'departments.department_id = jobs.department_id', 'left');
        $this->db->join('job_applications', 'job_applications.job_id = jobs.job_id', 'left');
        $this->db->join('job_favorites', 'job_favorites.job_id = jobs.job_id', 'left');
        $this->db->join('job_referred', 'job_referred.job_id = jobs.job_id', 'left');
        $this->db->join('job_traits', 'job_traits.job_id = jobs.job_id', 'left');
        $this->db->join('job_filter_value_assignments', 'job_filter_value_assignments.job_id = jobs.job_id', 'left');
        $this->db->join('job_filter_values', 'job_filter_values.job_filter_value_id = job_filter_value_assignments.job_filter_value_id', 'left');        
        $this->db->group_by('jobs.job_id');
        $query = $this->db->get();
        return $query->result();
    }    

    public function removeCustomField($custom_field_id)
    {
        $this->db->delete('job_custom_fields', array('custom_field_id' => $custom_field_id));
    }    

    public function jobsList()
    {
        $request = $this->input->post();
        $columns = array(
            "",
            "jobs.title",
            "departments.department_id",
            "",
            "applications_count",
            "favorites_count",
            "referred_count",
            "traits_count",
            "jobs.created_at",
            "jobs.status",
        );
        $orderColumn = $columns[($request['order'][0]['column'] == 0 ? 5 : $request['order'][0]['column'])];
        $orderDirection = $request['order'][0]['dir'];
        $srh = $request['search']['value'];
        $limit = $request['length'];
        $offset = $request['start'];

        $this->db->from('jobs');
        $this->db->select('
            jobs.job_id,
            jobs.company_id,
            jobs.department_id,
            jobs.title,
            jobs.status,
            jobs.created_at,
            companies.title as company,
            departments.title as department,
            COUNT(DISTINCT('.CF_DB_PREFIX.'job_applications.job_application_id)) as applications_count,
            COUNT(DISTINCT(CONCAT('.CF_DB_PREFIX.'job_favorites.candidate_id, '.CF_DB_PREFIX.'job_favorites.job_id))) as favorites_count,
            COUNT(DISTINCT(CONCAT('.CF_DB_PREFIX.'job_referred.candidate_id, '.CF_DB_PREFIX.'job_referred.job_id))) as referred_count,
            COUNT(DISTINCT('.CF_DB_PREFIX.'job_traits.trait_id)) as traits_count,
            GROUP_CONCAT(DISTINCT('.CF_DB_PREFIX.'job_filter_values.title) SEPARATOR ",") as job_filter_values,
            GROUP_CONCAT(DISTINCT(CONCAT('.CF_DB_PREFIX.'job_filter_value_assignments.job_filter_id, "-", '.CF_DB_PREFIX.'job_filter_value_assignments.job_filter_value_id))) AS combined
        ');

        if ($srh) {
            $this->db->group_start()->like('jobs.title', $srh)->or_like('jobs.description', $srh)->group_end();
        }
        if (isset($request['status']) && $request['status'] != '') {
            $this->db->where('jobs.status', $request['status']);
        }
        if (isset($request['company']) && $request['company'] != '') {
            $this->db->where('companies.company_id', $request['company']);
        }
        if (isset($request['department']) && $request['department'] != '') {
            $this->db->where('departments.department_id', $request['department']);
        }
        $combined = array();
        if (isset($request['job_filters'])) {
            $job_filter_ids = array();
            $job_filter_value_ids = array();
            foreach ($request['job_filters'] as $job_filter_id => $job_filter_value_id) {
                if ($job_filter_id && $job_filter_value_id) {
                    $combined[] = $job_filter_id.'-'.$job_filter_value_id;
                    $job_filter_ids[] = $job_filter_id;
                    $job_filter_value_ids[] = $job_filter_value_id;
                }
            }
            if ($job_filter_ids && $job_filter_value_ids) {
                $this->db->group_start()
                ->where_in('job_filter_value_assignments.job_filter_id', $job_filter_ids)
                ->where_in('job_filter_value_assignments.job_filter_value_id', $job_filter_value_ids)
                ->group_end();
            }
        }
        $this->db->join('companies', 'companies.company_id = jobs.company_id', 'left');
        $this->db->join('departments', 'departments.department_id = jobs.department_id', 'left');
        $this->db->join('job_applications', 'job_applications.job_id = jobs.job_id', 'left');
        $this->db->join('job_favorites', 'job_favorites.job_id = jobs.job_id', 'left');
        $this->db->join('job_referred', 'job_referred.job_id = jobs.job_id', 'left');
        $this->db->join('job_traits', 'job_traits.job_id = jobs.job_id', 'left');
        $this->db->join('job_filter_value_assignments', 'job_filter_value_assignments.job_id = jobs.job_id', 'left');
        $this->db->join('job_filter_values', 'job_filter_values.job_filter_value_id = job_filter_value_assignments.job_filter_value_id', 'left');
        $this->db->group_by('jobs.job_id');
        
        //Enabling multi cross relationed filter search
        if (isset($request['job_filters']) && $combined) {
            $combined = combinationsOfArray($combined, count($combined));
            $c = 1;
            foreach ($combined as $comb) {
                if ($c == 1) {
                    $this->db->having('combined', $comb);
                } else {
                    $this->db->or_having('combined', $comb);
                }
                $c++;
            }
        }

        $this->db->order_by($orderColumn, $orderDirection);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();

        $result = array(
            'data' => $this->prepareDataForTable($query->result()),
            'recordsTotal' => $this->getTotal(),
            'recordsFiltered' => $this->getTotal($srh, $request),
        );

        return $result;
    }

    public function getTotal($srh = false, $request = '')
    {
        $this->db->from('jobs');
        $this->db->select('
            jobs.job_id,
            GROUP_CONCAT(DISTINCT(CONCAT('.CF_DB_PREFIX.'job_filter_value_assignments.job_filter_id, "-", '.CF_DB_PREFIX.'job_filter_value_assignments.job_filter_value_id))) AS combined
        ');        
        if ($srh) {
            $this->db->group_start()->like('jobs.title', $srh)->or_like('jobs.description', $srh)->group_end();
        }
        if (isset($request['status']) && $request['status'] != '') {
            $this->db->where('jobs.status', $request['status']);
        }
        if (isset($request['company']) && $request['company'] != '') {
            $this->db->where('companies.company_id', $request['company']);
        }
        if (isset($request['department']) && $request['department'] != '') {
            $this->db->where('departments.department_id', $request['department']);
        }


        $combined = array();        
        if (isset($request['job_filters'])) {
            $job_filter_ids = array();
            $job_filter_value_ids = array();
            foreach ($request['job_filters'] as $job_filter_id => $job_filter_value_id) {
                if ($job_filter_id && $job_filter_value_id) {
                    $job_filter_ids[] = $job_filter_id;
                    $job_filter_value_ids[] = $job_filter_value_id;
                    $combined[] = $job_filter_id.'-'.$job_filter_value_id;
                }
            }
            if ($job_filter_ids && $job_filter_value_ids) {
                $this->db->group_start()
                ->where_in('job_filter_value_assignments.job_filter_id', $job_filter_ids)
                ->where_in('job_filter_value_assignments.job_filter_value_id', $job_filter_value_ids)
                ->group_end();
            }
        }
        $this->db->join('companies', 'companies.company_id = jobs.company_id', 'left');
        $this->db->join('departments', 'departments.department_id = jobs.department_id', 'left');
        $this->db->join('job_applications', 'job_applications.job_id = jobs.job_id', 'left');
        $this->db->join('job_favorites', 'job_favorites.job_id = jobs.job_id', 'left');
        $this->db->join('job_referred', 'job_referred.job_id = jobs.job_id', 'left');
        $this->db->join('job_traits', 'job_traits.job_id = jobs.job_id', 'left');
        $this->db->join('job_filter_value_assignments', 'job_filter_value_assignments.job_id = jobs.job_id', 'left');
        $this->db->join('job_filter_values', 'job_filter_values.job_filter_value_id = job_filter_value_assignments.job_filter_value_id', 'left');
        $this->db->group_by('jobs.job_id');

        //Enabling multi cross relationed filter search
        if (isset($request['job_filters']) && $combined) {
            $combined = combinationsOfArray($combined, count($combined));
            $c = 1;
            foreach ($combined as $comb) {
                if ($c == 1) {
                    $this->db->having('combined', $comb);
                } else {
                    $this->db->or_having('combined', $comb);
                }
                $c++;
            }
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    private function prepareDataForTable($jobs)
    {
        $sorted = array();
        foreach ($jobs as $j) {
            $actions = '';
            $j = objToArr($j);
            if ($j['status'] == 1) {
                $button_text = lang('active');
                $button_class = 'success';
                $button_title = lang('click_to_deactivate');
            } else {
                $button_text = lang('inactive');
                $button_class = 'danger';
                $button_title = lang('click_to_activate');
            }
            if (allowedTo('edit_jobs')) { 
            $actions .= '
                <button type="button" class="btn btn-primary btn-xs create-or-edit-job" data-id="'.$j['job_id'].'"><i class="far fa-edit"></i></button>
            ';
            }
            if (allowedTo('delete_jobs')) { 
            $actions .= '
                <button type="button" class="btn btn-danger btn-xs delete-job" data-id="'.$j['job_id'].'"><i class="far fa-trash-alt"></i></button>
            ';
            }
            $sorted[] = array(
                "<input type='checkbox' class='minimal single-check' data-id='".$j['job_id']."' />",
                esc_output($j['title']),
                $j['department'] ? esc_output($j['department']) : '---',
                $j['job_filter_values'] ? esc_output($j['job_filter_values']) : '---',
                $j['applications_count'],
                $j['favorites_count'],
                $j['referred_count'],
                $j['traits_count'],
                date('d M, Y', strtotime($j['created_at'])),
                '<button type="button" title="'.$button_title.'" class="btn btn-'.$button_class.' btn-xs change-job-status" data-status="'.$j['status'].'" data-id="'.$j['job_id'].'">'.$button_text.'</button>',
                $actions
            );
        }
        return $sorted;
    }
}