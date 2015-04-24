<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resep extends CI_Controller {
	public function index(){
		$data = array("idpemeriksaan"=>"","idpasien"=>"","namapasien"=>"","iddokter"=>"","namadokter"=>"");
		$this->load->view("v_header");
		$this->load->view("resep/v_content",$data);
		$this->load->view("v_footer");
		
	}
	
	
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

	public function input(){
		$this->load->database();

		$idresep = $this->session->idresep;
		$idpemeriksaan = $this->input->post('idpemeriksaan');
		$idpasien = $this->input->post('idpasien');
		$iddokter = $this->input->post('iddokter');
		$tglresep = $this->input->post('tglresep');
		$this->load->model('m_resep');
		$input_r = $this->m_resep->getData($idresep, $idpemeriksaan, $idpasien, $iddokter, $tglresep);
		$this->index();
		
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
				
				
			}

		}
	public function tampilid($idpemeriksaan){
		$this->load->database();
		$idpemeriksaan = $this->input->post('idpemeriksaan');
		$this->load->model('m_resep');
		$query = $this->m_resep->getcariid($idpemeriksaan);
		$ro = $query->row();
		$data = array("idpemeriksaan"=> $ro->ID_PERIKSA, "idpasien"=> $ro->ID_PASIEN, "namapasien"=> $ro->NAMA_PASIEN, "iddokter"=> $ro->ID_DOKTER,"namadokter"=> $ro->NAMA_DOKTER);
		$this->load->view("v_header");
		$this->load->view("resep/v_content",$data);
		$this->load->view("v_footer");
	}
	
}

