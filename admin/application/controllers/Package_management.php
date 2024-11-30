<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all Package_management functions
***************************************************************************************/

class Package_management extends CI_Controller {

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
        $this->session->set_userdata( 'comtitle', 'Package_management' );
    }
    /****************************************************************************************
    Purpose : To handle Package_management function
    *****************************************************************************************/

    public function index() {

		$data['package_list'] = $this->db->select('package.*')
			->from('package')
			->where('package.status', 0)
			->get()
			->result();
		$descriptions = $this->db->select('package_description.package_id, package_description.description, package_description.yes_no')
			->from('package_description')
			->get()
			->result();
			$descriptions_arr = [];

		foreach ($descriptions as $desc) {
			$descriptions_arr[$desc->package_id][] = [
				'description' => $desc->description,
				'yes_no' => $desc->yes_no
			];
		}

		// Step 4: Add the descriptions array to each package
		foreach ($data['package_list'] as &$package) {
			if (isset($descriptions_arr[$package->package_id])) {
				$package->descriptions_arr = $descriptions_arr[$package->package_id];
			} else {
				$package->descriptions_arr = []; // No descriptions found for this package
			}
		}

	
        $this->load->view( 'package_management/list', $data);
    }

	//add Packages

	public function add()
	{
		$data['package_name'] = $this->input->post("package_name");
		$data['duration'] = $this->input->post("period_tbox");
		$data['period'] = $data['duration']=='3' ?'0': $this->input->post("period_input_tbox");
		$data['amount'] = $this->input->post("amount");
		$data['offer_check'] = $this->input->post("offers_chk_add") ?? 0;
		$data['percentage'] = $data['offer_check'] =='1'? $this->input->post("percentage") :0;
		$data['package_amount'] = $this->input->post("package_amount");
		$auto_increment_value=common_select_values('AUTO_INCREMENT', 'INFORMATION_SCHEMA.TABLES', ' TABLE_SCHEMA = database() AND TABLE_NAME = "package"', 'row');
		$next_packg_id = $auto_increment_value->AUTO_INCREMENT;
		
		$last_pckid_detail = $this->db->query("SELECT * FROM `package` ORDER BY package_id DESC")->row();

		if ($last_pckid_detail != '') {

			$last_data = $last_pckid_detail ? $last_pckid_detail->package_no : 1;
			// print_r($last_data);
			// exit;
			$year = substr(date("y"), -2);
			$slice = explode("/", $last_data);
			$result = preg_replace('/[^0-9]/', ' ', $slice[0]);
			// print_r( $result);

			function request_num($input, $pad_len = 3, $prefix = null)
			{
				// if ($pad_len <= strlen($input))
				// trigger_error('<strong>'.$pad_len.'</strong> cannot be less than or equal to the length of <strong>'.$input.'</strong> to generate sale number', E_USER_ERROR);

				if (is_string($prefix))

					return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

				return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
			}

			$request =  request_num(((int)$result + 1), 4, "PCKG-");

			$request_id =  $request . '/' . $year;

			$data['package_no'] = $request_id;
		} else {
			$year = substr(date("y"), -2);
			$data['package_no'] =  'PCKG-0001/' . $year;
		}
		$insert_data = [
			'package_no'           => $data['package_no'],
			'package_name'         => $data['package_name'],
			'period'               => $data['period'],
			'duration'        	   => $data['duration'],
			'amount'        	   => $data['amount'],
			'percentage'        	   => $data['percentage'],
			'offer_check'        	   => $data['offer_check'],
			'package_amount'       => $data['package_amount'],
			
		];

		$result = $this->db->insert('package', $insert_data);

		$data['package_id'] = $next_packg_id;
		
		$count=$this->input->post('repeater_block_pckg_desc');

		for ($i = 0; $i < $count; $i++) {
			$data['description'] = $this->input->post('package_desc')[$i];
			$data['yes_no'] = $this->input->post('package_available')[$i];
			$insert_desc = [
				'package_id'           => $data['package_id'],
				'description'           => $data['description'],
				'yes_no'         => $data['yes_no'],
			];

			$result_desc = $this->db->insert('package_description', $insert_desc);
		}

		if ($result) {
			$this->session->set_flashdata('g_success', $data['package_name'] . ' have been Added successfully.');
		} else {
			$this->session->set_flashdata('g_err', 'Something went wrong!');
		}
		redirect('Package_management');
	}

	// edit popup fetch 
	public function edit()
	{
		$id = $_POST['id'];

		// Step 1: Fetch the package data
		$data['edit'] = $this->db->select('package.*')
			->from('package')
			->where('package.status', 0)
			->where('package.package_id', $id)
			->get()
			->row();  // Only one row, since you're editing a single package

		// Step 2: Fetch the package descriptions
		$descriptions = $this->db->select('package_description.package_description_id, package_description.package_id, package_description.description, package_description.yes_no')
			->from('package_description')
			->where('package_id', $id)
			->get()
			->result();  // Return an array of descriptions for the given package_id

		// Step 3: Organize descriptions into an array by package_id
		$descriptions_arr = [];
		foreach ($descriptions as $desc) {
			$descriptions_arr[$desc->package_id][] = [
				'desc_id' => $desc->package_description_id,
				'description' => $desc->description,
				'yes_no' => $desc->yes_no
			];
		}

		// Step 4: Add descriptions_arr to the package data
		// Since $data['edit'] is a single object, we can directly assign the descriptions_arr
		if (isset($descriptions_arr[$data['edit']->package_id])) {
			$data['edit']->descriptions_arr = $descriptions_arr[$data['edit']->package_id];
		} else {
			$data['edit']->descriptions_arr = []; // No descriptions found for this package
		}

		$this->load->view('package_management/edit_package', $data);
	}

	// package update 
	public function update(){

		$package_id = $this->input->post('package_edit_id');

		$data['package_name'] = $this->input->post("package_name");
		$data['duration'] = $this->input->post("period_tbox_edit");
		$data['period'] = $data['duration']=='3' ?'0': $this->input->post("period_input_tbox_edit");
		$data['amount'] = $this->input->post("amount");
		$data['offer_check'] = $this->input->post("offers_chk_edit") ?? 0;
		$data['percentage'] = $data['offer_check'] =='1'? $this->input->post("percentage") :0;
		$data['package_amount'] = $this->input->post("package_amount");

		$insert_data = [
			'package_name'         => $data['package_name'],
			'period'               => $data['period'],
			'duration'        	   => $data['duration'],
			'amount'        	   => $data['amount'],
			'percentage'        	   => $data['percentage'],
			'offer_check'        	   => $data['offer_check'],
			'package_amount'       => $data['package_amount'],
			
		];
		$this->db->where('package_id', $package_id);
		$update_success = $this->db->update('package', $insert_data);

		if($update_success){
			$this->db->where('package_id', $package_id);
			$package_desc_old_del = $this->db->delete('package_description');
			if($package_desc_old_del){
				$count=$this->input->post('repeater_block_pckg_desc_edit');

				for ($i = 0; $i < $count; $i++) {
					$data['description'] = $this->input->post('package_desc')[$i];
					$data['yes_no'] = $this->input->post('package_available')[$i];
					$insert_desc = [
						'package_id'           => $package_id,
						'description'           => $data['description'],
						'yes_no'         => $data['yes_no'],
					];

					$result_desc = $this->db->insert('package_description', $insert_desc);
				}
			}
			$this->session->set_flashdata('g_success', $data['package_name'] . ' have been Updated successfully.');
		} else {
			$this->session->set_flashdata('g_err', 'Something went wrong!');
		}
		redirect('Package_management');

		

	}

	// package Delete
	public function package_delete()
	{
		// $lt_name=$_POST['loan_type_name'];

		$data['package_id'] = $this->input->post("delete_package_id");

		$result = $this->db->query("UPDATE package SET status='2' WHERE package_id='" . $data['package_id'] . "'");

		if ($result) {
			$this->session->set_flashdata('g_success', 'Package have been Deleted successfully.');
		} else {
			$this->session->set_flashdata('g_err', 'Something went wrong!');
		}
		redirect('Package_management');
	}

	// pacakge unique
	public function chk_package_unique()
	{
		$package_name = $_POST['package_name'];
		$result = $this->db->query("SELECT * from package
		 where status !='2' and package_name='" . $package_name . "'")->row();

		if (isset($result)) {
			echo "1";
		} else {
			echo "0";
		}
	}
}
?>
