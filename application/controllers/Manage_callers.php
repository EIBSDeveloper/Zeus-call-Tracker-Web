<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Manage_callers functions
***************************************************************************************/

class Manage_callers extends CI_Controller {

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
    Purpose : To handle Manage_callers function
    *****************************************************************************************/

    public function index() {
		$user_id=$this->session->userdata['user_id'];

		$data['user_data']=$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,w.amount,a.company_id')
			->from('subscriber b')
			->join('user a', 'a.user_id = b.user_id', 'left')
			->join('package p', 'p.package_id = b.package_id', 'left')
			->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
			->where('a.status!=', '2')
			->where_not_in('b.status',[2,3])
			->where('b.user_id', $user_id)
			->get()
			->row();

		$data['caller_data']=$this->db->select('b.*')
		->from('user b')
		->where('b.company_id',$data['user_data']->company_id )
		->where('b.is_manager', 1)
		->get()
		->result();

		$data['sub_package']=$this->db->select('p.*')
		->from('subscriber b')
		->join('user a', 'a.user_id = b.user_id', 'left')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->where('a.status!=', '2')
		->where_not_in('b.status',[2,3])
		->where('b.user_id', $user_id)
		->get()
		->result();

		$data['dept_list']=$this->db->select('department.*')
		->from('department')
		->where('status', '0')
		->get()
		->result();

		// print_r($data['sub_package']);
		// exit;

		$data['caller_list'] = $this->db->select('u.*, d.department_name, p.package_name')
		->from('user u')
		->join('subscriber a', 'a.user_id = u.user_id', 'left')
		->join('package p', 'p.package_id = u.package_id', 'left')
		->join('department d', 'd.department_id = u.department_id', 'left')
		// ->where('a.status', '0') // Filter by subscriber status
		->where('u.status !=', '2') // Exclude users with status 2
		->where('u.created_by', $user_id) // Match the created_by field
		->get()
		->result();

		
        $this->load->view( 'manage_callers/list',$data );
    }

    public function view_callers($id) {

		$caller_id = $id;
		$user_id=$this->session->userdata['user_id'];
		$data['caller'] = $this->db->select('u.*, d.department_name, p.package_name')
		->from('user u')
		->join('subscriber a', 'a.user_id = u.user_id', 'left')
		->join('package p', 'p.package_id = u.package_id', 'left')
		->join('department d', 'd.department_id = u.department_id', 'left')
		->where('u.status !=', '2') // Exclude users with status 2
		->where('u.created_by', $user_id) // Match the created_by field
		->where('u.user_id', $caller_id) // Match the created_by field
		->get()
		->row();
        $this->load->view( 'manage_callers/view',$data );
    }

	public function add_caller(){
		$user_id=$this->session->userdata['user_id'];
		// print_r($this->input->post());
		// exit;

		$is_manager = $this->input->post("is_manager") ?? 0;
		$subscription_id = $this->input->post("subscription_id");
		$package_id = $this->input->post("package_id");
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$mobile_no = $this->input->post("mobile_no");
		$dept_id = $this->input->post("dept_id");
		$descrip_caller = $this->input->post("descrip_caller");

		if (isset($_FILES['logo'])) {
			$this->load->library('upload');
			$config['upload_path'] = 'assets/Images/user'; // Directory where files will be saved
			$config['allowed_types'] = 'png|jpg|jpeg'; // Allowed file types
			$config['max_size'] = 2048; // Maximum file size in kilobytes
			$config['file_name'] = get_next_User_filename($config['upload_path']);

	
			// Initialize upload library with config
			$this->upload->initialize($config);
			// Perform the file upload
			if ($this->upload->do_upload('logo')) {
				$upload_data = $this->upload->data();
				$data['logo'] = $upload_data['file_name'];
			} else {
				$data['logo'] = "";
			}
		} else {
			// echo "No file uploaded or upload error.";
		}
		
			$subscr_id=$this->input->post("subscriber_id_buy");
			$subscribtion_details = $this->db->where('subscriber_id ', $subscription_id)
										->where('status', 0)
										->get('subscriber')
										->row();
			$available_callers= $subscribtion_details->available_callers;

			$data['created_by'] = $user_id;
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_by'] = $user_id;
			$data['updated_at'] = date('Y-m-d H:i:s');
			// Function to generate formatted codes
			function request_num($input, $pad_len = 3, $prefix = null) {
				if (is_string($prefix)) {
					return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
				}
				return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
			}

			// Generate 'user_code'
			$last_usrid_detail = $this->db->query("SELECT * FROM `user` ORDER BY user_id DESC LIMIT 1")->row();
			$year = substr(date("y"), -2);

			if ($last_usrid_detail) {
				$last_data = $last_usrid_detail->user_code;
				$result = preg_replace('/[^0-9]/', '', explode("/", $last_data)[0]);
				$data['user_code'] = request_num(((int)$result + 1), 3, "USR-") . '/' . $year;
			} else {
				$data['user_code'] = 'USR-001/' . $year;
			}

			// Insert into 'user' table
			$insert_user = [
				'user_code' => $data['user_code'],
				'name' =>$first_name,
				'nick_name' => $last_name,
				'phone_no' => $mobile_no,
				'is_manager' => $is_manager,
				'package_id' => $package_id,
				'department_id' => $dept_id,
				'company_id' => $subscribtion_details->company_id,
				'image' => $data['logo'],
				'description' => $descrip_caller,
				'created_by' =>$data['created_by'],
				'created_on' =>$data['created_at'],
				'modified_by' =>$data['updated_by'],
				'modified_on' =>$data['updated_at'],
				'status' => 0,
			];


		if($this->db->insert('user', $insert_user)){
			$insert_data = [
				'available_callers' => $available_callers + 1,
				'updated_by' => $data['updated_by'],
				'updated_at' => $data['updated_at'],
			];
			$this->db->where('subscriber_id', $subscription_id);
			$update_success = $this->db->update('subscriber', $insert_data);

			$this->session->set_flashdata('g_success', 'Add Caller successfully...');
		}else {
			$this->session->set_flashdata('g_err', 'Could not Add Caller!');
		}
		redirect('Manage_callers');
	}

