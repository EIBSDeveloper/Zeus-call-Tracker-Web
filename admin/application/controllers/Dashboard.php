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
        $this->session->set_userdata( 'comtitle', 'Dashboard' );
    }
    /****************************************************************************************
    Purpose : To handle Dashboard function
    *****************************************************************************************/

    public function index() {

		$currentMonth = date('m'); // Current month
        $currentYear = date('Y'); // Current year

		$data['active_subscriber'] = $this->db->select('COUNT(*) as count')
                ->where('status','0')
                ->where('MONTH(created_at)', $currentMonth)
                ->where('YEAR(created_at)', $currentYear)
                ->get('subscriber')
                ->row();

		$data['total_subscriber'] = $this->db->select('COUNT(*) as count')
		->where('status !=', '2')
		->get('subscriber')
		->row();

		$data['expired_subscriber'] = $this->db->select('COUNT(*) as count')
                ->where('status','3')
                ->get('subscriber')
                ->row();


		$data['subscriber_data']=$this->db->select('b.* ,p.package_name,p.package_amount,p.duration,p.period,a.name,a.image,w.amount,w.no_of_callers')
			->from('subscriber b')
			->join('user a', 'a.user_id = b.user_id', 'left')
			->join('package p', 'p.package_id = b.package_id', 'left')
			->join('subscriber_details w', 'w.subscriber_id = b.subscriber_id', 'left')
			->where('a.status!=', '2')
			->where('b.status!=', '2')
			->order_by('b.subscriber_id', 'DESC')
			->group_by('b.subscriber_id')
			->limit(5)
			->get()
			->result();

	$this->db->select('COUNT(*) as count, MONTH(created_at) as month, MONTHNAME(created_at) as month_name');
	$this->db->where('YEAR(created_at)', $currentYear);
	$this->db->where('status !=', '2');
	$this->db->group_by('MONTH(created_at)');
	$this->db->order_by('MONTH(created_at)', 'ASC');
	$query = $this->db->get('subscriber');
	$data['all_month'] = $query->result_array();

        $this->load->view( 'dashboard/dashboard_admin',$data );
    }
}
?>
