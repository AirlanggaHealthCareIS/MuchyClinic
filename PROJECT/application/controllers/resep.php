<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resep extends CI_Controller{
	public function index(){
		$data = array("idpemeriksaan"=>" ","idpasien"=>" ","namapasien"=>" ","iddokter"=>" ","namadokter"=>" ", "idobat"=>" ", "namaobat"=>"");
		$this->load->view("v_header");
		$this->load->view("resep/v_content",$data);
		$this->load->view("v_footer");
		
	}
	
	public function index2($idresep = "", $namaobat=null){
		$this->load->model('m_resep');
		$query2 = null;
		if ($namaobat==null) {

		} else if($namaobat!=null){
			$query2 =$this->m_resep->getObat($namaobat);
		}
		$data = array("namaobat"=>$namaobat, "idresep"=>$idresep, 'query2'=>$query2);
		$this->load->view("v_header");
		$this->load->view("resep/v_resep",$data);
		$this->load->view("v_footer");
	}

	public function cari_obat($idresep=""){
		// $idresep = $this->input->post('idresep');
		$namaobat = $this->input->post('namaobat');
		redirect(base_url().'resep/index2/'.$idresep."/".$namaobat);
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

		$isValid = $this->inValidIDPemeriksaan($idpemeriksaan);
		
		if ($isValid==null || $isValid=="") {
			redirect(base_url().'resep?error=null');
		}
		else if ($isValid == "error=symbol"){
			redirect(base_url().'resep?error=symbol');
		}
		else  if ($isValid == "true"){
			$this->tampilid($idpemeriksaan);		
		}

	}

	public function inValidIDPemeriksaan($idpemeriksaan){
		if ($idpemeriksaan == null || $idpemeriksaan == ""){
			return "error=null";
		}
		else if (preg_match('/[^a-z0-9]/i', $idpemeriksaan)){
			return "error=symbol";
		}
		else {
			return "true";
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
		$tglresep = $this->input->post('tglresep');
		$idpemeriksaan = $this->session->idpemeriksaan; // kalo ambil dari method lain kyk ini
		$idpasien = $this->session->idpasien;
		$iddokter = $this->session->iddokter;
		
		$isValid=$this->inValidResep($idresep,$tglresep);


		if ($isValid == null || $tglresep ==""){
			redirect(base_url().'resep?error=null');
		}
		else if ($isValid == "error=symbol"){
			redirect(base_url().'resep?error=symbol');
		}

		else if ($isValid == "true"){
			$this->load->model('m_resep');
			$input_r = $this->m_resep->insert($idresep, $idpemeriksaan, $idpasien, $iddokter, $tglresep);
			redirect(base_url().'resep/index2/'.$idresep);
		}
		
	}
	
	public function inValidResep($idresep,$tglresep){
		if ($idresep == null || $idresep == "" || $tglresep == null || $tglresep == ""){
			return "error=null";
		}
		else if (preg_match('/[^a-z0-9]/i', $idresep, $tglresep)){
			return "error=symbol";
		}
		else {
			return "true";
		}
	}
	// public function inputdetailresep($idresep,$idobat){

	// 	$this->load->model('m_resep')
	// 	$input_dr = $this->m_resep->insertresep($idresep,$idobat);

		
	// }
	
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

	public function testing(){
		$this->load->library("unit_test");

		$this->unit->run($this->inValidIDPemeriksaan(""),"error=null", "Test ID Pemeriksaan Kosong");
		$this->unit->run($this->inValidIDPemeriksaan("!@#$%^&*()-+_="),"error=symbol", "Test ID Pemeriksaan Dengan Symbol");
		$this->unit->run($this->inValidIDPemeriksaan("PR001"),"true", "Test ID Pemeriksaan Benar");
		$this->unit->run($this->inValidIDPemeriksaan("PR002"),"true", "Test ID Pemeriksaan Benar");
		$this->unit->run($this->inValidResep("",""),"error=null", "Test Resep");
		$this->unit->run($this->inValidResep("!@#$%^&*()-+_=","!@#$%^&*()+_="),"error=symbol", "Test Resep Dengan Symbol");
		$this->unit->run($this->inValidResep("MR88",2015-05-11),"true", "Test ANDA BENAR");

		echo $this->unit->report();
	}

	public function hitung($a,$b){
		return $a+$b;
	}


	
	
}

