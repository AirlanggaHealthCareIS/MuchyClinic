<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resep extends CI_Controller {
	public function index(){
		$data = array("idpemeriksaan"=>" ","idpasien"=>" ","namapasien"=>" ","iddokter"=>" ","namadokter"=>" ", "idobat"=>" ", "namaobat"=>"");
		$this->load->view("v_header");
		$this->load->view("resep/v_content",$data);
		$this->load->view("v_footer");
		
	}
	
	public function index2(){
		
		$data = array("idobat"=>" ", "namaobat"=>"");
		$this->load->view("v_header");
		$this->load->view("resep/v_resep",$data);
		$this->load->view("v_footer");
	}

	public function index3(){
		
		$this->load->view("v_header");
		$this->load->view("resep/v_resep");
		$this->load->view("v_footer");
	}


	
	public function getidpemeriksaan(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');


		$idpemeriksaan = $this->input->post('idpemeriksaan');
		
		if ($idpemeriksaan==null || $idpemeriksaan=="") {
			redirect(base_url().'resep?erroidpemeriksaan=null');
		}
		else  {
			$this->tampilid($idpemeriksaan);		
		}

	}

	public function tampilid($idpemeriksaan){
		$this->load->database();
		$idpemeriksaan = $this->input->post('idpemeriksaan');
		$this->load->model('m_resep');
		$query = $this->m_resep->getcariid($idpemeriksaan);
		$ro = $query->row();
		$data = array("idpemeriksaan"=> $ro->ID_PERIKSA, "idpasien"=> $ro->ID_PASIEN, "namapasien"=> $ro->NAMA_PASIEN, "iddokter"=> $ro->ID_DOKTER,"namadokter"=> $ro->NAMA_DOKTER);
		$this->session->idpemeriksaan = $ro->ID_PERIKSA; // --> guna session yaitu di bawa ke method lain
		$this->session->idpasien = $ro->ID_PASIEN;
		$this->session->iddokter = $ro->ID_DOKTER;

		$this->load->view("v_header");
		$this->load->view("resep/v_content",$data);
		$this->load->view("v_footer");
	}
	
	
	public function input(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		//$idresep = $this->session->idresep;
		$idresep = $this->input->post('idresep'); // kalo input pake ini
		$idpemeriksaan = $this->session->idpemeriksaan; // kalo ambil dari method lain kyk ini
		$idpasien = $this->session->idpasien;
		$iddokter = $this->session->iddokter;
		$tglresep = $this->input->post('tglresep');

		
		$this->load->model('m_resep');
		$input_r = $this->m_resep->insert($idresep, $idpemeriksaan, $idpasien, $iddokter, $tglresep);
		
		$this->index2();
	}
	
	public function inputresep(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$iddetailresep = $this->input->post('iddetailresep');
		$idobat = $this->input->post('idobat');
		$idresep = $this->input->post('idresep');
		$ketobat= $this->input->post('ketobat');

		$this->load->model('m_resep');
		$input_dr = $this->m_resep->insertresep($iddetailresep,$idobat,$idresep,$ketobat);

		$this->index3();
	}
	public function getobat(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');


		$idobat = $this->input->post('idobat');
		
		if ($idobat==null || $idobat=="") {
			redirect(base_url().'resep?erroidobat=null');
		}
		else  {
			$this->tampilidobat($idobat);		
		}

	}
	public function tampilidobat($idobat){
		$this->load->database();
		$idobat = $this->input->post('idobat');
		$namaobat= $this->input->post('namaobat');
		$this->load->model('m_resep');
		$query = $this->m_resep->getobat($idobat);
		$ro = $query->row();
		$data = array("idobat"=> $ro->ID_OBAT, "namaobat"=> $ro->NAMA_OBAT);
		$this->session->idobat = $ro->ID_OBAT; // --> guna session yaitu di bawa ke method lain

		$this->load->view("v_header");
		$this->load->view("resep/v_resep",$data);
		$this->load->view("v_footer");
	}

	public function getidresep(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');


		$idobat = $this->input->post('idresep');
		
		if ($idresep==null || $idresep=="") {
			redirect(base_url().'resep?erroidresep=null');
		}
		else  {
			$this->tampilidresep($idresep);		
		}
	}

	public function tampilidresep($idresep){
		$this->load->database();
		$idobat = $this->input->post('idresep');
		$this->load->model('m_resep');
		$query = $this->m_resep->getidresep($idresep);
		$ro = $query->row();
		$data = array("idresep"=> $ro->ID_RESEP);
		$this->session->idobat = $ro->ID_OBAT; // --> guna session yaitu di bawa ke method lain

		$this->load->view("v_header");
		$this->load->view("resep/v_resep",$data);
		$this->load->view("v_footer");
	}


	
	
}

