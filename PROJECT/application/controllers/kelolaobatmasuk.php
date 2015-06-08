<?php 

/**,
* 
*/
class KelolaObatMasuk extends CI_Controller{

	public function Kelolaobatmasuk()
	{
		parent::__construct();
		$this->header[2] = "active"; //untuk indikasi active header
		$this->id_user = "";
		
		if (($this->session->userdata('username_apoteker'))=="" || ($this->session->userdata('username_apoteker'))==null) {
		redirect(base_url()."login_apoteker");
		}
		$this->user = $this->session->userdata('username_apoteker');
	
	}

	public function index(){
		$this->header[2] = "active"; //untuk indikasi active header
		$data = array("idapoteker"=>" ","namaapoteker"=>" ", "idobatmasukx"=>"",
			"idsupplier"=>"", "namasupplier"=>"");
		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_content",$data); //ganti jadi content jangan lupa
		$this->load->view("v_footer");

	}

	public function index2($idobatmasuk = "", $idsupplier= "", $iddobatmasuk = "", $namaobat=null){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		if($namaobat == null){

		} else if($namaobat!=null){
			$query2 = $this->m_kelolaobatmasuk->getObat($namaobat);
		}

		$data = array("namaobat"=>$namaobat, "idobatmasuk"=>$idobatmasuk, "iddobatmasuk"=>$iddobatmasuk, 
			"idsupplier"=>$idsupplier, 'cariobat'=>"", "iddetailobatmasuk"=>$iddobatmasuk, "idobat"=>"", 
			"detailobat"=>$this->m_kelolaobatmasuk->getDataDetail($idobatmasuk), 'url'=>"", 
			'idobat'=>$this->m_kelolaobatmasuk->getDataObatS($idsupplier));

		$this->load->view("v_header_apoteker");
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

		if ($isValid == "null") {
			redirect(base_url().'kelolaobatmasuk?error=null');
		}
		else if ($isValid == "symbol"){
			redirect(base_url().'kelolaobatmasuk?error=symbol');
		}
		else  if ($isValid == "true"){
			redirect(base_url().'kelolaobatmasuk/tampilid/'.$idsupplier);
			//$this->tampilid($idsupplier);		
		}
	}
	public function inValidIDSupplier($id){
		if ($id == null || $id == ""){
			return "null";
		}
		else if (preg_match('/[^a-z0-9]/i', $id)){
			return "symbol";
		}
		else {
			return "true";
		}
	}
	public function tampilid($idsupplier){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		$query = $this->m_kelolaobatmasuk->getDataSupplier($idsupplier);
		
		if($query->num_rows() > 0){
				$ro = $query->row();
				$data = array("idsupplier"=>$ro->ID_SUPPLIER, 
					"namasupplier"=>$ro->NAMA_SUPPLIER, 
					"idobatmasukx"=>$this->generateIdObatMasuk(),
					"iddetailobatmasuk"=>$this->generateIdDetailObatMasuk());
				$this->session->idsupplier = $ro->ID_SUPPLIER;


		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_content",$data);
		$this->load->view("v_footer");
		}

		else{
			redirect(base_url().'kelolaobatmasuk?error=notfound');

	}

	}

