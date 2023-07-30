<?php
    error_reporting(0);
    class ProductController extends CI_Controller{
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

        public function store(){
            $url='http://localhost/restfull_api_ci/index.php/api/products/';
            $data= [
                "name"=>"Laptop",
                "price"=>"56000"
            ];

            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYHOST => true,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_POSTFIELDS => $data
            );

            // Perform cURL request here using $apiURL and store the response in $response.
            $ch = curl_init($url);
            curl_setopt_array($ch, $options);
            $response = curl_exec($ch);
            curl_close($ch);
        }

        public function update($id){
            $url= 'http://localhost/restfull_api_ci/index.php/api/product-update/'.$id;
            // echo $url;die;
            $data=array(
                "name"=>"Bike",
                "price"=>"90000"
            );

            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYHOST => true,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_POSTFIELDS => $data
            );

            $ch= curl_init($url);
            curl_setopt_array($ch, $options);
            $response= curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'cURL Error: ' . curl_error($ch);
            } else {
                // Process the response
                // echo 'Data updated successfully!';
                $response=json_decode($response);
                echo $response[0];
            }
            curl_close($ch);
        }

        public function  delete($id){
            $url= 'http://localhost/restfull_api_ci/index.php/api/product-delete/'.$id;
            $options= array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYHOST => true,
                CURLOPT_SSL_VERIFYPEER => true
            );
            $ch = curl_init($url);
            curl_setopt_array($ch, $options);
            $response= curl_exec($ch);
            if($response===false){
                echo "cURL Error : ".curl_error($ch);
            }else{
                $response= json_decode($response);
                print_r($response);
            }
        }

    }
?>