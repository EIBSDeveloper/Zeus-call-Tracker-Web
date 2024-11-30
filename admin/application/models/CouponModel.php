<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*************************************************************************************

    Purpose : To handle all the General Setting model database details 2024-11-05 By Rajkumar

**************************************************************************************/

class CouponModel extends CI_Model

{

    public function __construct() {
        parent::__construct();
        // Load the database library
        $this->load->database();
    }


    public function insert_coupon($data) {
    
        $this->db->insert('coupon', $data);

        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public  function get_coupon_list(){
  
        $result = $this->db->select('coupon.*, package.package_name')  // Select all fields from coupon and package_name from package table
        ->from('coupon')  
        ->join('package', 'coupon.package_id = package.package_id', 'left')  
        ->where('coupon.status !=', '2')  
        ->order_by('coupon.sno', 'DESC') 
        ->get()  
        ->result_array(); 
    
        
        return $result;
      }
    //   function get_Stockcategory_by_name($name){

    //     $result=$this->db->query("SELECT * FROM coupon WHERE status !='2' and coupon_name='".$name."'")->row();
      
    //     return $result;
    //   }

    
  function get_coupon_by_lcid($lc_id){
  
    $result=$this->db->query("SELECT * FROM coupon WHERE status !='2' and sno='".$lc_id."'")->row();
    
    return $result;
  }
  
  public function update_coupon($data) {
    
    $this->db->where('sno', $data['sno']);  // Use 'sno' to find the record
    $this->db->update('coupon', $data);   
    
    if ($this->db->affected_rows() > 0) {
        return true;  
    } else {
        return false;
    }
  }
    public function lc_change_status($qsid, $status)
    {

    $result = $this->db->query("UPDATE coupon SET status='".$status."' WHERE sno='".$qsid."'");
    
    return $result;

    }
    function coupon_code_delete($data){
        $this->db->reconnect();
        $result=$this->db->query("UPDATE coupon SET status='2' WHERE sno='".$data['lc_id']."'");
      
        $this->db->close();
        return $result;
      }
      

}