	public function edit_caller(){

		$id = $_POST['id'];
		$data['user_data'] = $this->db->select('u.*, d.department_name, p.package_name,p.duration,p.period')
		->from('user u')
		->join('package p', 'p.package_id = u.package_id', 'left')
		->join('department d', 'd.department_id = u.department_id', 'left')
		->where('u.status !=', '2') // Exclude users with status 2
		->where('u.user_id', $id)// Match the created_by field
		->get()
		->row();
		
		$data['dept_list']=$this->db->select('department.*')
		->from('department')
		->where('status', '0')
		->get()
		->result();

		$this->load->view( 'manage_callers/edit_caller',$data);

	}


	public function subscription_list(){

		$user_id=$this->session->userdata['user_id'];

			// Pagination parameters
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$limit = $this->input->post('sorting_filter') ? $this->input->post('sorting_filter') : '10';;
			$offset = ($page - 1) * $limit;

			// Filter parameters
			$data['perpage'] = $limit;
			$data['page'] = $page;
			
			$data['package_list']=$this->db->select('package.*')
			->from('package')
			->where('status', '0')
			->order_by('package_id', 'DESC')
			->get()
			->result();


			// Get search filters from POST request
			$fill_data['user_name_fill'] = $this->input->post('user_name_fill') ? $this->input->post('user_name_fill') : '';
			$fill_data['comp_name_fill'] = $this->input->post('comp_name_fill') ? $this->input->post('comp_name_fill') : '';
			$fill_data['user_mobile_fill'] = $this->input->post('user_mobile_fill') ? $this->input->post('user_mobile_fill') : '';
			$fill_data['package_id_fill'] = $this->input->post('package_id_fill') ? $this->input->post('package_id_fill') : '';
			$subscriber_status_fill = $this->input->post('subscriber_status_fill');
			$fill_data['subscriber_status_fill'] = isset($subscriber_status_fill) ? $subscriber_status_fill : '';
			

			// Date filtering
			$data['dt_fill'] = $this->input->post('dt_fill_select_value');
			$data['from_date_fillter'] = $this->input->post('from_date_fillter_textbox');
			$data['to_date_fillter'] = $this->input->post('to_date_fillter_textbox');
	
			$fdate = '';
			$tdate = '';
			
			// Handle different date filter cases
			if ($data['dt_fill'] == "today") {
				$data['today_date_fillter'] = date("Y-m-d");
				$fdate = "DATE(b.created_at) = '" . $data['today_date_fillter'] . "'";
			} elseif ($data['dt_fill'] == "week") {
				$data['week_from_date_fillter'] = date('Y-m-d', strtotime("last sunday"));
				$data['week_to_date_fillter'] = date('Y-m-d', strtotime("next saturday"));
				$fdate = "DATE(b.created_at) >= '" . $data['week_from_date_fillter'] . "'";
				$tdate = "DATE(b.created_at) <= '" . $data['week_to_date_fillter'] . "'";
			} elseif ($data['dt_fill'] == "monthly") {
				$first = date('Y-m-01');
				$last = date('Y-m-t');
				$fdate = "DATE(b.created_at) >= '" . $first . "'";
				$tdate = "DATE(b.created_at) <= '" . $last . "'";
			} elseif ($data['dt_fill'] == "Custom date") {
				if ($data['from_date_fillter'] != '') {
					$first = date('Y-m-d', strtotime($data['from_date_fillter']));
					$fdate = "DATE(b.created_at) >= '" . $first . "'";
				}
	
				if ($data['to_date_fillter'] != '') {
					$last = date('Y-m-d', strtotime($data['to_date_fillter']));
					$tdate = "DATE(b.created_at) <= '" . $last . "'";
				}
			}
			
			
		$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,w.amount')
			->from('subscriber b')
			->join('user a', 'a.user_id = b.user_id', 'left')
			->join('package p', 'p.package_id = b.package_id', 'left')
			->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
			->where('a.status!=', '2')
			->where('b.status!=', '2')
			->where('b.user_id', $user_id)
			->group_by('b.subscriber_id')
			->order_by('b.subscriber_id', 'DESC');

			if (!empty($fill_data['user_name_fill'])) {
				$this->db->like('a.name', $fill_data['user_name_fill']);
			}
			if (!empty($fill_data['comp_name_fill'])) {
				$this->db->like('b.company_name', $fill_data['comp_name_fill']);
			}
			if (!empty($fill_data['user_mobile_fill'])) {
				$this->db->like('b.mobile_no', $fill_data['user_mobile_fill']);
			}
			if (!empty($fill_data['package_id_fill'])) {
				$this->db->like('b.package_id', $fill_data['package_id_fill']);
			}
		
			if (isset($fill_data['subscriber_status_fill']) && $fill_data['subscriber_status_fill'] !== '') {
				$this->db->where('b.status', $fill_data['subscriber_status_fill']);
			}
			
	
			// Apply date filtering
			if (!empty($fdate)) {
				$this->db->where($fdate);
			}
			if (!empty($tdate)) {
				$this->db->where($tdate);
			}

			$this->db->limit($limit, $offset);
			$result = $this->db->get()->result();
			$data['subscriber_data'] = $result;

				// Start building the query
		$count_data =$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,w.amount,w.no_of_callers')
		->from('subscriber b')
		->join('user a', 'a.user_id = b.user_id', 'left')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
		->where('a.status!=', '2')
		->where('b.user_id', $user_id)
		->where('b.status!=', '2')
		->group_by('b.subscriber_id'); // Exclude members with status 2

		// Apply filtering for search fields
		if (!empty($fill_data['user_name_fill'])) {
			$count_data->like('a.name', $fill_data['user_name_fill']);
		}
		if (!empty($fill_data['comp_name_fill'])) {
			$count_data->like('b.company_name', $fill_data['comp_name_fill']);
		}
		if (!empty($fill_data['user_mobile_fill'])) {
			$count_data->like('b.mobile_no', $fill_data['user_mobile_fill']);
		}
		if (!empty($fill_data['package_id_fill'])) {
			$this->db->like('b.package_id', $fill_data['package_id_fill']);
		}
		if (isset($fill_data['subscriber_status_fill']) && $fill_data['subscriber_status_fill'] !== '') {
			$this->db->where('b.status', $fill_data['subscriber_status_fill']);
		}

		// Apply date filtering
		if (!empty($fdate)) {
			$count_data->where($fdate);
		}
		if (!empty($tdate)) {
			$count_data->where($tdate);
		}
		$count = $count_data->get()->result();


		$data['count'] = count($count);
		
		

		$this->load->view( 'manage_callers/subscription_list',array_merge($data, $fill_data) );
	}

