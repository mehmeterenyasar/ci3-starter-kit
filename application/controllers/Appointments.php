<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('status'))
		{
	   	 	redirect('auth');
		}
	}



	public function appointment_management()
	{
		$data['appointments'] = appointment::select([], ['id' => 'desc']);
        $currentDateTime = date('Y-m-d H:i:s');


		// ->status == 2    :   Not Completed, Appointment Active
		// ->status == 1    :   Completed
		// ->status == 0    :   Past Due, Not Marked as Completed

		foreach ( $data['appointments']  as $item ) { 
			if ($item->status == 2) {
				if (strtotime($item->date) < strtotime($currentDateTime)) {
					$array['status'] = 0;
					appointment::update($item->id, $array);				
				}
			} 
		}

		$data['appointments'] = appointment::select([], ['status' => 'desc']);

		
		if ($this->uri->segment(3)) {

	        $this->db->select('*');
	        $this->db->from('appointments'); 
	        $this->db->where('DATE(date)', $this->uri->segment(3));
	        $query = $this->db->get();
	        $data['appointments'] = $query->result();
		}

		$this->load->view('admin/appointments/appointments', $data);
	}	



	public function create_appointment()
	{
		$this->load->view('admin/appointments/create_appointment');
	} 

	public function shift()
	{
		if (ispost()) {
 
			$starting_date = postvalue('starting_date');
			$ending_date = postvalue('ending_date'); 


			for ($date = strtotime($starting_date); $date <= strtotime($ending_date); $date = strtotime("+1 day", $date)) 
			{
				$is_in = shift::find(['date' => date('Y-m-d', $date)]);
				$day = date('l', $date);
				if ( $is_in ) {
					if (postvalue('saturday') && $day === 'Saturday') {
						$data = [ 'date'=> date('Y-m-d', $date),
							'hour_08' => 0,
							'hour_09' => 0,
							'hour_10' => 0,
							'hour_11' => 0,
							'hour_12' => 0,
							'hour_13' => 0,
							'hour_14' => 0,
							'hour_15' => 0,
							'hour_16' => 0,
							'hour_17' => 0];
					} elseif(postvalue('sunday') && $day === 'Sunday') {
						$data = [ 'date'=> date('Y-m-d', $date),
							'hour_08' => 0,
							'hour_09' => 0,
							'hour_10' => 0,
							'hour_11' => 0,
							'hour_12' => 0,
							'hour_13' => 0,
							'hour_14' => 0,
							'hour_15' => 0,
							'hour_16' => 0,
							'hour_17' => 0];
					} else {
						$data = [ 'date'=> date('Y-m-d', $date),
							'hour_08' => postvalue('hour_08'),
							'hour_09' => postvalue('hour_09'),
							'hour_10' => postvalue('hour_10'),
							'hour_11' => postvalue('hour_11'),
							'hour_12' => postvalue('hour_12'),
							'hour_13' => postvalue('hour_13'),
							'hour_14' => postvalue('hour_14'),
							'hour_15' => postvalue('hour_15'),
							'hour_16' => postvalue('hour_16'),
							'hour_17' => postvalue('hour_17')];
					}

					shift::update($is_in->id, $data);
				} else {

					if (postvalue('saturday') && $day === 'Saturday') {
						continue;
					} elseif(postvalue('sunday') && $day === 'Sunday') {
						continue;
					} else {
						$data = ['date'=> date('Y-m-d', $date),
								'hour_08' => postvalue('hour_08'),
								'hour_09' => postvalue('hour_09'),
								'hour_10' => postvalue('hour_10'),
								'hour_11' => postvalue('hour_11'),
								'hour_12' => postvalue('hour_12'),
								'hour_13' => postvalue('hour_13'),
								'hour_14' => postvalue('hour_14'),
								'hour_15' => postvalue('hour_15'),
								'hour_16' => postvalue('hour_16'),
								'hour_17' => postvalue('hour_17')];

						shift::insert($data);

					}
				}
				
			}
			flash('success','check', 'Working hours have been updated.'  ,'Working hours have been updated successfully.');	
			back();

		}
	}

	public function shift_pick_holiday($id)
	{
		if (ispost()) {
			$data = ['saturday' => postvalue('saturday'),
					'sunday' => postvalue('sunday'),
					'holiday_start' => postvalue('holiday_start'),
					'holiday_end' => postvalue('holiday_end')];

			shift::update($id, $data);
 			flash('success','check', 'Holidays have been marked.'  ,'No appointments will be scheduled on selected days.');	
			back();
		}
	}

	

	public function delete_appointment($id)
	{
		$appointment = appointment::find($id);

		if ($appointment) {
			appointment::delete($id);
 			flash('success','check', 'Appointment is deleted.'  ,'Appointment is deleted successfully.');	
			back();
		}
	}

	public function edit_appointment($id)
	{
		if (ispost()) {
			$appointment = appointment::find($id);

			if ($appointment) {

				$data = [
					'name_surname' => postvalue('name_surname'),
					'email' => postvalue('email'),
					'tel' => postvalue('tel'),
					'message' => postvalue('message'),
					'date' => postvalue('date') . ' ' . postvalue('time')];

				appointment::update($id, $data);
				flash('success','check', 'Appointment edited.'  ,'Patient information in the appointment has been updated.');	
				back();
			}
		}
	}

	public function appointment_complete($id)
	{
		$appointment = appointment::find($id);

		if ($appointment) {
			$data['status'] = 1;

			appointment::update($id, $data);
			flash('success','check', 'Appointment completed.'  ,'The appointment has been updated as completed.');	
			back();
		}
	}



	public function front_end()
	{
		$this->load->view('admin/appointments/front_end');
	} 

	public function book_appointment()
	{
		if (ispost()) { 
			$data = [
				'name_surname' => postvalue('name_surname'),
				'date' => postvalue('date'),
				'email' => postvalue('email'),
				'tel' => postvalue('tel'),
				'status' => 2,
				'message' => postvalue('message')];

			$time = date('H', strtotime(postvalue('date')));
			$filter_date = date('Y-m-d', strtotime(postvalue('date')));
			$this->db->where('DATE(date)', $filter_date);
			$query = $this->db->get('shift');
			$result = $query->result();
			$shift = ['hour_'.$time => null];
			shift::update($result[0]->id, $shift);


			appointment::insert($data);
			redirect('appointments/appointment_booked/'.$this->db->insert_id());

		}
	}

	public function appointment_booked($id)
	{
		if ( appointment::find($id) ) {
			$data['appointment'] = appointment::find($id); 
			$this->load->view('admin/appointments/appointment_booked', $data);
		} else {
			show_error('404');
		}
	}
}
