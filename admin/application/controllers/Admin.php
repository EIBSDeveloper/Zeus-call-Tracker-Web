<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Dashboard functions 2023-05-03
***************************************************************************************/

class Admin extends CI_Controller {

    // public function __construct() {
    //     parent::__construct();
    //     $this->load->model( array( 'Login_model' ) );
    //     date_default_timezone_set( 'Asia/Kolkata' );
    //     // $this->session->set_userdata( 'comtitle', 'Login' );
    // }
    /****************************************************************************************
    Purpose : To handle Dashboard function
    *****************************************************************************************/
   
    public function update()
	{
		// $data = $this->input->post();
        // print_r($data);
        // exit;
		$id  = $this->input->post('edit_id_super');
		$data['name'] = $this->input->post("user_name");
		$data['phone_no'] = $this->input->post("phone_no");
		$data['email_id'] = $this->input->post("email_id");
		$data['user_login_credential_id'] = $this->input->post("edit_id_super");
        $data['photo'] = $this->input->post("admin_profile");


        
        if (!empty($_FILES['logo_super']['name'])) {
      
			// Extract file extension
			$extent = pathinfo($_FILES['logo_super']['name'], PATHINFO_EXTENSION);

			// Configuration for upload
			$config['upload_path'] = './assets/Images/users/'; // Ensure path ends with slash
            // print_r($config['upload_path']);
            // exit;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 50000; // in kilobytes
			$config['file_name'] = $data['user_login_credential_id'] . '_admin'; // Fixed filename

			// Check and delete old logo if exists
			$oldlogo = $data['user_login_credential_id'] . '_admin' . '.' . $extent; // Assuming $oldlogo is defined somewhere
            $filepath = "./assets/Images/users/" . $oldlogo;

            if ($oldlogo && file_exists($filepath)) {
                unlink($filepath);
                // echo $oldlogo;
                // exit;
            }


            

			// Load upload library with config
			$this->load->library('upload', $config);

			// Perform upload
			if ($this->upload->do_upload('logo_super')) {
				$uploadData = $this->upload->data();
				$filename = $data['user_login_credential_id'] . '_admin';
				$toal_files = $filename;

				// Set logo filename in data
				$data['photo'] = $data['user_login_credential_id'] . '_admin' . '.' . $extent;
			} else {
				// Handle upload failure
				$data['photo'] = ''; // Clear logo if upload fails
				$error = array('error' => $this->upload->display_errors());
				// print_r($error); // You can handle the error as per your application logic
			}
		} else {
			$data['photo'] =$data['photo']; // Retain old logo if no new upload
		}
        
        // print_r($data);
        // exit;

		
		$update = $this->db->select('*')->from('user_login_credential')->where(["user_login_credential_id " => $id])->set($data)->update();

		if ($update) {
			$this->session->set_flashdata('g_success', $data['name'] . ' Profile have been updated successfully.');
		} else {
			$this->session->set_flashdata('g_err', 'Something went wrong!');
		}
		redirect('Dashboard');
	}

    
}
?>