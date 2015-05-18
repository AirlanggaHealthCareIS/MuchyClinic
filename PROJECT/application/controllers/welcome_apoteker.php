<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_apoteker extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login/apoteker_login');
		// $username = $this->getcoba_psi(1);
		// echo $username;


		// $this->load->database();
		// $this->load->model('m_masuk');
		// $call = $this->m_masuk->getcoba_psi(1);
		// $ro = $call->row();
		// echo $ro->username;
	}
	public function panggil()
	{
		$this->load->view('header');
		$this->load->view('login/apoteker_login');
		$this->load->view('m_masuk');
	}
	
	public function validasi()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if (($username==null || $username=="") && ($password==null || $password=="")) {
			redirect(base_url().'Welcome?error=null');
		} 
		
		if ($username==null || $username=="") {
			redirect(base_url().'Welcome?error=nullusername');
		} 

		if ($password==null || $password=="") {
			redirect(base_url().'Welcome?error=nullpassword');
		} 
		
		if (preg_match('/[^a-z0-9]/',$username)) {
			redirect(base_url().'Welcome?error=symbol');	
		}
		
		$this->load->model('m_login');
		$login = $this->m_login->getapoteker($username,$password);
		if ($login==true) {
			echo "awakmu wes melbu login boss";
		} else {

			redirect(base_url().'Welcome_apoteker?error=m_login');
		} 

	}

}