	public function get_subscriber_by_id() {
		$id = $_POST['id'];
		$data= $this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,a.name,a.image,w.amount')
		->from('subscriber b')
		->join('user a', 'a.user_id = b.user_id', 'left')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
		->where('a.status!=', '2')
		->where('b.status!=', '2')
		->where('b.subscriber_id', $id)
		->get()
		->row();

		if ($data) {
			$data->renewal_days_count = renewal_days_count($data->subscriber_id); // Assuming `renewal_days_count` is the helper function
		}
	
		// Send the response as a JSON object
		echo json_encode($data);  // Corrected: JSON encoding to send the data
	}

	public function buy_more_caller(){
		$user_id=$this->session->userdata['user_id'];
		// print_r($this->input->post());
		// exit;
		$data = [
			'add_more_caller' => $this->input->post("add_more_caller"),
			'sub_amount_buy' => $this->input->post("sub_amount_buy"),
			'gst_per_buy' => $this->input->post("gst_per_buy"),
			'gst_amount_buy' => $this->input->post("gst_amount_buy"),
			'total_amount' => $this->input->post("total_amount_buy"),
		];

		$subscr_id=$this->input->post("subscriber_id_buy");
		$subscribtion_details = $this->db->where('subscriber_id ', $subscr_id)
									->where('status', 0)
									->get('subscriber')
									->row();
		$package_details = $this->db->where('package_id', $subscribtion_details->package_id)
		->where('status', 0)
		->get('package')
		->row();

		$data['created_by'] = $user_id;
		$data['created_at'] = date('Y-m-d H:i:s');
		$data['updated_by'] = $user_id;
		$data['updated_at'] = date('Y-m-d H:i:s');

		$last_scrhsid_detail = $this->db->query("SELECT * FROM `subscriber_details` ORDER BY subscriber_details_id DESC LIMIT 1")->row();
		$year = substr(date("y"), -2);
		// Function to generate formatted codes
		function request_num($input, $pad_len = 3, $prefix = null) {
			if (is_string($prefix)) {
				return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
			}
			return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
		}

		if ($last_scrhsid_detail) {
			$last_data_sc = $last_scrhsid_detail->subscriber_detail_no;
			$result = preg_replace('/[^0-9]/', '', explode("/", $last_data_sc)[0]);
			$data['subscriber_detail_no'] = request_num(((int)$result + 1), 3, "SDH-") . '/' . $year;
		} else {
			$data['subscriber_detail_no'] = 'SDH-001/' . $year;
		}
		$insert_subscriber_hist = [
			'subscriber_detail_no' => $data['subscriber_detail_no'],
			'subscriber_id' => $subscr_id,
			'package_id' => $subscribtion_details->package_id,
			'no_of_callers' => $data['add_more_caller'],
			'amount' => $data['sub_amount_buy'],
			'gst_amount' => $data['gst_amount_buy'],
			'paid_amount' => $data['total_amount'],
			'start_date' => $subscribtion_details->start_date,
			'end_date' => $subscribtion_details->end_date,
			'period' => $package_details->period,
			'duration' => $package_details->duration,
			'created_by' => $data['created_by'],
			'created_at' => $data['created_at'],
			'updated_by' => $data['updated_by'],
			'updated_at' => $data['updated_at'],
			'status' => 0,
		];
		$buy_caller=$this->db->insert('subscriber_details', $insert_subscriber_hist);

		if($buy_caller){
			$insert_data = [
				'no_of_callers' => $data['add_more_caller'] + $subscribtion_details->no_of_callers,
				'updated_by' => $data['updated_by'],
				'updated_at' => $data['updated_at'],
				'status' => 0,
				
			];
			$this->db->where('subscriber_id', $subscr_id);
			$update_success = $this->db->update('subscriber', $insert_data);
			$this->session->set_flashdata('g_success', 'More Caller Buy successfully...');
		}else {
			$this->session->set_flashdata('g_err', 'Could not Buy More Caller!');
		}
		redirect('Manage_callers/subscription_list');

	}

