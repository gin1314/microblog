<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate extends Admin_Controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->library('template');
		$this->load->model('user');
		$this->load->helper('my_date');

	}

	public function login()
	{
			
		$this->load->model('user');
        
        if ($this->session->userdata('user_id')) {
             redirect('post');	
        }

        if ( isset($_POST) && !empty($_POST)) {

           		$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');

				if ( $this->form_validation->run() == true ) {
					 // redirect('authenticate/logout', 'refresh');
					
					if ( $user_info = $this->user->validate($this->input->post('username'), $this->input->post('password')) ) {
						$this->session->set_userdata('username', $this->input->post('username'));
						$this->session->set_userdata('user_id', $user_info['id']);

						redirect('post/add', 'refresh');
					} else {
                        
					}

					
					
					$this->template
        			     ->set_layout('main')             
        			     ->build('authenticate/login', array('data' => 'test'));						
				} else {

					$this->template
        			     ->set_layout('main')             
        			     ->build('authenticate/login', array('data' => 'test'));						
				}

        } else {
			$this->template
        	     // ->set_partial('edit_js', 'admin_user/edit_js', array('data_js' => 'tae'))
        	     ->set_layout('main')             
        	     ->build('authenticate/login', array('data' => 'test'));	        	
        }
	
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('authenticate/login');
	}

	public function register()
	{
        if ($this->session->userdata('user_id')) {
             redirect('post');	
        }

        $this->form_validation->set_rules('email', 'Username', 'required|valid_email|callback__is_existing');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('conf_password', 'Password confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');

        if ( isset($_POST) && !empty($_POST)) {
        	if ($this->form_validation->run() != true) {

        		// echo json data for errrors
        		$json_data['error'] = true;
        		$json_data['message'] = validation_errors();

          $err_arr = array_map(function($post_params) {
                                 if (form_error($post_params) !== "") {
                                 	return array(
                                 	   'id' => $post_params, 
                                 	   'error' => strip_tags(form_error($post_params))
                                    );
                                 } else {
                                 	return array('id' => $post_params, 'error' => '');
                                 }
                                 
          					   }, array_keys($_POST));
          $status = array(
              'status' => FALSE,
              'msg'    => $err_arr,
          );
          echo json_encode($status);

                //echo json_encode($json_data);

        	} else {
        		$new_user_id = $this->user->new_user(array(
        	       'email' => $this->input->post('email', true),
        	       'password' => $this->input->post('password', true), 
        	       'first_name' => $this->input->post('first_name', true), 
        	       'last_name' => $this->input->post('last_name', true),
        	       'last_login' => fmt_date_sql(),
        	       'updated_at' => fmt_date_sql(),
        		));
						$this->session->set_userdata('username', $this->input->post('email', true));
						$this->session->set_userdata('user_id', $new_user_id);        		
        		// redirect('post/add');
          		$status = array(
          		    'status' => TRUE
          		);
          		echo json_encode($status);						
        	}
        } else {
			$this->template
        	     ->set_layout('main')             
        	     ->build('authenticate/register', array('data' => 'test'));		        	
        }

	}

	public function _is_existing($username)
	{
		if ($this->user->is_username_exists($username))
		{
			$this->form_validation->set_message('_is_existing', 'This username already exists');
			return FALSE;
		}
		else
		{
			return TRUE;
		}		
	}

} ?>