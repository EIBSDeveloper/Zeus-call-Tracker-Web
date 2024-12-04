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
		$user_id=$this->session->userdata['user_id'];
		$user_detail=$this->db->select('a.*')
		->from('user a')
		->where('a.status!=', '2')
		->where('a.user_id', $user_id)
		->get()
		->row();

        $call_start_date = date('Y-m-01');  // Start date (first day of the month)
		$call_end_date = date('Y-m-t');  
		$today_date = date('Y-m-d');  
        $current_month = date('Y-m');

		$currentMonth = date('m'); // Current month
        $currentYear = date('Y'); // Current year
	
		
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
			->where_not_in('b.phone_no', array_column($subquery, 'phone_no'))
			->where('u.is_bh', '0')
			->where('u.package_id', $user_detail->package_id) // Exclude phone numbers in company_cug_detail
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
			->where_not_in('b.phone_no', array_column($subquery, 'phone_no'))
			->where('u.is_bh', '0')
			->where('u.package_id', $user_detail->package_id) // Exclude phone numbers in company_cug_detail
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
			->where_not_in('b.phone_no', array_column($subquery, 'phone_no'))
			->where('u.is_bh', '0')
			->where('u.package_id', $user_detail->package_id) // Exclude phone numbers in company_cug_detail
			->get()
			->row();
	//reject call
		$rejected_call_log_result = $this->db->select('COUNT(*) as rejected_call')
			->from('call_log a')
			->join('contact_book b', 'a.contact_book_id = b.contact_book_id', 'left')
			->join('user u', 'u.user_id = a.user_id', 'left')
			->where('u.created_by', $user_id)
            ->where('a.call_date', $today_date) // Filter by user ID
			->where('a.redirected_to', 0) // Redirected to 0
			->where('a.status', 3) // Status is 3 for rejected calls
			->where_not_in('b.phone_no', array_column($subquery, 'phone_no'))
			->where('u.is_bh', '0')
			->where('u.package_id', $user_detail->package_id) // Exclude phone numbers in company_cug_detail
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

        $data['count_all'] = $this->db->select('COUNT(DISTINCT a.user_id) as no_of_caller ,COUNT(DISTINCT a.department_id) as department_count')
        ->from('user a')
        ->where('a.created_by', $user_id) 
		->where('a.status!=', '2')
		->where('a.is_bh', '0')
		->where('a.package_id', $user_detail->package_id)
        ->get()
        ->row();

		$data['dept_list']=$this->db->select('d.department_name ,COUNT(DISTINCT u.user_id) as no_of_caller_count')
        ->from('user u')
        ->join('department d', 'u.department_id = d.department_id', 'left')
        ->where('u.created_by', $user_id) 
		->where('u.status!=', '2')
		->where('u.is_bh', '0')
		->where('u.package_id', $user_detail->package_id)
		->group_by('u.department_id')  // Exclude phone numbers
        ->get()
        ->result();

		$data['packages_list']=$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,w.amount')
			->from('subscriber b')
			->join('user a', 'a.user_id = b.user_id', 'left')
			->join('package p', 'p.package_id = b.package_id', 'left')
			->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
			->where('a.status!=', '2')
			->where('b.status!=', '2')
			->where('b.user_id', $user_id)
			->group_by('b.subscriber_id')
			->order_by('b.status', 'ASC')
			->get()
			->result();

		$data['caller_list']=$this->db->select('u.name,u.user_id')
			->from('user u')
			->where('u.status !=', '2') // Exclude users with status 2
			->where('u.created_by', $user_id)
			->group_by('u.user_id')
			->where('u.is_bh', '0')
			->where('u.package_id', $user_detail->package_id)
			->get()
			->result();

		$data['packages_count']=count($data['packages_list']);
		$data['all_caller'] = $this->db->select('
				u.name,
				u.user_id,
				COUNT(a.user_id) AS caller_count')
			->from('user u')
			->join(
				'(SELECT * FROM call_log WHERE call_date >= "'.$call_start_date.'" AND call_date <= "'.$call_end_date.'") a',
				'a.user_id = u.user_id',
				'left'
			)
			->where('u.status !=', '2') // Exclude users with status 2
			->where('u.created_by', $user_id)
			->where('u.is_bh', '0')
			->where('u.package_id', $user_detail->package_id)
			->group_by('u.user_id')
			->get()
			->result_array();

			foreach ($data['all_caller'] as &$caller) {
				$caller['incoming_count'] = incoming_call_month($caller['user_id'],$call_start_date,$call_end_date);
				$caller['outgoing_count'] = outcoming_call_month($caller['user_id'],$call_start_date,$call_end_date);
				$caller['missed_count'] = missed_call_month($caller['user_id'],$call_start_date,$call_end_date);
				$caller['rejected_count'] = rejected_call_month($caller['user_id'],$call_start_date,$call_end_date);
			}


		// current week data
		$currentDate = date('Y-m-d');
		$currentDayOfWeek = date('w', strtotime($currentDate));
		$startOfWeek = date('Y-m-d', strtotime("last Sunday", strtotime($currentDate)));
		$endOfWeek = date('Y-m-d', strtotime("next Saturday", strtotime($currentDate)));

		$data['week_caller'] = $this->db->select('
				u.name,
				u.user_id,
				COUNT(a.user_id) AS caller_count')
			->from('user u')
			->join(
				'(SELECT * FROM call_log WHERE call_date >= "'.$startOfWeek.'" AND call_date <= "'.$endOfWeek.'") a',
				'a.user_id = u.user_id',
				'left'
			)
			->where('u.status !=', '2') // Exclude users with status 2
			->where('u.created_by', $user_id)
			->where('u.is_bh', '0')
			->where('u.package_id', $user_detail->package_id)
			->group_by('u.user_id')
			->get()
			->result_array();

			foreach ($data['week_caller'] as &$caller) {
				$caller['incoming_count'] = incoming_call_weekly($caller['user_id'],$startOfWeek,$endOfWeek);
				$caller['outgoing_count'] = outcoming_call_weekly($caller['user_id'],$startOfWeek,$endOfWeek);
				$caller['missed_count'] = missed_call_weekly($caller['user_id'],$startOfWeek,$endOfWeek);
				$caller['rejected_count'] = rejected_call_weekly($caller['user_id'],$startOfWeek,$endOfWeek);
			}
	
	// 	print_r($data['week_caller']);
	//    exit;
        $this->load->view( 'dashboard/dashboard',$data );
    }
}
?>
