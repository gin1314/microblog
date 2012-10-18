<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends User_Controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('user');
		$this->load->helper('my_date');

	}

   public function index()
   {
		$this->template
             ->set_layout('main')             
             ->build('post/index', array(
             	 'data' => 'test',
             	 'user_id' => $this->user_id,
             	 'posts' => $this->user->get_posts()
             	 ));	   	    
   }

	public function add()
	{
  	
		if (isset($_POST) && !empty($_POST)) {
  	
           	$this->form_validation->set_rules('message', 'Comment', 'required');
            
           	if ( ! $this->form_validation->run() ) {           		

           	} else {
                $this->user->new_post(array(
                    'user_id' => $this->user_id,
                    'message' => $this->input->post('message', true)
                ));
                redirect('post');
           	}		
		}

		$this->template
             ->set_layout('main')             
             ->build('post/new', array(
             	 'data' => 'test',
             	 'user_id' => $this->user_id,
             	 'posts' => $this->user->get_posts()
             	 ));			
	}

	public function edit()
	{
		# code...
	}

	public function delete($post_id=null)
	{
		// delete a users own post
		if (in_array( (int)$post_id, $this->user->get_user_post_ids($this->user_id)) ) {
            $this->user->delete_post($post_id);

            redirect('post');

		} else {
			redirect('post');
		}
	}

} ?>