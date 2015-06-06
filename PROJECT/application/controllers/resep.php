<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resep extends CI_Controller{

	function Resep(){
		parent::__construct();
		$this->header[0] = "active"; //untuk indikasi active header
	}
	
	//=================================================OPENING=====================================
	public function index(){
		$data = array(
			"idpemeriksaan"=>" ",
			"idpasien"=>" ",
			"namapasien"=>" ",
			"iddokter"=>" ",
			"namadokter"=>" ", 
			"idobat"=>" ", 
			"namaobat"=>"",
			"idresepx"=>"",
			"iddetailresepx"=>"", 
			"keluhan"=>"");

		$this->load->view("v_header_dokter");
		$this->load->view("resep/v_content",$data);
		$this->load->view("v_footer");
		
	}
	//=================================================END OF OPENING=====================================



	//=================================================SEARCH ID PEMERIKSAAN=====================================
	public function getidpemeriksaan(){
			$this->load->helper(array('form','url'));
			$this->load->library('form_validation');
			$idpemeriksaan = $this->input->post('idpemeriksaan');

			$isValid = $this->inValidIDPemeriksaan($idpemeriksaan);
			
			if ($isValid=="error=null") {
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
			
			if($query->num_rows() > 0){
				$ro = $query->row();
					$data = array(
						"idresepx"=>$this->generateIdResep(),
						"idpemeriksaan"=> $ro->ID_PERIKSA, 
						"idpasien"=> $ro->ID_PASIEN, 
						"namapasien"=> $ro->NAMA_PASIEN, 
						"iddokter"=> $ro->ID_DOKTER,
						"namadokter"=> $ro->NAMA_DOKTER, 
						"keluhan"=> $ro->KELUHAN);
			$this->session->idpemeriksaan = $ro->ID_PERIKSA; // --> guna session yaitu di bawa ke method lain
			$this->session->idpasien = $ro->ID_PASIEN;
			$this->session->iddokter = $ro->ID_DOKTER;
			$this->session->keluhan = $ro->KELUHAN;

			$this->load->view("v_header");
			$this->load->view("resep/v_content",$data);
			$this->load->view("v_footer");
			}

			else{
				redirect(base_url().'resep?error=notfound');

			}
			
		}
	//=================================================END OF SEARCH ID PEMERIKSAAN=====================================


	//=================================================INPUT RESEP=====================================
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


		if ($isValid == "error=null"){
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

	public function index2($idresep = "", $namaobat=null){
		$this->load->model('m_resep');
		$query2 = null;
		if ($namaobat==null) {

		} else if($namaobat!=null){
			$query2 =$this->m_resep->getObat($namaobat);
		}
		$data = array(
			"namaobat"=>$namaobat,
			"idresep"=>$idresep,
			"idobat"=>"",
			"iddetailresepx"=>$this->generateIdDetailResep() ,
			'query2'=>$query2, 
			'detailresep'=>$this->m_resep->getDR($idresep));
		$this->load->view("v_header");
		$this->load->view("resep/v_resep",$data);
		$this->load->view("v_footer");
	}


	//=================================================END OF INPUT RESEP=====================================
	
	//=================================================INPUT DETAIL RESEP====================================
	public function cari_obat($idresep=""){
		$namaobat = $this->input->post('namaobat');
		redirect(base_url().'resep/index2/'.$idresep."/".$namaobat);
		
	}

	public function index4($idresep = "",$idobat = ""){
		
		$data = array(
			"idresep"=>$idresep,
			"iddetailresepx"=>$this->generateIdDetailResep() ,
			"idobat"=>$idobat);
		$this->load->view("v_header");
		$this->load->view("resep/v_detailobat",$data);
		$this->load->view("v_footer");
	}

	public function inputdr($idresep, $idobat){
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$iddetailresep = $this->input->post('iddetailresep');
		// $idresep = $this->input->post('idresep');
		// $idobat = $this->input->post('idobat');
		$jmlobat = $this->input->post('jmlobat');
		$ketobat = $this->input->post('ketobat');

		$isValid=$this->inValidObat($iddetailresep,$jmlobat,$ketobat);

		// if ($isValid == null || $isValid ==""){
		// 	redirect(base_url().'resep?error=null');
		// }
		// else if ($isValid == "error=symbol"){
		// 	redirect(base_url().'resep?error=symbol');
		// }

		// else if ($isValid == "true"){
			$this->load->model('m_resep');
			$input_dr = $this->m_resep->insertdetailresep($iddetailresep, $idresep, $idobat, $jmlobat, $ketobat);
			redirect(base_url().'resep/index2/'.$idresep);
		// }
	}

	public function inValidObat($iddetailresep,$jmlobat,$ketobat){
		if ($iddetailresep == null || $iddetailresep == "" || $jmlobat == null || $jmlobat == "" || $ketobat == null || $ketobat == ""){
			return "error=null";
		}
		// else if (preg_match('/[^a-z0-9]/i', $iddetailresep, $jmlobat,$ketobat)){
		// 	return "error=symbol";
		// }
		else {
			return "true";
		}
	}

	public function selesai(){
		$data = array(
			"idpemeriksaan"=>" ",
			"idpasien"=>" ",
			"namapasien"=>" ",
			"iddokter"=>" ",
			"namadokter"=>" ", 
			"idobat"=>" ", 
			"namaobat"=>"",
			"idresepx"=>"",
			"iddetailresepx"=>"", 
			"keluhan"=>"");

		$this->load->view("v_header");
		$this->load->view("resep/v_content",$data);
		$this->load->view("v_footer");
	}

	//=================================================END OF DETAIL RESEP==================================
	
	//=================================================EDIT RESEP==================================
	public function index5($iddetailresep = "", $idresep=""){
		
		$data = array(
			"iddetailresep"=>$iddetailresep,
			"idresep"=>$idresep

			);
			
		$this->load->view("v_header");
		$this->load->view("resep/v_editresep",$data);
		$this->load->view("v_footer");
	}

	public function editResep($iddetailresep, $idresep){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$jmlobat = $this->input->post('jmlobat');
		$ketobat = $this->input->post('ketobat');

		$this->load->model('m_resep');
		$editresep = $this->m_resep->editresep($ketobat,$jmlobat,$iddetailresep);
		redirect(base_url().'resep/index2/'.$idresep);
	}
	
	//=================================================END OF EDIT RESEP==================================
	

	//=================================================HAPUS OBAT RESEP==================================
	public function hapusObat($iddetailresep, $idresep){
		// $this->load->helper(array('form', 'url'));
  //       $this->load->library('form_validation');

		$this->load->database();

		// $iddetailresep = $this->input->post('iddetailresep');

		$this->load->model('m_resep');	

		$deleteObat = $this->m_resep->deleteObat($iddetailresep);

		redirect(base_url().'resep/index2/'.$idresep);

	}

	//=================================================END OF HAPUS OBAT RESEP==================================

	

	

	
	
	
	
	

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

	public function generateIdResep(){
		$this->load->model('m_resep');

		$id = $this->m_resep->countIDResep() + 1;

		if($id < 10){
			$id = "R000".$id;
		}
		else if ($id < 100){
			$id = "R00".$id;
		}
		else if ($id < 1000){
			$id = "R0".$id;
		}
		return $id;
	}
	public function generateIdDetailResep(){
		$this->load->model('m_resep');

		$id = $this->m_resep->countIDDetailResep() + 1;

		if($id < 10){
			$id = "DR00".$id;
		}
		else if ($id < 100){
			$id = "DR0".$id;
		}
		else if ($id < 1000){
			$id = "DR".$id;
		}
		return $id;
	}

	

	
	
}

