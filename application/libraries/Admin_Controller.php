<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * @author      Eugene Santos
 * @email       eugene.santos13@gmail.com
 */
class Admin_Controller extends MY_Controller {

	var $user_id;

	function __construct() {
		parent::__construct();
		// if (!preg_match('#/authenticate/login/?$#', $_SERVER['REQUEST_URI'])) {
		// 	if (!$this->session->userdata('username')) {
		// 		// redirect('authenticate/login');
		// 	}
		// } else {
		//    $this->user_id = $this->session->userdata('user_id');
		// }

		if (!$this->session->userdata('username')) {
			# code...
		} else {
			$this->user_id = $this->session->userdata('user_id');
		}
	}
    



} ?>