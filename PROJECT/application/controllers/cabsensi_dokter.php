<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cabsensi_dokter extends CI_Controller {
	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('absensi/v_absensi_dokter');
		$this->load->view('v_footer');	
		
		
		


	}
	
	private function inputabsensiDokter()
	{
		date_default_timezone_set('Asia/Jakarta');
		$idd=$this->input->post('id_dokter');

		$dated=date('Y-m-d');
		$timedd=date('H:i:s');
		$timepd=date('H:i:s');
		if($timepd>='16:00:00'|| $timepd<="06:00:00"){
			$ketd='lembur';
		}
		else{
			$ketd='tepat';
		}
		$this->load->model("m_absensi");
		$inputY = $this->m_absensi->getAbsensiDokter($idd, $timedd, $dated, $timepd,$ketd);
				

	}
	
	
	

	public function validasi()
	{
		$idd=$this->input->post('id_dokter');
		
		if($idd==null|| $idd==""){
			//echo "kok kosong";
			redirect(base_url().'cabsensi_dokter?error=null');
		}
		
		else{
			//panggil metod insert db
			$in = $this->inputabsensiDokter();
			redirect(base_url().'cabsensi_dokter?status=sukses');
		
		}

	}


}
