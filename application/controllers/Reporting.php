<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporting extends CI_Controller {

	public function __construct() {
        parent::__construct();

		if(!$this->session->userdata('status'))
		{
			redirect('admin');
		}
    }


     public function index() {
        // Line chart
        $this->db->select("DATE_FORMAT(date, '%m/%d/%Y') as time, COUNT(*) as message_count");
        $this->db->from('messages');
        $this->db->group_by('time');
        $this->db->order_by('time', 'ASC');
        $query = $this->db->get();
        $data['message_data'] = $query->result_array();

        // Pie chart 
        $this->db->select('usd, try, eur, gbp');
        $this->db->from('cash_registers');
        $this->db->where('id', 4); 
        $query = $this->db->get();


        
        if ($query->num_rows() > 0) {
            $data['cash_register_data'] = $query->row_array();
        } else {
            $data['cash_register_data'] = [
                'usd' => 0,
                'try' => 0,
                'eur' => 0,
                'gbp' => 0
            ];
        }

        // Negatif değerleri sıfıra dönüştür
        foreach ($data['cash_register_data'] as $key => $value) {
            if ($value < 0) {
                $data['cash_register_data'][$key] = 0;
            }
        }



        // Bar chart verilerini çek
        $this->db->select('usd, try, eur, gbp');
        $this->db->from('customers');
        $this->db->where('id', 2);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $data['customer_balance_data'] = $query->row_array();
        } else {
            $data['customer_balance_data'] = [
                'usd' => 0,
                'try' => 0,
                'eur' => 0,
                'gbp' => 0
            ];
        }

        $this->load->view('admin/reporting/reports', $data);
    }


}