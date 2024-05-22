<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        
        if (!$this->session->userdata('status')) {
            redirect('auth');
        }
	}
	
	public function index()
	{
		$this->load->view('admin/change_password');
	}

	public function reset()
	{
		$user = admins::find($this->session->userdata('id'));

        $posted_old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');

		if ( sha1(md5($posted_old_password)) == $user->password ) {
            
            $hashed_new_password = sha1(md5($new_password));
            admins::update($user->id, ['password' => $hashed_new_password]);
 			flash('success','check', 'Password changed.'  ,'Your password has been changed successfully.');	
 			back();
        } else {
 			flash('danger','remove', 'Old password is wrong.'  ,'Your old password has been entered wrong.');	
 			back();
        }
	}
}