<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function index($idpasien = "") {
		
		if ($idpasien!="") {
			$this->checkDatabase($idpasien);
		}

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
				// $this->checkDatabase($id);
				redirect(base_url().'kasir/index/'.$id);
			}
		}
	}

	//method untuk testing
	public function isInputValidation($id){
		if ($id==null || $id=="") {
			return "error=null";
		} else {
			if (preg_match('/[^a-z0-9]/i', $id)) {
				return "error=simbol";
			} else{
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
	//akhir dari method testing Id Pasien

	private function checkDatabase($id) {

		$total = 0;

		$this->session->set_flashdata('idpasien', $id);
		$this->load->model('m_kasir');

		$query = $this->m_kasir->getcariid($id);
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->JENIS_KELAMIN_PASIEN);
		}

		$query1 = $this->m_kasir->checkidKamar($id);
		$query2 = $this->m_kasir->checkidPemeriksaan($id);
		$query3 = $this->m_kasir->checkidObat($id);
		if ($query1==true) {
			$dkamar = $this->m_kasir->getKamar($id); //get data detail kamar

			foreach ($dkamar as $k) {
				$total = $total + $k->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailkamar', $dkamar);

		}
		if ($query2==true) {
			$dpemeriksaan = $this->m_kasir->getPemeriksaan($id);
			
			foreach ($dpemeriksaan as $p) {
				$total = $total + $p->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailpemeriksaan', $dpemeriksaan);

		}
		if ($query3==true) {
			$dobat = $this->m_kasir->getObat($id);

			foreach ($dobat as $o) {
				$total = $total + $o->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailobat', $dobat);

		}	else {
			redirect(base_url().'kasir?error=invalidid');
			return FALSE;
		}
			//redirect(base_url().'kasir');
	}

	public function storevalue($idpas, $namapas, $jkpas){
		$this->session->set_flashdata('idpasien', $idpas);
		$this->session->set_flashdata('namapas', $namapas);
		$this->session->set_flashdata('jkpas', $jkpas);
	}

	public function validationCash($id="") {
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('m_kasir');

		$byr = $this->input->post("bayar");
		if ($byr==null || $byr=="") {
			redirect(base_url().'kasir/index/'.$id.'?error=nullcash');
		} else {
			if (preg_match('/[^0-9]/i', $byr)) {
				redirect(base_url().'kasir/index/'.$id.'?error=simbolcash');
			} else {
				// $this->checkHitung($byr, $id);
				$this->session->set_flashdata('idpasien', $id);
				$query = $this->m_kasir->checkidPasienTransaksi($id);
				if ($query==true) {
					redirect(base_url().'kasir/index/'.$id.'?success=pasienlunas');
					} else {
						$this->checkHitung($byr, $id);
					}
			}
		}
	}

	//method untuk testing Cash
	public function isInputValidationCash($byr) {
		if ($byr==null || $byr=="") {
			return "error=null";
		} else {
			if (preg_match('/[^0-9]/i', $byr)) {
				return "error=simbol";
			} else{
				return "true";
			}
		}
	}

	public function test_isvalidCash() {
		$this->load->library("unit_test");
		$this->unit->run($this->isInputValidationCash(""), "error=null", "Test method test_isvalidCash");
		$this->unit->run($this->isInputValidationCash("@$#%at"), "error=simbol", "Test method test_isvalidCash");
		$this->unit->run($this->isInputValidationCash("5000"), "true", "Test method test_isvalidCash");
		echo $this->unit->report();
	}

	public function isInputValidationCash2($byr, $total) {

		if ($byr==$total || $byr>$total) {
			return "true";
		} else {
			return "FALSE";
		}
	}

	public function test_isvalidCash2() {
		$this->load->library("unit_test");
		$this->unit->run($this->isInputValidationCash2(700000, 50000), "true", "Test method test_isvalidCash2");
		$this->unit->run($this->isInputValidationCash2(700000, 700000), "true", "Test method test_isvalidCash2");
		$this->unit->run($this->isInputValidationCash2(40000, 700000), "FALSE", "Test method test_isvalidCash2");
		echo $this->unit->report();
	}
	//akhir dari method testing Cash

	public function gethitung($id){

		$total = 0;
		$this->load->model('m_kasir');
		$query1 = $this->m_kasir->checkidKamar($id);
		$query2 = $this->m_kasir->checkidPemeriksaan($id);
		$query3 = $this->m_kasir->checkidObat($id);
		if ($query1==true) {
			$dkamar = $this->m_kasir->getKamar($id); //get data detail kamar

			foreach ($dkamar as $k) {
				$total = $total + $k->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailkamar', $dkamar);

		}
		if ($query2==true) {
			$dpemeriksaan = $this->m_kasir->getPemeriksaan($id);
			
			foreach ($dpemeriksaan as $p) {
				$total = $total + $p->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailpemeriksaan', $dpemeriksaan);

		}
		if ($query3==true) {
			$dobat = $this->m_kasir->getObat($id);

			foreach ($dobat as $o) {
				$total = $total + $o->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}
			// $this->session->set_flashdata('detailobat', $dobat);
			return $total;
		}
	}

	public function checkHitung ($byr, $id) {

		$kembali = 0;
		$byr=$this->input->post('bayar');
		$total = $this->gethitung($id);

		// if ($byr>$total && $total==null || $byr>$total && $total==0) {
		// 	redirect(base_url().'kasir/index/'.$id.'?error=nullidpasien');
		// }

		if ($byr==$total || $byr>$total) {
			$kembali = $byr - $total;
			$this->session->set_flashdata('kembali', $kembali);
			$this->session->set_flashdata('bayar', $byr);

			//redirect(base_url().'kasir/index/'.$id);

			$this->saveTransaksi($id);
		    redirect(base_url().'kasir/index/'.$id.'?success=sukses');
			
		} else {
			redirect(base_url().'kasir/index/'.$id.'?error=invalidcash');
		}
	}

	public function saveTransaksi($id) {

		//untuk set tanggal transaksi
		date_default_timezone_set('asia/jakarta');
		$tgltransaksi = date('Y-m-d');
		$timetransaksi = date('H:i:s');
		$this->load->model("m_kasir");

		$total = $this->gethitung($id);

		$idpasien = "$id";

		//echo " id transaksi = ".$idtransaksi." idkasir ".$idkasir." tgltransaksi ".$tgltransaksi." timetransaksi ".$timetransaksi." total ".$total;
		//save data transaksi
			
		$query = $this->m_kasir->setTransaksi($idtransaksi, $idkasir, $tgltransaksi, $timetransaksi, $total, $idpasien);

		$query1 = $this->m_kasir->checkidKamar($id);
		if ($query1==true) {
			$this->m_kasir->saveTransaksiKamar($id);
		}

		$query2 = $this->m_kasir->checkidPemeriksaan($id);
		if ($query2==true) {
			$this->m_kasir->saveTransaksiPemeriksaan($id);
		}

		$query3 = $this->m_kasir->checkidObat($id);
		if ($query3==true) {
			$this->m_kasir->saveTransaksiObat($id);
		}

		echo $id;
	}
}