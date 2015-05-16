<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obatkeluarresep extends CI_Controller {

	public function index()
	{
		$this->load->view('v_header');
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

	public function test_getresep(){ //t
		$this->load->model('m_obatkeluar');
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
		
		$isValid = $this->isValidInput($id);
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
 			return true;
 		}
	}

	private function checkDatabase($id, $tgl){ //search ke db
		//simpan input untuk di set ke text field
		$this->session->set_flashdata('idpasien', $id);
		$this->session->set_flashdata('tanggal', $this->convertDate($tanggal));

		$this->load->model('m_resep');
		$this->load->model('m_obatkeluar');
		$query = $this->m_obatkeluar->getResep($id, $tgl); //get data
		if ($query!=null) { //cek jika hasil ada
			//simpan data untuk di tampilkan
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
		// $tglr = $this->convertDate($tglr);
		$this->session->set_flashdata('tanggalr', $tglr);
		$this->session->set_flashdata('dokterr', $dokterr);
		$this->session->set_flashdata('pasienr', $pasienr);
	}

	private function convertDate($tglr){
		$a = explode("-", $tglr);
		return $a[2]."/".$a[1]."/".$a[0];
	}
}
