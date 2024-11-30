<?php
defined('BASEPATH') or exit('No direct script access allowed');


/*************************************************************************************
Purpose : To handle all Generalsettings Controller functions by 30-07-2024 Vasanth
 ***************************************************************************************/

class Generalsettings extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (isset($this->session->userdata['user_id']) && $this->session->userdata['user_id'] == TRUE)
        {
            //do something
        }else{
            redirect('Login'); //if session is not there, redirect to login page
        }
		// if (isset($this->session->userdata['user_id']) && $this->session->userdata['user_id'] == TRUE) {
		// 	//do something
		// } else {
		// 	redirect('Login'); //if session is not there, redirect to login page
		// }
		$this->load->model(array('Generalsettings_model'));
		date_default_timezone_set('Asia/Kolkata');
		$this->session->set_userdata('comtitle', 'General Settings');
	}

	public function index()
	{
		// $data['date_formats']  = common_select_values('date_format', 'date_formats', '', 'result');
		// $_SESSION['user_id'] = $_SESSION['user_id'];
		$data['g_settings'] = common_select_values('*', 'general_settings', '', 'row');
		$countryId = isset($data['g_settings']) ? $data['g_settings']->country_id : 101;
		$stateId   = isset($data['g_settings']) ? $data['g_settings']->state_id : 35;
		$data['country_lists'] = common_select_values('*', 'ad_countries', '', 'result');
		$data['state_lists']  = $states = common_select_values('*', 'ad_states', ' country_id = "' . $countryId . '"', 'result');
		$data['city_lists']   = $states = common_select_values('*', 'ad_cities', ' state_id = "' . $stateId . '"', 'result');

		$this->load->view('settings/general_settings', $data);
	}
	public function state_list()
	{
		$countryId = $this->input->post('country');
		$states = $this->Generalsettings_model->state_list($countryId);
		$option = '';
		$option .= '<option value="">Select State</option>';
		foreach ($states as $state) {
			$option .= '<option value=' . $state['id'] . '>' . $state['name'] . '</option>';
		}
		echo $option;
	}

	// To list city details based on state id
	public function city_list()
	{
		$stateId = $this->input->post('state');
		$cities = $this->Generalsettings_model->city_list($stateId);
		$option = '';
		$option .= '<option value="">Select City</option>';
		foreach ($cities as $city) {
			$option .= '<option value=' . $city['sid'] . '>' . $city['name'] . '</option>';
		}
		echo $option;
	}
	// To update general setting details 
	public function general_settings_update()
	{
		$logo_icon = $this->input->post('old_logo');
		$fav_icon  = $this->input->post('old_fav');
		$logos['logo']      = $logo_icon;
		$logos['fav_icon']  = $fav_icon;

		foreach ($_FILES['upload']['name'] as $key => $logo) {


			if ($logo) {

				$_FILES['file']['name'] = $_FILES['upload']['name'][$key];
				$_FILES['file']['type'] = $_FILES['upload']['type'][$key];
				$_FILES['file']['tmp_name'] = $_FILES['upload']['tmp_name'][$key];
				$_FILES['file']['error'] = $_FILES['upload']['error'][$key];
				$_FILES['file']['size'] = $_FILES['upload']['size'][$key];

				$extent = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

				$config['upload_path']   = 'assets/Images/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] 	 = '50000';
				$config['file_name'] 	 = $key;

				$old_logo_path = "assets/Images/" . $key . '.' . $extent;

				if (file_exists($old_logo_path)) {
					unlink($old_logo_path);
				}

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {

					$logos[$key] =  $key . '.' . $extent;
				}
			}
		}

		$id       	 = 1;
		$modify_on 	 = date('Y-m-d H:i:s');
		$modify_by   = $_SESSION['user_id'];
		$data        = [
							'title'	  				=>  $this->input->post('title'),
							'email'   				=>  $this->input->post('email'),
							'phone_no'				=>  $this->input->post('phone_no'),
							'mobile_no'	   			=>  $this->input->post('mobile_no'),
							'area_street'    			=>  $this->input->post('company_address'),
							'date_format'  			=>  $this->input->post('date_format'),
							'website'     			=>  $this->input->post('website_link'),
							'country_id'     			=>  $this->input->post('country'),
							'state_id'     			=>  $this->input->post('state'),
							'city_id'       			=>  $this->input->post('city'),
							'pincode'       			=>  $this->input->post('pincode'),
							// 'loan_remain'   =>  $this->input->post('loan_remainder_date'),
							'logo'     	 		=>  $logos['logo'],
							'fav_icon'     			=>  $logos['fav_icon'],
							
						];
                        




		$result = $this->db->select('*')->from('general_settings')->where(["general_settings_id" => $id])->set($data)->update();


		// // print_r($data['logo']);
		// // print_r($data['favicon']);exit;
		// $data['title'] = $this->input->post('title');
		// $data['email'] = $this->input->post('email');
		// //   $data['contact_person_name'] = $this->input->post('contact_person_name');
		// //   $data['contact_person_email_id'] = $this->input->post('contact_person_emailId');
		// $data['phone_no'] = $this->input->post('phone_no');
		// $data['mobile_no'] = $this->input->post('mobile_no');
		// $data['website'] = $this->input->post('website_link');
		// $data['address'] = $this->input->post('company_address');
		// $data['country'] = $this->input->post('country');
		// $data['state']   = $this->input->post('state');
		// $data['city']    = $this->input->post('city');
		// $data['pincode'] = $this->input->post('pincode');
		// $data['date_format'] = $this->input->post('date_format');
		// $data['loan_remainder_date'] = $this->input->post('loan_remainder_date');

		// // $data['modified_on'] = date('Y-m-d H:i:s');

		// $id = 1;

		// print_r($data);exit;
		// $result = $this->Generalsettings_model->general_setting_update($data, $id);

		if ($result) {
			$this->session->set_flashdata('g_success', 'General Setting details have been updated successfully...');
		} else {
			$this->session->set_flashdata('g_err', 'Could not update general setting details!');
		}

		// }else{

		// } 
		redirect('Generalsettings');
	}
}
