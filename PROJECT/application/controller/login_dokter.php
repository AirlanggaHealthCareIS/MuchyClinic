<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Login_dokter extends CI_Controller {

	public function Login_dokter () {
		parent::__construct();
		$this->login_title = "dokter";
		$this->login_url_validasi = base_url()."login_dokter/validasi";

	}

	public function index()
	{
		// $this->load->view('v_header_dokter');
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
		$this->load->view('v_header_dokter');
		$this->load->view('login/v_login');
		$this->load->view('m_masuk');
	}
	
	public function testing()
	{
		$this->load->library('unit_test');
		$this->unit->run($this->inputvalidasi("Caca","marica"),true, "username password benar");
		echo $this->unit->report();
	}

	public function validasi()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//$username1 = $this->inputvalidasi($username);
		//$password1 = $this->inputvalidasi($password);


		if (($username==null || $username=="") && ($password==null || $password=="")) {
			redirect(base_url().'login_dokter?error=null');
		} 
		
		if ($username==null || $username=="") {
			redirect(base_url().'login_dokter?error=nullusername');
		} 
// 
		if ($password==null || $password=="") {
			redirect(base_url().'login_dokter?error=nullpassword');
		} 
		
		if (preg_match('/[^a-z0-9]/i',$username)) {
			redirect(base_url().'login_dokter?error=symbol');	
		}
		
		$this->load->model('m_login');
		$login = $this->m_login->getdokter($username,$password);
		if ($login==true) {
			// echo "awakmu wes melbu login boss";
			$this->session->set_userdata('username_dokter', $username);
			redirect(base_url().'lihatjadwal/showDokter');
		} else {

			redirect(base_url().'login_dokter?error=m_login');
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
		// $login = $this->m_login->getdokter($username,$password);
		// if ($login==true) {
		// 	return true;
		// } else {
		// return false;
		// } 

	

	}

}
