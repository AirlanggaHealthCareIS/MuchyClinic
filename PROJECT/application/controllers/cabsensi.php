<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabsensi extends CI_Controller {
	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('absensi/v_absensi');
	}
	
	public function panggil()
	{
		/*$this->load->view('v_header');
		$this->load->view('absensi/v_absensi');*/
	}
	public function validasi()
	{
		$id = $this->input->post('id_karyawan');
		echo $id;
		if($id==null|| $id==""){
			//echo "kok kosong";
			redirect(base_url().'cabsensi?error=null');
		}
		else{
			echo $id;
		}
	}
}