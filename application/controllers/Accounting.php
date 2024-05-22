<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        
        if (!$this->session->userdata('status')) {
            redirect('auth');
        }
	}

	

	public function cash_registers()
	{
		$this->load->view('admin/accounting/cash_registers');
	}

	public function delete_register($id)
	{
		transaction_history::delete(['register_id' => $id]);
		cash_registers::delete($id);
		flash('danger','check','Register deleted.', 'Register deleted successfully.');
		back();
	}
	public function add_register()
	{
		$data['name'] = strtoupper(postvalue('name'));
		cash_registers::insert($data);
		flash('success','check','Register created.', 'New register created successfully.');
		back();
	}
	public function edit_register($id)
	{	
		if(cash_registers::find($id)) {

			$register = cash_registers::find($id);
			$data['name'] = strtoupper(postvalue('name'));

			cash_registers::update($id, $data);
			flash('success','check','Register edited.', 'Register info is updated successfully.');
			back();	
		}
		
	}
	public function register_detail($id)
	{
		$try_input = transaction_history::sum('input' , ['currency' => 'try',  'register_id' => $id]);
		$try_output = transaction_history::sum('output' , ['currency' => 'try',  'register_id' => $id]);
		$try = $try_input - $try_output;

		$usd_input = transaction_history::sum('input' , ['currency' => 'usd',  'register_id' => $id]);
		$usd_output = transaction_history::sum('output' , ['currency' => 'usd',  'register_id' => $id]);
		$usd = $usd_input - $usd_output;

		$eur_input = transaction_history::sum('input' , ['currency' => 'eur',  'register_id' => $id]);
		$eur_output = transaction_history::sum('output' , ['currency' => 'eur',  'register_id' => $id]);
		$eur = $eur_input - $eur_output;

		$gbp_input = transaction_history::sum('input' , ['currency' => 'gbp',  'register_id' => $id]);
		$gbp_output = transaction_history::sum('output' , ['currency' => 'gbp',  'register_id' => $id]);
		$gbp = $gbp_input - $gbp_output;

		$update_db = ['gbp' => $gbp,
					'eur' => $eur,
					'usd' => $usd,
					'try' => $try];

		cash_registers::update($id, $update_db);

		$data = ['tl' => $try,
			'usd' => $usd,
			'gbp' => $gbp,
			'eur' => $eur,
			'transaction_history' => transaction_history::select(['register_id' => $id], ['id' => 'desc']),
			'register_id' => cash_registers::find($id)];

		$this->load->view('admin/accounting/register_detail', $data);

	}

	public function cash_deposit($id){

		$data = [ 'date' => postvalue('date'),
				'date' => postvalue('description'),
				'input' => postvalue('amount'),
				'output' => 0,
				'currency' => postvalue('currency'),
				'customer_id' => 0,
				'operation' => 1,
				'register_id' => $id];

		transaction_history::insert($data);

		flash('success','check','Cash deposited.', 'Cash deposited into register successfully.');
		back();

	}



	public function cash_withdrawal($id){

		$register = cash_registers::find($id);

		if (postvalue('target_register') != 0) {

			$data = [ 'date' => postvalue('date'),
				'description' => postvalue('description'),
				'input' => 0,
				'output' => postvalue('amount'),
				'currency' => postvalue('currency'),
				'customer_id' => 0,
				'register_id' => $id,
				'operation' => 2];
	
			transaction_history::insert($data);

			$data = [ 'date' => postvalue('date'),
				'description' => postvalue('description'),
				'input' => postvalue('amount'),
				'output' => 0,
				'currency' => postvalue('currency'),
				'customer_id' => 0,
				'register_id' => postvalue('target_register'),
				'operation' => 1];

			transaction_history::insert($data);

			flash('success','check','Transfer successfull.', 'Transfer between registers are completed. Withdrawal from this register.');
			back();
		} else {

			$data = [ 'date' => postvalue('date'),
				'description' => postvalue('description'),
				'input' => 0,
				'output' => postvalue('amount'),
				'currency' => postvalue('currency'),
				'customer_id' => 0,
				'register_id' => $id,
				'operation' => 2];
	
			transaction_history::insert($data);


			flash('success','check','Cash withdrawn.', 'Cash withdrawn from register.');
			back();
		}
	}

	


	public function customers()
	{
		$data['customers'] = customers::select();
		$this->load->view('admin/accounting/customers', $data);
	}

	public function edit_customer($id)
	{
		$customer = customers::find($id);
		
		$data['customer'] = postvalue('customer');
		customers::update($id, $data);

		flash('success','check','Customer edited.', 'Customer info is updated successfully.');
		back(); 

	}

	public function add_customer()
	{
		$data['customer'] = postvalue('customer');
		customers::insert($data);

		flash('success','check','Customer added .', 'New customer created successfully.');
		back();	
	}
	public function delete_customer($id) 
	{
		transaction_history::delete(['customer_id' => $id]);
		customers::delete($id);

		flash('danger','check','Customer deleted .', 'Customer deleted successfully.');
		back();
	}
	public function customer_detail($id)
	{
		$try_input = transaction_history::sum('input' , ['currency' => 'try', 'customer_id' => $id]);
		$try_output = transaction_history::sum('output' , ['currency' => 'try', 'customer_id' => $id]);
		$try = $try_output - $try_input;

		$usd_input = transaction_history::sum('input' , ['currency' => 'usd', 'customer_id' => $id]);
		$usd_output = transaction_history::sum('output' , ['currency' => 'usd', 'customer_id' => $id]);
		$usd = $usd_output - $usd_input;

		$gbp_input = transaction_history::sum('input' , ['currency' => 'gbp', 'customer_id' => $id]);
		$gbp_output = transaction_history::sum('output' , ['currency' => 'gbp', 'customer_id' => $id]);
		$gbp = $gbp_output - $gbp_input;

		$eur_input = transaction_history::sum('input' , ['currency' => 'eur', 'customer_id' => $id]);
		$eur_output = transaction_history::sum('output' , ['currency' => 'eur', 'customer_id' => $id]);
		$eur = $eur_output - $eur_input;

		$customer_balance = ['try' => $try,
						'usd' => $usd,
						'gbp' => $gbp,
						'eur' => $eur];

		customers::update($id, $customer_balance);

		$data = [
			'try' => $try,
			'try_input' => $try_input,
			'try_output' => $try_output,
			'gbp' => $gbp,
			'gbp_input' => $gbp_input,
			'gbp_output' => $gbp_output,
			'usd' => $usd,
			'usd_input' => $usd_input,
			'usd_output' => $usd_output,
			'eur' => $eur,
			'eur_input' => $eur_input,
			'eur_output' => $eur_output,
			'transaction_history' => transaction_history::select(['customer_id' => $id], ['id' => 'desc']),
			'customer' => customers::find($id)];
			
		$this->load->view('admin/accounting/customer_detail', $data);
	}

	public function customer_receive_payment($id)
	{
		$data = [ 'date' => postvalue('date'),
				'description' => postvalue('description'),
				'input' => postvalue('amount'),
				'output' => 0,
				'currency' => postvalue('currency'),
				'customer_id' => $id,
				'register_id' => postvalue('register_id'),
				'operation' => 4];
	
		transaction_history::insert($data);
		

		flash('success','check','Payment Received.', 'Payment received successfully.');
		back();
	}

	public function customer_make_payment($id)
	{
		$data = [ 'date' => postvalue('date'),
				'description' => postvalue('description'),
				'input' => 0,
				'output' => postvalue('amount'),
				'currency' => postvalue('currency'),
				'customer_id' => $id,
				'register_id' => postvalue('register_id'),
				'operation' => 3];
	
		transaction_history::insert($data);

		flash('success','check','Payment made.', 'Payment is made successfully.');
		back();
	}


	


}