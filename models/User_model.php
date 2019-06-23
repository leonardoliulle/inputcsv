<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	public $table = 'users'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
	
	public function __construct()
	{
		

		$this->has_many['posts'] = array('foreign_model'=>'Post_model','foreign_table'=>'posts','foreign_key'=>'user_id','local_key'=>'id');

           parent::__construct(); 
           $this->load->database();
	}


	public function userposts($id)
	{
		return $this->User_model->with_posts()->get($id);
	}

	public function getusers()
	{
		$query = $this->db->get("users");
		return $query->result_array();
	}

}
