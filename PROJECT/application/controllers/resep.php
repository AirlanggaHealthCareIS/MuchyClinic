<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resep extends CI_Controller {
	public function index(){
		$this->load->view("v_header");
		$this->load->view("resep/v_content");
		$this->load->view("v_footer");
	}
	
	// public function panggil(){
	// 	$this->load->view("v_header_resep");
	// 	$this->load->view("resep/v_content");
	// }
	public function validasi(){
		$inputobat = $this->input->post('inputobat');
		//echo $inputobat; 
		$keterangan = $this->input->post('keterangan');
		// echo $keterangan;
		if (($inputobat==null || $inputobat=="") && ($keterangan==null || $keterangan=="")) {
			redirect(base_url().'resep?error=null');
			//echo "Maaf field anda kosong";
		}
		elseif ($keterangan==null || $keterangan=="") {
			redirect(base_url().'resep?error=null');
			//echo "Maaf field anda kosong";
		}
		elseif ($inputobat==null || $inputobat=="") {
			redirect(base_url().'resep?error=null');
			//echo "Maaf field anda kosong";
		}
		else  {
			echo $inputobat;
			echo $keterangan;
			
		}
		
	}
	
}

