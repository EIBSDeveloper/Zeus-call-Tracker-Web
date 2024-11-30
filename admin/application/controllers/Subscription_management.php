<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Subscription_management functions
***************************************************************************************/

class Subscription_management extends CI_Controller {

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
        $this->session->set_userdata( 'comtitle', 'Subscription_management' );
    }
    /****************************************************************************************
    Purpose : To handle Subscription_management function
    *****************************************************************************************/

    public function index() {
		
		// Pagination parameters
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$limit = $this->input->post('sorting_filter') ? $this->input->post('sorting_filter') : '10';;
		$offset = ($page - 1) * $limit;

		// Filter parameters
		$data['perpage'] = $limit;
		$data['page'] = $page;
		

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
				$fdate = "DATE(created_at) = '" . $data['today_date_fillter'] . "'";
			} elseif ($data['dt_fill'] == "week") {
				$data['week_from_date_fillter'] = date('Y-m-d', strtotime("last sunday"));
				$data['week_to_date_fillter'] = date('Y-m-d', strtotime("next saturday"));
				$fdate = "DATE(created_at) >= '" . $data['week_from_date_fillter'] . "'";
				$tdate = "DATE(created_at) <= '" . $data['week_to_date_fillter'] . "'";
			} elseif ($data['dt_fill'] == "monthly") {
				$first = date('Y-m-01');
				$last = date('Y-m-t');
				$fdate = "DATE(created_at) >= '" . $first . "'";
				$tdate = "DATE(created_at) <= '" . $last . "'";
			} elseif ($data['dt_fill'] == "Custom date") {
				if ($data['from_date_fillter'] != '') {
					$first = date('Y-m-d', strtotime($data['from_date_fillter']));
					$fdate = "DATE(created_at) >= '" . $first . "'";
				}
	
				if ($data['to_date_fillter'] != '') {
					$last = date('Y-m-d', strtotime($data['to_date_fillter']));
					$tdate = "DATE(created_at) <= '" . $last . "'";
				}
			}
			
			
		$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,a.image,w.amount,w.no_of_callers')
			->from('subscriber b')
			->join('user a', 'a.user_id = b.user_id', 'left')
			->join('package p', 'p.package_id = b.package_id', 'left')
			->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
			->where('a.status!=', '2')
			->where('b.status!=', '2')
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
		$count_data =$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,a.name,a.image,w.amount,w.no_of_callers')
		->from('subscriber b')
		->join('user a', 'a.user_id = b.user_id', 'left')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
		->where('a.status!=', '2')
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
		
			$this->load->view('subscription_management/list',array_merge($data, $fill_data));
	}

	public function view_subscriber($id) {
		$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,a.image,w.amount,w.no_of_callers')
		->from('subscriber b')
		->join('user a', 'a.user_id = b.user_id', 'left')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
		->where('a.status !=', '2')
		->where('b.status !=', '2')
		->where('b.subscriber_id',$id)
		->order_by('b.subscriber_id', 'DESC');
		$result = $this->db->get()->row();
		$data['view'] = $result;

        $this->load->view( 'subscription_management/view',$data );
    }

	public function view_payment($id) {
		$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,a.image,w.amount,w.no_of_callers')
		->from('subscriber b')
		->join('user a', 'a.user_id = b.user_id', 'left')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
		->where('a.status !=', '2')
		->where('b.status !=', '2')
		->where('b.subscriber_id',$id)
		->order_by('b.subscriber_id', 'DESC');
		$result = $this->db->get()->row();
		$data['view'] = $result;

		$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,')
		->from('subscriber_details b')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->join('subscriber w', 'w.subscriber_id = b.subscriber_id', 'left')
		->where('w.status !=', '2')
		->where('b.status !=', '2')
		->where('b.subscriber_id',$id)
		->order_by('b.subscriber_details_id ', 'DESC');
		$result = $this->db->get()->result();
		$data['payment_list'] = $result;

        $this->load->view( 'subscription_management/payment_view',$data );
    }

	public function block_subscriber() {

		$user_id=$this->input->post("user_id");

		$data=[
			'status'=>1,
		];
		$this->db->where('user_id', $user_id);
		$result_user = $this->db->update('user', $data);

		$this->db->where('user_id', $user_id);
		$result = $this->db->update('subscriber', $data);
		if ($result) {
			$this->session->set_flashdata('g_success', 'Subscriber have been Blocked successfully...');
		} else {
			$this->session->set_flashdata('g_err', 'Could not Block The Subscriber!');
		}
		redirect('Subscription_management');
    }

	public function unblock_subscriber() {

		$user_id=$this->input->post("user_id");

		$data=[
			'status'=>0,
		];

		$this->db->where('user_id', $user_id);
		$result_user = $this->db->update('user', $data);

		$this->db->where('user_id', $user_id);
		$result = $this->db->update('subscriber', $data);
		if ($result) {
			$this->session->set_flashdata('g_success', 'Subscriber have been Unblocked successfully...');
		} else {
			$this->session->set_flashdata('g_err', 'Could not Unblock The Subscriber!');
		}
		redirect('Subscription_management');
    }

	public function view_expired() {

		$id=$id = $_POST['id'];

		$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,a.image,w.amount,w.no_of_callers')
		->from('subscriber b')
		->join('user a', 'a.user_id = b.user_id', 'left')
		->join('package p', 'p.package_id = b.package_id', 'left')
		->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
		->where('a.status !=', '2')
		->where('b.status !=', '2')
		->where('b.subscriber_id',$id)
		->order_by('b.subscriber_id', 'DESC');
		$result = $this->db->get()->row();
		$data['view'] = $result;
	

        $this->load->view( 'subscription_management/expired_view',$data );
    }
	

    public function view_subscriber_2() {
        $this->load->view( 'subscription_management/view_2' );
    }
    public function view_subscriber_3() {
        $this->load->view( 'subscription_management/view_3' );
    }
}
