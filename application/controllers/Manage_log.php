<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Manage_log functions
***************************************************************************************/

class Manage_log extends CI_Controller {

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
    Purpose : To handle Manage_log function
    *****************************************************************************************/

    public function index() {
		$call_start_date = date('Y-m-01');  // Start date (first day of the month)
		$call_end_date = date('Y-m-t');  
		// print_r($call_end_date);
		// exit;
	
		$user_id=$this->session->userdata['user_id'];
		// $data['caller'] = $this->db->select('u.*, d.department_name, p.package_name')
		// ->from('user u')
		// ->join('subscriber a', 'a.user_id = u.user_id', 'left')
		// ->join('package p', 'p.package_id = u.package_id', 'left')
		// ->join('department d', 'd.department_id = u.department_id', 'left')
		// ->where('u.status !=', '2') // Exclude users with status 2
		// ->where('u.created_by', $user_id) // Match the created_by field
		// ->where('u.user_id', $caller_id) // Match the created_by field
		// ->get()
		// ->row();

		$subquery = $this->db->select('phone_no')
    	->from('company_cug_detail')
    	->get()
    	->result_array(); // Fetch all phone numbers as an array

		// Get the incoming call count excluding the phone numbers in company_cug_detail
		$incoming_call_count = $this->db->select('COUNT(*) as incoming_call')
			->from('call_log a')
			->join('contact_book b', 'a.contact_book_id = b.contact_book_id', 'left')
			->join('user u', 'u.user_id = a.user_id', 'left')
			->where('u.created_by', $user_id)  // Filter by user ID
			->where('a.call_date >=', $call_start_date) // Start date filter
			->where('a.call_date <=', $call_end_date) // End date filter
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
		->where('u.created_by', $user_id) // Filter by user ID
		->where('a.call_date >=', $call_start_date) // Start date filter
		->where('a.call_date <=', $call_end_date) // End date filter
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
		->where('u.created_by', $user_id) // Filter by user ID
		->where('a.call_date >=', $call_start_date) // Start date filter
		->where('a.call_date <=', $call_end_date) // End date filter
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
			->where('u.created_by', $user_id) // Filter by user ID
			->where('a.call_date >=', $call_start_date) // Start date filter
			->where('a.call_date <=', $call_end_date) // End date filter
			->where('a.redirected_to', 0) // Redirected to 0
			->where('a.status', 3) // Status is 3 for rejected calls
			->where_not_in('b.phone_no', array_column($subquery, 'phone_no')) // Exclude phone numbers in company_cug_detail
			->get()
			->row();

		// Assign the result to a variable
		$data['rejected_call_count']=$rejected_call = $rejected_call_log_result->rejected_call;

		// Assign the result to a variable
		$data['missedcall_count']= $missedcall_count= $missed_call_log_result->missed_call;

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

		   // End date (last day of the month)

		$data['caller_log'] = $this->db->select('u.name,u.image,u.phone_no as caller_no,u.is_manager,cb.phone_no, cb.contact_name, cl.call_date, cl.call_time, cl.call_end_time, cl.duration, cl.status,cl.contact_book_id')
			->from('call_log cl')
			->join('contact_book cb', 'cb.contact_book_id = cl.contact_book_id', 'left')
			->join('user u', 'u.user_id = cl.user_id', 'left')
			->where('u.created_by', $user_id) // Start date filter
			->where('cl.call_date >=', $call_start_date) // Start date filter
			->where('cl.call_date <=', $call_end_date) 
			->where_not_in('cb.phone_no', array_column($subquery, 'phone_no'))// End date filter
			->order_by('cl.call_log_id', 'desc') // Order by call log ID in descending order
			->get()
			->result();
        $this->load->view( 'manage_log/list',$data );
    }

	public function add_unknown_caller(){
			
		$cb_caller_id=$this->input->post("cb_caller_id");
		$caller_name=$this->input->post("caller_name");
		$user_id=$this->session->userdata['user_id'];
		
		$data=[
			'contact_name'=>$caller_name,
			'modified_on'=>date('Y-m-d H:i:s'),
			'modified_by'=>$user_id,
		];
		$this->db->where('contact_book_id ', $cb_caller_id);
		$result_user = $this->db->update('contact_book', $data);

		if ($result_user) {
			$this->session->set_flashdata('g_success', 'Caller Name have been Added successfully...');
		} else {
			$this->session->set_flashdata('g_err', 'Could not Added The Caller Name!');
		}
		redirect('Manage_log');
	}
}
?>
