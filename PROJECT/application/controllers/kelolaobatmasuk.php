<?php 

/**,
* 
*/
class KelolaObatMasuk extends CI_Controller{
	public function index(){
		$data = array("idapoteker"=>" ","namaapoteker"=>" ", "idobatmasukx"=>"",
			"idsupplier"=>"", "namasupplier"=>"");
		$this->load->view("v_header");
		$this->load->view("kelolaobatmasuk/v_content",$data);
		$this->load->view("v_footer");

	}

	public function index2($idobatmasuk = "", $idsupplier= "", $iddobatmasuk = ""){
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		$data = array("idobatmasuk"=>$idobatmasuk, "iddobatmasuk"=>$iddobatmasuk, 
			"idsupplier"=>$idsupplier, 'cariobat'=>"", "iddetailobatmasuk"=>"", "idobat"=>"", "detailobat"=>"", 'url'=>"", 
			'cariobat'=>"",
			'idobat'=>$this->m_kelolaobatmasuk->getDataObatS($idsupplier));
		$this->load->view("v_header");
		$this->load->view("kelolaobatmasuk/v_kelolaobatmasuk",$data);
		$this->load->view("v_footer");
	}

	public function testing(){
		$this->load->library("unit_test");

		$this->unit->run($this->inValidIDApoteker(""),"error=null", "Test ID Apoteker Kosong");
		$this->unit->run($this->inValidIDApoteker("!@#$%^&*()-+_="),"error=symbol", "Test ID Apoteker Dengan Symbol");
		$this->unit->run($this->inValidIDApoteker("A0001"),"true", "Test ID Apoteker Benar");
		$this->unit->run($this->inValidIDApoteker("A0002"),"true", "Test ID Apoteker Benar");
		

		echo $this->unit->report();
	}

	public function getidapoteker(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$idsupplier = $this->input->post('idsupplier');

		$isValid = $this->inValidIDSupplier($idsupplier);

		if ($isValid==null || $isValid=="") {
			redirect(base_url().'kelolaobatmasuk?error=null');
		}
		else if ($isValid == "error=symbol"){
			redirect(base_url().'kelolaobatmasuk?error=symbol');
		}
		else  if ($isValid == "true"){
			redirect(base_url().'kelolaobatmasuk/tampilid/'.$idsupplier);
			//$this->tampilid($idsupplier);		
		}
	}
	public function inValidIDSupplier($id){
		if ($id == null || $id == ""){
			return "error=null";
		}
		else if (preg_match('/[^a-z0-9]/i', $id)){
			return "error=symbol";
		}
		else {
			return "true";
		}
	}
	public function tampilid($idsupplier){
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		// $idsupplier = $this->input->post('idsupplier');
		
		$query = $this->m_kelolaobatmasuk->getDataSupplier($idsupplier);
		$ro = $query->row();

		$data = array("idsupplier"=>$ro->ID_SUPPLIER, 
			"namasupplier"=>$ro->NAMA_SUPPLIER, 
			"idobatmasukx"=>$this->generateIdObatMasuk(),
			"iddetailobatmasuk"=>$this->generateIdDetailObatMasuk());
		$this->session->idsupplier = $ro->ID_SUPPLIER;

		$this->load->view("v_header");
		$this->load->view("kelolaobatmasuk/v_content",$data);
		$this->load->view("v_footer");
	}

	public function input($idsupplier){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$idobatmasuk = $this->generateIdObatMasuk();
		$iddobatmasuk = $this->generateIdDetailObatMasuk();
		// $idsupplier = $this->session->idsupplier;

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
			$input = $this->m_kelolaobatmasuk->insert($idobatmasuk, $idsupplier, $tglmasuk);
			redirect(base_url().'kelolaobatmasuk/index2/'.$idobatmasuk.'/'.$idsupplier.'/'.$iddobatmasuk);
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

	public function generateIdObatMasuk(){
		$this->load->model('m_kelolaobatmasuk');

		$id = $this->m_kelolaobatmasuk->countIdObatMasuk() + 1;

		if($id < 10){
			$id = "OM00".$id;
		}
		else if($id < 100){
			$id = "OM0".$id;
		}
		else if($id < 1000){
			$id = "OM".$id;
		}

		return $id;
	}

	public function generateIdDetailObatMasuk(){
		$this->load->model('m_kelolaobatmasuk');

		$id = $this->m_kelolaobatmasuk->countIdDetailObatMasuk() + 1;

		if($id < 10){
			$id = "X000".$id;
		}
		else if($id < 100){
			$id = "X00".$id;
		}
		else if($id < 1000){
			$id = "X0".$id;
		}

		return $id;
	}

	public function cariObatDetail($idobatmasuk, $iddobatmasuk, $idsupplier){
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		$this->url="/".$idobatmasuk ."/".$iddobatmasuk ."/".$idsupplier;
		$namaobat = $this->input->post('namaobat');

		$query = $this->m_kelolaobatmasuk->getDataObat($namaobat);

		$ro = $query->row();

		$data['idobatmasuk'] = $idobatmasuk;
		$data['iddobatmasuk'] = $iddobatmasuk;
		$data['idsupplier'] = $idsupplier;
		$data['cariobat'] = $this->m_kelolaobatmasuk->getDataObat($namaobat);
		$data['detailobat'] = $this->m_kelolaobatmasuk->getDataDetail($iddobatmasuk);

		$this->load->view("v_header");
		$this->load->view("kelolaobatmasuk/v_kelolaobatmasuk",$data);
		$this->load->view("v_footer");
	}

	public function inputObatDetail($idobatmasuk, $iddobatmasuk, $idsupplier){ //
		$this->load->model('m_kelolaobatmasuk');

		$idobatmasuk = $idobatmasuk;
		$iddetailobatmasuk = $iddobatmasuk;
		$idobat = $this->input->post('idobatbaru');
		$qty = $this->input->post('jumlahstok');

		$inputDetailObat = $this->m_kelolaobatmasuk->insertDetailObat($iddobatmasuk, $idobat, $idobatmasuk, $qty);

		$this->showDetailObat($iddobatmasuk, $idsupplier, $idobatmasuk);
	}

	public function showDetailObat($iddetailobatmasuk, $idsupplier, $idobatmasuk){
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');
		//$namaobat = $this->input->post('namaobat');

		$data = array('cariobat'=>'', 
			'idsupplier'=>$idsupplier, 'iddobatmasuk'=>$iddetailobatmasuk, 'idobatmasuk'=>$idobatmasuk, 'idobat'=>null, 
			'detailobat'=>$this->m_kelolaobatmasuk->getDataDetail($iddetailobatmasuk));

		$this->load->view("v_header");
		$this->load->view("kelolaobatmasuk/v_kelolaobatmasuk",$data);
		$this->load->view("v_footer");

	}

	public function hapusDetailObat($iddetailobatmasuk){
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		$deleteDetailObat = $this->m_kelolaobatmasuk->deleteDetailObat($iddetailobatmasuk);

		$this->showDetailObat($iddetailobatmasuk);

	}

	public function editDetailObat($iddetailobatmasuk){
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

	}



	
}





	

	
	










 ?>	