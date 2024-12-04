<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Manage_log functions
***************************************************************************************/

class User extends CI_Controller {

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

   public function Update(){
    // $data = $this->input->post();
    //     print_r($data);
    //     exit;
		$id  = $this->input->post('edit_id_super');
		$data['name'] = $this->input->post("user_name");
		$data['email_id'] = $this->input->post("email_id");
		$data['user_id'] = $this->input->post("edit_id_super");

		$data['logo'] = $this->input->post("logo_super");
		$data['old_logo_super'] = $this->input->post("member_profile");

		if (isset($_FILES['logo_super']['name']) && $_FILES['logo_super']['name'] != '') {
			// Extract file extension
			$extent = pathinfo($_FILES['logo_super']['name'], PATHINFO_EXTENSION);

			// Configuration for upload
			$config['upload_path'] = 'assets/Images/user'; // Ensure path ends with slash
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 50000; // in kilobytes
			$config['file_name'] = $data['user_id'] . '_User'; // Fixed filename

			// Check and delete old logo if exists
			$oldlogo = $data['user_id'] . '_User' . '.' . $extent; // Assuming $oldlogo is defined somewhere
			if ($oldlogo) {
				if (file_exists("assets/Images/user/" . $oldlogo)) {
					unlink("assets/Images/user/" . $oldlogo);
				}
			}

			// Load upload library with config
			$this->load->library('upload', $config);

			// Perform upload
			if ($this->upload->do_upload('logo_super')) {
				$uploadData = $this->upload->data();
				$filename = $data['user_id'] . '_User';
				$data['totalFiles'][] = $filename;

				// Set logo filename in data
				$data['logo'] = $data['user_id'] . '_User' . '.' . $extent;
			} else {
				// Handle upload failure
				$data['logo'] = ''; // Clear logo if upload fails
				// $error = array('error' => $this->upload->display_errors());
				// print_r($error); // You can handle the error as per your application logic
			}
		} else {
			$data['logo'] = $data['old_logo_super']; // No logo uploaded or file name not set
		}
        
        // print_r($data);
        // exit;
		$insert_data=[
			 'name'=>$data['name'],
			 'image'=>$data['logo'],
			 'email_id'=>$data['email_id'],
		];
		$this->db->where('user_id', $id);
		$update = $this->db->update('user', $insert_data);
	

		if ($update) {
			$this->session->set_flashdata('g_success', $data['name'] . ' Profile have been updated successfully.');
		} else {
			$this->session->set_flashdata('g_err', 'Something went wrong!');
		}
		redirect('Dashboard');

   }
}
?>
