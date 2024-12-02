<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Dashboard functions 2023-05-03
***************************************************************************************/

class Dashboard extends CI_Controller {

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
		$this->session->set_userdata('comtitle', 'Dashboard');
        // $this->session->set_userdata( 'comtitle', 'Login' );
    }
    /****************************************************************************************
    Purpose : To handle Dashboard function
    *****************************************************************************************/

    public function index() {

        $call_start_date = date('Y-m-01');  // Start date (first day of the month)
		$call_end_date = date('Y-m-t');  
		$today_date = date('Y-m-d');  
        $current_month = date('Y-m');
	
		$user_id=$this->session->userdata['user_id'];
		$subquery = $this->db->select('phone_no')
    	->from('company_cug_detail')
    	->get()
    	->result_array(); // Fetch all phone numbers as an array

		// Get the incoming call count excluding the phone numbers in company_cug_detail
		$incoming_call_count = $this->db->select('COUNT(*) as incoming_call')
			->from('call_log a')
			->join('contact_book b', 'a.contact_book_id = b.contact_book_id', 'left')
			->join('user u', 'u.user_id = a.user_id', 'left')
			->where('u.created_by', $user_id)
            ->where('a.call_date', $today_date)  // Filter by user ID
			->where('a.redirected_to', 0) // Redirected to 0
			->where('a.status', 1) // Status is 1
			->where_not_in('b.phone_no', array_column($subquery, 'phone_no')) // Exclude phone numbers in company_cug_detail
			->get()
			->row();
		
		$data['incoming_call_count'] = $incoming_call_count= $incoming_call_count->incoming_call;

		// Get the outgoing call count excluding the phone numbers in company_cug_detail
		$outgoing_call_log_result = $this->db->select('COUNT(*) as outgoing_call')
		->from('call_log a')
		->join('contact_book b', 'a.contact_book_id = b.contact_book_id', 'left')
		->join('user u', 'u.user_id = a.user_id', 'left')
		->where('u.created_by', $user_id) 
        ->where('a.call_date', $today_date)// Filter by user ID
		->where('a.redirected_to', 0) // Redirected to 0
		->where('a.status', 0) // Status is 0
		->where('a.duration !=', '00:00:00') // Duration is not '00:00:00'
		->where_not_in('b.phone_no', array_column($subquery, 'phone_no')) // Exclude phone numbers in company_cug_detail
		->get()
		->row();

		// Assign the result to a variable
		$data['outgoingcall_count'] =$outgoingcall_count = $outgoing_call_log_result->outgoing_call;

		// missed call
		$missed_call_log_result = $this->db->select('COUNT(*) as missed_call')
		->from('call_log a')
		->join('contact_book b', 'a.contact_book_id = b.contact_book_id', 'left')
		->join('user u', 'u.user_id = a.user_id', 'left')
		->where('u.created_by', $user_id)
        ->where('a.call_date', $today_date) // Filter by user ID
		->where('a.redirected_to', 0) // Redirected to 0
		->where('a.status', 2) // Status is 2 for missed calls
		->where('a.missed_status', 0) // Missed status is 0
		->where_not_in('b.phone_no', array_column($subquery, 'phone_no')) // Exclude phone numbers in company_cug_detail
		->get()
		->row();

		$rejected_call_log_result = $this->db->select('COUNT(*) as rejected_call')
			->from('call_log a')
			->join('contact_book b', 'a.contact_book_id = b.contact_book_id', 'left')
			->join('user u', 'u.user_id = a.user_id', 'left')
			->where('u.created_by', $user_id)
            ->where('a.call_date', $today_date) // Filter by user ID
			->where('a.redirected_to', 0) // Redirected to 0
			->where('a.status', 3) // Status is 3 for rejected calls
			->where_not_in('b.phone_no', array_column($subquery, 'phone_no')) // Exclude phone numbers in company_cug_detail
			->get()
			->row();

		// Assign the result to a variable
		$data['rejected_call_count']=$rejected_call = $rejected_call_log_result->rejected_call;

		// Assign the result to a variable
		$data['missedcall_count']= $missedcall_count= $missed_call_log_result->missed_call;

        // 
        // print_r("mc-",$missedcall_count);
        // print_r("rc-",$rejected_call);
        // print_r("mcr-",$missed_call_ratio);
       
      

        $data['missed_call_ratio'] = 0;

        if ($incoming_call_count > 0 && $missedcall_count >= 0 && $rejected_call >= 0) {
            $total_calls = $incoming_call_count + $missedcall_count + $rejected_call;
            if ($total_calls > 0) {
                $missed_call_ratio = ($missedcall_count / $total_calls) * 100;
                $data['missed_call_ratio'] = $missed_call_ratio;
            } else {
                $data['missed_call_ratio'] = 0;
            }
        }

        $data['outgoing_call_ratio'] = 0;

        if ($incoming_call_count > 0 && $missedcall_count >= 0 && $rejected_call >= 0) {
            $total_calls_all = $incoming_call_count + $missedcall_count + $rejected_call+$outgoingcall_count;
            if ($total_calls > 0) {
                $outgoing_call_ratio = ($outgoingcall_count/$total_calls_all) * 100;
                $data['outgoing_call_ratio'] = $outgoing_call_ratio;
            } else {
                $data['outgoing_call_ratio'] = 0;
            }
        }

        $total_no_caller = $this->db->select('COUNT(DISTINCT a.user_id) as no_of_caller')
        ->from('call_log a')
        ->join('contact_book b', 'a.contact_book_id = b.contact_book_id', 'left')
        ->join('user u', 'u.user_id = a.user_id', 'left')
        ->where('u.created_by', $user_id) 
        ->where_not_in('b.phone_no', array_column($subquery, 'phone_no'))  // Exclude phone numbers
        ->get()
        ->row();

        $data['total_no_caller']= $total_no_caller->no_of_caller;
        $this->load->view( 'dashboard/dashboard',$data );
    }
}
?>
