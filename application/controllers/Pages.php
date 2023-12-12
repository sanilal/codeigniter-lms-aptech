<?php

class Pages extends CI_Controller
{
    /**
     * View Function to display home page
     *
     * @return html/string
     */
    public function index()
    {
        $default = setting('default-landing-page');
        if ($default == 'home') {
            $data['page'] = setting('site-name');
            $data['departments'] = $this->DepartmentModel->getAll();
            $data['blogs'] = $this->BlogModel->getPostsHome();
            $data['job_filters'] = $this->JobFilterModel->getAll(true, true);
            $this->load->view('front/layout/header', $data);
            $this->load->view('front/home');
        } else if ($default == 'jobs') {
            redirect('jobs');
        } else if ($default == 'news') {
            redirect('blogs');
        }
    }

    function _set_rules_3(){
        $this->form_validation->set_rules('inputName', 'Your Name', 'required');
        $this->form_validation->set_rules('inputEmail', 'inputEmail', 'required');
        $this->form_validation->set_rules('inputPhone', 'inputPhone', 'required');
        $this->form_validation->set_rules('inputMessage', 'inputMessage', 'required');
        
     $this->form_validation->set_message('required', '* required');
        $this->form_validation->set_message('isset', '* required');
        $this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
        $this->form_validation->set_error_delimiters('<div class="test_error"><div class="alert alert-error">
                                        <button class="close" data-dismiss="alert">&times;</button>
                                        <span class="compulsory">', '</span>
                                    </div></div>');
    }

    public function course_contact(){

		$data['footerMessage'] = "";

		
		// set common properties
		$data['title'] = 'Enquiry For Course '.$this->input->post('inputCourseTitle');
		$data['modal'] = '';

       // echo $data['title']; die;
		//$this->_set_fields_1();
		// set validation properties
        
		 $this->_set_rules_3();

           if ($this->form_validation->run() === FALSE) {
            
                $data['message'] = '';
          //  return validation_errors(); die;
        } else{
			//Email Message 
          // echo $this->input->post('inputName'); die();
          
		$email_template =' <table width="80%" style="border-collapse: collapse;border-spacing: 0;box-sizing: border-box;">
						  <tr>
						  <td height="52" colspan="2">
						 
						  </td>
						  </tr>
						  <tr>
						  <td height="52" colspan="2">
						  <h3 style="text-align:center">An enquiry has been made in the website of Aptech. The details submitted are given below</h3>
						  </td>
						  </tr>
						  <tr><td style="border:1px solid #587C08;padding:6px;font-family:Arial, Helvetica, sans-serif;color:#ffffff;font-size:14px;background: #8ABE18;">Name</td>
						  <td style="border:1px solid #9E9898;padding:6px;font-family:Arial, Helvetica, sans-serif;color:#544747;font-size:14px;background: #ffffff;">'.$this->input->post('inputName').'</td></tr>
						  
						  <tr><td style="border:1px solid #587C08;padding:6px;font-family:Arial, Helvetica, sans-serif;color:#ffffff;font-size:14px;background: #8ABE18;">Telephone</td>
						  <td style="border:1px solid #9E9898;padding:6px;font-family:Arial, Helvetica, sans-serif;color:#544747;font-size:14px;background: #ffffff;">'.$this->input->post('inputPhone').'</td></tr>
						  
						  <tr><td style="border:1px solid #587C08;padding:6px;font-family:Arial, Helvetica, sans-serif;color:#ffffff;font-size:14px;background: #8ABE18;">Email</td><td style="border:1px solid #9E9898;padding:6px;font-family:Arial, Helvetica, sans-serif;color:#544747;font-size:14px;background: #ffffff;">'.$this->input->post('inputEmail').'</td></tr>
						  
						  <tr><td style="border:1px solid #587C08;padding:6px;font-family:Arial, Helvetica, sans-serif;color:#ffffff;font-size:14px;background: #8ABE18;">Information</td><td style="border:1px solid #9E9898;padding:6px;font-family:Arial, Helvetica, sans-serif;color:#544747;font-size:14px;background: #ffffff;">'.$this->input->post('inputMessage').'</td></tr>
						</table>';
			            // save data
							//local
							/* $config['protocol'] = "smtp";
							$config['smtp_host'] = "ssl://smtp.googlemail.com";
							$config['smtp_port'] = 465;
							$config['smtp_user'] = "aptechcomputersdubai@gmail.com";
							$config['smtp_pass'] = "Aptech@987"; */
                           
                            $config['protocol'] = "smtp";
							$config['smtp_host'] = "ssl://aptech.webhostingdubai.net";
							$config['smtp_user'] = "noreply@aptech.webhostingdubai.net";
							$config['smtp_pass'] = "Email@987"; 
							$config['smtp_port'] = 465;

                            $config['mailtype'] = "html";
                            $config['starttls'] = false;
                            $config['charset'] = "utf-8";
                            $config['wordwrap']=TRUE;
                              $config['smtp_timeout'] = "30";
                              $config['newline']="\r\n";
                              $config['validate']=TRUE;
  
                              $from_address 	= "noreply@aptech.webhostingdubai.net";
                              $to_address 	= "sanilal.iconcept@gmail.com";
							$e_subject 		='Enquiry For Course'.$this->input->post('inputCourseTitle');

							$this->load->library('email');
							$this->email->initialize($config); 
							$this->email->set_newline("\r\n");
							$this->email->from($from_address);
							$this->email->to($to_address);
							$this->email->subject($e_subject);
							//$data_1['domain'] = $this->admin_model->auto_mail_notification()->result();
							//$email_template = $this->load->view('admin/dom_mail_template',$data_1,TRUE);
							//$email_template='';
							$this->email->message($email_template); 
						//	$this->email->send();

                              // ************ delete
                              if ($this->email->send()) {
                              //   echo 'Email sent successfully'; die;
                              $message = 'Email sent successfully';

                      //        echo $message; die;
                             $course_slug = $this->input->post('course_slug');
            $course_id = $this->input->post('course_id');
            $redirect_url = base_url("home/course/{$course_slug}/{$course_id}");
           // var_dump($course_id); die;
         //   redirect($redirect_url);
                              } else {
                               // echo $from_address;
                                 echo 'Error sending email: ' . $this->email->print_debugger();
                              }
                             //  *********** delete
                             
                        //     $referrer = $this->input->server('HTTP_REFERER');
                          //   echo $referrer; die;

      //  redirect($referrer);
                            
			
			// set user message
			$data['footerMessage'] = "";
			$data['message'] = "
										<script type='text/javascript'>
										$(document).ready(function(){
										$('#inputName').val('');
										$('#inputEmail').val('');
										$('#inputPhone').val('');

                                        $('#inputCourseType').val('');
                                        $('#inputSubject').val('');
                                        $('#inputLocation').val('');                                     
                                        
                                        
										$('#inputMessage').val('');
										});
										</script>
										<div class='alert alert-success'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<strong>Thankyou!</strong> Your message sent successfully...
									</div>";
		}
       
		$data['metatitle'] = 'Contact Us';
                $data['metadescription'] = 'Contact Aptech.';
                $data['course_slug'] = $this->input->post('course_slug');
$data['course_id'] = $this->input->post('course_id');
$data['metatitle'] = 'Contact Us';
$data['metadescription'] = 'Contact Aptech.';
$data['page_name'] = "course_page";
$data['page_title'] = site_phrase('contact');
		// load view
        // $data['page_name'] = "course_page";
        // $data['page_title'] = site_phrase('contact');
         $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $data);
	}


