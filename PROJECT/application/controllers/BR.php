<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BR extends CI_Controller {

	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('B&R/V_B&R');
		
	}
	
	

	}