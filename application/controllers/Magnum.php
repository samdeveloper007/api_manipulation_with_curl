<?php
    error_reporting(0);
    class Magnum extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('curl');
        }
        public function index($id=''){
            // echo $id;die;
            if (!empty($id)) {
                $apiURL = 'http://localhost/restfull_api_ci/index.php/api/products/' . $id;
            } else {
                $apiURL = 'http://localhost/restfull_api_ci/index.php/api/products';
            }

            // Perform cURL request here using $apiURL and store the response in $response.

        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => true,
            CURLOPT_SSL_VERIFYPEER => true
        );

        // Perform cURL request here using $apiURL and store the response in $response.
        $ch = curl_init($apiURL);
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            echo "cURL Error: " . curl_errno($ch) . ' - ' . curl_error($ch);
        } else {
            $data = json_decode($response, true);
            echo "<pre>";print_r($data);
        }
        }
    }
?>