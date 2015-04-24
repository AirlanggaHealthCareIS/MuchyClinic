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

		$idkr=$this->input->post('id_karyawan');
		$datekr=$this->input->post('date_masuk');
		$timedkr=$this->input->post('time_masuk');
		$timepkr=$this->input->post('time_pulang');
		$ketkr=$this->input->post('ket');
		$this->load->model("m_absensi");
		$inputX = $this->m_absensi->getAbsensiKaryawan($idkr,$timedkr,$datekr,$timepkr,$ketkr);

	}
	
	public function panggil()
	{
		
	}
	public function validasi()
	{
		$idkr=$this->input->post('id_karyawan');
		$datekr=$this->input->post('date_masuk');
		$timedkr=$this->input->post('time_masuk');
		$timepkr=$this->input->post('time_pulang');
		$ketkr=$this->input->post('ket');
		
		if($idkr==null|| $idkr==""){
			//echo "kok kosong";
			redirect(base_url().'cabsensi?error=null');
		}
		if($timedkr==null| $timedkr=""){
			redirect(base_url().'cabsensi?error=null');
		}
		if($timepkr==null| $timepkr=""){
			redirect(base_url().'cabsensi?error=null');
		}
		if($datekr==null| $datekr=""){
			redirect(base_url().'cabsensi?error=null');
		}
		if($ketkr==null| $ketkr=""){
			redirect(base_url().'cabsensi?error=null');
		}
		else{
			//panggil metod insert db
			$in = $this->inputabsensikaryawan();
			redirect(base_url().'cabsensi?status=sukses');
		}
	}


}