	public function input($idsupplier){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$idobatmasuk = $this->generateIdObatMasuk();
		$iddobatmasuk = $this->generateIdDetailObatMasuk();

		$tglmasuk = $this->input->post('tglmasuk');

		$isValid=$this->inValidObatMasuk($tglmasuk);

		if ($isValid == "null"){
			redirect(base_url().'kelolaobatmasuk?error=tanggalnull');
		}
		else if ($isValid == "error=symbol"){
			redirect(base_url().'kelolaobatmasuk?error=symbol');
		}
		else if ($isValid == "true"){
			$this->load->model('m_kelolaobatmasuk');
			$input = $this->m_kelolaobatmasuk->insert($idobatmasuk, $idsupplier, $tglmasuk);
			redirect(base_url().'kelolaobatmasuk/index2/'.$idobatmasuk.'/'.$idsupplier.'/'.$iddobatmasuk);
		}

	}
	public function inValidObatMasuk($tglmasuk){
		if ($tglmasuk == null || $tglmasuk == ""){
			return "null";
		}
		// else if (preg_match('/[^a-z0-9]/i', $idobatmasuk, $tglmasuk)){
		// 	return "error=symbol";
		// }
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

	public function validasiNamaObat($idobatmasuk, $iddobatmasuk, $idsupplier){
		$namaobat = $this->input->post('namaobat');
		$idsupplier = $idsupplier;

		$isValid=$this->inValidNamaObat($namaobat);
		$iddobatmasuk = $this->generateIdDetailObatMasuk();

		if ($isValid == "namanull"){
			redirect(base_url().'kelolaobatmasuk/index2/'.$idobatmasuk.'/'.$idsupplier.'/'.$iddobatmasuk.'?error=null');
		}
		else if ($isValid == "error=symbol"){
			redirect(base_url().'kelolaobatmasuk?error=symbol');
		}
		else {
			$this->cariObatDetail($idobatmasuk, $idsupplier, $iddobatmasuk);
		}

	}

	public function inValidNamaObat($namaobat){
		if ($namaobat == null || $namaobat == ""){
			return "namanull";
		}
		else if (preg_match('/[^a-z0-9]/i', $namaobat)){
			return "error=symbol";
		}
		else {
			return "true";
		}
	}

	public function cariObatDetail($idobatmasuk, $idsupplier, $iddobatmasuk){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		$this->url="/".$idobatmasuk ."/".$iddobatmasuk ."/".$idsupplier;
		$namaobat = $this->input->post('namaobat');

		$data['idobatmasuk'] = $idobatmasuk;
		$data['iddobatmasuk'] = $this->generateIdDetailObatMasuk();
		$data['idsupplier'] = $idsupplier;
		$data['cariobat'] = $this->m_kelolaobatmasuk->getDataObat($namaobat, $idsupplier);

		if($data['cariobat']->num_rows() > 0){
			$data['idobatmasuk'] = $idobatmasuk;
			$data['iddobatmasuk'] = $iddobatmasuk;
			$data['idsupplier'] = $idsupplier;
			$data['cariobat'] = $this->m_kelolaobatmasuk->getDataObat($namaobat, $idsupplier);
			$data['detailobat'] = $this->m_kelolaobatmasuk->getDataDetail($idobatmasuk);
		}
		else{
			redirect(base_url().'kelolaobatmasuk/index2/'.$idobatmasuk.'/'.$idsupplier.'/'.$iddobatmasuk.'?error=notfound');
		}
		

		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_kelolaobatmasuk",$data);
		$this->load->view("v_footer");
	}

	public function inputObatDetail($idobatmasuk, $iddobatmasuk, $idsupplier){ //
		$this->load->model('m_kelolaobatmasuk');

		$idobatmasuk = $idobatmasuk;
		$iddetailobatmasuk = $this->generateIdDetailObatMasuk();
		$idobat = $this->input->post('idobatbaru');
		$qty = $this->input->post('jumlahstok');

		if ($qty == null || $qty == ""){
			
			redirect(base_url().'kelolaobatmasuk/validasiNamaObat/'.$idobatmasuk.'/'.$iddobatmasuk.'/'.$idsupplier.'?error=null');
		}

		$inputDetailObat = $this->m_kelolaobatmasuk->insertDetailObat($iddobatmasuk, $idobat, $idobatmasuk, $qty);

		$this->showDetailObat($iddobatmasuk, $idsupplier, $idobatmasuk);
	}

	public function showDetailObat($iddetailobatmasuk, $idsupplier, $idobatmasuk){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');
		//$namaobat = $this->input->post('namaobat');

		$data = array('cariobat'=>'', 
			'idsupplier'=>$idsupplier, 'iddobatmasuk'=>$this->generateIdDetailObatMasuk(), 'idobatmasuk'=>$idobatmasuk, 'idobat'=>null, 
			'detailobat'=>$this->m_kelolaobatmasuk->getDataDetail($idobatmasuk));

		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_kelolaobatmasuk",$data);
		$this->load->view("v_footer");

	}

	public function hapusDetailObat($iddetailobatmasuk, $idobatmasuk, $idsupplier){
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		$deleteDetailObat = $this->m_kelolaobatmasuk->deleteDetailObat($iddetailobatmasuk);

		$this->showDetailObat($iddetailobatmasuk, $idsupplier, $idobatmasuk);

	}

	public function editDetailObat($iddetailobatmasuk, $idobatmasuk, $idsupplier, $idobat, $namaobat){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');

		$data = array('cariobat'=>'', 
			'idsupplier'=>$idsupplier, 'iddobatmasuk'=>$iddetailobatmasuk, 'idobatmasuk'=>$idobatmasuk, 
			'idobat'=>$idobat, 'namaobat'=>$namaobat, 
			'detailobat'=>$this->m_kelolaobatmasuk->getDataDetail($idobatmasuk));

		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_kelolaobatmasuk_edit",$data);
		$this->load->view("v_footer");

	}

	public function updateDetailObat($iddetailobatmasuk, $idsupplier, $idobatmasuk){
		$this->load->model('m_kelolaobatmasuk');

		$jumlahstok = $this->input->post('jumlahstok');

		$update = $this->m_kelolaobatmasuk->updateDetailObat($jumlahstok, $iddetailobatmasuk);

		$this->showDetailObat($iddetailobatmasuk, $idsupplier, $idobatmasuk);
	}

//=============================================SUPPLIER===================
	public function index5(){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');
		$data['supplier'] = $this->m_kelolaobatmasuk->tampilSupp();
		//$data = array("idapoteker"=>" ","namaapoteker"=>" ");

		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_supplier", $data);
		$this->load->view("v_footer");

	}

	//=======================================ADD=============================

	public function index3(){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$data = array(
			"idsupplier"=>$this->generateIdSupp(),
			"namasupp"=>" ",
			"alamatsupp"=>" ",
			"nohpsupp"=>" ");
		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_addsupp",$data);
		$this->load->view("v_footer");
	}

	public function generateIdSupp(){
		$this->load->model('m_kelolaobatmasuk');

		$id = $this->m_kelolaobatmasuk->countIDSupplier() + 1;

		if($id < 10){
			$id = "S000".$id;
		}
		else if ($id < 100){
			$id = "S00".$id;
		}
		else if ($id < 1000){
			$id = "S0".$id;
		}
		return $id;
	}

	
	public function addsupplier(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$idsupplier = $this->input->post('idsupplier');
		$namasupp = $this->input->post('namasupp');
		$alamatsupp = $this->input->post('alamatsupp');
		$nohpsupp = $this->input->post('nohpsupp');

		//$isValid=$this->inValidSupplier($idsupplier, $namasupp, $alamatsupp, $nohpsupp);

		if ($idsupplier == null || $idsupplier == "" || $namasupp == null || $namasupp == "" || $alamatsupp == null || $alamatsupp == "" || $nohpsupp == null || $nohpsupp == ""){
			redirect(base_url().'kelolaobatmasuk/index3?error=null');
		}
		// else if ($isValid == "error=symbol"){
		// 	redirect(base_url().'kelolaobatmasuk?error=symbol');
		// }
		else {
			$this->load->model('m_kelolaobatmasuk');
			$addsupplier = $this->m_kelolaobatmasuk->addsupplier($idsupplier, $namasupp, $alamatsupp, $nohpsupp);
			redirect(base_url().'kelolaobatmasuk/index5?error=berhasil');
		}
	}

	// public function inValidSupplier($idsupplier, $namasupp, $alamatsupp, $nohpsupp){
	// 	if ($idsupplier == null || $idsupplier == "" || $namasupp == null || $namasupp == "" || $alamatsupp == null || $alamatsupp == "" || $nohpsupp == null || $nohpsupp == ""){
	// 		return "error=null";
	// 	}
	// 	else if (preg_match('/[^a-z0-9]/i', $idsupplier, $namasupp)){
	// 		return "error=symbol";
	// 	}
	// 	else {
	// 		return "true";
	// 	}
	// }
	//===============================================EDIT SUPPLIER=====================================

	public function index7($idsupplier = ""){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$data = array(
			"idsupplier"=>$idsupplier);

		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_editsupplier",$data);
		$this->load->view("v_footer");
	}

	public function editSupp($idsupplier){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$namasupp = $this->input->post('namasupp');
		$alamatsupp = $this->input->post('alamatsupp');
		$nohpsupp = $this->input->post('nohpsupp');

		$this->load->model('m_kelolaobatmasuk');
		$editsupp = $this->m_kelolaobatmasuk->editSupp($idsupplier, $namasupp, $alamatsupp, $nohpsupp);
		redirect(base_url().'kelolaobatmasuk/index5?error=sukses=edit');

	}

	//=============================================HAPUS SUPPLIER============================

	public function hapusSupp($idsupplier){
		
		$this->load->database();


		$this->load->model('m_kelolaobatmasuk');	

		$deleteSupp = $this->m_kelolaobatmasuk->deleteSupp($idsupplier);

		redirect(base_url().'kelolaobatmasuk/index5?error=sukses');
	}

	//=============================================HAPUS OBAT============================

	public function hapusObat($idobat){
		
		$this->load->database();


		$this->load->model('m_kelolaobatmasuk');	

		$deleteSupp = $this->m_kelolaobatmasuk->deleteObat($idobat);

		redirect(base_url().'kelolaobatmasuk/index6?error=sukses');
	}
	
	//==============================================EDIT OBAT=========================================

	public function index8($idobat = ""){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$data = array("idobat"=>$idobat);
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');
		$data['supplier'] = $this->m_kelolaobatmasuk->tampilSupp();

		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_editobat",$data);
		$this->load->view("v_footer");
	}

	public function editObat($idobat){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$idsupplier = $this->input->post('idsupplier');
		$namaobat = $this->input->post('namaobat');
		$katobat = $this->input->post('katobat');
		$harga = $this->input->post('harga');
		$obatkritis = $this->input->post('obatkritis');

		if ($idsupplier == null || $idsupplier == "" || $namaobat == null || $namaobat == "" || $katobat == null || $katobat == "" || $harga == null || $harga == "" || $obatkritis == null || $obatkritis ==""){
			redirect(base_url().'kelolaobatmasuk/index8/'.$idobat.'?error=null');
		}

		else{
		$this->load->model('m_kelolaobatmasuk');
		$editsupp = $this->m_kelolaobatmasuk->editObat($idobat, $idsupplier, $namaobat, $katobat, $harga, $obatkritis);
		redirect(base_url().'kelolaobatmasuk/index6?error=berhasil-obat');
		}

	}




	//============================================OBAT===========================
	public function index6(){
		$this->header[2] = "active"; //untuk indikasi active header
		
		$this->load->database();
		$this->load->model('m_kelolaobatmasuk');
		$data['obat'] = $this->m_kelolaobatmasuk->tampilObat();

		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_obat", $data);
		$this->load->view("v_footer");

	}

	
	

//============================================ADD OBAT=========================================================
public function index4(){
	$this->header[2] = "active"; //untuk indikasi active header
		
		$this->load->model("m_kelolaobatmasuk");
		$obatsup = $this->m_kelolaobatmasuk->tampilSupp();	
		//$data = array("obat"=>$obatsup);
		$data = array(
			"idobat"=>$this->generateIdobat(),
			"idsupplier"=>" ",
			"namaobat"=>" ",
			"katobat"=>" ",
			"harga"=>" ",
			"obatkritis"=>" ",
			"obat"=>$obatsup);
		$this->load->view("v_header_apoteker");
		$this->load->view("kelolaobatmasuk/v_addobat",$data);
		$this->load->view("v_footer");
	}

	public function generateIdObat(){
		$this->load->model('m_kelolaobatmasuk');

		$id = $this->m_kelolaobatmasuk->countIDObat() + 1;

		if($id < 10){
			$id = "O000".$id;
		}
		else if ($id < 100){
			$id = "O00".$id;
		}
		else if ($id < 1000){
			$id = "O0".$id;
		}
		else {
			$id = "O".$id;	
		}
		
		return $id;
	}

	
	public function addobat(){

		
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();

		$idobat = $this->input->post('idobat');
		$idsupplier = $this->input->post('idsupplier');
		$namaobat = $this->input->post('namaobat');
		$katobat = $this->input->post('katobat');
		$harga = $this->input->post('harga');
		$obatkritis = $this->input->post('obatkritis');

		//$isValid=$this->inValidObat($idobat, $idsupplier, $namaobat, $katobat, $harga, $obatkritis);

		if ($idobat == null || $idobat == "" || $idsupplier == null || $idsupplier == "" || $namaobat == null || $namaobat == "" || $katobat == null || $katobat == "" ||$harga == null || $harga == "" || $obatkritis == null || $obatkritis == ""){
			redirect(base_url().'kelolaobatmasuk/index4?error=null');
		}
		// else if ($isValid == "error=symbol"){
		// 	redirect(base_url().'kelolaobatmasuk?error=symbol');
		// }
		else {
			$this->load->model('m_kelolaobatmasuk');
			$addsupplier = $this->m_kelolaobatmasuk->addobat($idobat, $idsupplier, $namaobat, $katobat, $harga, $obatkritis);
			redirect(base_url().'kelolaobatmasuk/index6?error=berhasil-obat');
		}
	}

	// public function inValidObat($idobat, $idsupplier, $namaobat, $katobat, $harga, $obatkritis){
	// 	if ($idobat == null || $idobat == "" || $idsupplier == null || $idsupplier == "" || $namaobat == null || $namaobat == "" || $katobat == null || $katobat == "" ||$harga == null || $harga == "" || $obatkritis == null || $obatkritis == ""){
	// 		return "error=null";
	// 	}
	// 	else if (preg_match('/[^a-z0-9]/i', $idsupplier, $idsupplier)){
	// 		return "error=symbol";
	// 	}
	// 	else {
	// 		return "true";
	// 	}
	// }


	
//===============================================================================================================

	// public function testing(){
	// 	$this->load->library("unit_test");

	// 	$this->unit->run($this->inValidIDApoteker(""),"error=null", "Test ID Apoteker Kosong");
	// 	$this->unit->run($this->inValidIDApoteker("!@#$%^&*()-+_="),"error=symbol", "Test ID Apoteker Dengan Symbol");
	// 	$this->unit->run($this->inValidIDApoteker("A0001"),"true", "Test ID Apoteker Benar");
	// 	$this->unit->run($this->inValidIDApoteker("A0002"),"true", "Test ID Apoteker Benar");
		
	// 	//invalidsupplier
	// 	//invalidobat

	// 	echo $this->unit->report();
	// }





	//=================================================================================================================================================

	public function cari_obat($idresep = ""){
		$namaobat = $this->input->post('namaobat');
		redirect(base_url().'kelolaobatmasuk/index2'.$idobatmasuk.'/'.$namaobat);
	}


	
}





	

	
	










 ?>	