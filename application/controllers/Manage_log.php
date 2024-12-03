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

		
		   $call_start_date = date('Y-m-01');  // Start date (first day of the month)
		   $call_end_date = date('Y-m-t'); // End date (last day of the month)
		   
		   // Pagination parameters
		   $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		   $limit = $this->input->post('sorting_filter') ? (int)$this->input->post('sorting_filter') : 10; // Default to 10 if no sorting filter is provided
		   $offset = ($page - 1) * $limit; // Offset for pagination
		   
		   // Filter parameters
		   $data['perpage'] = $limit;
		   $data['page'] = $page;
		   
		   // Get search filters from POST request
		   $fill_data['communicator_fill'] = $this->input->post('communicator_fill') ?? '';
		   $fill_data['caller_fill'] = $this->input->post('caller_fill') ?? '';
		   $fill_data['mobile_fill'] = $this->input->post('mobile_fill') ?? '';
		   $fill_data['status_fill'] = $this->input->post('status_fill') ?? '';
		   
		   // Date filtering
		   $data['dt_fill'] = $this->input->post('dt_fill_select_value');
		   $data['from_date_fillter'] = $this->input->post('from_date_fillter_textbox');
		   $data['to_date_fillter'] = $this->input->post('to_date_fillter_textbox');
		   
		   $fdate = '';
		   $tdate = '';
		   
		   // Handle different date filter cases
		   if ($data['dt_fill'] == "today") {
			   $data['today_date_fillter'] = date("Y-m-d");
			   $fdate = "DATE(cl.call_date) = '" . $data['today_date_fillter'] . "'";
		   } elseif ($data['dt_fill'] == "week") {
			   $data['week_from_date_fillter'] = date('Y-m-d', strtotime("last sunday"));
			   $data['week_to_date_fillter'] = date('Y-m-d', strtotime("next saturday"));
			   $fdate = "DATE(cl.call_date) >= '" . $data['week_from_date_fillter'] . "'";
			   $tdate = "DATE(cl.call_date) <= '" . $data['week_to_date_fillter'] . "'";
		   } elseif ($data['dt_fill'] == "monthly") {
			   $first = date('Y-m-01');
			   $last = date('Y-m-t');
			   $fdate = "DATE(cl.call_date) >= '" . $first . "'";
			   $tdate = "DATE(cl.call_date) <= '" . $last . "'";
		   } elseif ($data['dt_fill'] == "Custom date") {
			   if (!empty($data['from_date_fillter'])) {
				   $first = date('Y-m-d', strtotime($data['from_date_fillter']));
				   $fdate = "DATE(cl.call_date) >= '" . $first . "'";
			   }
			   if (!empty($data['to_date_fillter'])) {
				   $last = date('Y-m-d', strtotime($data['to_date_fillter']));
				   $tdate = "DATE(cl.call_date) <= '" . $last . "'";
			   }
		   }
		   
		   // Start building the main query
		   $this->db->select('u.name, u.image, u.phone_no as caller_no, u.is_manager, cb.phone_no, cb.contact_name, cl.call_date, cl.call_time, cl.call_end_time, cl.duration, cl.status, cl.contact_book_id')
			   ->from('call_log cl')
			   ->join('contact_book cb', 'cb.contact_book_id = cl.contact_book_id', 'left')
			   ->join('user u', 'u.user_id = cl.user_id', 'left')
			   ->where('u.created_by', $user_id) // Filter by the user who created the call
			   ->where('cl.call_date >=', $call_start_date) // Start date filter
			   ->where('cl.call_date <=', $call_end_date) // End date filter
			   ->where_not_in('cb.phone_no', array_column($subquery, 'phone_no')) // Avoid phone numbers in subquery
			   ->order_by('cl.call_log_id', 'desc');
		   
		   // Apply search filters
		   if (!empty($fill_data['communicator_fill'])) {
			   $this->db->like('cb.contact_name', $fill_data['communicator_fill']);
		   }
		   if (!empty($fill_data['caller_fill'])) {
			   $this->db->like('u.name', $fill_data['caller_fill']);
		   }
		   if (!empty($fill_data['mobile_fill'])) {
			   $this->db->group_start() // Start OR grouping
				   ->like('u.phone_no', $fill_data['mobile_fill'])
				   ->or_like('cb.phone_no', $fill_data['mobile_fill'])
				   ->group_end(); // End OR grouping
		   }
		   if (!empty($fill_data['status_fill'])) {
			   $this->db->where('cl.status', $fill_data['status_fill']);
		   }
		   
		   // Apply date filtering
		   if (!empty($fdate)) {
			   $this->db->where($fdate);
		   }
		   if (!empty($tdate)) {
			   $this->db->where($tdate);
		   }
		   
		   // Apply pagination
		   $this->db->limit($limit, $offset);
		   $result = $this->db->get()->result();
		   $data['caller_log'] = $result;
		   
		   // Start counting total records (for pagination)
		   $count_data = clone $this->db; // Clone the query builder
		   
		   // Reset query to reapply filters for count query
		   $count_data->reset_query();
		   
		   // Build the count query
		   $count_data->select('COUNT(*) as total_count') // Add the total count select
			   ->from('call_log cl')
			   ->join('contact_book cb', 'cb.contact_book_id = cl.contact_book_id', 'left')
			   ->join('user u', 'u.user_id = cl.user_id', 'left')
			   ->where('u.created_by', $user_id) // Filter by the user who created the call
			   ->where('cl.call_date >=', $call_start_date) // Start date filter
			   ->where('cl.call_date <=', $call_end_date) // End date filter
			   ->where_not_in('cb.phone_no', array_column($subquery, 'phone_no')); // Avoid phone numbers in subquery
		   
		   // Apply the same filters to count the total rows
		   if (!empty($fill_data['communicator_fill'])) {
			   $count_data->like('cb.contact_name', $fill_data['communicator_fill']);
		   }
		   if (!empty($fill_data['caller_fill'])) {
			   $count_data->like('u.name', $fill_data['caller_fill']);
		   }
		   if (!empty($fill_data['mobile_fill'])) {
			   $count_data->like('a.mobile_no', $fill_data['mobile_fill']);
		   }
		   if (!empty($fill_data['status_fill'])) {
			   $count_data->like('cl.status', $fill_data['status_fill']);
		   }
		   
		   if (!empty($fdate)) {
			   $count_data->where($fdate);
		   }
		   if (!empty($tdate)) {
			   $count_data->where($tdate);
		   }
		   
		   // Get total count
		   $total_count = $count_data->get()->row()->total_count;
		   $data['count'] = $total_count;
		   
		   // Load the view
		   $this->load->view('manage_log/list', array_merge($data, $fill_data));
		   
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
