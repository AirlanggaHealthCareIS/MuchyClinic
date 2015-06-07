<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obatkeluarresep extends CI_Controller {

	public function Obatkeluarresep(){
		parent::__construct();
		$this->load->model('m_obatkeluar');
		$this->load->model('m_resep');

		$this->user="Irfan Nur Aulia";
		$this->id_apoteker = "A0001"; //user apoteker
		$this->js_to_load[0] = base_url()."assets/js/obatkeluar.js"; //untuk load javascript
	}

	public function index()
	{
		$this->load->view('v_header_apoteker');
		$this->load->view('obatkeluar/v_resep');
		$this->load->view('v_footer');
	}

	// method untuk testing
	public function test_isvalidinput(){
		$this->load->library("unit_test");
		
		$this->unit->run($this->isValidInput(""), "error=null", "Uji Kelayakan Method isValid");
		$this->unit->run($this->isValidInput("fkdf^%$^%"), "error=symbol", "Uji Kelayakan Method isValid");
		$this->unit->run($this->isValidInput("P001"), true, "Uji Kelayakan Method isValid");
		echo $this->unit->report();
	}

	public function test_getresep(){ //tes untuk model getresep
		$this->load->library("unit_test");
		$this->load->database();
		$this->unit->run($this->m_obatkeluar->getResep("P001", "2015-04-20"), 0, "Test getdata resep");
		$this->unit->run($this->m_obatkeluar->getResep("P001", "2015-04-21"), "R009", "getdata resep");
		echo $this->unit->report();
	}
	// end of testing method

	public function validasi()
	{
		//get post data
		$id = $this->input->post('idpasien');
		$tgl = $this->input->post('tanggal');
		// echo $tgl;
		$isValid = $this->isValidInput($id);
		$this->storeInput($tgl, $id);
		if ($isValid=="error=null") {
			redirect(base_url()."obatkeluarresep?error=null");
		} else if ($isValid=="error=symbol"){
			redirect(base_url().'obatkeluarresep?error=symbol');
		} else if($isValid=="true"){
			$this->checkDatabase($id, $tgl); //jika inputan valid
		}
	}

	public function isValidInput ($id){
		if ($id==null || $id=="") { //untuk id pasien kosong
			return "error=null";
		} 
		else if (preg_match('/[^a-z0-9]/i', $id)) { //untuk symbol
			return "error=symbol";
		} else {
			return "true";
		}
	}

	private function checkDatabase($id, $tgl){ //search ke db
		//simpan input untuk di set ke text field
		$this->session->set_flashdata('idpasien', $id);
		$this->session->set_flashdata('tanggal', $tgl);

		$query = $this->m_obatkeluar->getResep($id, $tgl); //get data
		if ($query!=0) { //cek jika hasil ada
			//simpan data untuk di tampilkan
			$query = $query->row();
			$this->storeValueResep($query->ID_RESEP, $query->TGL_RESEP, $query->NAMA_DOKTER, $query->NAMA_PASIEN);
			// detail resep
			$dresep = $this->m_resep->getDetailResep($query->ID_RESEP); //get data detail resep
			$dresep = $dresep->result();
			$this->session->set_flashdata('detailr', $dresep); //simpan variabel utk dikirim ke view
			redirect(base_url().'obatkeluarresep');
		} else { // jika hasil tidak ada
			redirect(base_url().'obatkeluarresep?act=notfound');
		}
	}

	private function storeValueResep($idr, $tglr, $dokterr, $pasienr){
		$this->session->set_flashdata('idr', $idr);
		$tglr = $this->convertDate($tglr);
		$this->session->set_flashdata('tanggalr', $tglr);
		$this->session->set_flashdata('dokterr', $dokterr);
		$this->session->set_flashdata('pasienr', $pasienr);
	}

	private function storeInput($tgl, $id){
		$this->session->set_flashdata('tanggal', $tgl);
		$this->session->set_flashdata('idpasien', $id);
	}

	private function convertDate($tglr){
		$a = explode("-", $tglr);
		return $a[2]."/".$a[1]."/".$a[0];
	}

	public function saveToKeluar(){
		//create obat keluar
		$idOk = $this->m_obatkeluar->generateIdObatKeluar();
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$data['pasien'] = $this->input->post("pasien"); 
		// echo $idOk." ".$this->id_apoteker." ".$data['pasien']." ".$tgl;
		$this->m_obatkeluar->insertObatKeluar($idOk, $this->id_apoteker, $data['pasien'], $tgl);

		// create detail obat keluar
		$detail_resep = array();
		$data["idresep"] = $this->input->post("ada"); 
		$kotak = explode(" ", $data["idresep"]);
		$id_detail_ok = $this->m_obatkeluar->generateBanyakIdDetailObatKeluar(count($kotak)-1);
		for ($i=1; $i < count($kotak); $i++) { 
			array_push($detail_resep, $kotak[$i]);
		}
		// print_r($id_detail_ok);

		$query = $this->m_obatkeluar->selectDetailObatKeluar($detail_resep);
		$i = 0;
		$query2 = "INSERT INTO `detail_obat_keluar`(`ID_DETAIL_OBAT_KELUAR`, `ID_OBAT_KELUAR`, `ID_OBAT`, `QTY`, `KETERANGAN`, `SUBTOTAL`) VALUES ";
		foreach ($query as $row) {
			$query2 = $query2.' ("'.$id_detail_ok[$i].'","'.$idOk.'","'.$row->ID_OBAT.'",'.$row->QTY_OBAT.',"'.$row->KET_RESEP.'",'.($row->QTY_OBAT*$row->HARGA).'),';
			
			// echo "\n".$id_detail_ok[$i]." ".$idOk." ".$row->ID_OBAT." ".$row->QTY_OBAT." ".$row->KET_RESEP." ".($row->QTY_OBAT*$row->HARGA);
			$i++;
		}
		echo $query2;
		// $query2 
		// $this->m_obatkeluar->queryDo($query2);


		// print_r($detail_resep);
	}


	/*
	untuk bagus puji santoso
	Tutorial Grafik

	akses dengan cara -> localhost/psi3/obatkeluar/grafik
	*/
	public function grafik(){
		$this->load->view('v_header_apoteker');
		$this->load->view('obatkeluar/v_grafik');
		$this->load->view('v_footer');
	}
}
