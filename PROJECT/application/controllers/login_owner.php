<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_owner extends CI_Controller {

	public function Login_owner () {
		parent::__construct();
		$this->login_title = "owner";
		$this->login_url_validasi = base_url()."login_owner/validasi";

	}
	public function index()
	{
		// $this->load->view('v_header');
		
		$this->load->view('login/v_login');
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
		$this->load->view('login/karyawan_login');
		$this->load->view('m_masuk');
	}

	public function testing()
	{
		$this->load->library('unit_test');
		$this->unit->run($this->inputvalidasi("Sugiarto","harta"),true, "username password benar");
		echo $this->unit->report();
	}
	
	public function validasi()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// $username1 = $this->inputvalidasi($username);
		// $password1 = $this->inputvalidasi($password);


		if (($username==null || $username=="") && ($password==null || $password=="")) {
			redirect(base_url().'Login_owner?error=null');
		} 
		
		if ($username==null || $username=="") {
			redirect(base_url().'Login_owner?error=nullusername');
		} 

		if ($password==null || $password=="") {
			redirect(base_url().'Login_owner?error=nullpassword');
		} 
		
		if (preg_match('/[^a-z0-9]/',$username)) {
			redirect(base_url().'Login_owner?error=symbol');	
		}
		
		$this->load->model('m_login');
		$login = $this->m_login->getowner($username,$password);
		if ($login==true) {
			redirect(base_url().'laporanuang#submenu');
		} else {

			redirect(base_url().'Login_owner?error=m_login');
		} 

	

	}

	public function inputvalidasi($username1,$password1)
	{
		if (($username1==null || $username1=="") && ($password1==null || $password1=="")) {
			return "error=null";
		} 
		
		if ($username1==null || $username1=="") {
			return "error=nullusername";
		} 

		if ($password1==null || $password1=="") {
			return "error=nullpassword";
		} 
		
		if (preg_match('/[^a-z0-9]/',$username1)) {
			return "error=symbol";	
		}
		
		// $this->load->model('m_login');
		// $login = $this->m_login->getkaryawan($username,$password);
		// if ($login==true) {
		// 	return true;
		// } else {
		// return false;
		// } 

	

	}

}