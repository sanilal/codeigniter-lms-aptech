<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use SimpleExcel\SimpleExcel;

class Jobs extends CI_Controller
{
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->checkAdminLogin();
    }

    /**
     * View Function to display jobs list view page
     *
     * @return html/string
     */
    public function listView()
    {
        $data['page'] = lang('jobs');
        $data['menu'] = 'jobs';
        $pagedata['companies'] = objToArr($this->AdminCompanyModel->getAll());
        $pagedata['departments'] = objToArr($this->AdminDepartmentModel->getAll());
        $pagedata['job_filters'] = objToArr($this->AdminJobFilterModel->getAll());
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/jobs/list', $pagedata);
    }

    /**
     * Function to get data for jobs jquery datatable
     *
     * @return json
     */
    public function data()
    {
        echo json_encode($this->AdminJobModel->jobsList());
    }    

    /**
     * View Function (for ajax) to display create or edit job
     *
     * @param integer $job_id
     * @return html/string
     */
    public function createOrEdit($job_id = NULL)
    {
        $pagedata['job'] = objToArr($this->AdminJobModel->getJob('jobs.job_id', $job_id));
        $pagedata['companies'] = objToArr($this->AdminCompanyModel->getAll());
        $pagedata['departments'] = objToArr($this->AdminDepartmentModel->getAll());
        $pagedata['traits'] = objToArr($this->AdminTraitModel->getAll());
        $pagedata['fields'] = objToArr($this->AdminJobModel->getFields($job_id));
        $pagedata['quizes'] = objToArr($this->AdminQuizModel->getAll());
        $pagedata['job_filters'] = objToArr($this->AdminJobFilterModel->getAll());
        $data['page'] = lang('job');
        $data['menu'] = 'job';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/jobs/create-or-edit', $pagedata);
    }

    /**
     * Function (for ajax) to process job create or edit form request
     *
     * @return redirect
     */
    public function save()
    {
        $this->checkIfDemo();
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[50]|max_length[10000]');
        $this->form_validation->set_rules('labels[]', 'Labels', 'max_length[50]');
        $this->form_validation->set_rules('values[]', 'Values', 'max_length[200]');

        $edit = $this->xssCleanInput('job_id') ? $this->xssCleanInput('job_id') : false;

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
            ));
        } else {
            $this->AdminJobModel->storeJob($edit);
            echo json_encode(array(
                'success' => 'true',
                'messages' => $this->ajaxErrorMessage(array('success' => lang('job') . ($edit ? lang('updated') : lang('created'))))
            ));
        }
    }

    /**
     * Function (for ajax) to process job change status request
     *
     * @param integer $job_id
     * @param string $status
     * @return void
     */
    public function changeStatus($job_id = null, $status = null)
    {
        $this->checkIfDemo();
        $this->AdminJobModel->changeStatus($job_id, $status);
    }

    /**
     * Function (for ajax) to process job bulk action request
     *
     * @return void
     */
    public function bulkAction()
    {
        $this->checkIfDemo();
        $this->AdminJobModel->bulkAction();
    }

    /**
     * Function (for ajax) to process job delete request
     *
     * @param integer $job_id
     * @return void
     */
    public function delete($job_id)
    {
        $this->checkIfDemo();
        $this->AdminJobModel->remove($job_id);
    }

    /**
     * Post Function to download jobs data in excel
     *
     * @return void
     */
    public function excel()
    {
        $data = $this->AdminJobModel->getJobsForCSV($this->xssCleanInput('ids'));
        $data = sortForCSV(objToArr($data));
        $excel = new SimpleExcel('csv');                    
        $excel->writer->setData($data);
        $excel->writer->saveFile('jobs'); 
        exit;
    }


    /**
     * Function (for ajax) to process add custom field request
     *
     * @return void
     */
    public function addCustomField()
    {
        $data['field'] = array('custom_field_id' => '', 'label' => '', 'value' => '');
        echo $this->load->view('admin/jobs/custom-field', $data, TRUE);
    }

    /**
     * Function (for ajax) to process remove custom field request
     *
     * @param integer $custom_field_id
     * @return void
     */
    public function removeCustomField($custom_field_id)
    {
        $this->checkIfDemo();
        $this->AdminJobModel->removeCustomField($custom_field_id);
    }

}
