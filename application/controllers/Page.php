<?php
defined('BASEPATH') or exit('No direct script access allowed');

class page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // SESSION DATA FOR CART
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }
        // SESSION DATA FOR FRONTEND LANGUAGE
        if (!$this->session->userdata('language')) {
            $this->session->set_userdata('language', get_settings('language'));
        }
    }

    function index(){
        $page_data['popular_pages'] = $this->crud_model->get_popular_pages(6);
        $page_data['latest_pages'] = $this->crud_model->get_latest_pages(6);
        $page_data['included_page'] = 'page_latest_and_popular.php';
        $page_data['page_title'] = site_phrase('page');
        $page_data['page_name'] = 'pages';
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    //all pages
    function pages($param1 = ''){

        $uri_segment = $param1;

        if(isset($_GET['search']) && !empty($_GET['search'])){
            $config = array();
            $this->db->like('title', $_GET['search']);
            $this->db->or_like('description', $_GET['search']);
            $this->db->where('status', 1);
            $total_rows = $this->db->get('pages')->num_rows();
            $config = pagintaion($total_rows, 9);
            $config['reuse_query_string'] = TRUE;
            $config['base_url']  = site_url('pages/');
            $this->pagination->initialize($config);

            $this->db->order_by('added_date', 'asc');
            $this->db->like('title', $_GET['search']);
            $this->db->or_like('description', $_GET['search']);
            $this->db->where('status', 1);
            $page_data['pages'] = $this->db->get('pages', $config['per_page'], $uri_segment);
            $page_data['total_rows'] = $total_rows;
            $page_data['search_string'] = $_GET['search'];
            $page_data['page_title'] = site_phrase('search_result');
        }elseif(isset($_GET['category']) && !empty($_GET['category'])){
            $config = array();
            
            $page_category_id = $this->crud_model->get_page_category_by_slug($_GET['category'])->row('page_category_id');
            $this->db->where('page_category_id', $page_category_id);
            $this->db->where('status', 1);
            $total_rows = $this->db->get('pages')->num_rows();
            $config = pagintaion($total_rows, 9);
            $config['reuse_query_string'] = TRUE;
            $config['base_url']  = site_url('pages/');
            $this->pagination->initialize($config);

            $this->db->order_by('added_date', 'asc');
            $this->db->where('page_category_id', $page_category_id);
            $this->db->where('status', 1);
            $page_data['pages'] = $this->db->get('pages', $config['per_page'], $uri_segment);
            $page_data['total_rows'] = $total_rows;
            $page_data['page_title'] = site_phrase('search_result');
        }else{
            $config = array();
            $this->db->where('status', 1);
            $total_rows = $this->db->get('pages')->num_rows();
            $config = pagintaion($total_rows, 9);
            $config['base_url']  = site_url('pages/');
            $this->pagination->initialize($config);

            $this->db->order_by('added_date', 'asc');
            $this->db->where('status', 1);
            $page_data['pages'] = $this->db->get('pages', $config['per_page'], $uri_segment);
            $page_data['total_rows'] = $total_rows;
            $page_data['page_title'] = site_phrase('pages');
        }
        $page_data['included_page'] = 'pages_all.php';
        $page_data['page_name'] = 'pages';
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    function categories(){
        $page_data['included_page'] = 'page_categories.php';
        $page_data['page_name'] = 'pages';
        $page_data['page_title'] = site_phrase('categories');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    //page details page
    function details($page_slug = "", $page_id = ""){
        $page_data['page_details'] = $this->crud_model->get_all_pages($page_id)->row_array();
        $page_data['page_name'] = 'page_details';
        $page_data['page_title'] = site_phrase('page_details');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }

    function add_page_comment($page_id = ""){
        $user_id = $this->session->userdata('user_id');
        if($page_id > 0 && $user_id > 0){
            $this->crud_model->add_page_comment($page_id, $user_id);
            $this->session->set_flashdata('flash_message', site_phrase('your_reply_has_been_successfully_published'));
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }else{
            $this->session->set_flashdata('error_message', site_phrase('make_sure_you_have_logged_in'));
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

    function update_page_comment($page_comment_id = ""){
        $user_id = $this->session->userdata('user_id');
        if($page_comment_id > 0 && $user_id > 0){
            $this->crud_model->update_page_comment($page_comment_id, $user_id);
            $this->session->set_flashdata('flash_message', site_phrase('your_reply_has_been_successfully_published'));
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }else{
            $this->session->set_flashdata('error_message', site_phrase('make_sure_you_have_logged_in'));
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

    function delete_comment($page_comment_id = "", $page_id = ""){
        $page_details = $this->crud_model->get_pages($page_id)->row_array();
        $user_id = $this->session->userdata('user_id');
        $this->crud_model->delete_comment($page_comment_id, $user_id);
        $this->session->set_flashdata('flash_message', site_phrase('your_comment_has_been_deleted_successfully'));
        redirect(site_url('page/details/'.slugify($page_details['title']).'/'.$page_id), 'refresh');
    }
}