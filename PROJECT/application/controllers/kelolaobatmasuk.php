<?php 

/**,
* 
*/
class KelolaObatMasuk extends CI_Controller{
	public function index(){
		$data = array("idapoteker"=>" ","namaapoteker"=>" ");
		$this->load->view("v_header");
		$this->load->view("kelolaobatmasuk/v_content",$data);
		$this->load->view("v_footer");

	}

	public function index2($idobatmasuk = ""){
		$data = array("idobatmasuk"=>$idobatmasuk);
		$this->load->view("v_header");
		$this->load->view("kelolaobatmasuk/v_kelolaobatmasuk",$data);
		$this->load->view("v_footer");
	}

	public function getidapoteker(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$idapoteker = $this->input->post('idapoteker');

		$isValid = $this->inValidIDApoteker($idapoteker);

		if ($isValid==null || $isValid=="") {
			redirect(base_url().'kelolaobatmasuk?error=null');
		}
		else if ($isValid == "error=symbol"){
			redirect(base_url().'kelolaobatmasuk?error=symbol');
		}
		else  if ($isValid == "true"){
			$this->tampilid($idapoteker);		
		}
	}
	public function inValidIDApoteker($idapoteker){
		if ($idapoteker == null || $idapoteker == ""){
			return "error=null";
		}
		else if (preg_match('/[^a-z0-9]/i', $idapoteker)){
			return "error=symbol";
		}
		else {
			return "true";
		}
	}
	public function tampilid($idapoteker){
		$this->load->database();
		$idapoteker = $this->input->post('idapoteker');
		$this->load->model('m_kelolaobatmasuk');
		$query = $this->m_kelolaobatmasuk->getidapoteker($idapoteker);
		$ro = $query->row();
		$data = array("idapoteker"=>$ro->ID_APOTEKER, "namaapoteker"=>$ro->NAMA_APOTEKER);
		$this->session->idapoteker = $ro->ID_APOTEKER;

		$this->load->view("v_header");
		$this->load->view("kelolaobatmasuk/v_content",$data);
		$this->load->view("v_footer");
	}

	public function input(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$idobatmasuk = $this->input->post('idobatmasuk');
		$idapoteker = $this->session->idapoteker;
		$tglmasuk = $this->input->post('tglmasuk');

		$isValid=$this->inValidObatMasuk($idobatmasuk,$tglmasuk);

		if ($isValid == null || $isValid ==""){
			redirect(base_url().'kelolaobatmasuk?error=null');
		}
		else if ($isValid == "error=symbol"){
			redirect(base_url().'resep?error=symbol');
		}
		else if ($isValid == "true"){
			$this->load->model('m_kelolaobatmasuk');
			$input = $this->m_kelolaobatmasuk->insert($idobatmasuk, $idapoteker, $tglmasuk);
			redirect(base_url().'kelolaobatmasuk/index2/'.$idobatmasuk);
		}

	}
	public function inValidObatMasuk($idobatmasuk,$tglmasuk){
		if ($idobatmasuk == null || $idobatmasuk == "" || $tglmasuk == null || $tglmasuk == ""){
			return "error=null";
		}
		else if (preg_match('/[^a-z0-9]/i', $idobatmasuk, $tglmasuk)){
			return "error=symbol";
		}
		else {
			return "true";
		}
	}
	public function testing(){
		$this->load->library("unit_test");

		$this->unit->run($this->inValidIDApoteker(""),"error=null", "Test ID Apoteker Kosong");
		$this->unit->run($this->inValidIDApoteker("!@#$%^&*()-+_="),"error=symbol", "Test ID Apoteker Dengan Symbol");
		$this->unit->run($this->inValidIDApoteker("A0001"),"true", "Test ID Apoteker Benar");
		$this->unit->run($this->inValidIDApoteker("A0002"),"true", "Test ID Apoteker Benar");
		

		echo $this->unit->report();
	}

	}



	

	
	










 ?>