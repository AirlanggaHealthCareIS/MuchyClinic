<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpemeriksaan extends CI_Controller {
	public function index()
	{
		$this->load->model('m_pemeriksaan');
		$penyakit = $this->m_pemeriksaan->getPenyakit();
		$data = array("getpeny" => $penyakit);

		$this->load->view('v_header');
		$this->load->view('pemeriksaan/v_pemeriksaan', $data);
		$this->load->view('v_footer');	
	}
	private function InputPemeriksaan(){
		date_default_timezone_set('asia/jakarta');

		

	}
	public function validasiPemeriksaan(){
		
	}
}