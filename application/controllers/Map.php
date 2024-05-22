<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        
        if (!$this->session->userdata('status')) {
            redirect('auth');
        }
	}

	public function index()
	{
		$this->load->view('admin/map/back');
	}


	public function add_marker()
	{
		$data = [
			'header' => postvalue('header'),
			'content' => postvalue('content'),
			'latitude' => postvalue('marker_latitude'),
			'longitude' => postvalue('marker_longitude')
		];

		map_markers::insert($data);
		flash('success','check', 'Marker added.'  ,'A new marker added to map successfully.');	
		back();
	}

	public function delete_marker($id)
	{
		map_markers::delete($id);
		flash('success','check', 'Marker deleted.'  ,'The marker deleted successfully.');	
		back();
	}

}