<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ccoba extends CI_Controller {

	
	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('absensi/v_absensiutama');
		$this->load->view('v_footer');

		date_default_timezone_set('Asia/Jakarta');
		$timekr=date('H:i:s');
		echo $timekr;
		if($timekr>=('20:00:00')){
			echo 'lembur';
		}
		else{
			echo 'tidak lembur';
		}

	}
	public function time()
	{

		$sekarang = timezone_open();
		echo $sekarang;

	}


}
