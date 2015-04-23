<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
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
		$this->load->view('login/v_login');
		$this->load->view('m_masuk');
	}
	
	public function validasi()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if (($username==null || $username=="") && ($password==null || $password=="")) {
			redirect(base_url().'Welcome?error=null');
		} else {
			echo "$username && $password";
		}
		
		if ($username==null || $username=="") {
			redirect(base_url().'Welcome?error=nullusername');
		} else {
			echo "$username";
		}

		if ($password==null || $password=="") {
			redirect(base_url().'Welcome?error=nullpassword');
		} else {
			echo "$password";
		}
		
		if (preg_match('/[^a-z0-9]/',$username)) {
			redirect(base_url().'Welcome?error=symbol');	
		}
		

		
		
	}
	private function getcoba_psi($ido){
		$query = $this->db->query('SELECT * FROM `karyawan` WHERE `id` = '.$ido);
		$row = $query->row();
		return $row->username;
	}
	

}
