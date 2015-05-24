<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpemeriksaan extends CI_Controller {
	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('pemeriksaan/v_pemeriksaan');
		$this->load->view('v_footer');	
		

	}
}