<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabsensi extends CI_Controller {
	public function index()
	{

		$this->load->view('v_header');
		$this->load->view('absensi/v_absensi');
		$this->load->view('v_footer');	
		
	}
	
	/*private function input()
	{
		$idk = $this->input->post('id_karyawan');
		$timek=$this->input->post('time_masuk');
		$datek=$this->input->post('date_masuk');
		$this->load->model("m_absensi");
		$inputA = $this->m_absensi->getAbsensi($idk,$timek,$datek);

	}*/
	private function inputabsensikaryawan()
	{
		date_default_timezone_set('asia/jakarta');
		$idkr=$this->input->post('id_karyawan');

		$datekr=date('Y-m-d');
		$timedkr=date('H:i:s');
		if ($timedkr<'16:00:00' && $timedkr>'07:00:00') {
			$timepkr = '' ;
		}
		else {
		$timedkr='';
		$timepkr=date('H:i:s');
		if($timepkr>'18:00:00'){
			$ketkr='lembur';
		}
		else{
			$ketkr='tidak lembur';
		}
		}
		$this->load->model("m_absensi");
		$inputX = $this->m_absensi->getAbsensiKaryawan($idkr,$timedkr,$datekr,$timepkr,$ketkr);
		

	}
	public function validasi()
	{
		$idkr=$this->input->post('id_karyawan');
		
		
		if($idkr==null|| $idkr==""){
			//echo "kok kosong";
			redirect(base_url().'cabsensi?error=null');
		}
		
		else{

			//panggil metod insert db
			$in = $this->inputabsensikaryawan();
			redirect(base_url().'cabsensi?status=sukses');
		
		}

	}


}
