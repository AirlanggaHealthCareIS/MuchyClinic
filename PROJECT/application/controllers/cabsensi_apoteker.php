<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cabsensi_apoteker extends CI_Controller {
	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('absensi/v_absensi_apoteker');
		$this->load->view('v_footer');	
		
	}
	
	private function inputabsensiApoteker()
	{
		date_default_timezone_set('Asia/Jakarta');
		$ida=$this->input->post('id_apoteker');

		$datea=date('Y-m-d');
		$timeda=date('H:i:s');
		$timepa=date('H:i:s');
		if($timepa>='16:00:00'||$timepa<="06:00:00"){
			$keta='lembur';
		}
		else{
			$keta='tepat';
		}
		$this->load->model("m_absensi");
		$inputY = $this->m_absensi->getAbsensiApoteker($ida, $timeda, $datea, $timepa,$keta);
	}

	public function validasi()
	{
		$ida=$this->input->post('id_apoteker');
		
		if($ida==null|| $ida==""){
			//echo "kok kosong";
			redirect(base_url().'cabsensi_apoteker?status=null');
		}
		
		else{
			//panggil metod insert db
			$ina = $this->inputabsensiApoteker();
			redirect(base_url().'cabsensi_apoteker?status=sukses');
		
		}

	}



}
