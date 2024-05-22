<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['admins'] = admins::select();
		$this->load->view('admin/admins', $data);
	} 


	public function delete_admin($id)
	{
		admins::delete($id);
		flash('success','check','Admin is deleted.', 'Admin is deleted successfully.');
		back();
	}
	public function add_admin()
	{

		$data = ['username' => postvalue('username'),
				'password' => sha1(md5(postvalue('password')))];

		admins::insert($data);
			
		flash('success','check','New admin account created.', 'New admin account created successfully.');
		back();
	}
	public function edit_admin($id)
	{

		if (isPost()) {

			$data = ['username' => postvalue('username'),
				'password' => sha1(md5(postvalue('password')))];


			admins::update($id, $data);
			flash('success','check','Admin info updated.', 'Admin info updated successfully.');
			back();
			
		}
		
	}





}