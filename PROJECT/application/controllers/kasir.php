<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

//untuk test php unit
//class Kasir  {
	public function index() {

		$this->load->view("v_header");
		$this->load->view("kasir/v_contain");
		$this->load->view("v_footer");
	}

	public function validation(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$id = $this->input->post("idpasien");
		if ($id==null || $id=="") {
			redirect(base_url().'kasir?error=null');
		} else {
			if (preg_match('/[^a-z0-9]/i', $id)) {
				redirect(base_url().'kasir?error=simbol');
			} else{ 
				$this->checkDatabase($id);
			}
		}
	}

	public function isInputValidation($id){
		if ($id==null || $id=="") {
			return "error=null";
		} else {
			if (preg_match('/[^a-z0-9]/i', $id)) {
				return "error=simbol";
			} else{ 
				//$this->checkDatabase($id);
				return "true";
			}
		}
	}

	public function test_isvalid() {
		$this->load->library("unit_test");
		$this->unit->run($this->isInputValidation(""), "error=null", "Test method isvalid");
		$this->unit->run($this->isInputValidation("@$#%5t"), "error=simbol", "Test method isvalid");
		$this->unit->run($this->isInputValidation("P0001"), "true", "Test method isvalid");
		echo $this->unit->report();
	}

	public function test_getkasir() {
		$this->load->model('m_kasir');
		$this->load->library("unit_test");
		$this->load->database();

		$this->unit->run($this->m_kasir->getKasir("P0000"), 0, "Test method isvalid");
		$this->unit->run($this->m_kasir->getKasir("P0001"), "P0001", "Test method isvalid");
		echo $this->unit->report();
	}







	private function checkDatabase($id) {

		$total = 0;

		$this->session->set_flashdata('idpasien', $id);

		$this->load->model('m_kasir');

		$query1 = $this->m_kasir->checkidKamar($id);
		$query2 = $this->m_kasir->checkidPemeriksaan($id);
		$query3 = $this->m_kasir->checkidObat($id);

		$query = $this->m_kasir->getcariid($id);
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->JENIS_KELAMIN_PASIEN);
		}

		if ($query1==true) {
			$dkamar = $this->m_kasir->getKamar($id); //get data detail kamar

			foreach ($dkamar as $k) {
				$total = $total + $k->TARIF_KMR;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailkamar', $dkamar);

		}
		if ($query2==true) {
			$dpemeriksaan = $this->m_kasir->getPemeriksaan($id);
			
			foreach ($dpemeriksaan as $p) {
				$total = $total + $p->TARIF_TINDAKAN;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailpemeriksaan', $dpemeriksaan);

		}
		if ($query3==true) {
			$dobat = $this->m_kasir->getObat($id);

			foreach ($dobat as $o) {
				$total = $total + $o->HARGA;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailobat', $dobat);

		}	else {
			redirect(base_url().'kasir?error=invalidid');
			return FALSE;
		}
			redirect(base_url().'kasir');
	}

	public function storevalue($idpas, $namapas, $jkpas){
		$this->session->set_flashdata('idpasien', $idpas);
		$this->session->set_flashdata('namapas', $namapas);
		$this->session->set_flashdata('jkpas', $jkpas);
	}

	public function validationCash(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$byr = $this->input->post("bayar");
		if ($byr==null || $byr=="") {
			redirect(base_url().'kasir?error=nullcash');
		} else {
			if (preg_match('/[^0-9]/i', $byr)) {
				redirect(base_url().'kasir?error=simbolcash');
			} else{ 
				$this->checkHitung($byr);
			}
		}
	}

	public function coba ($i) {
		return $id+$id2;

	}

	// public function IdPasien($id) {
	// 	$this->session->set_flashdata('idpasien', $id);
	// 	$this->load->model('m_kasir');

	// 	$query = $this->m_kasir->getcariid($id);
	// 	if ($query->num_rows() > 0) {
	// 		$query = $query->row();
	// 		$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->JENIS_KELAMIN_PASIEN);
	// 	}
	// 	return $id;
	// }



	public function checkHitung ($byr) {
		$kembali = 0;
		$byr=$this->input->post('bayar');
		$total=$this->session->flashdata('total');

		if ($byr==$total || $byr>$total) {
			$kembali = $byr - $total;
			//echo $byr;
			echo $total;
			//echo $total;
		
			//echo $kembali;
		} else {
			echo "maaf";
		}



		// $this->session->set_userdata('bayar', $byr);

		// $this->session->userdata('total', $total);
	
		// if ($byr==$total) {
		// $kembali = $byr-$total;
		// redirect(base_url().'kasir?error=null');	
		// } 
		// redirect(base_url().'kasir');
	}
	
}