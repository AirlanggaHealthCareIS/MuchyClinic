<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawatinap extends CI_Controller{
	public function index()
	{
		$this->load->model('mambildata');
		$kamar = $this->mambildata->getkamar();
		$dokter = $this->mambildata->getdokter();
		$data = array("id_pasien"=> " ", "nama_pasien"=> " ", "no_telp_pas"=> " ", "getkam"=>$kamar, "getdok"=>$dokter);

		$this->load->view('v_header');
		$this->load->view('rawatinap/rawatinap', $data);
		$this->load->view('v_footer');	
		
	}
	public function index2()
	{
		redirect(base_url().'crawatinap?succesfully=succesfully');
		$this->load->view('v_header');
		$this->load->view('rawatinap/rawatinap');
		$this->load->view('v_footer');
	}
	public function validasi()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$id= $this->input->post('id_pasien');

		$isValid = $this->inValidasi($id);
		if ($isValid == "error=null"){ // null
			redirect(base_url().'crawatinap?error=null 	');
		}
		else if ($isValid == "error=symbol") { // symbol
				redirect(base_url().'crawatinap?error=symbol');
 		} 
		else if ($isValid == "true"){ // true
			$this->checkdb($id);
		}
	}
	public function checkdb($id){
		$this->session->set_userdata('idpasien3', $id);

		$this->load->model('mambildata');
		$query = $this->mambildata->getcariid($id);
		$this->load->database();
		

		if ($query->num_rows() > 0) { //cek jika hasil ada
			$query = $query->row();
		 	//simpan data untuk di tampilkan
			$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->NO_TLP_PASIEN);
			redirect(base_url().'crawatinap');
		} else { // jika hasil tidak ada // if ($query == "act=not_found")
			redirect(base_url().'crawatinap?act=not_found');
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
		$kamar_r = $this->input->post('kamar');
		$cek = $this->cekKamar($kamar_r);
		if ($cek == false) {
			redirect(base_url().'crawatinap?act=kamar_penuh');
		} 
		
		$dokter_r = $this->input->post('dokter');
		$tgl_masuk_r = $this->input->post('tgl_masuk');

		if ($id_pas == null || $kamar_r == null || $dokter_r == null || $tgl_masuk_r == null ) {
			redirect(base_url().'crawatinap?error=null 	');

		} else {
			$this->load->model('mambildata');
			$insert_r = $this->mambildata->insertinap($id_pas, $kamar_r, $dokter_r, $tgl_masuk_r);
			$this->index2();
		}
	}
	public function cekKamar($kamar_r){
		$this->load->database();
		$idkamar = $kamar_r;
		$this->load->model('mambildata');
		$jumlahK = $this->mambildata->jumlahKamar($idkamar);
		$kapasitasK = $this->mambildata->kapasitasKamar($idkamar);
		if ($jumlahK >= $kapasitasK){
			
			return false;
		}
		else{
			// echo "benarr";
			// echo "jumlah kamar = " .$jumlahK;
			// echo "jumlah kapasitas = " .$kapasitasK;
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
	public function testing(){ //testing controller
		$this->load->library("unit_test");

		$this->unit->run($this->inValidasi(""),"error=null", "uji Id pasien kosong");
		$this->unit->run($this->inValidasi("!@$)"),"error=symbol", "uji Id pasien yang dimasukkan symbol");
		$this->unit->run($this->inValidasi("p0001"),"true", "uji Id pasien benar");
		$this->unit->run($this->checktgl(2015-04-21, 2015-04-20),1, "uji tanggal");
		$this->unit->run($this->checktgl(2015-04-20, 2015-04-21),-1, "uji tanggal");
		

		echo $this->unit->report();
	}
	public function test_getidpas(){ // testing model
		$this->load->model('mambildata');
		$this->load->library("unit_test");
		$this->load->database();
		$this->unit->run($this->mambildata->getcariid2("P0001"),true, "pasien tersebut ada broo");
		echo $this->unit->report();
	}
}
	