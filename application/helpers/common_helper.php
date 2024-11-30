<?php
/**************************************************************************************
  Common Helper : To get common function in Space dot
**************************************************************************************/

// commondate format 
function common_date_format()
{
  $ci=& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')->from('general_settings')->get()->row();
  if(!empty($result))
  {
    $date_format = $result->date_format;
  }else{
    $date_format = 'd-M-Y';
  }
  return $date_format;
}

// encrypt_decrypt
function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
    $secret_iv = '5fgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
function get_time_ago($time){

    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'Year',
                30 * 24 * 60 * 60       =>  'Month',
                24 * 60 * 60            =>  'Day',
                60 * 60                 =>  'Hour',
                60                      =>  'Min',
                1                       =>  'Sec'
    );

    foreach($condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

// end

function get_next_User_filename($upload_path) {
	// Get all files in the upload directory
	$files = glob($upload_path . '_user*.png'); // Adjust the extension if needed
	$max_num = 0;

	// Iterate over files to find the highest number
	foreach ($files as $file) {
		$filename = basename($file);
		$num = (int) str_replace(['_user', '.png'], '', $filename); // Adjust the extension if needed
		if ($num > $max_num) {
			$max_num = $num;
		}
	}

	// Return the next filename
	return ($max_num + 1) .'_user'. '.png'; // Adjust the extension if needed
}

// last_login  
function last_login($user_id){
    $ci = &get_instance();
    $ci->load->database();

    // Fetch the last record for the given user_id based on user_log_id
    $last_data = $ci->db->select('log_in_time') // Select only log_in_time
                        ->from('user_log')
                        ->where('user_id', $user_id)
                        ->order_by('sno', 'DESC') // Ensure the latest record is retrieved
                        ->limit(1) // Limit the result to 1 record
                        ->get()
                        ->row();

    // Return the log_in_time value if record exists, else null
    return $last_data ? $last_data->log_in_time : null;
}

// incoming call 
function incoming_call($user_id){

}

// outcoming_call  
function outcoming_call($user_id){

}

// average_outcoming_call  
function average_outcoming_call($user_id){

}

// missed_call  
function missed_call($user_id){

}

// average_missed_call  
function average_missed_call($user_id){

}

// rejected_call  
function rejected_call($user_id){

}



 // To show date format
  function show_date($date)
  {
    return date('d-m-Y', strtotime($date));
  }

  function explode_date($date)
  {
    $exploded_date = explode('/', $date);
    $date = $exploded_date[2].'-'.$exploded_date[0].'-'.$exploded_date[1];
    return $date;
  }


// To check date is in two different dates
 function check_date_between_two_dates($ac_start_date, $ac_end_date, $t_date)
 {

    $ac_start_date = date('Y-m-d', strtotime($ac_start_date));
    $ac_end_date   = date('Y-m-d', strtotime($ac_end_date));
    $t_date   = date('Y-m-d', strtotime($t_date));

    if (($t_date >= $ac_start_date) && ($t_date < $ac_end_date))
    {
      return 1;
    }else{
        return 0;  
    }

 }

 // IND_money_format
function IND_money_format($number)
{
	if ($number == 0) {
		return '0.00';
	}

	$decimal = (string)($number - floor($number));
	$money = floor($number);
	$length = strlen($money);
	$delimiter = '';
	$money = strrev($money);

	for ($i = 0; $i < $length; $i++) {
		if (($i == 3 || ($i > 3 && ($i - 1) % 2 == 0)) && $i != $length) {
			$delimiter .= ',';
		}
		$delimiter .= $money[$i];
	}

	$result = strrev($delimiter);
	$decimal = preg_replace("/0\./i", ".", $decimal);
	$decimal = substr($decimal, 0, 3);

	if ($decimal != '0') {
		$result = $result . $decimal;
	}

	$formatted_num = str_pad($result, 2, '0', STR_PAD_LEFT);
	return $formatted_num;
}

// general setting 
function get_general_settings()
{
  $ci=& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')->from('general_settings')->where('general_settings_id',1)->get()->row();
 
  return $result;
}

// get subscriber details
function get_subscriber_details($id)
{
	$ci = &get_instance();
	$ci->load->database();
	$result = $ci->db->select('*')->from('user')->where('user_id', $id)->get()->row();
	// $result = $ci->db;
	// save_query_in_log();
	return $result;
}

// To get Member details
function login_subscriber_details()
{
	$ci = &get_instance();
	$ci->load->database();
	$result = $ci->db->select('*')->from('user')->where('user_id', $_SESSION['user_id'])->get()->row();
	// $result = $ci->db;
	// save_query_in_log();
	return $result;
}

// renewal days count
function renewal_days_count($subscriber_id)
{
    $ci = &get_instance();
    $ci->load->database();

    // Get the end_date from the subscriber table for the given subscriber_id
    $subscriber = $ci->db->select('end_date')
                         ->from('subscriber')
                         ->where('subscriber_id', $subscriber_id)
                         ->get()
                         ->row();

    // If the subscriber exists and has an end_date
    if ($subscriber && $subscriber->end_date) {
        $end_date = new DateTime($subscriber->end_date);
        $current_date = new DateTime();

        // Calculate the difference in days
        $date_difference = $current_date->diff($end_date)->days;

        // Check if the current date is before the end_date
        if ($current_date < $end_date) {
            return $date_difference;
        } else {
            return 0; // Renewal period has passed
        }
    } else {
        return 0; // Subscriber not found or end_date is not set
    }
}

 function convertNumberToWords($number){
    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
    '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
    '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
    '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
    '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
    '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
    '80' => 'eighty','90' => 'ninty');
    
    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0,0,0,0,0,0,0,0,0);        
    $received_number_array = array();
    
    //Store all received numbers into an array
    for($i=0;$i<$number_length;$i++){    
      $received_number_array[$i] = substr($number,$i,1);    
    }

    //Populate the empty array with the numbers received - most critical operation
    for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
        $number_array[$i] = $received_number_array[$j]; 
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for($i=0,$j=1;$i<9;$i++,$j++){
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if($i==0 || $i==2 || $i==4 || $i==7){
            if($number_array[$j]==0 || $number_array[$i] == "1"){
                $number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
                $number_array[$i] = 0;
            }
               
        }
    }

    $value = "";
    for($i=0;$i<9;$i++){
        if($i==0 || $i==2 || $i==4 || $i==7){    
            $value = $number_array[$i]*10; 
        }
        else{ 
            $value = $number_array[$i];    
        }            
        if($value!=0)         {    $number_to_words_string.= $words["$value"]." "; }
        if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
        if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
        if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
        if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }            

    }
    if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
    return ucwords(strtolower("Rupees ".$number_to_words_string)." Only.");
}




?>
