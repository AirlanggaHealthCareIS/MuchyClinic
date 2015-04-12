<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login/v_login');
		
	}
	public function panggil()
	{
		$this->load->view('header');
		$this->load->view('login/v_login');
	}
	
	public function validasi()
	{
		$username = $this->input->post('username');
		if ($username==null || $username==" ") {
			redirect(base_url().'Welcome?error=null');
		} else {
			echo "$username";
		}
		
	}
	

}
