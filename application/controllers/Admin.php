<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use SimpleExcel\SimpleExcel;
use Dompdf\Dompdf;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        //$this->load->database('model');
        //$this->load->model("Model");
        $this->load->library('session');
        $this->load->helper('text');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }

        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
    }


    public function index()
    {
        if ($this->session->userdata('admin_login') == true) {
            $this->dashboard();
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    //Start page
    function add_page_category()
    {
        $this->load->view('backend/admin/page_category_add');
    }

    function edit_page_category($page_category_id = "")
    {
        $data['page_category'] = $this->crud_model->get_page_categories($page_category_id)->row_array();
        $this->load->view('backend/admin/page_category_edit', $data);
    }

    function page_category($param1 = "", $param2 = "")
    {
        if ($param1 == 'add') {
            $response = $this->crud_model->add_page_category();
            if ($response == true) {
                $this->session->set_flashdata('flash_message', get_phrase('page_category_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('there_is_already_a_page_with_this_name'));
            }
            redirect(site_url('admin/page_category'), 'refresh');
        } elseif ($param1 == 'update') {
            $response = $this->crud_model->update_page_category($param2);
            if ($response == true) {
                $this->session->set_flashdata('flash_message', get_phrase('page_category_updated_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('there_is_already_a_page_with_this_name'));
            }
            redirect(site_url('admin/page_category'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->crud_model->delete_page_category($param2);
            $this->session->set_flashdata('flash_message', get_phrase('page_category_deleted_successfully'));
            redirect(site_url('admin/page_category'), 'refresh');
        }
        $page_data['categories'] = $this->crud_model->get_page_categories();
        $page_data['page_title'] = get_phrase('page_category');
        $page_data['page_name'] = 'page_category';
        $this->load->view('backend/index', $page_data);
    }

    function add_page()
    {
        $page_data['page_title'] = get_phrase('add_page');
        $page_data['page_name'] = 'page_add';
        $this->load->view('backend/index', $page_data);
    }

    function edit_page($page_id = "")
    {
        $page_data['page'] = $this->crud_model->get_pages($page_id)->row_array();
        $page_data['page_title'] = get_phrase('edit_page');
        $page_data['page_name'] = 'page_edit';
        $this->load->view('backend/index', $page_data);
    }

    function page($param1 = "", $param2 = "")
    {
        if ($param1 == 'add') {
            $this->crud_model->add_page();
            $this->session->set_flashdata('flash_message', get_phrase('page_added_successfully'));
            redirect(site_url('admin/page'), 'refresh');
        } elseif ($param1 == 'update') {
            $this->crud_model->update_page($param2);
            $this->session->set_flashdata('flash_message', get_phrase('page_updated_successfully'));
            redirect(site_url('admin/page'), 'refresh');
        } elseif ($param1 == 'status') {
            $this->crud_model->update_page_status($param2);
            $this->session->set_flashdata('flash_message', get_phrase('page_status_has_been_updated'));
            redirect(site_url('admin/page'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->crud_model->page_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('page_deleted_successfully'));
            redirect(site_url('admin/page'), 'refresh');
        }
        $page_data['pages'] = $this->crud_model->get_pages();
        $page_data['page_title'] = get_phrase('page');
        $page_data['page_name'] = 'page';
        $this->load->view('backend/index', $page_data);
    }

    function instructors_pending_page($param1 = "", $param2 = "")
    {
        if ($param1 == 'approval_request') {
            $this->crud_model->approve_page($param2);
            $this->session->set_flashdata('flash_message', get_phrase('the_page_has_been_approved'));
            redirect(site_url('admin/instructors_pending_page'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->crud_model->page_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('page_deleted_successfully'));
            redirect(site_url('admin/instructors_pending_page'), 'refresh');
        }
        $page_data['pending_pages'] = $this->crud_model->get_instructors_pending_page();
        $page_data['page_title'] = get_phrase('instructors_pending_page');
        $page_data['page_name'] = 'instructors_pending_page';
        $this->load->view('backend/index', $page_data);
    }

    function page_settings($param1 = "")
    {
        if ($param1 == 'update') {
            $this->crud_model->update_page_settings();
            $this->session->set_flashdata('flash_message', get_phrase('page_settings_updated_successfully'));
            redirect(site_url('admin/page_settings'), 'refresh');
        }
        $page_data['page_title'] = get_phrase('page_settings');
        $page_data['page_name'] = 'page_settings';
        $this->load->view('backend/index', $page_data);
    }
    //End page



    public function dashboard()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index.php', $page_data);
    }

    public function categories($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('category');

        if ($param1 == 'add') {

            $response = $this->crud_model->add_category();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('admin/categories'), 'refresh');
        } elseif ($param1 == "edit") {

            $response = $this->crud_model->edit_category($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('admin/categories'), 'refresh');
        } elseif ($param1 == "delete") {

            $this->crud_model->delete_category($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/categories'), 'refresh');
        }
        $page_data['page_name'] = 'categories';
        $page_data['page_title'] = get_phrase('categories');
        $page_data['categories'] = $this->crud_model->get_all_categories($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function category_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('category');

        if ($param1 == "add_category") {

            $page_data['page_name'] = 'category_add';
            $page_data['categories'] = $this->crud_model->get_all_categories()->result_array();
            $page_data['page_title'] = get_phrase('add_category');
        }
        if ($param1 == "edit_category") {

            $page_data['page_name'] = 'category_edit';
            $page_data['page_title'] = get_phrase('edit_category');
            $page_data['categories'] = $this->crud_model->get_all_categories()->result_array();
            $page_data['category_id'] = $param2;
        }

        $this->load->view('backend/index', $page_data);
    }

    public function sub_categories_by_category_id($category_id = 0)
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $category_id = $this->input->post('category_id');
        redirect(site_url("admin/sub_categories/$category_id"), 'refresh');
    }

    public function sub_category_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('category');

        if ($param1 == 'add_sub_category') {
            $page_data['page_name'] = 'sub_category_add';
            $page_data['page_title'] = get_phrase('add_sub_category');
        } elseif ($param1 == 'edit_sub_category') {
            $page_data['page_name'] = 'sub_category_edit';
            $page_data['page_title'] = get_phrase('edit_sub_category');
            $page_data['sub_category_id'] = $param2;
        }
        $page_data['categories'] = $this->crud_model->get_categories();
        $this->load->view('backend/index', $page_data);
    }

     public function companies($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('user');
        check_permission('company');

        if ($param1 == "add") {
            $this->user_model->add_user(true); // PROVIDING TRUE FOR INSTRUCTOR
            redirect(site_url('admin/companies'), 'refresh');
        } elseif ($param1 == "edit") {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/companies'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/companies'), 'refresh');
        }

        $page_data['page_name'] = 'companies';
        $page_data['page_title'] = get_phrase('companies');
        $page_data['companies'] = $this->user_model->get_company()->result_array();
        $this->load->view('backend/index', $page_data);
    } 

    public function instructors($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('user');
        check_permission('instructor');

        if ($param1 == "add") {
            $this->user_model->add_user(false,true); // PROVIDING TRUE FOR INSTRUCTOR
            redirect(site_url('admin/instructors'), 'refresh');
        } elseif ($param1 == "edit") {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/instructors'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/instructors'), 'refresh');
        }

        $page_data['page_name'] = 'instructors';
        $page_data['page_title'] = get_phrase('instructor');
        $page_data['instructors'] = $this->user_model->get_instructor()->result_array();
        $this->load->view('backend/index', $page_data);
    }
    public function company_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'add_company_form') {
            // CHECK ACCESS PERMISSION
            check_permission('admin');

            $page_data['page_name'] = 'company_add';
            $page_data['page_title'] = get_phrase('company_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_company_form') {
            // CHECK ACCESS PERMISSION
            check_permission('admin');

            $page_data['page_name'] = 'company_edit';
            $page_data['user_id'] = $param2;
            $page_data['page_title'] = get_phrase('company_edit');
            $this->load->view('backend/index', $page_data);
        }
    }
   /*  public function company_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('user');
        check_permission('company');

        if ($param1 == 'add_company_form') {
            $page_data['page_name'] = 'company_add';
            $page_data['page_title'] = get_phrase('company_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_company_form') {
            $page_data['page_name'] = 'company_edit';
            $page_data['user_id'] = $param2;
            $page_data['page_title'] = get_phrase('company_edit');
            $this->load->view('backend/index', $page_data);
        }
    } */

    public function instructor_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('user');
        check_permission('instructor');

        if ($param1 == 'add_instructor_form') {
            $page_data['page_name'] = 'instructor_add';
            $page_data['page_title'] = get_phrase('instructor_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_instructor_form') {
            $page_data['page_name'] = 'instructor_edit';
            $page_data['user_id'] = $param2;
            $page_data['page_title'] = get_phrase('instructor_edit');
            $this->load->view('backend/index', $page_data);
        }
    }

    public function users($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('user');
        check_permission('student');

        if ($param1 == "add") {
            $this->user_model->add_user();
            redirect(site_url('admin/users'), 'refresh');
        } elseif ($param1 == "edit") {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/users'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/users'), 'refresh');
        }

        $page_data['page_name'] = 'users';
        $page_data['page_title'] = get_phrase('student');
        $page_data['users'] = $this->user_model->get_user($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function add_shortcut_student()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('user');
        check_permission('student');

        $is_instructor = 0;
        echo $this->user_model->add_shortcut_user($is_instructor);
    }

    public function user_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('user');
        check_permission('student');

        if ($param1 == 'add_user_form') {
            $page_data['page_name'] = 'user_add';
            $page_data['page_title'] = get_phrase('student_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_user_form') {
            $page_data['page_name'] = 'user_edit';
            $page_data['user_id'] = $param2;
            $page_data['page_title'] = get_phrase('student_edit');
            $this->load->view('backend/index', $page_data);
        }
    }

    public function enrol_history($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('enrolment');

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0]);
            $page_data['timestamp_end']   = strtotime($date_range[1]);
        } else {
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:00';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $page_data['timestamp_start']   = strtotime($first_day_of_month);
            $page_data['timestamp_end']     = strtotime($last_day_of_month);
        }
        $page_data['page_name'] = 'enrol_history';
        $page_data['enrol_history'] = $this->crud_model->enrol_history_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['page_title'] = get_phrase('enrol_history');
        $this->load->view('backend/index', $page_data);
    }

    public function enrol_student($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('enrolment');

        if ($param1 == 'enrol') {
            $this->crud_model->enrol_a_student_manually();
            redirect(site_url('admin/enrol_history'), 'refresh');
        }
        $page_data['page_name'] = 'enrol_student';
        $page_data['page_title'] = get_phrase('enrol_a_student');
        $this->load->view('backend/index', $page_data);
    }

    public function shortcut_enrol_student()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('enrolment');

        echo $this->crud_model->shortcut_enrol_a_student_manually();
    }

    public function admin_revenue($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('revenue');

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0] . ' 00:00:00');
            $page_data['timestamp_end']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            $page_data['timestamp_start'] = strtotime(date("m/01/Y 00:00:00"));
            $page_data['timestamp_end']   = strtotime(date("m/t/Y 23:59:59"));
        }

        $page_data['page_name'] = 'admin_revenue';
        $page_data['payment_history'] = $this->crud_model->get_revenue_by_user_type($page_data['timestamp_start'], $page_data['timestamp_end'], 'admin_revenue');
        $page_data['page_title'] = get_phrase('admin_revenue');



        $this->load->view('backend/index', $page_data);
    }

    public function instructor_revenue($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('revenue');

        $page_data['page_name'] = 'instructor_revenue';
        $page_data['payment_history'] = $this->crud_model->get_revenue_by_user_type("", "", 'instructor_revenue');
        $page_data['page_title'] = get_phrase('instructor_revenue');
        $this->load->view('backend/index', $page_data);
    }

    function invoice($payout_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'invoice';
        $page_data['payout_id'] = $payout_id;
        $page_data['page_title'] = get_phrase('invoice');
        $this->load->view('backend/index', $page_data);
    }

    public function enrol_history_delete($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('enrolment');

        $this->crud_model->delete_enrol_history($param1);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
        redirect(site_url('admin/enrol_history'), 'refresh');
    }

    public function purchase_history()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'purchase_history';
        $page_data['purchase_history'] = $this->crud_model->purchase_history();
        $page_data['page_title'] = get_phrase('purchase_history');
        $this->load->view('backend/index', $page_data);
    }

    public function system_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('settings');

        if ($param1 == 'system_update') {
            $this->crud_model->update_system_settings();
            $this->session->set_flashdata('flash_message', get_phrase('system_settings_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        if ($param1 == 'logo_upload') {
            move_uploaded_file($_FILES['logo']['tmp_name'], 'assets/backend/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('backend_logo_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        if ($param1 == 'favicon_upload') {
            move_uploaded_file($_FILES['favicon']['tmp_name'], 'assets/favicon.png');
            $this->session->set_flashdata('flash_message', get_phrase('favicon_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        $page_data['languages']  = $this->crud_model->get_all_languages();
        $page_data['page_name'] = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function frontend_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('settings');

        if ($param1 == 'frontend_update') {
            $this->crud_model->update_frontend_settings();
            $this->session->set_flashdata('flash_message', get_phrase('frontend_settings_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }

        if ($param1 == 'recaptcha_update') {
            $this->crud_model->update_recaptcha_settings();
            $this->session->set_flashdata('flash_message', get_phrase('recaptcha_settings_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }

        if ($param1 == 'banner_image_update') {
            $this->crud_model->update_frontend_banner();
            $this->session->set_flashdata('flash_message', get_phrase('banner_image_update'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'light_logo') {
            $this->crud_model->update_light_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'dark_logo') {
            $this->crud_model->update_dark_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'small_logo') {
            $this->crud_model->update_small_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'favicon') {
            $this->crud_model->update_favicon();
            $this->session->set_flashdata('flash_message', get_phrase('favicon_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'surveybg') {
            $this->crud_model->update_survey_bg();
            $this->session->set_flashdata('flash_message', get_phrase('surveybg_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }

        $page_data['page_name'] = 'frontend_settings';
        $page_data['page_title'] = get_phrase('frontend_settings');
        $this->load->view('backend/index', $page_data);
    }
    public function payment_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('settings');

        if ($param1 == 'system_currency') {
            $this->crud_model->update_system_currency();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }
        if ($param1 == 'paypal_settings') {
            $this->crud_model->update_paypal_settings();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }
        if ($param1 == 'stripe_settings') {
            $this->crud_model->update_stripe_settings();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }

        if ($param1 == 'razorpay_settings') {
            $this->crud_model->update_razorpay_settings();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }

        $page_data['page_name'] = 'payment_settings';
        $page_data['page_title'] = get_phrase('payment_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function smtp_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('settings');

        if ($param1 == 'update') {
            $this->crud_model->update_smtp_settings();
            $this->session->set_flashdata('flash_message', get_phrase('smtp_settings_updated_successfully'));
            redirect(site_url('admin/smtp_settings'), 'refresh');
        }

        $page_data['page_name'] = 'smtp_settings';
        $page_data['page_title'] = get_phrase('smtp_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function social_login_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('settings');

        if ($param1 == 'update') {
            $this->crud_model->update_social_login_settings();
            $this->session->set_flashdata('flash_message', get_phrase('social_login_settings_updated_successfully'));
            redirect(site_url('admin/social_login_settings'), 'refresh');
        }

        $page_data['page_name'] = 'social_login';
        $page_data['page_title'] = get_phrase('social_login');
        $this->load->view('backend/index', $page_data);
    }

    public function instructor_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('user');
        check_permission('instructor');

        if ($param1 == 'update') {
            $this->crud_model->update_instructor_settings();
            $this->session->set_flashdata('flash_message', get_phrase('instructor_settings_updated'));
            redirect(site_url('admin/instructor_settings'), 'refresh');
        }

        $page_data['page_name'] = 'instructor_settings';
        $page_data['page_title'] = get_phrase('instructor_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function theme_settings($action = '')
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('theme');

        $page_data['page_name']  = 'theme_settings';
        $page_data['page_title'] = get_phrase('theme_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function theme_actions($action = "", $theme = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('theme');

        if ($action == 'activate') {
            $theme_to_active  = $this->input->post('theme');
            $installed_themes = $this->crud_model->get_installed_themes();
            if (in_array($theme_to_active, $installed_themes)) {
                $this->crud_model->activate_theme($theme_to_active);
                echo true;
            } else {
                echo false;
            }
        } elseif ($action == 'remove') {
            if ($theme == get_frontend_settings('theme')) {
                $this->session->set_flashdata('error_message', get_phrase('activate_a_theme_first'));
            } else {
                $this->crud_model->remove_files_and_folders(APPPATH . '/views/frontend/' . $theme);
                $this->crud_model->remove_files_and_folders(FCPATH . '/assets/frontend/' . $theme);
                $this->session->set_flashdata('flash_message', $theme . ' ' . get_phrase('theme_removed_successfully'));
            }
            redirect(site_url('admin/theme_settings'), 'refresh');
        }
    }

    public function courses()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('course');

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";

        // Courses query is used for deciding if there is any course or not. Check the view you will get it
        $page_data['courses']                = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status']);
        $page_data['status_wise_courses']    = $this->crud_model->get_status_wise_courses();
        $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();
        $page_data['page_title']             = get_phrase('active_courses');
        $this->load->view('backend/index', $page_data);
    }

    // This function is responsible for loading the course data from server side for datatable SILENTLY
    public function get_courses()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $courses = array();
        // Filter portion
        $filter_data['selected_category_id']   = $this->input->post('selected_category_id');
        $filter_data['selected_instructor_id'] = $this->input->post('selected_instructor_id');
        $filter_data['selected_price']         = $this->input->post('selected_price');
        $filter_data['selected_status']        = $this->input->post('selected_status');

        // Server side processing portion
        $columns = array(
            0 => '#',
            1 => 'title',
            2 => 'category',
            3 => 'lesson_and_section',
            4 => 'enrolled_student',
            5 => 'status',
            6 => 'price',
            7 => 'actions',
            8 => 'course_id'
        );

        // Coming from databale itself. Limit is the visible number of data
        $limit = html_escape($this->input->post('length'));
        $start = html_escape($this->input->post('start'));
        $order = "";
        $dir   = $this->input->post('order')[0]['dir'];

        $totalData = $this->lazyload->count_all_courses($filter_data);
        $totalFiltered = $totalData;

        // This block of code is handling the search event of datatable
        if (empty($this->input->post('search')['value'])) {
            $courses = $this->lazyload->courses($limit, $start, $order, $dir, $filter_data);
        } else {
            $search = $this->input->post('search')['value'];
            $courses =  $this->lazyload->course_search($limit, $start, $search, $order, $dir, $filter_data);
            $totalFiltered = $this->lazyload->course_search_count($search);
        }

        // Fetch the data and make it as JSON format and return it.
        $data = array();
        if (!empty($courses)) {
            foreach ($courses as $key => $row) {
                $instructor_details = $this->user_model->get_all_user($row->user_id)->row_array();
                $category_details = $this->crud_model->get_category_details_by_id($row->sub_category_id)->row_array();
                $sections = $this->crud_model->get_section('course', $row->id);
                $lessons = $this->crud_model->get_lessons('course', $row->id);
                $enroll_history = $this->crud_model->enrol_history($row->id);

                $status_badge = "badge-success-lighten";
                if ($row->status == 'pending') {
                    $status_badge = "badge-danger-lighten";
                } elseif ($row->status == 'draft') {
                    $status_badge = "badge-dark-lighten";
                }

                $price_badge = "badge-dark-lighten";
                $price = 0;
                if ($row->is_free_course == null) {
                    if ($row->discount_flag == 1) {
                        $price = currency($row->discounted_price);
                    } else {
                        $price = currency($row->price);
                    }
                } elseif ($row->is_free_course == 1) {
                    $price_badge = "badge-success-lighten";
                    $price = get_phrase('free');
                }

                $view_course_on_frontend_url = site_url('home/course/' . rawurlencode(slugify($row->title)) . '/' . $row->id);
                $edit_this_course_url = site_url('admin/course_form/course_edit/' . $row->id);
                $section_and_lesson_url = site_url('admin/course_form/course_edit/' . $row->id);

                if ($row->status == 'active') {
                    $course_status_changing_message = get_phrase('mark_as_pending');
                    if ($row->user_id != $this->session->userdata('user_id')) {
                        $course_status_changing_action = "showAjaxModal('" . site_url('modal/popup/mail_on_course_status_changing_modal/pending/' . $row->id . '/' . $filter_data['selected_category_id'] . '/' . $filter_data['selected_instructor_id'] . '/' . $filter_data['selected_price'] . '/' . $filter_data['selected_status']) . "', '" . $course_status_changing_message . "')";
                    } else {
                        $course_status_changing_action = "confirm_modal('" . site_url('admin/change_course_status_for_admin/pending/' . $row->id . '/' . $filter_data['selected_category_id'] . '/' . $filter_data['selected_instructor_id'] . '/' . $filter_data['selected_price'] . '/' . $filter_data['selected_status']) . "')";
                    }
                } else {
                    $course_status_changing_message = get_phrase('mark_as_active');
                    if ($row->user_id != $this->session->userdata('user_id')) {
                        $course_status_changing_action = "showAjaxModal('" . site_url('modal/popup/mail_on_course_status_changing_modal/active/' . $row->id . '/' . $filter_data['selected_category_id'] . '/' . $filter_data['selected_instructor_id'] . '/' . $filter_data['selected_price'] . '/' . $filter_data['selected_status']) . "', '" . $course_status_changing_message . "')";
                    } else {
                        $course_status_changing_action = "confirm_modal('" . site_url('admin/change_course_status_for_admin/active/' . $row->id . '/' . $filter_data['selected_category_id'] . '/' . $filter_data['selected_instructor_id'] . '/' . $filter_data['selected_price'] . '/' . $filter_data['selected_status']) . "')";
                    }
                }



                $delete_course_url = "confirm_modal('" . site_url('admin/course_actions/delete/' . $row->id) . "')";

                if ($row->course_type != 'scorm') {
                    $section_and_lesson_menu = '<li><a class="dropdown-item" href="' . $section_and_lesson_url . '">' . get_phrase("section_and_lesson") . '</a></li>';
                } else {
                    $section_and_lesson_menu = "";
                }

                $course_edit_menu = '<li><a class="dropdown-item" href="' . $edit_this_course_url . '">' . get_phrase("edit_this_course") . '</a></li>';

                $course_delete_menu = '<li><a class="dropdown-item" href="javascript::" onclick="' . $delete_course_url . '">' . get_phrase("delete") . '</a></li>';

                $action = '
                <div class="dropright dropright">
                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="' . $view_course_on_frontend_url . '" target="_blank">' . get_phrase("view_course_on_frontend") . '</a></li>
                ' . $course_edit_menu . $section_and_lesson_menu . '
                <li><a class="dropdown-item" href="javascript::" onclick="' . $course_status_changing_action . '">' . $course_status_changing_message . '</a></li>
                ' . $course_delete_menu . '
                </ul>
                </div>
                ';

                $nestedData['#'] = $key + 1;

                $instructor_names = "";
                if ($row->multi_instructor) {
                    $instructors = $this->user_model->get_multi_instructor_details_with_csv($row->user_id);
                    foreach ($instructors as $counterForThis => $instructor) {
                        $instructor_names .= $instructor['first_name'] . ' ' . $instructor['last_name'];
                        $instructor_names .= $counterForThis + 1 == count($instructors) ? '' : ', ';
                    }
                } else {
                    $instructor_names = $instructor_details['first_name'] . ' ' . $instructor_details['last_name'];
                }

                $nestedData['title'] = '<strong><a href="' . site_url('admin/course_form/course_edit/' . $row->id) . '">' . $row->title . '</a></strong><br>
                <small class="text-muted">' . get_phrase('instructor') . ': <b>' . $instructor_names . '</b></small>';

                $nestedData['category'] = '<span class="badge badge-dark-lighten">' . $category_details['name'] . '</span>';

                if ($row->course_type == 'scorm') {
                    $nestedData['lesson_and_section'] = '<span class="badge badge-info-lighten">' . get_phrase('scorm_course') . '</span>';
                } elseif ($row->course_type == 'general') {
                    $nestedData['lesson_and_section'] = '
                    <small class="text-muted"><b>' . get_phrase('total_section') . '</b>: ' . $sections->num_rows() . '</small><br>
                    <small class="text-muted"><b>' . get_phrase('total_lesson') . '</b>: ' . $lessons->num_rows() . '</small>';
                }

                $nestedData['enrolled_student'] = '<small class="text-muted"><b>' . get_phrase('total_enrolment') . '</b>: ' . $enroll_history->num_rows() . '</small>';

                $nestedData['status'] = '<span class="badge ' . $status_badge . '">' . get_phrase($row->status) . '</span>';

                $nestedData['price'] = '<span class="badge ' . $price_badge . '">' . $price . '</span>';

                $nestedData['actions'] = $action;

                $nestedData['course_id'] = $row->id;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    public function pending_courses()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('course');

        $page_data['page_name'] = 'pending_courses';
        $page_data['page_title'] = get_phrase('pending_courses');
        $this->load->view('backend/index', $page_data);
    }

    public function course_actions($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        // CHECK ACCESS PERMISSION
        check_permission('course');

        if ($param1 == "add") {
            $course_id = $this->crud_model->add_course();
            
            redirect(site_url('admin/course_form/course_edit/' . $course_id), 'refresh');
        } elseif ($param1 == 'add_shortcut') {
            echo $this->crud_model->add_shortcut_course();
        } elseif ($param1 == "edit") {
           
            $this->crud_model->update_course($param2);

            // CHECK IF LIVE CLASS ADDON EXISTS, ADD OR UPDATE IT TO ADDON MODEL
            if (addon_status('live-class')) {
                $this->load->model('addons/Liveclass_model', 'liveclass_model');
                $this->liveclass_model->update_live_class($param2);
            }

            // CHECK IF JITSI LIVE CLASS ADDON EXISTS, ADD OR UPDATE IT TO ADDON MODEL
            if (addon_status('jitsi-live-class')) {
                $this->load->model('addons/jitsi_liveclass_model', 'jitsi_liveclass_model');
                $this->jitsi_liveclass_model->update_live_class($param2);
            }

            redirect(site_url('admin/course_form/course_edit/' . $param2));
        } elseif ($param1 == 'delete') {

            $this->is_drafted_course($param2);
            $this->crud_model->delete_course($param2);
            redirect(site_url('admin/courses'), 'refresh');
        }
    }


    public function course_form($param1 = "", $param2 = "")
    {

        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('course');

        if ($param1 == 'add_course') {

            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $page_data['page_name'] = 'course_add';
            $page_data['page_title'] = get_phrase('add_course');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'add_course_shortcut') {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $this->load->view('backend/admin/course_add_shortcut', $page_data);
        } elseif ($param1 == 'course_edit') {

            $this->is_drafted_course($param2);
            $page_data['page_name'] = 'course_edit';
            $page_data['course_id'] =  $param2;
            $page_data['page_title'] = get_phrase('edit_course');
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $this->load->view('backend/index', $page_data);
        }
    }

    private function is_drafted_course($course_id)
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        if ($course_details['status'] == 'draft') {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_course'));
            redirect(site_url('admin/courses'), 'refresh');
        }
    }

    public function change_course_status($updated_status = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $course_id = $this->input->post('course_id');
        $category_id = $this->input->post('category_id');
        $instructor_id = $this->input->post('instructor_id');
        $price = $this->input->post('price');
        $status = $this->input->post('status');
        if (isset($_POST['mail_subject']) && isset($_POST['mail_body'])) {
            $mail_subject = $this->input->post('mail_subject');
            $mail_body = $this->input->post('mail_body');
            $this->email_model->send_mail_on_course_status_changing($course_id, $mail_subject, $mail_body);
        }
        $this->crud_model->change_course_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('course_status_updated'));
        redirect(site_url('admin/courses?category_id=' . $category_id . '&status=' . $status . '&instructor_id=' . $instructor_id . '&price=' . $price), 'refresh');
    }

    public function change_course_status_for_admin($updated_status = "", $course_id = "", $category_id = "", $status = "", $instructor_id = "", $price = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->crud_model->change_course_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('course_status_updated'));
        redirect(site_url('admin/courses?category_id=' . $category_id . '&status=' . $status . '&instructor_id=' . $instructor_id . '&price=' . $price), 'refresh');
    }

    public function sections($param1 = "", $param2 = "", $param3 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('course');

        if ($param2 == 'add') {
            $this->crud_model->add_section($param1);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_added_successfully'));
        } elseif ($param2 == 'edit') {
            $this->crud_model->edit_section($param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_updated_successfully'));
        } elseif ($param2 == 'delete') {
            $this->crud_model->delete_section($param1, $param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_deleted_successfully'));
        }
        redirect(site_url('admin/course_form/course_edit/' . $param1));
    }

    public function lessons($course_id = "", $param1 = "", $param2 = "")
    {
        // CHECK ACCESS PERMISSION
        check_permission('course');

        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'add') {
            $this->crud_model->add_lesson();
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_added_successfully'));
            redirect('admin/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'edit') {
            $this->crud_model->edit_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_updated_successfully'));
            redirect('admin/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'delete') {
            $this->crud_model->delete_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_deleted_successfully'));
            redirect('admin/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'filter') {
            redirect('admin/lessons/' . $this->input->post('course_id'));
        }
        $page_data['page_name'] = 'lessons';
        $page_data['lessons'] = $this->crud_model->get_lessons('course', $course_id);
        $page_data['course_id'] = $course_id;
        $page_data['page_title'] = get_phrase('lessons');
        $this->load->view('backend/index', $page_data);
    }

    public function watch_video($slugified_title = "", $lesson_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $lesson_details          = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();
        $page_data['provider']   = $lesson_details['video_type'];
        $page_data['video_url']  = $lesson_details['video_url'];
        $page_data['lesson_id']  = $lesson_id;
        $page_data['page_name']  = 'video_player';
        $page_data['page_title'] = get_phrase('video_player');
        $this->load->view('backend/index', $page_data);
    }


    // Language Functions
    public function manage_language($param1 = '', $param2 = '', $param3 = '')
    {

        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('settings');


        if ($param1 == 'add_language') {
            $language = trimmer($this->input->post('language'));
            if ($language == 'n-a') {
                $this->session->set_flashdata('error_message', get_phrase('language_name_can_not_be_empty_or_can_not_have_special_characters'));
                redirect(site_url('admin/manage_language'), 'refresh');
            }
            saveDefaultJSONFile($language);
            $this->session->set_flashdata('flash_message', get_phrase('language_added_successfully'));
            redirect(site_url('admin/manage_language'), 'refresh');
        }
        if ($param1 == 'add_phrase') {
            $new_phrase = get_phrase($this->input->post('phrase'));
            $this->session->set_flashdata('flash_message', $new_phrase . ' ' . get_phrase('has_been_added_successfully'));
            redirect(site_url('admin/manage_language'), 'refresh');
        }

        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile'] = $param2;
        }

        if ($param1 == 'delete_language') {
            if (file_exists('application/language/' . $param2 . '.json')) {
                unlink('application/language/' . $param2 . '.json');
                $this->session->set_flashdata('flash_message', get_phrase('language_deleted_successfully'));
                redirect(site_url('admin/manage_language'), 'refresh');
            }
        }
        $page_data['languages']             = $this->crud_model->get_all_languages();
        $page_data['page_name']             =   'manage_language';
        $page_data['page_title']            =   get_phrase('multi_language_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function update_phrase_with_ajax()
    {
        $current_editing_language = $this->input->post('currentEditingLanguage');
        $updatedValue = $this->input->post('updatedValue');
        $key = $this->input->post('key');
        saveJSONFile($current_editing_language, $key, $updatedValue);
        echo $current_editing_language . ' ' . $key . ' ' . $updatedValue;
    }

    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        // CHECK ACCESS PERMISSION
        check_permission('messaging');

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent'));
            redirect(site_url('admin/message/message_read/' . $message_thread_code), 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2); //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent'));
            redirect(site_url('admin/message/message_read/' . $param2), 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2; // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name'] = $param1;
        $page_data['page_name']               = 'message';
        $page_data['page_title']              = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }

    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/manage_profile'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $this->user_model->change_password($param2);
            redirect(site_url('admin/manage_profile'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('users', array(
            'id' => $this->session->userdata('user_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function paypal_checkout_for_instructor_revenue()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $page_data['amount_to_pay']         = $this->input->post('amount_to_pay');
        $page_data['payout_id']            = $this->input->post('payout_id');
        $page_data['instructor_name']       = $this->input->post('instructor_name');
        $page_data['production_client_id']  = $this->input->post('production_client_id');

        // BEFORE, CHECK PAYOUT AMOUNTS ARE VALID
        $payout_details = $this->crud_model->get_payouts($page_data['payout_id'], 'payout')->row_array();
        if ($payout_details['amount'] == $page_data['amount_to_pay'] && $payout_details['status'] == 0) {
            $this->load->view('backend/admin/paypal_checkout_for_instructor_revenue', $page_data);
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_payout_data'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }
    }


    // PAYPAL CHECKOUT ACTIONS
    public function paypal_payment($payout_id = "", $paypalPaymentID = "", $paypalPaymentToken = "", $paypalPayerID = "")
    {
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        $instructor_id = $payout_details['user_id'];
        $instructor_data = $this->db->get_where('users', array('id' => $instructor_id))->row_array();

        $payment_keys = json_decode($instructor_data['payment_keys'], true);
        $paypal_keys = $payment_keys['paypal'];
        $production_client_id = $paypal_keys['production_client_id'];
        $production_secret_key = $paypal_keys['production_secret_key'];

        //THIS IS HOW I CHECKED THE PAYPAL PAYMENT STATUS
        $status = $this->payment_model->paypal_payment($paypalPaymentID, $paypalPaymentToken, $paypalPayerID, $production_client_id, $production_secret_key);
        if (!$status) {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred_during_payment'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }
        $this->crud_model->update_payout_status($payout_id, 'paypal');
        $this->session->set_flashdata('flash_message', get_phrase('payout_updated_successfully'));
        redirect(site_url('admin/instructor_payout'), 'refresh');
    }

    public function stripe_checkout_for_instructor_revenue($payout_id)
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        // BEFORE, CHECK PAYOUT AMOUNTS ARE VALID
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        if ($payout_details['amount'] > 0 && $payout_details['status'] == 0) {
            $page_data['user_details']    = $this->user_model->get_user($payout_details['user_id'])->row_array();
            $page_data['amount_to_pay']   = $payout_details['amount'];
            $page_data['payout_id']       = $payout_details['id'];
            $this->load->view('backend/admin/stripe_checkout_for_instructor_revenue', $page_data);
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_payout_data'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }
    }

    // STRIPE CHECKOUT ACTIONS
    public function stripe_payment($payout_id = "", $session_id = "")
    {
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        $instructor_id = $payout_details['user_id'];
        //THIS IS HOW I CHECKED THE STRIPE PAYMENT STATUS
        $response = $this->payment_model->stripe_payment($instructor_id, $session_id, true);

        if ($response['payment_status'] === 'succeeded') {
            $this->crud_model->update_payout_status($payout_id, 'stripe');
            $this->session->set_flashdata('flash_message', get_phrase('payout_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', $response['status_msg']);
        }

        redirect(site_url('admin/instructor_payout'), 'refresh');
    }

    public function razorpay_checkout_for_instructor_revenue($user_id = "", $payout_id = "", $param1 = "", $razorpay_order_id = "", $payment_id = "", $amount = "", $signature = "")
    {
        if ($param1 == 'paid') {
            $status = $this->payment_model->razorpay_payment($razorpay_order_id, $payment_id, $amount, $signature);
            if ($status == true) {
                $this->crud_model->update_payout_status($payout_id, 'razorpay');
                $this->session->set_flashdata('flash_message', get_phrase('payout_updated_successfully'));
            } else {
                $this->session->set_flashdata('error_message', $response['status_msg']);
            }

            redirect(site_url('admin/instructor_payout'), 'refresh');
        }

        $page_data['payout_id']    = $payout_id;
        $page_data['user_details']    = $this->user_model->get_user($user_id)->row_array();
        $page_data['amount_to_pay']   = $this->input->post('total_price_of_checking_out');
        $this->load->view('backend/admin/razorpay_checkout', $page_data);
    }

    public function preview($course_id = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $this->is_drafted_course($course_id);
        if ($course_id > 0) {
            $courses = $this->crud_model->get_course_by_id($course_id);
            if ($courses->num_rows() > 0) {
                $course_details = $courses->row_array();
                redirect(site_url('home/lesson/' . rawurlencode(slugify($course_details['title'])) . '/' . $course_details['id']), 'refresh');
            }
        }
        redirect(site_url('admin/courses'), 'refresh');
    }

    // Manage Quizes
    public function quizes($course_id = "", $action = "", $quiz_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('course');

        if ($action == 'add') {
            $this->crud_model->add_quiz($course_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_added_successfully'));
        } elseif ($action == 'edit') {
            $this->crud_model->edit_quiz($quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_updated_successfully'));
        } elseif ($action == 'delete') {
            $this->crud_model->delete_section($course_id, $quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_deleted_successfully'));
        }
        redirect(site_url('admin/course_form/course_edit/' . $course_id));
    }

    // Manage Quize Questions
    public function quiz_questions($quiz_id = "", $action = "", $question_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $quiz_details = $this->crud_model->get_lessons('lesson', $quiz_id)->row_array();

        if ($action == 'add') {
            $response = $this->crud_model->add_quiz_questions($quiz_id);
            echo $response;
        } elseif ($action == 'edit') {
            $response = $this->crud_model->update_quiz_questions($question_id);
            echo $response;
        } elseif ($action == 'delete') {
            $response = $this->crud_model->delete_quiz_question($question_id);
            $this->session->set_flashdata('flash_message', get_phrase('question_has_been_deleted'));
            redirect(site_url('admin/course_form/course_edit/' . $quiz_details['course_id']));
        }
    }

    // software about page
    function about()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $page_data['application_details'] = $this->crud_model->get_application_details();
        $page_data['page_name']  = 'about';
        $page_data['page_title'] = get_phrase('about');
        $this->load->view('backend/index', $page_data);
    }

    public function install_theme($theme_to_install = '')
    {

        if ($this->session->userdata('admin_login') != 1) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('theme');

        $uninstalled_themes = $this->crud_model->get_uninstalled_themes();
        if (!in_array($theme_to_install, $uninstalled_themes)) {
            $this->session->set_flashdata('error_message', get_phrase('this_theme_is_not_available'));
            redirect(site_url('admin/theme_settings'));
        }

        if (!class_exists('ZipArchive')) {
            $this->session->set_flashdata('error_message', get_phrase('your_server_is_unable_to_extract_the_zip_file') . '. ' . get_phrase('please_enable_the_zip_extension_on_your_server') . ', ' . get_phrase('then_try_again'));
            redirect(site_url('admin/theme_settings'));
        }

        $zipped_file_name = $theme_to_install;
        $unzipped_file_name = substr($zipped_file_name, 0, -4);
        // Create update directory.
        $views_directory  = 'application/views/frontend';
        $assets_directory = 'assets/frontend';

        //Unzip theme zip file and remove zip file.
        $theme_path = 'themes/' . $zipped_file_name;
        $theme_zip = new ZipArchive;
        $theme_result = $theme_zip->open($theme_path);
        if ($theme_result === TRUE) {
            $theme_zip->extractTo('themes');
            $theme_zip->close();
        }

        // unzip the views zip file to the application>views folder
        $views_path = 'themes/' . $unzipped_file_name . '/views/' . $zipped_file_name;
        $views_zip = new ZipArchive;
        $views_result = $views_zip->open($views_path);
        if ($views_result === TRUE) {
            $views_zip->extractTo($views_directory);
            $views_zip->close();
        }

        // unzip the assets zip file to the assets/frontend folder
        $assets_path = 'themes/' . $unzipped_file_name . '/assets/' . $zipped_file_name;
        $assets_zip = new ZipArchive;
        $assets_result = $assets_zip->open($assets_path);
        if ($assets_result === TRUE) {
            $assets_zip->extractTo($assets_directory);
            $assets_zip->close();
        }

        unlink($theme_path);
        $this->crud_model->remove_files_and_folders('themes/' . $unzipped_file_name);
        $this->session->set_flashdata('flash_message', get_phrase('theme_imported_successfully'));
        redirect(site_url('admin/theme_settings'));
    }

    //ADDON MANAGER PORTION STARTS HERE
    public function addon($param1 = "", $param2 = "", $param3 = "")
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('addon');

        // ADD NEW ADDON FORM
        if ($param1 == 'add') {

            // CHECK ACCESS PERMISSION
            check_permission('addon');
            $page_data['page_name'] = 'addon_add';
            $page_data['page_title'] = get_phrase('add_addon');
        }

        if ($param1 == 'update') {
            // CHECK ACCESS PERMISSION
            check_permission('addon');

            $page_data['page_name'] = 'addon_update';
            $page_data['page_title'] = get_phrase('add_update');
        }

        // INSTALLING AN ADDON
        if ($param1 == 'install' || $param1 == 'version_update') {
            // CHECK ACCESS PERMISSION
            check_permission('addon');

            $this->addon_model->install_addon($param1);
        }

        // ACTIVATING AN ADDON
        if ($param1 == 'activate') {

            $update_message = $this->addon_model->addon_activate($param2);
            $this->session->set_flashdata('flash_message', get_phrase($update_message));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // DEACTIVATING AN ADDON
        if ($param1 == 'deactivate') {
            $update_message = $this->addon_model->addon_deactivate($param2);
            $this->session->set_flashdata('flash_message', get_phrase($update_message));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // REMOVING AN ADDON
        if ($param1 == 'delete') {
            $this->addon_model->addon_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('addon_is_deleted_successfully'));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // SHOWING LIST OF INSTALLED ADDONS
        if (empty($param1)) {
            $page_data['page_name'] = 'addons';
            $page_data['addons'] = $this->addon_model->addon_list()->result_array();
            $page_data['page_title'] = get_phrase('addon_manager');
        }
        $this->load->view('backend/index', $page_data);
    }


    public function instructor_application($param1 = "", $param2 = "")
    { // param1 is the status and param2 is the application id
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        // CHECK ACCESS PERMISSION
        check_permission('instructor');

        if ($param1 == 'approve' || $param1 == 'delete') {
            $this->user_model->update_status_of_application($param1, $param2);
        }
        $page_data['page_name']  = 'application_list';
        $page_data['page_title'] = get_phrase('instructor_application');
        $page_data['approved_applications'] = $this->user_model->get_approved_applications();
        $page_data['pending_applications'] = $this->user_model->get_pending_applications();
        $this->load->view('backend/index', $page_data);
    }


    // INSTRUCTOR PAYOUT SECTION
    public function instructor_payout($param1 = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        // CHECK ACCESS PERMISSION
        check_permission('instructor');

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0]);
            $page_data['timestamp_end']   = strtotime($date_range[1]);
        } else {
            $page_data['timestamp_start'] = strtotime(date('m/01/Y'));
            $page_data['timestamp_end']   = strtotime(date('m/t/Y'));
        }

        $page_data['page_name']  = 'instructor_payout';
        $page_data['page_title'] = get_phrase('instructor_payout');
        $page_data['completed_payouts'] = $this->crud_model->get_completed_payouts_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['pending_payouts'] = $this->crud_model->get_pending_payouts();
        $this->load->view('backend/index', $page_data);
    }

    // ADMINS SECTION STARTS
    public function admins($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('admin');

        if ($param1 == "add") {
            // CHECK ACCESS PERMISSION
            check_permission('admin');

            $this->user_model->add_user(false,false,true); // PROVIDING TRUE FOR INSTRUCTOR
            redirect(site_url('admin/admins'), 'refresh');
        } elseif ($param1 == "edit") {
            // CHECK ACCESS PERMISSION
            check_permission('admin');

            $this->user_model->edit_user($param2);
            redirect(site_url('admin/admins'), 'refresh');
        } elseif ($param1 == "delete") {
            // CHECK ACCESS PERMISSION
            check_permission('admin');

            $this->user_model->delete_user($param2);
            redirect(site_url('admin/admins'), 'refresh');
        }

        $page_data['page_name'] = 'admins';
        $page_data['page_title'] = get_phrase('admins');
        $page_data['admins'] = $this->user_model->get_admins()->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function admin_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'add_admin_form') {
            // CHECK ACCESS PERMISSION
            check_permission('admin');

            $page_data['page_name'] = 'admin_add';
            $page_data['page_title'] = get_phrase('admin_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_admin_form') {
            // CHECK ACCESS PERMISSION
            check_permission('admin');

            $page_data['page_name'] = 'admin_edit';
            $page_data['user_id'] = $param2;
            $page_data['page_title'] = get_phrase('admin_edit');
            $this->load->view('backend/index', $page_data);
        }
    }

    public function companyPermissions()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        // CHECK ACCESS PERMISSION
        check_permission('admin');

        if (!isset($_GET['permission_assing_to']) || empty($_GET['permission_assing_to'])) {
            $this->session->set_flashdata('error_message', get_phrase('you_have_select_an_admin_first'));
            redirect(site_url('admin/companies'), 'refresh');
        }

        $page_data['permission_assing_to'] = $this->input->get('permission_assing_to');
        $user_details = $this->user_model->get_all_user($page_data['permission_assing_to']);
        if ($user_details->num_rows() == 0) {
            $this->session->set_flashdata('error_message', get_phrase('invalid_admin'));
            redirect(site_url('admin/companies'), 'refresh');
        } else {
            $user_details = $user_details->row_array();
            if ($user_details['role_id'] != 1) {
                $this->session->set_flashdata('error_message', get_phrase('invalid_admin'));
                redirect(site_url('admin/companies'), 'refresh');
            }
            if (is_root_admin($user_details['id'])) {
                $this->session->set_flashdata('error_message', get_phrase('you_can_not_set_permission_to_the_root_admin'));
                redirect(site_url('admin/companies'), 'refresh');
            }
        }

        $page_data['permission_assign_to'] = $user_details;
        $page_data['page_name'] = 'company_permission';
        $page_data['page_title'] = get_phrase('assign_permission');
        $this->load->view('backend/index', $page_data);
    }

    public function permissions()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        // CHECK ACCESS PERMISSION
        check_permission('admin');

        if (!isset($_GET['permission_assing_to']) || empty($_GET['permission_assing_to'])) {
            $this->session->set_flashdata('error_message', get_phrase('you_have_select_an_admin_first'));
            redirect(site_url('admin/admins'), 'refresh');
        }

        $page_data['permission_assing_to'] = $this->input->get('permission_assing_to');
        $user_details = $this->user_model->get_all_user($page_data['permission_assing_to']);
        if ($user_details->num_rows() == 0) {
            $this->session->set_flashdata('error_message', get_phrase('invalid_admin'));
            redirect(site_url('admin/admins'), 'refresh');
        } else {
            $user_details = $user_details->row_array();
            if ($user_details['role_id'] != 1) {
                $this->session->set_flashdata('error_message', get_phrase('invalid_admin'));
                redirect(site_url('admin/admins'), 'refresh');
            }
            if (is_root_admin($user_details['id'])) {
                $this->session->set_flashdata('error_message', get_phrase('you_can_not_set_permission_to_the_root_admin'));
                redirect(site_url('admin/admins'), 'refresh');
            }
        }

        $page_data['permission_assign_to'] = $user_details;
        $page_data['page_name'] = 'admin_permission';
        $page_data['page_title'] = get_phrase('assign_permission');
        $this->load->view('backend/index', $page_data);
    }

    // ASSIGN PERMISSION TO ADMIN
    public function assign_permission()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('admin');

        echo $this->user_model->assign_permission();
    }

    // REMOVING INSTRUCTOR FROM COURSE
    public function remove_an_instructor($course_id, $instructor_id)
    {
        // CHECK ACCESS PERMISSION
        check_permission('course');

        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();

        if ($course_details['creator'] == $instructor_id) {
            $this->session->set_flashdata('error_message', get_phrase('course_creator_can_be_removed'));
            redirect('admin/course_form/course_edit/' . $course_id);
        }

        if ($course_details['multi_instructor']) {
            $instructor_ids = explode(',', $course_details['user_id']);

            if (in_array($instructor_id, $instructor_ids)) {
                if (count($instructor_ids) > 1) {
                    if (($key = array_search($instructor_id, $instructor_ids)) !== false) {
                        unset($instructor_ids[$key]);

                        $data['user_id'] = implode(",", $instructor_ids);
                        $this->db->where('id', $course_id);
                        $this->db->update('course', $data);

                        $this->session->set_flashdata('flash_message', get_phrase('instructor_has_been_removed'));
                        if ($this->session->userdata('user_id') == $instructor_id) {
                            redirect('admin/courses/');
                        } else {
                            redirect('admin/course_form/course_edit/' . $course_id);
                        }
                    }
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('a_course_should_have_at_least_one_instructor'));
                    redirect('admin/course_form/course_edit/' . $course_id);
                }
            } else {
                $this->session->set_flashdata('error_message', get_phrase('invalid_instructor_id'));
                redirect('admin/course_form/course_edit/' . $course_id);
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('a_course_should_have_at_least_one_instructor'));
            redirect('admin/course_form/course_edit/' . $course_id);
        }
    }


    /** Coupons functionality starts */
    public function coupons($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('coupon');

        if ($param1 == "add") {
            // CHECK ACCESS PERMISSION
            check_permission('coupon');

            $response = $this->crud_model->add_coupon(); // PROVIDING TRUE FOR INSTRUCTOR
            $response ? $this->session->set_flashdata('flash_message', get_phrase('coupon_added_successfully')) : $this->session->set_flashdata('error_message', get_phrase('coupon_code_already_exists'));
            redirect(site_url('admin/coupons'), 'refresh');
        } elseif ($param1 == "edit") {
            // CHECK ACCESS PERMISSION
            check_permission('coupon');

            $response = $this->crud_model->edit_coupon($param2);
            $response ? $this->session->set_flashdata('flash_message', get_phrase('coupon_updated_successfully')) : $this->session->set_flashdata('error_message', get_phrase('coupon_code_already_exists'));
            redirect(site_url('admin/coupons'), 'refresh');
        } elseif ($param1 == "delete") {
            // CHECK ACCESS PERMISSION
            check_permission('coupon');

            $response = $this->crud_model->delete_coupon($param2);
            $response ? $this->session->set_flashdata('flash_message', get_phrase('coupon_deleted_successfully')) : $this->session->set_flashdata('error_message', get_phrase('coupon_code_already_exists'));
            redirect(site_url('admin/coupons'), 'refresh');
        }

        $page_data['page_name'] = 'coupons';
        $page_data['page_title'] = get_phrase('coupons');
        $page_data['coupons'] = $this->crud_model->get_coupons()->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function coupon_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('coupon');

        if ($param1 == 'add_coupon_form') {

            $page_data['page_name'] = 'coupon_add';
            $page_data['page_title'] = get_phrase('add_coupons');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_coupon_form') {

            $page_data['page_name'] = 'coupon_edit';
            $page_data['coupon'] = $this->crud_model->get_coupons($param2)->row_array();
            $page_data['page_title'] = get_phrase('coupon_edit');
            $this->load->view('backend/index', $page_data);
        }
    }
    // ADMINS SECTION ENDS



    // AJAX PORTION
    // this function is responsible for managing multiple choice question
    function manage_multiple_choices_options()
    {
        $page_data['number_of_options'] = $this->input->post('number_of_options');
        $this->load->view('backend/admin/manage_multiple_choices_options', $page_data);
    }

    public function ajax_get_sub_category($category_id)
    {
        $page_data['sub_categories'] = $this->crud_model->get_sub_categories($category_id);

        return $this->load->view('backend/admin/ajax_get_sub_category', $page_data);
    }

    public function ajax_get_section($course_id)
    {
        $page_data['sections'] = $this->crud_model->get_section('course', $course_id)->result_array();
        return $this->load->view('backend/admin/ajax_get_section', $page_data);
    }

    public function ajax_get_video_details()
    {
        $video_details = $this->video_model->getVideoDetails($_POST['video_url']);
        echo $video_details['duration'];
    }
    public function ajax_sort_section()
    {
        $section_json = $this->input->post('itemJSON');
        $this->crud_model->sort_section($section_json);
    }
    public function ajax_sort_lesson()
    {
        $lesson_json = $this->input->post('itemJSON');
        $this->crud_model->sort_lesson($lesson_json);
    }
    public function ajax_sort_question()
    {
        $question_json = $this->input->post('itemJSON');
        $this->crud_model->sort_question($question_json);
    }


    //Start banner

    function banner($param1 = "", $param2 = "")
    {
        if ($param1 == 'add') {
            $this->crud_model->add_banner();
            $this->session->set_flashdata('flash_message', get_phrase('banner_added_successfully'));
            redirect(site_url('admin/banner'), 'refresh');
        } elseif ($param1 == 'update') {
            $this->crud_model->update_banner($param2);
            $this->session->set_flashdata('flash_message', get_phrase('banner_updated_successfully'));
            //echo $this->db->last_query(); die();
            redirect(site_url('admin/banner'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->crud_model->banner_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('banner_deleted_successfully'));
            redirect(site_url('admin/banner'), 'refresh');
        }
        $page_data['banners'] = $this->crud_model->get_banners();
        //var_dump($this->db->last_query());
        $page_data['page_title'] = get_phrase('banner');
        $page_data['page_name'] = 'banner';
        //var_dump($page_data['banners']);

        $this->load->view('backend/index', $page_data);
    }
    function add_banner()
    {
        $page_data['page_title'] = get_phrase('add_banner');
        $page_data['page_name'] = 'banner_add';
        $this->load->view('backend/index', $page_data);
    }

    function edit_banner($banner_id = "")
    {
        $page_data['banner'] = $this->crud_model->get_banners($banner_id)->row_array();
        $page_data['page_title'] = get_phrase('edit_banner');
        $page_data['page_name'] = 'banner_edit';
        $this->load->view('backend/index', $page_data);
    }
    // end banner

    //Start testimonial

    function testimonial($param1 = "", $param2 = "")
    {
        if ($param1 == 'add') {
            $this->crud_model->add_testimonial();
            $this->session->set_flashdata('flash_message', get_phrase('testimonial_added_successfully'));
            redirect(site_url('admin/testimonial'), 'refresh');
        } elseif ($param1 == 'update') {
            $this->crud_model->update_testimonial($param2);
            $this->session->set_flashdata('flash_message', get_phrase('testimonial_updated_successfully'));
            redirect(site_url('admin/testimonial'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->crud_model->testimonial_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('testimonial_deleted_successfully'));
            redirect(site_url('admin/testimonial'), 'refresh');
        }
        $page_data['testimonials'] = $this->crud_model->get_testimonials();
        //var_dump($this->db->last_query());
        $page_data['page_title'] = get_phrase('testimonial');
        $page_data['page_name'] = 'testimonial';
        //var_dump($page_data['testimonials']);
        $this->load->view('backend/index', $page_data);
    }
    function add_testimonial()
    {
        $page_data['page_title'] = get_phrase('add_testimonial');
        $page_data['page_name'] = 'testimonial_add';
        $this->load->view('backend/index', $page_data);
    }

    function edit_testimonial($testimonial_id = "")
    {
        $page_data['testimonial'] = $this->crud_model->get_testimonials($testimonial_id)->row_array();
        $page_data['page_title'] = get_phrase('edit_testimonial');
        $page_data['page_name'] = 'testimonial_edit';
        $this->load->view('backend/index', $page_data);
    }
    // end testimonial
//Start partner

function partner($param1 = "", $param2 = "")
{
    if ($param1 == 'add') {
        $this->crud_model->add_partner();
        $this->session->set_flashdata('flash_message', get_phrase('partner_added_successfully'));
        redirect(site_url('admin/partner'), 'refresh');
    } elseif ($param1 == 'update') {
        $this->crud_model->update_partner($param2);
        $this->session->set_flashdata('flash_message', get_phrase('partner_updated_successfully'));
        redirect(site_url('admin/partner'), 'refresh');
    } elseif ($param1 == 'delete') {
        $this->crud_model->partner_delete($param2);
        $this->session->set_flashdata('flash_message', get_phrase('partner_deleted_successfully'));
        redirect(site_url('admin/partner'), 'refresh');
    }
    $page_data['partners'] = $this->crud_model->get_partners();
    //var_dump($this->db->last_query());
    $page_data['page_title'] = get_phrase('partner');
    $page_data['page_name'] = 'partner';
    //var_dump($page_data['partners']);
    $this->load->view('backend/index', $page_data);
}
function add_partner()
{
    $page_data['page_title'] = get_phrase('add_partner');
    $page_data['page_name'] = 'partner_add';
    $this->load->view('backend/index', $page_data);
}

function edit_partner($partner_id = "")
{
    $page_data['partner'] = $this->crud_model->get_partners($partner_id)->row_array();
    $page_data['page_title'] = get_phrase('edit_partner');
    $page_data['page_name'] = 'partner_edit';
    $this->load->view('backend/index', $page_data);
}
// end partner
    


    //Start blog
    function add_blog_category()
    {
        $this->load->view('backend/admin/blog_category_add');
    }

    function edit_blog_category($blog_category_id = "")
    {
        $data['blog_category'] = $this->crud_model->get_blog_categories($blog_category_id)->row_array();
        $this->load->view('backend/admin/blog_category_edit', $data);
    }

    function blog_category($param1 = "", $param2 = "")
    {
        if ($param1 == 'add') {
            $response = $this->crud_model->add_blog_category();
            if ($response == true) {
                $this->session->set_flashdata('flash_message', get_phrase('blog_category_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('there_is_already_a_blog_with_this_name'));
            }
            redirect(site_url('admin/blog_category'), 'refresh');
        } elseif ($param1 == 'update') {
            $response = $this->crud_model->update_blog_category($param2);
            if ($response == true) {
                $this->session->set_flashdata('flash_message', get_phrase('blog_category_updated_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('there_is_already_a_blog_with_this_name'));
            }
            redirect(site_url('admin/blog_category'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->crud_model->delete_blog_category($param2);
            $this->session->set_flashdata('flash_message', get_phrase('blog_category_deleted_successfully'));
            redirect(site_url('admin/blog_category'), 'refresh');
        }
        $page_data['categories'] = $this->crud_model->get_blog_categories();
        $page_data['page_title'] = get_phrase('blog_category');
        $page_data['page_name'] = 'blog_category';
        $this->load->view('backend/index', $page_data);
    }

    function add_blog()
    {
        $page_data['page_title'] = get_phrase('add_blog');
        $page_data['page_name'] = 'blog_add';
        $this->load->view('backend/index', $page_data);
    }

    function edit_blog($blog_id = "")
    {
        $page_data['blog'] = $this->crud_model->get_blogs($blog_id)->row_array();
        $page_data['page_title'] = get_phrase('edit_blog');
        $page_data['page_name'] = 'blog_edit';
        $this->load->view('backend/index', $page_data);
    }

    function blog($param1 = "", $param2 = "")
    {
        if ($param1 == 'add') {
            $this->crud_model->add_blog();
            $this->session->set_flashdata('flash_message', get_phrase('blog_added_successfully'));
            redirect(site_url('admin/blog'), 'refresh');
        } elseif ($param1 == 'update') {
            $this->crud_model->update_blog($param2);
            $this->session->set_flashdata('flash_message', get_phrase('blog_updated_successfully'));
            redirect(site_url('admin/blog'), 'refresh');
        } elseif ($param1 == 'status') {
            $this->crud_model->update_blog_status($param2);
            $this->session->set_flashdata('flash_message', get_phrase('blog_status_has_been_updated'));
            redirect(site_url('admin/blog'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->crud_model->blog_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('blog_deleted_successfully'));
            redirect(site_url('admin/blog'), 'refresh');
        }
        $page_data['blogs'] = $this->crud_model->get_blogs();
        $page_data['page_title'] = get_phrase('blog');
        $page_data['page_name'] = 'blog';
        $this->load->view('backend/index', $page_data);
    }

    function instructors_pending_blog($param1 = "", $param2 = "")
    {
        if ($param1 == 'approval_request') {
            $this->crud_model->approve_blog($param2);
            $this->session->set_flashdata('flash_message', get_phrase('the_blog_has_been_approved'));
            redirect(site_url('admin/instructors_pending_blog'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->crud_model->blog_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('blog_deleted_successfully'));
            redirect(site_url('admin/instructors_pending_blog'), 'refresh');
        }
        $page_data['pending_blogs'] = $this->crud_model->get_instructors_pending_blog();
        $page_data['page_title'] = get_phrase('instructors_pending_blog');
        $page_data['page_name'] = 'instructors_pending_blog';
        $this->load->view('backend/index', $page_data);
    }

    function blog_settings($param1 = "")
    {
        if ($param1 == 'update') {
            $this->crud_model->update_blog_settings();
            $this->session->set_flashdata('flash_message', get_phrase('blog_settings_updated_successfully'));
            redirect(site_url('admin/blog_settings'), 'refresh');
        }
        $page_data['page_title'] = get_phrase('blog_settings');
        $page_data['page_name'] = 'blog_settings';
        $this->load->view('backend/index', $page_data);
    }
    //End blog


    //Don't remove this code for security reasons
    function save_valid_purchase_code($param1 = "")
    {
        if ($param1 == 'update') {
            $data['value'] = htmlspecialchars($this->input->post('purchase_code'));
            $status = $this->crud_model->curl_request($data['value']);
            if ($status) {
                $this->db->where('key', 'purchase_code');
                $this->db->update('settings', $data);
                $this->session->set_flashdata('flash_message', get_phrase('purchase_code_has_been_updated'));
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->load->view('backend/admin/save_purchase_code_form');
        }
    }

    public function JobBoard($job_id = '')
    { //echo get_frontend_settings('theme'); die();
       //echo candidateThumb2('e5b5d3d6fa5ce5a327c4c2e2481510d3'); 
        $header['page'] = site_phrase('job_board');
        $header['menu'] = 'job_board';

        $jobsResults = $this->AdminJobBoardModel->getJobs();
        $jobs = $jobsResults['records'];
        $page_data['jobs_total_pages'] = $jobsResults['total_pages'];
        $page_data['jobs_pagination'] = $jobsResults['pagination'];

        $page_data['page_title'] = get_phrase('job_list_items');
        $page_data['page_name'] = 'job-list-items';
        //$page_data['jobs'] = $this->load->view('backend/index', $page_data);
       $page_data['jobs'] = $this->load->view('backend/admin/job-board/job-list-items', compact('jobs'), TRUE);

        //Getting session values for search, filters and pagination for jobs and candidates
        $session_data = array('jobs_per_page','jobs_search','jobs_company_id','jobs_department_id',
                            'jobs_status','candidates_per_page','candidates_search','candidates_sort',
                            'candidates_min_experience','candidates_max_experience','candidates_min_overall',
                            'candidates_max_overall','candidates_min_interview','candidates_max_interview',
                            'candidates_min_quiz','candidates_max_quiz','candidates_min_self','candidates_max_self',);
        foreach ($session_data as $value) {
            $page_data[$value] = $this->session->userdata($value);
        }
        $page_data['jobs_page'] = $this->sess('jobs_page', 1);
        $page_data['candidates_page'] = $this->sess('candidates_page', 1);

        $page_data['companies'] = objToArr($this->AdminCompanyModel->getAll());
        $page_data['departments'] = objToArr($this->AdminDepartmentModel->getAll());
        $page_data['first_job_id'] = $job_id ? $job_id : (isset($jobs[0]['job_id']) ? $jobs[0]['job_id'] : '');
        
        // $page_data['page_name'] = 'job-board';
        //    $page_data['page_title'] = site_phrase("job_board");
           $page_data['page_title'] = get_phrase('job_board');
        $page_data['page_name'] = 'job-board';
        $this->load->view('backend/index', $page_data);
          // $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);

        // $this->load->view('admin/layout/header', $header);
        // $this->load->view('admin/job-board/index', $data);
    }

     /**
     * Function (via ajax) to get data for jobs list
     *
     * @return json
     */
    public function jobsList()
    {
        $jobsResults = $this->AdminJobBoardModel->getJobs();
        $jobs = $jobsResults['records'];
        echo json_encode(array(
            'pagination' => $jobsResults['pagination'],
            'total_pages' => $jobsResults['total_pages'],
            'list' => $this->load->view('backend/admin/job-board/job-list-items', compact('jobs'), TRUE),
        ));
    }

    /* job board start ---------------------------------------------------------------------------------------*/

    /**
     * Function (via ajax) to get data for candidates list
     *
     * @param $job_id integer
     * @return json
     */
    public function candidatesList($job_id = '')
    {
        $candidatesResults = $this->AdminJobBoardModel->getCandidates($job_id);
        $candidates = $candidatesResults['records'];
        echo json_encode(array(
            'pagination' => $candidatesResults['pagination'],
            'total_pages' => $candidatesResults['total_pages'],
            'candidates_all' => $candidatesResults['candidates_all'],
            'list' => $this->load->view('backend/admin/job-board/candidate-list-items', compact('candidates'), TRUE),
        ));
    }

    /**
     * Function (via ajax) to view assign quiz or interview to candidate(s)
     *
     * @param $type string
     * @param $job_id integer
     * @return json
     */
    public function assignView($type = '', $job_id = '')
    {
        if ($type == 'quiz') {
            $data['quizes'] = $this->AdminQuizModel->getAll();
        } else {
            $data['interviews'] = $this->AdminInterviewModel->getAll();
            $data['users'] = objToArr($this->AdminUserModel->getAll());
        }
        $data['type'] = $type;
        $data['job_id'] = $job_id;
        echo $this->load->view('backend/admin/job-board/assign', $data, TRUE);
        exit;
    }

    /**
     * Function (via ajax) to assign quiz or interview to candidate(s)
     *
     * @return json
     */
    public function assign()
    {
        ini_set('max_execution_time', 5000);
        $this->checkIfDemo();
        $this->AdminJobBoardModel->assignToCandidates();

        $data = $this->xssCleanInput();
        $candidates = json_decode($data['candidates']);

        if (isset($data['notify_candidate'])) {
            foreach ($candidates as $candidate_id) {
                $candidate = objToArr($this->AdminCandidateModel->getCandidate('candidate_id', $candidate_id));
                if ($data['type'] == 'interview') {
                    $interview_time = $data['interview_time'];
                    $description = $data['description'];
                    $subject = get_phrase('interview_schedule');
                    $message = $this->load->view(
                        'backend/admin/emails/candidate-interview-notification', compact('candidate', 'interview_time', 'description'), TRUE
                    );
                } else {
                    $subject = get_phrase('quiz_assigned');
                    $message = $this->load->view('backend/admin/emails/candidate-quiz-notification', compact('candidate'), TRUE);
                }
                $this->sendEmail($message, $candidate['email'], $subject);
            }
        }

        if (isset($data['notify_team_member'])) {
            $user = objToArr($this->AdminUserModel->getUser('user_id', $data['user_id']));
            $interview_time = $data['interview_time'];
            $description = $data['description'];
            $message = $this->load->view(
                'backend/admin/emails/team-member-interview-notification', compact('user', 'interview_time', 'description'), TRUE
            );
            $this->sendEmail(
                $message,
                $user['email'],
                'Interview Schedule'
            );
        }

        echo json_encode(array(
            'success' => 'true',
            'messages' => get_phrase('assigned')
        ));
    }

    /**
     * Function (via ajax) to update candidate job application status
     *
     * @return json
     */
    public function candidateStatus()
    {
        $this->AdminJobBoardModel->updateCandidateStatus();
        echo json_encode(array(
            'success' => 'true',
            'messages' => get_phrase('assigned')
        ));
    }

    /**
     * Function (via ajax) to delete candidate job application
     *
     * @return json
     */
    public function deleteApplication()
    {
        $this->AdminJobBoardModel->deleteCandidateApplication();
        echo json_encode(array(
            'success' => 'true',
            'messages' => get_phrase('delete')
        ));
    }

    /**
     * Function (via ajax) to view job detail
     *
     * @param  $job_id integer
     * @return json
     */
    public function viewJob($job_id = '')
    {
        $job = objToArr($this->AdminJobModel->getJob('jobs.job_id', $job_id));
        echo $this->load->view('backend/admin/job-board/job-detail', compact('job'), TRUE);
    }

    /**
     * Function (via ajax) to view resume
     *
     * @param  $resume_id integer
     * @return json
     */
    public function viewResume($resume_id = '')
    {
        $resume = objToArr($this->AdminCandidateModel->getCompleteResume($resume_id, true));
        $resume_file = $resume['file'];
        $resume_id = $resume['resume_id'];
        $data['resume_id'] = $resume_id;
        $data['type'] = $resume['type'];
        $data['file'] = $resume['file'];
        $data['resume'] = $this->load->view('backend/admin/candidates/resume', compact('resume', 'resume_file', 'resume_id'), TRUE);
        echo $this->load->view('backend/admin/job-board/resume', $data, TRUE);
    }

    /**
     * Function do export overall result in excel
     *
     * @return json
     */
    public function overallResult()
    {
        ini_set('max_execution_time', '0');
        $result = $this->AdminJobBoardModel->overallResult();
        $data = sortForCSV($result);
        $excel = new SimpleExcel('csv');
        $excel->writer->setData($data);
        $excel->writer->saveFile('overallResult');
        exit;
    }

    /**
     * Function do export pdf result for traits, quizes and interviews
     *
     * @return json
     */
    public function pdfResult()
    {
        $this->checkIfDemo('reload');
        ini_set('max_execution_time', '0');
        $results = '';
        $filename = '';

        if ($this->xssCleanInput('type') == 'e-self') {
            $result = $this->AdminJobBoardModel->traitsResult();
            foreach ($result as $r) {
                $data['trait'] = $r;
                $results .= $this->load->view('backend/admin/job-board/pdf-traits', $data, TRUE);
            }
            $filename = $this->xssCleanInput('job').'-SelfAssementResults.pdf';
        } else if ($this->xssCleanInput('type') == 'e-quiz') {
            $result = $this->AdminJobBoardModel->quizesResult();
            foreach ($result as $r) {
                $data['quizes'] = $r;
                $results .= $this->load->view('backend/admin/job-board/pdf-quizes', $data, TRUE);
            }
            $filename = $this->xssCleanInput('job').'-QuizResults.pdf';
        } else if ($this->xssCleanInput('type') == 'e-interview') {
            $result = $this->AdminJobBoardModel->interviewsResult();
            foreach ($result as $r) {
                $data['interviews'] = $r;
                $results .= $this->load->view('backend/admin/job-board/pdf-interviews', $data, TRUE);
            }
            $filename = $this->xssCleanInput('job').'-interviewsResults.pdf';
        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml($results);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit;
    }

    /**
     * Function (for ajax) to delete candidate interview
     *
     * @param  $candidate_interview_id integer
     * @return redirect
     */
    public function deleteInterview($candidate_interview_id = '')
    {
        $this->checkIfDemo();
        $data = $this->AdminCandidateInterviewModel->deleteCandidateInterview($candidate_interview_id);
        $this->AdminJobBoardModel->updateInterviewResultInJobApplication($data);
        $this->AdminJobBoardModel->updateOverallResultInJobApplication($data);
        echo json_encode(array(
            'success' => 'true',
            'messages' => $this->ajaxErrorMessage(array('success' => get_phrase('candidate_interview_deleted')))
        ));
    }

    /**
     * Function (for ajax) to delete candidate quiz
     *
     * @param  $candidate_quiz_id integer
     * @return redirect
     */
    public function deleteQuiz($candidate_quiz_id = '')
    {
        $this->checkIfDemo();
        $data = $this->AdminQuizModel->deleteCandidateQuiz($candidate_quiz_id);
        $this->AdminJobBoardModel->updateQuizResultInJobApplication($data);
        $this->AdminJobBoardModel->updateOverallResultInJobApplication($data);
        echo json_encode(array(
            'success' => 'true',
            'messages' => $this->ajaxErrorMessage(array('success' => get_phrase('candidate_quiz_deleted')))
        ));
    }

    /* job board end ----------------------------------------------------------------------------------------*/

   /*  jobs start ----------------------------------------------------------------------------------------------------*/
/**
     * View Function to display jobs list view page
     *
     * @return html/string
     */
    public function jobslistView()
    {
        $page_data['page'] = get_phrase('jobs');
        $page_data['menu'] = 'jobs';
        $page_data['companies'] = objToArr($this->AdminCompanyModel->getAll());
        $page_data['departments'] = objToArr($this->AdminDepartmentModel->getAll());
        $page_data['job_filters'] = objToArr($this->AdminJobFilterModel->getAll());
       // var_dump($page_data['job_filters']); die();
        $page_data['page_title'] = get_phrase('jobs');
        $page_data['page_name'] = 'jobs-list';
        $this->load->view('backend/index', $page_data);
        
        // $this->load->view('admin/layout/header', $data);
        // $this->load->view('admin/jobs/list', $pagedata);
    }

    /**
     * Function to get data for jobs jquery datatable
     *
     * @return json
     */
    public function jobsData()
    {
        echo json_encode($this->AdminJobModel->jobsList());
    }    

    /**
     * View Function (for ajax) to display create or edit job
     *
     * @param integer $job_id
     * @return html/string
     */
    public function jobsCreateOrEdit($job_id = NULL)
    {
        $page_data['job'] = objToArr($this->AdminJobModel->getJob('jobs.job_id', $job_id));
        $page_data['companies'] = objToArr($this->AdminCompanyModel->getAll());
        $page_data['departments'] = objToArr($this->AdminDepartmentModel->getAll());
        $page_data['traits'] = objToArr($this->AdminTraitModel->getAll());
        //var_dump($pagedata['traits'] ); die();
        $page_data['job_filters'] = objToArr($this->AdminJobFilterModel->getAll());
        $page_data['page'] = get_phrase('job');
        $page_data['menu'] = 'job';

        $page_data['page_title'] = get_phrase('create_or_edit_jobs');
        $page_data['page_name'] = 'job-create-or-edit';
        $this->load->view('backend/index', $page_data);

        //$this->load->view('admin/layout/header', $data);
        //$this->load->view('admin/jobs/create-or-edit', $pagedata);
    }

    /**
     * Function (for ajax) to process job create or edit form request
     *
     * @return redirect
     */
    public function jobsSave()
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
            //var_dump($edit); die();
            $this->AdminJobModel->storeJob($edit);
            echo json_encode(array(
                'success' => 'true',
                'messages' => $this->ajaxErrorMessage(array('success' => get_phrase('job') . ($edit ? get_phrase('updated') : get_phrase('created'))))
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
    public function jobsChangeStatus($job_id = null, $status = null)
    {
        //$this->checkIfDemo();
        $this->AdminJobModel->changeStatus($job_id, $status);
    }

    /**
     * Function (for ajax) to process job bulk action request
     *
     * @return void
     */
    public function jobsBulkAction()
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
    public function jobsDelete($job_id)
    {
        $this->checkIfDemo();
        $this->AdminJobModel->remove($job_id);
    }

    /**
     * Post Function to download jobs data in excel
     *
     * @return void
     */
    public function jobsExcel()
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
    public function jobsAddCustomField()
    {
        $data['field'] = array('custom_field_id' => '', 'label' => '', 'value' => '');
        echo $this->load->view('backend/admin/jobs/custom-field', $data, TRUE);
    }

    /**
     * Function (for ajax) to process remove custom field request
     *
     * @param integer $custom_field_id
     * @return void
     */
    public function jobsRemoveCustomField($custom_field_id)
    {
        $this->checkIfDemo();
        $this->AdminJobModel->removeCustomField($custom_field_id);
    }

   /* jobs end */

   /* companies start --------------------------------------------------------------------*/
     /**
     * View Function to display companies list view page
     *
     * @return html/string
     */
    public function companyListView()
    {
        $data['page'] = site_phrase('companies');
        $data['menu'] = 'companies';
        $page_data['page_title'] = get_phrase('companies_list');
        $page_data['page_name'] = 'companies-list';
        $this->load->view('backend/index', $page_data);
        // $this->load->view('admin/layout/header', $data);
        // $this->load->view('admin/companies/list');
    }

    /**
     * Function to get data for companies jquery datatable
     *
     * @return json
     */
    public function companyData()
    {
        echo json_encode($this->AdminCompanyModel->companiesList());
    }    

    /**
     * View Function (for ajax) to display create or edit view page via modal
     *
     * @param integer $company_id
     * @return html/string
     */
    public function companyCreateOrEdit($company_id = NULL)
    {
        $company = objToArr($this->AdminCompanyModel->getCompany('company_id', $company_id));
        echo $this->load->view('admin/companies/create-or-edit', compact('company'), TRUE);
    }

    /**
     * Function (for ajax) to process company create or edit form request
     *
     * @return redirect
     */
    public function companySave()
    {
        $this->checkIfDemo();
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[50]');

        $edit = $this->xssCleanInput('company_id') ? $this->xssCleanInput('company_id') : false;

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
            ));
        } elseif ($this->AdminCompanyModel->valueExist('title', $this->xssCleanInput('title'), $edit)) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => site_phrase('company_already_exist')))
            ));
        } else {
            $data = $this->AdminCompanyModel->storeCompany($edit);
            echo json_encode(array(
                'success' => 'true',
                'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('company') . ($edit ? site_phrase('updated') : site_phrase('created')))),
                'data' => $data
            ));
        }
    }

    /**
     * Function (for ajax) to process company change status request
     *
     * @param integer $company_id
     * @param string $status
     * @return void
     */
    public function companyChangeStatus($company_id = null, $status = null)
    {
        $this->checkIfDemo();
        $this->AdminCompanyModel->changeStatus($company_id, $status);
    }

    /**
     * Function (for ajax) to process company bulk action request
     *
     * @return void
     */
    public function companyBulkAction()
    {
        $this->checkIfDemo();
        $this->AdminCompanyModel->bulkAction();
    }

    /**
     * Function (for ajax) to process company delete request
     *
     * @param integer $company_id
     * @return void
     */
    public function companyDelete($company_id)
    {
        $this->checkIfDemo();
        $this->AdminCompanyModel->remove($company_id);
    }
   /* companies end */

   /* departments start */
   
    /**
     * View Function to display departments list view page
     *
     * @return html/string
     */
    public function departmentListView()
    {
        $data['page'] = site_phrase('departments');
        $data['menu'] = 'departments';
        $page_data['page_title'] = get_phrase('departments_list');
        $page_data['page_name'] = 'departments-list';
        $this->load->view('backend/index', $page_data);
        // $this->load->view('admin/layout/header', $data);
        // $this->load->view('admin/departments/list');
    }

    /**
     * Function to get data for departments jquery datatable
     *
     * @return json
     */
    public function departmentData()
    {
        echo json_encode($this->AdminDepartmentModel->departmentsList());
    }    

    /**
     * View Function (for ajax) to display create or edit view page via modal
     *
     * @param integer $department_id
     * @return html/string
     */
    public function departmentCreateOrEdit($department_id = NULL)
    {
        $department = objToArr($this->AdminDepartmentModel->getDepartment('department_id', $department_id));
       // $page_data['page_title'] = get_phrase('department_create_or_edit');
        //$page_data['page_name'] = 'departments-create-or-edit';
        //$this->load->view('backend/index', $page_data);
        echo $this->load->view('backend/admin/departments/create-or-edit', compact('department'), TRUE);
    }

    /**
     * Function (for ajax) to process department create or edit form request
     *
     * @return redirect
     */
    public function departmentSave()
    {
        $this->checkIfDemo();
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[50]');

        $edit = $this->xssCleanInput('department_id') ? $this->xssCleanInput('department_id') : false;
        $imageUpload = $this->departmentUploadImage($edit);
      // var_dump($imageUpload) ;
        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
            ));
        } elseif ($this->AdminDepartmentModel->valueExist('title', $this->xssCleanInput('title'), $edit)) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => site_phrase('department_already_exist')))
            ));
        } elseif ($imageUpload['success'] == 'false') {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => $imageUpload['message']))
            ));
        } else {
           // echo'ddd';
            $data = $this->AdminDepartmentModel->storeDepartment($edit, $imageUpload['message']);
            echo json_encode(array(
                'success' => 'true',
                'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('department') . ($edit ? site_phrase('updated') : site_phrase('created')))),
                'data' => $data
            ));
        }
    }

    /**
     * Function (for ajax) to process department change status request
     *
     * @param integer $department_id
     * @param string $status
     * @return void
     */
    public function departmentChangeStatus($department_id = null, $status = null)
    {
        $this->checkIfDemo();
        $this->AdminDepartmentModel->changeStatus($department_id, $status);
    }

    /**
     * Function (for ajax) to process department bulk action request
     *
     * @return void
     */
    public function departmentBulkAction()
    {
        $this->checkIfDemo();
        $this->AdminDepartmentModel->bulkAction();
    }

    /**
     * Function (for ajax) to process department delete request
     *
     * @param integer $department_id
     * @return void
     */
    public function departmentDelete($department_id)
    {
        $this->checkIfDemo();
        $this->AdminDepartmentModel->remove($department_id);
    }

    /**
     * Private function to upload department image if any
     *
     * @param integer $edit
     * @return array
     */
    private function departmentUploadImage($edit = false)
    {
        if ($_FILES['image']['name'] != '') {
            if ($edit) {
                $department = objToArr($this->AdminDepartmentModel->getDepartment('department_id', $edit));
                if ($department['image']) {
                    @unlink('./uploads/departments/' . $department['image']);
                }
            }
            $file = explode('.', $_FILES['image']['name']);
            $filename = url_title(convert_accented_characters($_FILES['image']['name']), 'dash', true);
            $filename .= '-' . strtotime(date('Y-m-d G:i:s'));
            $config['upload_path'] = './uploads/departments/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename;
            $config['max_size'] = '1024';
            //$config['max_width'] = '200';
            //$config['max_height'] = '200';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                //$error = array('error' => $this->upload->display_errors());
                //var_dump($error); die();
                return array(
                    'success' => 'false',
                    'message' => site_phrase('only_image_allowed_200')
                );
            } else {
                $data = $this->upload->data();
                return array('success' => 'true', 'message' => $data['file_name']);
            }
        }
        return array('success' => 'true', 'message' => '');
    }    
   /* departments end  */
   /* Job filters start ---------------------------------------------------------------------------------*/
   /**
     * View Function to display job_filters list view page
     *
     * @return html/string
     */
    public function JobFiltersListView()
    {
        $data['page'] = site_phrase('job_filters');
        $data['menu'] = 'job_filters';

        $page_data['page_title'] = get_phrase('job_filters');
        $page_data['page_name'] = 'job-filters-list';
        $this->load->view('backend/index', $page_data);
        // $this->load->view('admin/layout/header', $data);
        // $this->load->view('admin/job-filters/list');
    }

    /**
     * Function to get data for job_filters jquery datatable
     *
     * @return json
     */
    public function JobFiltersData()
    {
        echo json_encode($this->AdminJobFilterModel->job_filtersList());
    }    

    /**
     * View Function (for ajax) to display create or edit view page via modal
     *
     * @param integer $job_filter_id
     * @return html/string
     */
    public function JobFiltersCreateOrEdit($job_filter_id = NULL)
    {
        $job_filter = objToArr($this->AdminJobFilterModel->getJobFilter('job_filter_id', $job_filter_id));
        echo $this->load->view('admin/job-filters/create-or-edit', compact('job_filter'), TRUE);
    }

    /**
     * Function (for ajax) to process job_filter create or edit form request
     *
     * @return redirect
     */
    public function JobFiltersSave()
    {
        $this->checkIfDemo();
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('order', 'Order', 'trim|required|min_length[1]|max_length[4]');

        $edit = $this->xssCleanInput('job_filter_id') ? $this->xssCleanInput('job_filter_id') : false;

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
            ));
        } elseif ($this->AdminJobFilterModel->valueExist('title', $this->xssCleanInput('title'), $edit)) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => site_phrase('job_filter_already_exists')))
            ));
        } else {
            $data = $this->AdminJobFilterModel->storeJobFilter($edit);
            echo json_encode(array(
                'success' => 'true',
                'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('job_filter') . ($edit ? site_phrase('updated') : site_phrase('created')))),
                'data' => $data
            ));
        }
    }

    /**
     * View Function (for ajax) to display update values view page via modal
     *
     * @param integer $job_filter_id
     * @return html/string
     */
    public function JobFiltersUpdateValuesForm($job_filter_id = NULL)
    {
        $values = objToArr($this->AdminJobFilterModel->getAllValues($job_filter_id));
        echo $this->load->view('admin/job-filters/values', compact('values', 'job_filter_id'), TRUE);
    }

    /**
     * View Function (for ajax) to display new value field
     *
     * @param integer $job_filter_id
     * @return html/string
     */
    public function JobFiltersNewValue($job_filter_id = NULL)
    {
        echo $this->load->view('admin/job-filters/value', array(), TRUE);
    }

    /**
     * Function (for ajax) to process job_filter update values form request
     *
     * @return redirect
     */
    public function JobFiltersUpdateValues()
    {
        $this->checkIfDemo();
        $this->form_validation->set_rules('values[]', 'Value', 'trim|required|min_length[2]|max_length[150]');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
            ));
        } else {
            $data = $this->AdminJobFilterModel->storeJobFilterValue();
            echo json_encode(array(
                'success' => 'true',
                'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('job_filter') . site_phrase('updated'))),
                'data' => $data
            ));
        }
    }

    /**
     * Function (for ajax) to process job_filter change status request
     *
     * @param integer $job_filter_id
     * @param string $status
     * @return void
     */
    public function JobFiltersChangeStatus($job_filter_id = null, $status = null)
    {
        $this->checkIfDemo();
        $this->AdminJobFilterModel->changeStatus($job_filter_id, $status);
    }

    /**
     * Function (for ajax) to process job_filter bulk action request
     *
     * @return void
     */
    public function JobFiltersBulkAction()
    {
        $this->checkIfDemo();
        $this->AdminJobFilterModel->bulkAction();
    }

    /**
     * Function (for ajax) to process job_filter delete request
     *
     * @param integer $job_filter_id
     * @return void
     */
    public function JobFiltersDelete($job_filter_id)
    {
        $this->checkIfDemo();
        $this->AdminJobFilterModel->remove($job_filter_id);
    }
   /* job filters end */
  /*  candidates start  ----------------------------------------------------------------------------------------*/
  /**
     * View Function to display candidates list view page
     *
     * @return html/string
     */
    public function candidatesListView()
    {
        $data['page'] = site_phrase('candidates');
        $data['menu'] = 'candidates';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/candidates/list');
    }

    /**
     * Function to get data for candidates jquery datatable
     *
     * @return json
     */
    public function candidatesData()
    {
        echo json_encode($this->AdminCandidateModel->candidatesList());
    }    

    /**
     * View Function (for ajax) to display create or edit view page via modal
     *
     * @param integer $candidate_id
     * @return html/string
     */
    public function candidatesCreateOrEdit($candidate_id = NULL)
    {
        $candidate = objToArr($this->AdminCandidateModel->getCandidate('candidate_id', $candidate_id));
        echo $this->load->view('admin/candidates/create-or-edit', compact('candidate'), TRUE);
    }

    /**
     * Function (for ajax) to process candidate create or edit form request
     *
     * @return redirect
     */
    public function candidatesSaveCandidate()
    {
        $this->checkIfDemo();
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[2]|max_length[50]|valid_email');

        $edit = $this->xssCleanInput('candidate_id') ? $this->xssCleanInput('candidate_id') : false;
        $imageUpload = $this->candidatesUploadImage($edit);
        if (!$edit) {
            $this->form_validation->set_rules('password', 'Password', 'required');
        }

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
            ));
        } elseif ($this->AdminCandidateModel->valueExist('email', $this->xssCleanInput('email'), $edit)) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => site_phrase('email_already_exist')))
            ));
        } elseif ($imageUpload['success'] == 'false') {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => $imageUpload['message']))
            ));
        } else {
            $this->AdminCandidateModel->storeCandidate($edit, $imageUpload['message']);
            echo json_encode(array(
                'success' => 'true',
                'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('candidate').' ' . ($edit ? site_phrase('updated') : site_phrase('created'))))
            ));
        }
    }

    /**
     * Private function to upload candidate image if any
     *
     * @param integer $edit
     * @return array
     */
    private function candidatesUploadImage($edit = false)
    {
        if ($_FILES['image']['name'] != '') {
            if ($edit) {
                $candidate = objToArr($this->AdminCandidateModel->getCandidate('candidate_id', $edit));
                if ($candidate['image']) {
                    @unlink('./uploads/candidates/' . $candidate['image']);
                }
            }
            $file = explode('.', $_FILES['image']['name']);
            $filename = url_title(convert_accented_characters($_FILES['image']['name']), 'dash', true);
            $filename .= '-' . strtotime(date('Y-m-d G:i:s'));
            $config['upload_path'] = './uploads/candidates/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $filename;
            $config['max_size'] = '1024';
            $config['max_width'] = '400';
            $config['max_height'] = '400';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                return array(
                    'success' => 'false',
                    'message' => site_phrase('only_image_allowed_400')
                );
            } else {
                $data = $this->upload->data();
                return array('success' => 'true', 'message' => $data['file_name']);
            }
        }
        return array('success' => 'true', 'message' => '');
    }

    /**
     * Function (for ajax) to process candidate change status request
     *
     * @param integer $candidate_id
     * @param string $status
     * @return void
     */
    public function candidatesChangeStatus($candidate_id = null, $status = null)
    {
        $this->checkIfDemo();
        $this->AdminCandidateModel->changeStatus($candidate_id, $status);
    }

    /**
     * Function (for ajax) to process candidate bulk action request
     *
     * @return void
     */
    public function candidatesBulkAction()
    {
        $this->checkIfDemo();
        $this->AdminCandidateModel->bulkAction();
    }

    /**
     * Function (for ajax) to process candidate delete request
     *
     * @param integer $candidate_id
     * @return void
     */
    public function candidatesDelete($candidate_id)
    {
        $this->checkIfDemo();
        $this->AdminCandidateModel->remove($candidate_id);
    }

    /**
     * Function (for ajax) to display candidate resume
     *
     * @param integer $candidate_id
     * @return void
     */
    public function candidatesResume($candidate_id)
    {
        $resume = $this->AdminCandidateModel->getCompleteResume($candidate_id);
        if ($resume) {
            $data['resume_id'] = $resume['resume_id'];
            $data['resume_file'] = $resume['file'];
            $data['type'] = $resume['type'];
            $data['file'] = $resume['file'];
            $data['resume'] = $resume;
            echo $this->load->view('admin/candidates/resume', $data, TRUE);
        } else {
            echo site_phrase('no_resumes_found');
        }
    }

    /**
     * Post Function to download candidate resume
     *
     * @return void
     */
    public function candidatesResumeDownload()
    {
        ini_set('max_execution_time', '0');
        //$this->checkAdminLogin();
        $ids = explode(',', $this->xssCleanInput('ids'));
        $resumes = '';
        foreach ($ids as $id) {
            $data['resume'] = $this->AdminCandidateModel->getCompleteResumeJobBoard($id);
            if ($data['resume']['type'] == 'detailed') {
                $resumes .= $this->load->view('backend/admin/candidates/resume-pdf', $data, TRUE);
            } else {
                $resumes .= "<hr />";
                $resumes .= 'Resume of "'.$data['resume']['first_name'].' '.$data['resume']['last_name'].' ('.$data['resume']['designation'].')" is static and can be downloaded separately';
                $resumes .= "<br /><hr />";
            }
            
        }        

        $dompdf = new Dompdf();
        $dompdf->loadHtml($resumes);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Resumes.pdf');
        exit;
    }

    /**
     * Post Function to download candidates data in excel
     *
     * @return void
     */
    public function candidatesCandidatesExcel()
    {
        $data = $this->AdminCandidateModel->getCandidatesForCSV($this->xssCleanInput('ids'));
        $data = sortForCSV(objToArr($data));
        $excel = new SimpleExcel('csv');                    
        $excel->writer->setData($data);
        $excel->writer->saveFile('candidates'); 
        exit;
    }
    /*  candidates end  ----------------------------------------------------------------------------------------*/
      /*  traits start  ----------------------------------------------------------------------------------------*/
       /**
     * View Function to display traits list view page
     *
     * @return html/string
     */
    public function traitsListView()
    {
        $page_data['page'] = 'Traits';
        $page_data['menu'] = 'traits';
        $page_data['page_title'] = get_phrase('traits');
        $page_data['page_name'] = 'traits-list';
        $this->load->view('backend/index', $page_data);
        // $this->load->view('admin/layout/header', $data);
        // $this->load->view('admin/traits/list');
    }

    /**
     * Function to get data for traits jquery datatable
     *
     * @return json
     */
    public function traitsData()
    {
        echo json_encode($this->AdminTraitModel->traitsList());
    }    

    /**
     * View Function (for ajax) to display create or edit view page via modal
     *
     * @param integer $trait_id
     * @return html/string
     */
    public function traitsCreateOrEdit($trait_id = NULL)
    {
        $trait = objToArr($this->AdminTraitModel->getTrait('trait_id', $trait_id));
        echo $this->load->view('backend/admin/traits/create-or-edit', compact('trait'), TRUE);
    }

    /**
     * Function (for ajax) to process trait create or edit form request
     *
     * @return redirect
     */
    public function traitsSave()
    {
        $this->checkIfDemo();
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[2]|max_length[100]');

        $edit = $this->xssCleanInput('trait_id') ? $this->xssCleanInput('trait_id') : false;

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => validation_errors()))
            ));
        } elseif ($this->AdminTraitModel->valueExist('title', $this->xssCleanInput('title'), $edit)) {
            echo json_encode(array(
                'success' => 'false',
                'messages' => $this->ajaxErrorMessage(array('error' => site_phrase('trait_already_exist')))
            ));
        } else {
            $this->AdminTraitModel->storeTrait($edit);
            echo json_encode(array(
                'success' => 'true',
                'messages' => $this->ajaxErrorMessage(array('success' => site_phrase('trait').' ' . ($edit ? site_phrase('updated') : site_phrase('created'))))
            ));
        }
       // echo $this->db->last_query(); die();
    }

    /**
     * Function (for ajax) to process trait change status request
     *
     * @param integer $trait_id
     * @param string $status
     * @return void
     */
    public function traitsChangeStatus($trait_id = null, $status = null)
    {
        $this->checkIfDemo();
        $this->AdminTraitModel->changeStatus($trait_id, $status);
    }

    /**
     * Function (for ajax) to process trait bulk action request
     *
     * @return void
     */
    public function traitsBulkAction()
    {
        $this->checkIfDemo();
        $this->AdminTraitModel->bulkAction();
    }

    /**
     * Function (for ajax) to process trait delete request
     *
     * @param integer $trait_id
     * @return void
     */
    public function traitsDelete($trait_id)
    {
        $this->checkIfDemo();
        $this->AdminTraitModel->remove($trait_id);
    }
        /*  traits end  ----------------------------------------------------------------------------------------*/
}
