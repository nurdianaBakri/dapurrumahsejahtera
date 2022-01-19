<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Palindrom extends CI_Controller
{
    function __construct()
    {
        parent::__construct(); 
        $this->load->library('form_validation');
    }

    public function index()
    {
		$data = array(
            'button' => 'Convert',
            'content' => 'palindrom/form', 
            'action' => site_url('Palindrom/action'),
			'kalimat' => set_value('kalimat'), 
		);
        $this->load->view('sb-admin', $data);
    }
   

	// To check sentence is palindrome or not
	function action()
	{ 
		$str = $this->input->post('kalimat');
 
 
		$balik = strrev($str); 
		if ($str == $balik){
			
			$hasil= $balik;
		}
			 
		else {
			$hasil= '';
		}

		$data = array(
			'button' => 'Convert',
			'content' => 'palindrom/hasil', 
			'hasil' => $hasil,  
		);
		 

        $this->load->view('sb-admin', $data);

	}
 

} 
