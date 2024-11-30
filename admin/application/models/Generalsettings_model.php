<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*************************************************************************************

    Purpose : To handle all the General Setting model database details 2024-07-30 By Vasanth

**************************************************************************************/

class Generalsettings_model extends CI_Model

{

  function __construct()

    {

        parent::__construct();

        date_default_timezone_set('Asia/Calcutta'); 

    }

// Start Code
public function  general_setting_update($gen_settings, $id)
{

    $columns = '';
    $condition = '';
    if($gen_settings != '' && $id != '')
    {
        // print_r($gen_settings['logo']);exit;
        // $columns = "logo = '".trim($gen_settings['logo'])."',  fav_icon = '".trim($gen_settings['favicon'])."',  title = '".trim($gen_settings['title'])."', website =  '".trim($gen_settings['website'])."',  area_street ='".trim($gen_settings['address'])."',  country_id = '".trim($gen_settings['country'])."', state_id = '".trim($gen_settings['state'])."', city_id = '".trim($gen_settings['city'])."', pincode = '".trim($gen_settings['pincode'])."', date_format = '".trim($gen_settings['date_format'])."', phone_no = '".trim($gen_settings['phone_no'])."', mobile_no = '".trim($gen_settings['mobile_no'])."'";

        $columns = "title = '".trim($gen_settings['title'])."', logo = '".trim($gen_settings['logo'])."', fav_icon = '".trim($gen_settings['favicon'])."', website =  '".trim($gen_settings['website'])."',email =  '".trim($gen_settings['email'])."',  area_street ='".trim($gen_settings['address'])."',  country_id = '".trim($gen_settings['country'])."', state_id = '".trim($gen_settings['state'])."', city_id = '".trim($gen_settings['city'])."', pincode = '".trim($gen_settings['pincode'])."', date_format = '".trim($gen_settings['date_format'])."', phone_no = '".trim($gen_settings['phone_no'])."', mobile_no = '".trim($gen_settings['mobile_no'])."', loan_remain = '".trim($gen_settings['loan_remainder_date'])."'";

        $condition = ' general_settings_id = "'.$id.'"';
        $result = common_update_values($columns, 'general_settings', $condition);

    }
    else
    {
        $result = false;
    }
   return $result;
}

public function state_list($country_id){
 
    $result=$this->db->query("select * from ad_states where country_id='".$country_id."' and status =0")->result_array();
    return $result;
}

public function city_list($state_id){
 
  $result=$this->db->query("select * from ad_cities where state_id='".$state_id."' and status =0")->result_array();
  return $result;
}



   

} 
