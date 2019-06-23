<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends MY_Model {

	public $table = 'posts'; // you MUST mention the table name
	public $primary_key = 'id'; // you MUST mention the primary key
	public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
	
	public function __construct()
	{
		$this->has_one['user'] = array('foreign_model'=>'User_model','foreign_table'=>'users','foreign_key'=>'id','local_key'=>'user_id');
		
           parent::__construct(); 
           $this->load->database();
	}

	
	public function getteste()
	{
		$this->load->model("User_model");
		$this->User_model->get(1);
	}

}
