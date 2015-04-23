<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resep extends CI_Controller {
	public function index(){
		$data = array("idpemeriksaan"=>"","namapasien"=>"","namadokter"=>"");
		$this->load->view("v_header");
		$this->load->view("resep/v_content",$data);
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
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$inputobat = $this->input->post('inputobat');
		
		$keterangan = $this->input->post('keterangan');
		
		$idpemeriksaan = $this->input->post('idpemeriksaan');
		
		if (($idpemeriksaan==null || $idpemeriksaan=="")) {
			redirect(base_url().'resep?erroidpemeriksaan=null');
			
		}
		else  {
			$this->tampilid($idpemeriksaan);
			
			
		}

	}
	public function validasi2(){
			$this->load->helper(array('form','url'));
			$this->load->library('form_validation');
			$inputobat = $this->input->post('inputobat');
			
			$keterangan = $this->input->post('keterangan');
			
			$idpemeriksaan = $this->input->post('idpemeriksaan');
			
			if (($inputobat==null || $inputobat=="") && ($keterangan==null || $keterangan=="")) {
				redirect(base_url().'resep?error=null');
				
			}
			elseif ($keterangan==null || $keterangan=="") {
				redirect(base_url().'resep?errorketerangan=null');
				
			}
			elseif ($inputobat==null || $inputobat=="") {
				redirect(base_url().'resep?errorobat=null');
				
			}
			else  {
				echo $inputobat;
				echo $keterangan;
				//$this->tampilid($idpemeriksaan);
				
				
			}

		}
	public function tampilid($idpemeriksaan){
		$this->load->database();
		$idpemeriksaan = $this->input->post('idpemeriksaan');
		$this->load->model('m_resep');
		$query = $this->m_resep->getcariid($idpemeriksaan);
		$ro = $query->row();
		$data = array("idpemeriksaan"=> $ro->ID_PERIKSA, "namapasien"=> $ro->NAMA_PASIEN, "namadokter"=> $ro->NAMA_DOKTER);
		$this->load->view("v_header");
		$this->load->view("resep/v_content",$data);
		$this->load->view("v_footer");
	}
	// private function getObat($id){
	// 	$query = $this->db->query('SELECT * FROM `dokter` WHERE `id` ="'.$id.'"');
	// 	$row = $query->row();
	// 	return $row->obat;
	// }
		
}

