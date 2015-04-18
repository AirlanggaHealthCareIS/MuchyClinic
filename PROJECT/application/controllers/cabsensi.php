<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabsensi extends CI_Controller {
	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('absensi/v_absensi');
		$this->load->view('v_footer');	
		


			


	}
	
	private function input()
	{
		$idk = $this->input->post('id_karyawan');
		$timek=$this->input->post('time_masuk');
		$datek=$this->input->post('date_masuk');
		$this->load->model("m_absensi");
		$inputA = $this->m_absensi->getAbsensi($idk,$timek,$datek);
	}
	
	public function panggil()
	{
		
	}
	public function validasi()
	{
		$id = $this->input->post('id_karyawan');
		$time=$this->input->post('time_masuk');
		$date=$this->input->post('date_masuk');
		echo $id;
		if($id==null|| $id==""){
			//echo "kok kosong";
			redirect(base_url().'cabsensi?error=null');
		}
		if($time==null| $time=""){
			redirect(base_url().'cabsensi?error=null');
		}
		if($date==null| $date=""){
			redirect(base_url().'cabsensi?error=null');
		}
		else{
			$this->input($id);
		}
	}
}