	public function get_subscriber_history_view() {
		$id = $_POST['id'];
		$data['package_detail'] = $this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period')
		->from('subscriber b')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
		->where('b.status!=', '2')
		->where('b.subscriber_id', $id)
		->get()
		->row();

		$data['sub_history'] = $this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period')
		->from('subscriber_details b')
		->join('subscriber w', 'w.subscriber_id = b.subscriber_id', 'left')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->where('b.status!=', '2')
		->where_in('b.subscriber_id', $id)
		->order_by('b.subscriber_details_id ', 'DESC')
		->get()
		->result();
	
		// Send the response as a JSON object
		$this->load->view( 'manage_callers/subscription_histry_view',$data);
	}

	public function chk_mobile_unique()
	{
		$mobile_no = $_POST['mobile_no'];
		$result = $this->db->query("SELECT * from user
		 where status !='2' and phone_no='" . $mobile_no . "'")->row();

		if (isset($result)) {
			echo "1";
		} else {
			echo "0";
		}
	}

	public function deactivate_caller(){
		$user_id=$this->input->post("deactivate_id");

		$data=[
			'status'=>3,
		];
		$this->db->where('user_id', $user_id);
		$result_user = $this->db->update('user', $data);

		if ($result_user) {
			$this->session->set_flashdata('g_success', 'Caller have been Deactivated successfully...');
		} else {
			$this->session->set_flashdata('g_err', 'Could not Deactivated The Caller!');
		}
		redirect('Manage_callers');
	}

	public function change_status()
	{
		$user_id = $this->input->post('id');
		$status = $this->input->post('status');

		$data=[
			'status'=>$status,
		];
	
		$this->db->where('user_id', $user_id);
		$result = $this->db->update('user', $data);
		if ($result) {
			echo 1;
		} else {
			echo 0;
		}
		if ($result) {
			if ($status == 1) {
				$this->session->set_flashdata('g_success', 'User has been Inactive successfully.');
			} else {
				$this->session->set_flashdata('g_success', 'User has been Active successfully.');
			}
		} else {
			$this->session->set_flashdata('g_err', 'Something went wrong');
		}
	}

	
}
