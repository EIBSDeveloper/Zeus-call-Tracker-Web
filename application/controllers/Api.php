<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/*************************************************************************************
Purpose : To handle all login functions 2023-05-03
***************************************************************************************/

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set( 'Asia/Kolkata' );

		$this->load->helper('url'); 
		// $this->load->library('session');
      
    }
    /****************************************************************************************
    Purpose : To handle admin login function
    *****************************************************************************************/

	public function get_data() {
		// $input = json_decode(file_get_contents('php://input'), true);

		// echo translateTextLibre("welcome","ta");
		// echo $input->input;
		// exit;
		// Fetch from the database
		$data = $this->db->query("SELECT ad_countries.* FROM ad_countries")->result();
	
		foreach ($data as $key => $row) {
			// Assuming `name` is the field you want to translate
			if (isset($row->name)) {
				$data[$key]->name_translated = $this->translateTextLibre($row->name, "ta");
			}
		}
	
		// Output the result
		echo json_encode(['data' => $data]);
		// echo json_encode(translateTextLibre("welcome","hi"));
	}

	// Function to translate text dynamically
	function translateTextLibre($text, $targetLanguage) {
		$url = "https://libretranslate.com/translate";
	
		$data = [
			'q' => $text,
			'source' => 'en',  // Source language
			'target' => $targetLanguage, // Target language (e.g., 'hi' for Hindi)
			'format' => 'text'
		];
	
		$options = [
			'http' => [
				'header' => "Content-Type: application/json\r\n",
				'method' => 'POST',
				'content' => json_encode($data),
			],
		];
	
		$context = stream_context_create($options);
		$response = file_get_contents($url, false, $context);
	
		$responseData = json_decode($response, true);
	
		// Return translated text or the original text if the translation fails
		return $responseData['translatedText'] ?? $text;
	}
 	
}
?>
