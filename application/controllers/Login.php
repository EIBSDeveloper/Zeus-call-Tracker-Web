<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all login functions 2023-05-03
***************************************************************************************/

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( array( 'Login_model' ) );
        date_default_timezone_set( 'Asia/Kolkata' );

		$this->load->helpers('common_helper');
		$this->load->library('session');
        $this->session->set_userdata( 'comtitle', 'Login' );
    }
    /****************************************************************************************
    Purpose : To handle admin login function
    *****************************************************************************************/

    public function index() {
        $this->load->view( 'login' );
    }
    public function dashboard() {
        // print_r( base_url() );
        $this->load->view( 'dashboard/dashboard' );
    }
    public function verify_otp() {
		$this->load->view( 'verify_otp' );
    }

	public function generate_otp()
	{
		$OTP 	 =	rand(1, 9);
		$OTP 	.=	rand(0, 9);
		$OTP 	.=	rand(0, 9);
		$OTP 	.=	rand(0, 9);
		$OTP 	.=	rand(0, 9);
		$OTP 	.=	rand(0, 9);
		return $OTP;
	}


	public function login_check()
	{
		$user_mobile = $this->input->post('mobile');
		

		// Query to check user credentials
		$this->db->where('phone_no', $user_mobile);
		$this->db->where('status',0);     
		$row_res = $this->db->get('user')->row();

		// print_r($row_res);
		// exit();

		// Validate inputs
		if ($user_mobile == "" ) {
			echo json_encode(["response" => 1]);
			return;
		} 

		// Handle invalid credentials
		if (!$row_res) {
			echo json_encode(["response" => 0]);
			return;
		}

		// Handle user status
		if ($row_res->status == 1) {
			echo json_encode([
				"response" => 9,
				"status" => $row_res,
		]);
			return;
		}

		else {
			$new_otp = $this->generate_otp();
			
			$token = (new DateTime())->getTimestamp() * 1000;
			$status_change = [
				'access_token' => $token,
				'otp' => $new_otp
			];
			$this->db->where('user_id ', $row_res->user_id )->update('user', $status_change);

			// Set session data
			$this->session->set_userdata([
				// 'user_id' => $row_res->user_id ,
				'phone_no' => $row_res->phone_no,
				'name' => $row_res->name,
				// 'user_profile_image' => $row_res->photo ? $row_res->photo : '',
				// 'email_id' => $row_res->email_id,
				'access_token' => $token,
				'otp' => $new_otp
			]);

			
			// // Update login history
			// $user_id = $this->session->userdata('user_id');
			// $ip_address = getHostByName(getHostName());

			// $data_get = $this->db->select('*')
			// 	->from('user_log')
			// 	->where('user_id', $user_id)
			// 	->where('ip_address', $ip_address)
			// 	->where('status', 0)
			// 	->order_by('sno', 'desc')
			// 	->get()
			// 	->row();

			// if ($data_get) {
			// 	$last_id = $data_get->sno;
			// 	$log = $data_get->log_in_time;
			// 	$login = date('H:i:s', strtotime($log));
			// 	$logout = date('H:i:s');
			// 	$start_datetime = new DateTime($login);
			// 	$end_datetime = new DateTime($logout);
			// 	$diff = $start_datetime->diff($end_datetime);
			// 	$dur = sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s);

			// 	$data = [
			// 		'log_out_time' => date('Y-m-d H:i:s'),
			// 		'duration' => $data_get->duration == '00:00:00' || empty($data_get->duration) ? $dur : $data_get->duration,
			// 	];

			// 	$this->db->where('sno', $last_id)->update('user_log', $data);
			// }

			// $this->login();

			echo json_encode(["response" => 8]);
		}
	}

	function verify_otp_check(){
		
		$otp   = $this->input->post('otp');
		$mobile_no = $this->input->post('mobile');

		// Fetch OTP from database
		$query  = $this->db->select('*')->from('user')->where('phone_no', $mobile_no)->where('status',0)->order_by('created_on', 'DESC')->limit(1)->get();
		$result = $query->row();

		if($result){
			$this->session->set_userdata([
				'user_id' => $result->user_id,
			]);
		}

		if ($result && $result->otp == $otp) {

			// $cookie_expiration = 90 * 24 * 60 * 60; // 90 days
			// set_cookie("phone_no", $mobile_no, $cookie_expiration);

			$user_id = $this->session->userdata('user_id');
			
			
			$ip_address = getHostByName(getHostName());

			$data_get = $this->db->select('*')
				->from('user_log')
				->where('user_id', $user_id)
				->where('ip_address', $ip_address)
				->where('status', 0)
				->order_by('sno', 'desc')
				->get()
				->row();

			if ($data_get) {
				$last_id = $data_get->sno;
				$log = $data_get->log_in_time;
				$login = date('H:i:s', strtotime($log));
				$logout = date('H:i:s');
				$start_datetime = new DateTime($login);
				$end_datetime = new DateTime($logout);
				$diff = $start_datetime->diff($end_datetime);
				$dur = sprintf('%02d:%02d:%02d', $diff->h, $diff->i, $diff->s);

				$data = [
					'log_out_time' => date('Y-m-d H:i:s'),
					'duration' => $data_get->duration == '00:00:00' || empty($data_get->duration) ? $dur : $data_get->duration,
				];

				$this->db->where('sno', $last_id)->update('user_log', $data);
			}

			$this->login();
			echo json_encode([
				"response" => 1,
			]);

			return;
		}else{
			echo json_encode([
				"response" => 0,
				
		]);
			return;
		}
	}

	public function login()
	{
		$ip_address = getHostByName(getHostName());
		$user_id = $this->session->userdata('user_id');

		$data = [
			'user_id' => $user_id,
			'ip_address' => $ip_address,
			'log_in_time' => date('Y-m-d H:i:s'),
		];

		// Insert data into the 'user_log' table
		$result = $this->db->insert('user_log', $data);
	}

	public function logout()
	{
		// Retrieve user ID and IP address


		$user_id = $this->session->userdata('user_id');
	
		$ip_address = getHostByName(getHostName());
		$status_change = [
			'login_status' => 1,
			// 'last_active_time' =>date('Y-m-d H:i:s'),
		];
		$up = $this->db->where('user_id', $user_id)->update('user', $status_change);

		// Fetch the latest log entry for the user
		$data_get = $this->db->select('*')
			->from('user_log')
			->where('user_id', $user_id)
			->where('ip_address', $ip_address)
			->where('status', 0)
			->order_by('sno', 'desc')
			->get()
			->row();

		// Check if a record is found
		if ($data_get) {
			$last_id = $data_get->sno;
			$log = $data_get->log_in_time;

			$login = date('H:i:s', strtotime($log));
			$logout = date('H:i:s');

			$start_datetime = new DateTime($login);
			$diff = $start_datetime->diff(new DateTime($logout));

			// Format the duration
			$dur = $diff->h . ':' . $diff->i . ':' . $diff->s;

			// Update the login history with logout time and duration
			$data = [
				'log_out_time' => date('Y-m-d H:i:s'),
				'duration' => $dur,
				'status' => 1,
			];

			$this->db->where('sno', $last_id)
				->update('user_log', $data);
		}

		// Clear session data
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			$this->session->unset_userdata($key);
		}

		// Delete cookies
		delete_cookie("phone_no");
		

		// Redirect to login page
		redirect(base_url("Login"));
	}
}
?>
