<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antri extends CI_Controller {

	public function index()
	{
		$this->load->view("v_header");
		$this->load->view("antrian/v_content");
		$this->load->view("v_footer");
		// echo "sukses";
	}

public function validasi(){
		$antrian = $this->input->post('id_pasien');
		//echo $id;
		if ($antrian==null || $antrian==""){
			// echo "Maaf Fild Kosong! Silahkan Input Id Pasien Kembali.";
			redirect(base_url().'antri?error=null');
			
		}
		else {
			echo $antrian;
		}
	}
	
}


