<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */

	public function userposts($id)
	{

		$this->load->model("User_model");
		$dados['dados'] = $this->User_model->userposts($id);

		$this->load->view('userposts', $dados);
	}

	public function gettudo()
	{
					$this->load->model("User_model");
		$dados = $this->User_model->getusers();

		var_dump($dados);	
	}
}
