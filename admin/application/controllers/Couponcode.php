<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Couponcode functions 
***************************************************************************************/

class Couponcode extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (isset($this->session->userdata['user_id']) && $this->session->userdata['user_id'] == TRUE) {
			//do something
		} else {
			redirect('Login'); //if session is not there, redirect to login page
		}
        $this->load->model( array( 'CouponModel' ) );
        date_default_timezone_set( 'Asia/Kolkata' );
        $this->session->set_userdata( 'comtitle', 'Couponcode' );
    }
    /****************************************************************************************
    Purpose : To handle Couponcode function
    *****************************************************************************************/

    public function index() {
        $data['coupon_list'] = $this->CouponModel->get_coupon_list();
     
        $this->load->view( 'settings/coupon_code', $data );
    }

   
    public function coupon_save() {
        $data = [
            'package_id'   => $this->input->post("package_id"),
            'coupon_name'  => $this->input->post("coupon_name"),
            'coupon_code'  => $this->input->post("coupon_code"),
            'description'  => $this->input->post("desc"),
            // 'created_by'   => $_SESSION['user_id'],
            // 'created_date' => date('Y-m-d H:i:s'),
        ];
      
        
        $insert_result = $this->CouponModel->insert_coupon($data);
       
       
        if ($insert_result) {
            $this->session->set_flashdata('g_success', 'Coupon code added successfully!');
        } else {
            $this->session->set_flashdata('g_err', 'Failed to add coupon code!');
        }

        // Redirect to the Couponcode page
        redirect('Couponcode');
    }

	// public function chk_coupon_name_unique()
	// {
	// 	$lc_name = $_POST['coupon_name'];

	// 	$get_coupon_details = $this->CouponModel->get_Stockcategory_by_name($lc_name);
    //     print_r($get_coupon_details);
    //     exit;
	// 	if (isset($get_coupon_details)) {
	// 		echo "1";
	// 	} else {
	// 		echo "0";
	// 	}
	// }
    
	public function Coupon_edit()
	{
		$lc_id = $_POST['sno'];

		$get_coupon_details = $this->CouponModel->get_coupon_by_lcid($lc_id);
          
		echo json_encode($get_coupon_details);
	}

    public function coupon_update() {
        $data = [
            'sno'   => $this->input->post("edit_coupon_id"),
            'package_id'   => $this->input->post("package_id_edit"),
            'coupon_name'  => $this->input->post("coupon_name_edit"),
            'coupon_code'  => $this->input->post("coupon_code_edit"),
            'description'  => $this->input->post("desc_edit"),
            // 'updated_by'   => $_SESSION['user_id'],
            // 'updated_at' => date('Y-m-d H:i:s'),
        ];
        
      
        
        $update_result = $this->CouponModel->update_coupon($data);
       
       
        if ($update_result) {
            $this->session->set_flashdata('g_success', 'Coupon code Updated successfully!');
        } else {
            $this->session->set_flashdata('g_err', 'Failed to add coupon code!');
        }

        
        redirect('Couponcode');
    }
    public function lc_change_status()
	{
		$qsid = $this->input->post('id');
		$status = $this->input->post('status');
       

		$result = $this->CouponModel->lc_change_status($qsid, $status);
      
		if ($result) {
			echo 1;
		} else {
			echo 0;
		}

		if ($result) {
			if ($status == 1) {
				$this->session->set_flashdata('g_success', 'Coupon Code has been Deactive successfully.');
			} else {
				$this->session->set_flashdata('g_success', 'Coupon Code has been Active successfully.');
			}
		} else {
			$this->session->set_flashdata('g_err', 'Something went wrong');
		}
	}

    public function coupon_code_delete()
	{
		
		$data['lc_id'] = $this->input->post("delete_coupon_id");
      

		$insert = $this->CouponModel->coupon_code_delete($data);
        
		if ($insert) {
			$this->session->set_flashdata('g_success', 'Coupon Code  have been Deleted successfully...');
		} else {
			$this->session->set_flashdata('g_err', 'Something went wrong!');
		}
		redirect('Couponcode');
	}
}
?>
