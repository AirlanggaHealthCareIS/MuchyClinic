<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('login/v_login');
		$this->load->view('v_footer');
		
	}	
	public function validasi()
	{
		$username = $this->input->post('username');
		if ($username==null || $username==" ") {
			redirect(base_url().'clogin?error=null');
		} else {
			echo "$username";
		}
}
}