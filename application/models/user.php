<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	
	function __construct() {
		
		parent::__construct();
        
	}

	public function get_posts()
	{
		$res = $this->db->query(
           "SELECT *, posts.id AS post_id FROM posts
			JOIN users ON posts.user_id = users.id"
		);


		if ($res->num_rows() > 0) {
			
			return $res->result_array();
		} else {
			return array();
		}
	}

	public function validate($username, $password)
	{
		$res = $this->db
		     		->where('email', $username)
             		->where('password', $password)
                    ->get('users');
        
        if ($res->num_rows() > 0) {
        	return $res->row_array();
        } else {
            return false;
        }
    }

    public function is_username_exists($email)
    {
    	$res = $this->db
    	     		->where('email', $email)
    	     		->get('users');

    	if ($res->num_rows() > 0) {
    		return true;
    	} else {
    		return false;
    	}
    }

    public function new_user($data)
    {
    	$this->db->insert('users', $data);

    	return $this->db->insert_id();
    }

    public function new_post($data)
    {
    	$this->db->insert('posts', $data);
    }

    public function get_user_post_ids($user_id)
    {
    	$res = $this->db
    	            ->where('user_id', (int)$user_id)
    		 		->select('id')
    		 		->get('posts');

    	if ($res->num_rows() > 0) {
    		// return $res->result_array();
    		foreach ($res->result_array() as $key => $value) {
    			$ids[] =  (int)$value['id'];
    		}
    		return $ids;
    	} else {
    		return array();
    	}
    }

    public function delete_post($post_id)
    {
    	$this->db->where('id', (int)$post_id)
    			 ->delete('posts');
    }
} ?>