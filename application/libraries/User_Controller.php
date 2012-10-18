<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends MY_Controller {
	
    var $user_id;

	function __construct() {
		
		parent::__construct();

		if ( ! $this->session->userdata('username') && ! $this->session->userdata('user_id') ) {
			redirect('authenticate/login');
		} else {
            $this->user_id = $this->session->userdata('user_id');
		}

	}

} ?>