<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct() {
        parent::__construct();

		if(!$this->session->userdata('status'))
		{
			redirect('admin');
		}
    }


    public function index()
    {
    	$data['messages'] = message::select();
    	$this->load->view('admin/messages/messages', $data);
    }

	public function send_message()
	{	

		if (ispost()) {
			$data = ['name' => postvalue('name'),
				 'email' => postvalue('email'),
				 'tel' => postvalue('tel'),
				 'date' => date('Y-m-d'),
				 'message' => postvalue('message')];

			message::insert($data);
			redirect('messages/message_sent_successfully/'.$this->db->insert_id());	
		}
		
    	$this->load->view('admin/messages/send_message');
	}	

	public function message_sent_successfully($id)
	{
		if ( message::find($id) ) {
			$data['message'] = message::find($id); 
			$this->load->view('admin/messages/sent_successfully', $data);
		} else {
			show_error('404');
		}
	}

	public function delete_message($id)
	{
		$message = message::find($id);

		if ($message) {
			message::delete($id);
 			flash('success','check', 'Message deleted.'  ,'Message is deleted successfully.');	
			back();
		}
	}


}
