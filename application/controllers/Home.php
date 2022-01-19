<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct(); 
        $this->load->library('form_validation');        
		$this->load->library('datatables'); 

    }
  

    public function index()
    { 
		$data = array(
            'button' => 'Convert',
            'content' => 'api/form', 
            'action' => site_url('Home/convert_action'),
			'binToDec' => set_value('binToDec'),
			'decToBin' => set_value('decToBin'),
		);
        $this->load->view('sb-admin', $data);
    }  
	 
    
    public function convert_action() 
    {
		$binToDec = $this->input->post('binToDec');
		$decToBin = $this->input->post('decToBin');
		$data_post = array();

		$data_new = json_encode($data_post);     
        $curl_bearer = curl_init(); 
        curl_setopt($curl_bearer, CURLOPT_URL, 'http://localhost:8080/api_drs/Welcome/index/'.$binToDec.'/'.$decToBin);
        curl_setopt($curl_bearer, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_bearer, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl_bearer, CURLOPT_POST, true);
        curl_setopt($curl_bearer, CURLOPT_POSTFIELDS, $data_new);
        curl_setopt($curl_bearer, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $result = curl_exec($curl_bearer);
        curl_close($curl_bearer); 
        $hasil = json_decode($result, true); 
		
		$data = array( 
            'content' => 'api/hasil',  
			'binToDec' => "Binari to Decimal : ".$binToDec ."==>". $hasil['hasil1'],
			'decToBin' => "Decimal to Binari : ".$decToBin."==>". $hasil['hasil2'],
		);
 
        $this->load->view('sb-admin', $data);
    }
 
} 
