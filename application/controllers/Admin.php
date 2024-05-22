<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('status'))
		{
			redirect('auth');
		}
	}



	public function index()
	{
		$this->load->view('admin/panel');
	}


	
	public function logout() 
	{

		$this->session->sess_destroy();
			
		redirect('auth');
	}


	
}
