<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('status'))
		{
			redirect('admin');
		}
	}


	public function index()
	{
		$this->load->view('admin/login');
	}


	public function login_auth()
	{
		$query = admins::find(['username' => strip_tags(trim(postvalue('username'))), 'password' => sha1(md5(postvalue('password')))]);

		if ($query) {

			$concentration = $this->input->ip_address().$this->session->userdata('username'); 
			$crypto = sha1(md5($concentration));

			$this->session->set_userdata([  'status' => $crypto,
											'id' => $query->id,
											'role' => 'admin']);

			redirect('admin');
		} else {
 			flash('danger','remove','Username or password is wrong.');
			redirect('admin');
		}
	}






}