<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawatinap extends CI_Controller{
	
	public function Crawatinap()
	{
		parent::__construct();
		$this->load->model("mambildata");
		$this->header[4] = "active"; //untuk indikasi active header
		$this->id_user = "";
		
		if (($this->session->userdata('username_admin'))=="" || ($this->session->userdata('username_admin'))==null) {
			redirect(base_url()."login_admin");
		}
		$this->user = $this->session->userdata('username_admin');

	}

	public function logout(){
		$this->session->unset_userdata('username_admin');
		redirect(base_url()."login_admin");

	}

	public function index() // view updateRwtinap
	{
		$this->load->database();
		$data['mawar'] = $this->mambildata->dmawar();
		$data['melati'] = $this->mambildata->dmelati();

		$this->load->view('v_header_admin');
		$this->load->view('rawatinap/updateRwtinap', $data);
		$this->load->view('v_footer');	
		
	}
	public function index2() // view rawat inap
	{
		$kamar = $this->mambildata->getkamar();
		$dokter = $this->mambildata->getdokter();
		$data = array("id_pasien"=> " ", "nama_pasien"=> " ", "no_telp_pas"=> " ", "getkam"=>$kamar, "getdok"=>$dokter);

		$this->load->view('v_header_admin');
		$this->load->view('rawatinap/rawatinap', $data);

		$this->load->view('v_footer');	
		
	}
	public function validasi()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$id= $this->input->post('id_pasien');

		$isValid = $this->inValidasi($id);
		if ($isValid == "error=null"){ // null
			redirect(base_url().'crawatinap/index2?error=null 	');
		}
		else if ($isValid == "error=symbol") { // symbol
				redirect(base_url().'crawatinap/index2?error=symbol');
 		} 
		else if ($isValid == "true"){ // true
			$this->checkdb($id);
		}
	}
	public function checkdb($id){
		$this->session->set_userdata('idpasien3', $id);
		$query = $this->mambildata->getcariid($id);
		$this->load->database();
		
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$query = $query->row();
		 	//simpan data untuk di tampilkan
			$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->NO_TLP_PASIEN);
			redirect(base_url().'crawatinap/index2');
		} else { // jika hasil tidak ada // if ($query == "act=not_found")
			redirect(base_url().'crawatinap/index2?act=not_found');
		}
	}
	public function storevalue($idpas, $namapas, $telppas){
		$this->session->set_flashdata('idpasien', $idpas);
		$this->session->set_flashdata('namapas', $namapas);
		$this->session->set_flashdata('telppas', $telppas);
	}
	public function insertinap(){
		//echo "id_pasien = ".$this->session->idpasien;

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();
		$id_pas = $this->session->userdata('idpasien3');
		$id_rwtinap = $this->mambildata->generateRawatInap();
		$this->session->set_userdata('id_rawat_inap', $id_rwtinap);
		$id_detrwtinap = $this->mambildata->generateDetailRawatInap();
		$kamar_r = $this->input->post('kamar');
		$cek = $this->cekKamar($kamar_r);
		if ($cek == false) {
			redirect(base_url().'crawatinap/index2?act=kamar_penuh');
		} 
		$dokter_r = $this->input->post('dokter');
		$tgl_masuk_r = date('Y-m-d');
		$qty = 0;

		if ($id_pas == null || $kamar_r == null || $dokter_r == null || $tgl_masuk_r == null ) {
			redirect(base_url().'crawatinap/index2?error=null');

		} else {
			$insert_r = $this->mambildata->insertinap($id_rwtinap, $id_pas, $kamar_r, $dokter_r, $tgl_masuk_r);
			$insert_r = $this->mambildata->insertinap2($id_detrwtinap, $id_rwtinap, $id_pas, $qty);
			redirect(base_url().'crawatinap/index2?succesfully=succesfully');
		}
	}
	public function cekKamar($kamar_r){
		$this->load->database();
		$idkamar = $kamar_r;
		$jumlahK = $this->mambildata->jumlahKamar($idkamar);
		$kapasitasK = $this->mambildata->kapasitasKamar($idkamar);
		if ($jumlahK >= $kapasitasK){
			
			return false;
		}
		else{
			return true;
		}
		
	}
	public function inValidasi ($id)
	{
		if ($id == null || $id == ""){ // null
			return "error=null";
		}
		else if (preg_match('/[^a-z0-9]/i', $id)) { // symbol
			return "error=symbol";
 		} 
		else { // true
			return "true";
		}
	}
	public function checktgl($datetime1, $datetime2)
	{
		return $datetime2-$datetime1;
	}
	// testing controller //
	public function testing(){ 
		$this->load->library("unit_test");

		$this->unit->run($this->inValidasi(""),"error=null", "uji Id pasien kosong");
		$this->unit->run($this->inValidasi("!@$)"),"error=symbol", "uji Id pasien yang dimasukkan symbol");
		$this->unit->run($this->inValidasi("p0001"),"true", "uji Id pasien benar");
		$this->unit->run($this->checktgl(2015-04-21, 2015-04-20),1, "uji tanggal");
		$this->unit->run($this->checktgl(2015-04-20, 2015-04-21),-1, "uji tanggal");
		

		echo $this->unit->report();
	}
	// end testing controller //
	// testing model // 
	public function test_getidpas(){ 
		$this->load->library("unit_test");
		$this->load->database();
		$this->unit->run($this->mambildata->getcariid2("P0001"),true, "pasien tersebut ada broo");
		echo $this->unit->report();
	}
	// end testing model // 
	// update data //
	public function update_data_mawar(){
		$temp = $this->input->post('ada');
		$temp_tgl = $this->input->post('tanggal');
		$temp_kamar = $this->input->post('kamar');
		
		$kotak = explode(" ", $temp); // id array
		$rawat = array();
		for ($i=1; $i < count($kotak); $i++) { 
			// echo " Id resep ".$kotak[$i];
			array_push($rawat, $kotak[$i]);
		}

		$kotak1 = explode(" ", $temp_tgl); // tgl array
		$rawat1 = array();
		for ($i=1; $i < count($kotak1); $i++) { 
			array_push($rawat1, $kotak1[$i]);
		}

		foreach ($rawat1 as $tgl_masuk_r) {
			$tgl_keluar_r = date('Y-m-d');
			$datetime1 = new DateTime($tgl_masuk_r);
	  		$datetime2 = new DateTime($tgl_keluar_r);
	  		$day = $datetime1->diff($datetime2);
			$qty = $day->days;
		}

		$kotak3 = explode(" ", $temp_kamar);
		$kamar_inap = array();
		for ($i=1; $i < count($kotak3); $i++) { 
			array_push($kamar_inap, $kotak3[$i]);
		}

		
		if ($kamar_inap[0] == 'KI001') {
			$biaya = $qty*500000;
		}
		else {
			$biaya = $qty*300000;
		}
		
		// echo " ".$rawat1[0];
		// echo " ".$tgl_keluar_r;
		
		$this->load->database();
		$this->mambildata->update_rawat($rawat[0], $qty, date('Y-m-d'), $biaya);
	}
	
}
	