    /**
     * View Function to display blog listing page
     *
     * @return html/string
     */
    public function blogListing($page = null)
    {
        $search = urldecode($this->xssCleanInput('search', 'get'));
        $categories = $this->xssCleanInput('categories', 'get');
        $limit = setting('blogs-limit');

        $pageData['page'] = lang('blogs').' | ' . setting('site-name');
        $data['blogs'] = $this->BlogModel->getAll($page, $search, $categories, $limit);
        $data['categories'] = $this->BlogModel->getCategories();
        $data['pagination'] = $this->getPagination($page, $search, $categories, $limit);
        $data['page'] = 'profile';
        $data['search'] = $search;
        $data['categoriesSel'] = $categories;
        $this->load->view('front/layout/header', $pageData);
        $this->load->view('front/blog-listing', $data);
    }

    /**
     * View Function to display blog listing page
     *
     * @return html/string
     */
    public function blogDetail($id = null)
    {
        $search = urldecode($this->xssCleanInput('search', 'get'));
        $categories = $this->xssCleanInput('categories', 'get');

        $data['blog'] = $this->BlogModel->getBlog('blogs.blog_id', decode($id));
        $data['categories'] = $this->BlogModel->getCategories();
        $data['search'] = $search;
        $data['categoriesSel'] = $categories;
        $pageData['page'] = $data['blog']['title'].' | ' . setting('site-name');
        $this->load->view('front/layout/header', $pageData);
        $this->load->view('front/blog-detail', $data);
    }

    /**
     * Private function to create pagination for blogs listing
     *
     * @return html/string
     */
    private function getPagination($page, $search, $categories, $perPage)
    {
        $total = $this->BlogModel->getTotal($search, $categories);
        $url = '/blogs/';
        return $this->createPagination($page, $url, $total, $perPage);
    }    

    /**
     * Post function to create schema and import data during installation
     *
     * @return void
     */
    public function createSchemaAndImportData($import_data = false)
    {   
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('max_execution_time', 1000);
        try {
            $this->SchemaModel->run();
            $this->SchemaQuestionsModel->run();
            if ($import_data) {
                $this->DataQuestionsModel->run();
                $this->DataModel->run();
            }
            $message = 'success';
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }

    /**
     * Function (for ajax) to create admin user form request (from installation)
     *
     * @return redirect
     */
    public function createAdminUser($data = array())
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('retype_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            return validation_errors();
        } else {
            $this->AdminUserModel->storeAdminUser($data);
            return 'success';
        }
    }    

    /**
     * Function to save session variable for sidebar goggle
     *
     * @return void
     */
    public function sidebarToggle()
    {
        $currentValue = $this->sess('sidebar-toggle');
        $currentValue = $currentValue == 'off' ? 'on' : 'off';
        $this->session->set_userdata('sidebar-toggle', $currentValue);
    }

    /**
     * Function to display default 404 page on 404 error
     *
     * @return void
     */
    public function notFoundPage()
    {   
        $data['page'] = setting('site-name').' | page not found';
        $this->load->view('front/layout/header', $data);
        $this->load->view('front/404');
    }

    

}
