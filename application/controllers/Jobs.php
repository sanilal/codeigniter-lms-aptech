<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//$this->load->library("security");
//require_once 'vendor/autoload.php';

class Jobs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
       // $this->db = $this->load->database('shared', TRUE);
        $this->load->helper('text');
        $this->load->library('session');
        // $this->load->library('stripe');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // CHECK CUSTOM SESSION DATA
        //$this->session_data();
    }
    /**
     * View Function to display account job listing page
     *
     * @return html/string
     */
    public function listing($page = null)
    {  
       // var_dump($this->session->userdata('user_id')); die();
        //echo get_frontend_settings('theme'); die();
        $search = urldecode($this->xssCleanInput('search', 'get'));
    // echo get_frontend_settings('theme'); die();
        $departments = $this->xssCleanInput('departments', 'get');
        $filters = $this->xssCleanInput('filters', 'get');
        $filtersSel = $filters ? decodeArray(json_decode($filters)) : array();
       
        $limit = 10; //setting('jobs-limit');
        $page_data['page'] = 'Job Listing | ' . setting('site-name');
        $page_data['page_name'] = 'jobs-listing';
        $data['page'] = 'jobs';
        $page_data['jobs'] = $this->JobModel->getAll($page, $search, $departments, $filtersSel, $limit);
        $page_data['jobFavorites'] = $this->JobModel->getFavorites();
        $page_data['departments'] = $this->DepartmentModel->getAll();
        $page_data['pagination'] = $this->getPagination($page, $search, $departments, $filtersSel, $limit);
        $page_data['job_filters'] = $this->JobFilterModel->getAll();
        $page_data['search'] = $search;
        $page_data['departmentsSel'] = $departments;
        $page_data['filtersSel'] = $filtersSel;
        $page_data['filtersEncoded'] = $filters ? $filters : '{}';
       // $page_data['page_name'] = "my_courses";
    //var_dump($page_data['jobs']); die();
      
       // $this->load->view('front/layout/header', $page_data);
        //$this->load->view('front/jobs-listing', $page_data);
        
         $page_data['page_title'] = site_phrase("jobs");
         $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }    

    /**
     * View Function to display jobs listing page
     *
     * @return html/string
     */
    public function detail($id = null)
    {
        $search = urldecode($this->xssCleanInput('search', 'get'));
        $departments = $this->xssCleanInput('departments', 'get');
        $filters = $this->xssCleanInput('filters', 'get');
        $filtersSel = $filters ? decodeArray(json_decode($filters)) : array();
        $page_data['job'] = $this->JobModel->getJob($id);
        if (!$page_data['job']) {
            redirect('404_override');
        }
        $page_data['jobFavorites'] = $this->JobModel->getFavorites();
        $page_data['search'] = $search;
        $page_data['departments'] = $this->DepartmentModel->getAll();
        $page_data['departmentsSel'] = $departments;
        $page_data['job_filters'] = $this->JobFilterModel->getAll();
        $page_data['resumes'] = $this->ResumeModel->getCandidateResumesList();
        $page_data['applied'] = $this->JobModel->getAppliedJobs();
        $page_data['resume_id'] = $this->ResumeModel->getFirstDetailedResume();
        $page_data['filtersSel'] = $filtersSel;
        $page_data['filtersEncoded'] = $filters ? $filters : '{}';

        $page_data['page'] = $data['job']['title'] .' | ' . setting('site-name');
        $page_data['page_name'] = 'job-detail';
        $page_data['page_title'] = site_phrase("jobs");
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);

        // $this->load->view('front/layout/header', $pageData);
        // $this->load->view('front/job-detail', $data);
    } 

    /**
     * Function to mark jobs as favorite
     *
     * @return html/string
     */
    public function markFavorite($id = null)
    {
        if (candidateSession()) {
            if ($this->JobModel->markFavorite($id)) {
                echo json_encode(array('success' => 'true', 'messages' => ''));
            }
        } else {
            echo json_encode(array('success' => 'false', 'messages' => ''));
        }
    } 

    /**
     * Function to unmark jobs as favorite
     *
     * @return html/string
     */
    public function unmarkFavorite($id = null)
    {
        $this->JobModel->unmarkFavorite($id);
        echo json_encode(array('success' => 'true', 'messages' => ''));
    } 

    /**
     * Function to display refer job form
     *
     * @return html/string
     */
    public function referJobView()
    {
        echo $this->load->view('frontend/' . get_frontend_settings('theme') . '/partials/refer-job', array(), TRUE);
    } 

    /**
     * Function to refer job to a person
     *
     * @return html/string
     */
    public function referJob($id = null)
    {
        $this->checkIfDemo();
        if (candidateSession()) {
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[2]|max_length[50]|valid_email');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('phone', 'Phone', 'max_length[50]|numeric');

            if ($this->form_validation->run() === FALSE) {
                echo json_encode(array(
                    'success' => 'error',
                    'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
                ));
            } else if ($this->JobModel->ifAlreadyReferred()) {
                $this->JobModel->referJob();
                echo json_encode(array(
                    'success' => 'error',
                    'messages' => $this->ajaxErrorMessage(array('error' => site_phrase('job_is_already_referred')))
                ));
            } else {
                $this->JobModel->referJob();
                $job_id = $this->xssCleanInput('job_id');
                $name = $this->xssCleanInput('name');
                $user = candidateSession('first_name').' '.candidateSession('last_name');
               $message = $this->load->view('emails/refer-job', compact('job_id', 'user', 'name'), TRUE);
                $this->sendEmail(
                    $message,
                    $this->xssCleanInput('email'),
                    'Job Referred'
                );
                echo json_encode(array(
                    'success' => 'true',
                    'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('job_referred_successfully')))
                ));
            }
        } else {
            echo json_encode(array('success' => 'false', 'messages' => ''));
        }
    }

    /**
     * Function to apply to a job
     *
     * @return html/string
     */
    public function applyJob($id = null)
    {
        //$this->checkIfDemo();
        if (candidateSession()) {
            if (setting('enable-multiple-resume') == 'yes') {
                $this->form_validation->set_rules('resume', 'Resume', 'required');

                $job = $this->JobModel->getJob($this->xssCleanInput('job_id'));
                $resume = $this->ResumeModel->getFirst('resumes.resume_id', decode($this->xssCleanInput('resume')));

                if ($this->form_validation->run() === FALSE) {
                    echo json_encode(array(
                        'success' => 'error',
                        'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
                    ));
                } elseif ($job['is_static_allowed'] != 1 && $resume['type'] != 'detailed') {
                    echo json_encode(array(
                        'success' => 'error',
                        'messages' => $this->ajaxErrorMessage(array('error' => site_phrase('you_need_to_apply_via_detailed')))
                    ));
                } else {
                    $this->JobModel->applyJob();
                    echo json_encode(array(
                        'success' => 'true',
                        'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('job_applied_successfully')))
                    ));
                }
 
            } else {
                $this->JobModel->applyJob();
                echo json_encode(array(
                    'success' => 'true',
                    'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('job_applied_successfully')))
                ));
            }
        } else {
            echo json_encode(array('success' => 'false', 'messages' => ''));
        }
    }

    /**
     * View Function to display candidate job applications page
     *
     * @param integer $page
     * @return html/string
     */
    public function jobApplicationsView($page = null)
    {
        $this->checkLogin();
        $total = $this->JobModel->getTotalAppliedJobs();
        $limit = 5;
        $page_data['pagination'] = $this->createPagination($page, '/candidate/job-applications/', $total, $limit);
        $page_data['page'] = site_phrase('job_applications').' | ' . setting('site-name');
        $page_data['jobs'] = $this->JobModel->getAppliedJobsList($page, $limit);
        //$page_data['page'] = 'applications';
        $page_data['page_name'] = 'account-job-applications';
        $page_data['page_title'] = site_phrase("applications");
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);


        // $this->load->view('front/layout/header', $pageData);
        // $this->load->view('front/account-job-applications', $data);
    }

    /**
     * View Function to display candidate job favorites page
     *
     * @param integer $page
     * @return html/string
     */
    public function jobFavoritesView($page = null)
    {
        $this->checkLogin();
        $total = $this->JobModel->getTotalFavoriteJobs();
        $limit = 5;
        $page_data['pagination'] = $this->createPagination($page, '/candidate/job-favorites/', $total, $limit);
        $page_data['page'] = site_phrase('job_favorites').' | ' . setting('site-name');
        $page_data['jobs'] = $this->JobModel->getFavoriteJobsList($page, $limit);
        $page_data['page'] = 'favorites';
        $page_data['page_name'] = 'account-job-applications';
        $page_data['page_title'] = site_phrase("applications");
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        // $this->load->view('front/layout/header', $pageData);
        // $this->load->view('front/account-job-favorites', $data);
    }

    /**
     * View Function to display candidate job referred page
     *
     * @param integer $page
     * @return html/string
     */
    public function jobReferredView($page = null)
    {
        $this->checkLogin();
        $total = $this->JobModel->getTotalReferredJobs();
        $limit = 5;
        $page_data['pagination'] = $this->createPagination($page, '/candidate/job-referred/', $total, $limit);
        $page_data['page'] = site_phrase('job_referred').' | ' . setting('site-name');
        $page_data['jobs'] = $this->JobModel->getReferredJobsList($page, $limit);
        $page_data['jobFavorites'] = $this->JobModel->getFavorites();
        $page_data['page'] = 'referred';
//var_dump($page);
        $page_data['page_name'] = 'account-job-referred';
        $page_data['page_title'] = site_phrase("job_referred");
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        // $this->load->view('front/layout/header', $pageData);
        // $this->load->view('front/account-job-referred', $data);
    }
    
    /**
     * Private function to create pagination for jobs listing
     *
     * @return html/string
     */
    private function getPagination($page, $search, $departments, $filtersSel, $limit)
    {
        $total = $this->JobModel->getTotal($search, $departments, $filtersSel);
        $url = '/jobs/';
        return $this->createPagination($page, $url, $total, $limit);
    }    
}

