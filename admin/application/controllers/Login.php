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
        // $this->session->set_userdata( 'comtitle', 'Login' );
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

	public function resend_otp(){
		
		$mobile_no=$this->session->userdata('phone_no');
		$new_otp = $this->generate_otp();
		$otp_change = [
			'otp' => $new_otp
		];

		$this->db->where('phone_no ', $mobile_no )->update('user_login_credential', $otp_change);

		$this->session->set_userdata([
			'otp' => $new_otp
		]);
	}

	public function login_check()
	{
		$user_mobile = $this->input->post('mobile');
		

		// Query to check user credentials
		$this->db->where('phone_no', $user_mobile);
		$this->db->where('status !=',2);     
		$row_res = $this->db->get('user_login_credential')->row();

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
			echo json_encode(["response" => 9]);
			return;
		}

		else {
			$new_otp = $this->generate_otp();
			
			$token = (new DateTime())->getTimestamp() * 1000;
			$status_change = [
				'access_token' => $token,
				'otp' => $new_otp
			];
			$this->db->where('user_login_credential_id ', $row_res->user_login_credential_id )->update('user_login_credential', $status_change);

			// Set session data
			$this->session->set_userdata([
				// 'user_id' => $row_res->user_login_credential_id,
				'phone_no' => $row_res->phone_no,
				'name' => $row_res->name,
				'user_profile_image' => $row_res->photo ? $row_res->photo : '',
				'email_id' => $row_res->email_id,
				'access_token' => $token,
				'otp' => $new_otp
			]);

			echo json_encode(["response" => 8]);
		}
	}

	function verify_otp_check(){
		
		$otp   = $this->input->post('otp');
		$mobile_no = $this->input->post('mobile');

		// Fetch OTP from database
		$query  = $this->db->select('*')->from('user_login_credential')->where('phone_no', $mobile_no)->limit(1)->get();
		$result = $query->row();

		if($result){
			$this->session->set_userdata([
				'user_id' => $result->user_login_credential_id,
			]);
		}
		

		if ($result && $result->otp == $otp) {

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

	// public function verify_otp_check()
	// {
	// 	// print_r($this->session->userdata('user_id'));
	// 	// 	exit;
	// 	// Get OTP and email from input
	// 	$otp   = $this->input->post('code_1') . $this->input->post('code_2') . $this->input->post('code_3') . $this->input->post('code_4') . $this->input->post('code_5') . $this->input->post('code_6');
	// 	$mobile_no = $this->input->post('mobile');
		

	// 	// Fetch OTP from database
	// 	$query  = $this->db->select('*')->from('user_login_credential')->where('phone_no', $mobile_no)->limit(1)->get();
	// 	$result = $query->row();
		
	// 	if($result){
	// 		$this->session->set_userdata([
	// 			'user_id' => $result->user_login_credential_id,
	// 		]);

	// 		print_r($this->session->userdata('user_id'));
	// 		exit;
	// 	}
	// 	print_r($this->session->userdata('user_id'));
	// 		exit;

	// 	if ($result && $result->otp === $otp) {
	// 		// OTP is valid
	// 		return redirect('/Dashboard');
	// 	} else {
			
	// 	}
	// }



	public function logout()
	{
		// Retrieve user ID and IP address

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
