<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Landing_page functions
***************************************************************************************/

class Landing_page extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (isset($this->session->userdata['user_id']) && $this->session->userdata['user_id'] == TRUE)
        {
            //do something
        }else{
            redirect('Login'); //if session is not there, redirect to login page
        }
        $this->load->model( array( 'Login_model' ) );
        date_default_timezone_set( 'Asia/Kolkata' );
        // $this->session->set_userdata( 'comtitle', 'Login' );
    }
    /****************************************************************************************
    Purpose : To handle Landing_page function
    *****************************************************************************************/
	
    public function index() {
		$user_id=$this->session->userdata['user_id'];
		$data['package_list'] = $this->db->select('package.*')
			->from('package')
			->where('package.status', 0)
			->get()
			->result();
		$descriptions = $this->db->select('package_description.package_id, package_description.description, package_description.yes_no')
			->from('package_description')
			->get()
			->result();
			$descriptions_arr = [];

		foreach ($descriptions as $desc) {
			$descriptions_arr[$desc->package_id][] = [
				'description' => $desc->description,
				'yes_no' => $desc->yes_no
			];
		}

		// Step 4: Add the descriptions array to each package
		foreach ($data['package_list'] as &$package) {
			if (isset($descriptions_arr[$package->package_id])) {
				$package->descriptions_arr = $descriptions_arr[$package->package_id];
			} else {
				$package->descriptions_arr = []; // No descriptions found for this package
			}
		}

		$data['subscriber_details']=$this->db->select('u.*,comp.company_name')
		->from('user u')
		->join('subscriber a', 'a.user_id = u.user_id', 'left')
		->join('company comp', 'comp.company_id = u.company_id', 'left')
		->where('u.status', 0)
		->where('u.user_id', $user_id)
		->get()
		->row();

        $this->load->view( 'landing_page',$data );
    }

	public function purchase_by_id() {
		$id = $_POST['id'];
		$data = $this->db->select('package.*')
			->from('package')
			->where('package.status', 0)
			->where('package.package_id', $id)
			->get()
			->row();
	
		// Send the response as a JSON object
		echo json_encode($data);  // Corrected: JSON encoding to send the data
	}


	public function purchase_package() {

		$user_id=$this->session->userdata['user_id'];
		// Get input data
		$data = [
			'phone_no' => $this->input->post("mobile_no"),
			'package_hidden_id' => $this->input->post("package_hidden_id"),
			'user_id_hidden' => $this->input->post("user_id_hidden"),
			'company_name' => $this->input->post("company_name"),
			'sub_first_name' => $this->input->post("sub_first_name"),
			'sub_last_name' => $this->input->post("sub_last_name"),
			'email_id' => $this->input->post("email_id"),
			'no_of_callers' => $this->input->post("no_of_callers"),
			'sub_total' => $this->input->post("sub_total"),
			'gst_per' => $this->input->post("gst_per"),
			'gst_amount' => $this->input->post("gst_amount"),
			'total_amount' => $this->input->post("total_amount"),
		];

		function request_num($input, $pad_len = 3, $prefix = null) {
			if (is_string($prefix)) {
				return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
			}
			return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
		}
		$year = substr(date("y"), -2);
		$package_details = $this->db->where('package_id', $data['package_hidden_id'])
									->where('status', 0)
									->get('package')
									->row();
		$period = $package_details->period; 
		$duration = $package_details->duration; 
	
		// Calculate start_date and end_date
		$start_date = new DateTime();
		$end_date = clone $start_date;
	
		if ($duration == 1) {
			$end_date->modify("+$period months");
		} elseif ($duration == 2) {
			$end_date->modify("+$period years");
		} elseif ($duration == 3) {
			$end_date = null; 
		}
	
		$start_date_formatted = $start_date->format('Y-m-d');
		$end_date_formatted = $end_date ? $end_date->format('Y-m-d') : null;
	
		// Check if a user with the same phone number exists
		$existing_user = $this->db->select('*')->where('user_id', $data['user_id_hidden'])
								  ->where('status', 0)
								  ->get('user')
								  ->row();
	

		// Insert into 'user' table
		$insert_data = [
			'name' => $data['sub_first_name'],
			'nick_name' => $data['sub_last_name'],
			'phone_no' => $data['phone_no'],
			'email_id' => $data['email_id'],
			'package_id' => $data['package_hidden_id'],
			'created_by' => $user_id,
			'status' => 0,
		];
		$this->db->where('user_id', $user_id);
		$result_user = $this->db->update('user', $insert_data);
		if($result_user){
			$auto_increment_value_sub = common_select_values('AUTO_INCREMENT', 'INFORMATION_SCHEMA.TABLES', 'TABLE_SCHEMA = database() AND TABLE_NAME = "subscriber"', 'row');
			$next_subsc_id = $auto_increment_value_sub->AUTO_INCREMENT;
		
			$last_scrid_detail = $this->db->query("SELECT * FROM `subscriber` ORDER BY subscriber_id DESC LIMIT 1")->row();
	
			if ($last_scrid_detail) {
				$last_data_sc = $last_scrid_detail->subscriber_no;
				$result = preg_replace('/[^0-9]/', '', explode("/", $last_data_sc)[0]);
				$data['subscriber_no'] = request_num(((int)$result + 1), 3, "SCR-") . '/' . $year;
			} else {
				$data['subscriber_no'] = 'SCR-001/' . $year;
			}
	
			$data['created_by'] = $user_id;
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_by'] = $user_id;
			$data['updated_at'] = date('Y-m-d H:i:s');
	
			// Insert into 'subscriber' table
			$insert_subscriber = [
				'subscriber_no' => $data['subscriber_no'],
				'user_id' => $user_id,
				'subscriber_first_name' => $data['sub_first_name'],
				'subscriber_last_name' => $data['sub_last_name'],
				'company_id' => $existing_user->company_id,
				'mobile_no' => $data['phone_no'],
				'email_id' => $data['email_id'],
				'no_of_callers' => $data['no_of_callers'],
				'available_callers' => 0,
				'sub_package_amount' => $data['sub_total'],
				'sub_paid_amount' => $data['total_amount'],
				'package_id' => $data['package_hidden_id'],
				'start_date' => $start_date_formatted,
				'end_date' => $end_date_formatted,
				'created_by' => $data['created_by'],
				'created_at' => $data['created_at'],
				'updated_by' => $data['updated_by'],
				'updated_at' => $data['updated_at'],
				'status' => 0,
			];
			if ($this->db->insert('subscriber', $insert_subscriber)) {
				// Generate 'subscriber_detail_no'
				$last_scrhsid_detail = $this->db->query("SELECT * FROM `subscriber_details` ORDER BY subscriber_details_id DESC LIMIT 1")->row();
	
				if ($last_scrhsid_detail) {
					$last_data_sc = $last_scrhsid_detail->subscriber_detail_no;
					$result = preg_replace('/[^0-9]/', '', explode("/", $last_data_sc)[0]);
					$data['subscriber_detail_no'] = request_num(((int)$result + 1), 3, "SDH-") . '/' . $year;
				} else {
					$data['subscriber_detail_no'] = 'SDH-001/' . $year;
				}
	
				// Insert into 'subscriber_details' table
				$insert_subscriber_hist = [
					'subscriber_detail_no' => $data['subscriber_detail_no'],
					'subscriber_id' => $next_subsc_id,
					'package_id' => $data['package_hidden_id'],
					'no_of_callers' => $data['no_of_callers'],
					'amount' => $data['sub_total'],
					'gst_amount' => $data['gst_amount'],
					'paid_amount' => $data['total_amount'],
					'start_date' => $start_date_formatted,
					'end_date' => $end_date_formatted,
					'period' => $period,
					'duration' => $duration,
					'created_by' => $data['created_by'],
					'created_at' => $data['created_at'],
					'updated_by' => $data['updated_by'],
					'updated_at' => $data['updated_at'],
					'status' => 0,
				];
	
				if ($this->db->insert('subscriber_details', $insert_subscriber_hist)) {
					redirect('Manage_callers/subscription_list');
				// 	$data_success = [
				// 	'phone_no' => $this->input->post("mobile_no"),
				// 	'transaction_id' => 'T1234-5678-9012-8050',
				// 	'package_name' => $package_details->package_name,
				// 	'period' => $period,
				// 	'duration' => $duration,
				// 	'no_of_callers' => $this->input->post("no_of_callers"),
				// 	'paid_amount' => $this->input->post("total_amount"),
				// ];
				// $purchase_success=true;

				// 	if($purchase_success){
				// 		$this->load->view( 'payment_success_page' ,$data_success);
				// 	}else{
				// 		$this->load->view('payment_failure_page');
				// 	}
				}
			}


		}
			
	}
	
	

    public function payment_failure() {
        $this->load->view( 'payment_failure_page' );
    }
    public function payment_success() {
        $this->load->view( 'payment_success_page' );
    }
}
?>
