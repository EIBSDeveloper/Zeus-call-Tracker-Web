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

        $this->load->view( 'dashboard/dashboard' );
    }
}
?>
