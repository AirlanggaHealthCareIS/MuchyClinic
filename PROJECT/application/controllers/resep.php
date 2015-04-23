<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resep extends CI_Controller {
	public function index(){
		$this->load->view("v_header");
		$this->load->view("resep/v_content");
		$this->load->view("v_footer");
		// $this->load->database();
		// $call = $this->getObat("1");
		// echo $call;
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
		$idpemeriksaan = $this->input->post('idpemeriksaan');
		//$idpemeriksaan = $this->input->post('keterangan');
		//echo $idpemeriksaan;
		if (($inputobat==null || $inputobat=="") && ($keterangan==null || $keterangan=="") && ($idpemeriksaan==null || $idpemeriksaan=="")) {
			redirect(base_url().'resep?error=null');
			//echo "Maaf field anda kosong";
		}
		elseif ($keterangan==null || $keterangan=="") {
			redirect(base_url().'resep?errorketerangan=null');
			//echo "Maaf field anda kosong";
		}
		elseif ($inputobat==null || $inputobat=="") {
			redirect(base_url().'resep?errorobat=null');
			//echo "Maaf field anda kosong";
		}
		elseif ($idpemeriksaan==null || $idpemeriksaan=="") {
			redirect(base_url().'resep?erroidpemeriksaan=null');
			//echo "Maaf field anda kosong";
		}
		else  {
			echo $idpemeriksaan;
			echo $inputobat;
			echo $keterangan;
			
			
		}

	}
	// private function getObat($id){
	// 	$query = $this->db->query('SELECT * FROM `dokter` WHERE `id` ="'.$id.'"');
	// 	$row = $query->row();
	// 	return $row->obat;
	// }
		
	
	
}

