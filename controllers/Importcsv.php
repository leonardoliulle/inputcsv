<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importcsv extends CI_Controller {

	/**
	 * import CSV seperado por virgula do Excel
	 *
	 */

	public function __construct()
	{
		   parent::__construct(); 
           $this->load->model("Importcsv_model");
	}

	public function primeiroimport()
	{
		$data['dados'] = $this->Importcsv_model->importcsv();
		$this->load->view("Importcsv/importcsv");
	}
}
