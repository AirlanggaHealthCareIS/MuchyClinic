<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function index() {

		$data = array("ID_PASIEN"=> " ", "NAMA_PASIEN"=> " ", "JENIS_KELAMIN_PASIEN"=> " ");
		$this->load->view("v_header");
		$this->load->view("kasir/v_contain",$data);
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

	private function checkDatabase($id) {
		echo $id;
		$this->session->set_flashdata('idpasien', $id);

		$this->load->model('m_kasir');
		$getpasien = $this->m_kasir->getPasien($id);
		$query = $this->m_kasir->checkid($id);
		$query2 = $this->m_kasir->checkid($id);
		if ($query==true) {
			$dkamar = $this->m_kasir->getKamar($id); //get data detail kamar
			$this->session->set_flashdata('detailkamar', $dkamar); //simpan variabel utk dikirim ke view
			redirect(base_url().'kasir');

		} else if ($query2==true) {
			$dpemeriksaan = $this->m_kasir-getPemeriksaan($id);
			$this->session->set_flashdata('detailpemeriksaan', $dpemeriksaan);
			redirect(base_url().'kasir');

			# code...
		} else {
			# code...
			redirect(base_url().'kasir?error=invalidid');
            return FALSE;			
		}
		
	}



// 	private function checkDatabase($id) {
// 	echo $id;
// 	$this->session->set_flashdata('idpasien', $id);

// 	$this->load->model('m_kasir');
// 	$query = $this->m_kasir->checkid($id);
// 	if ($query==true) {
// 		//simpan data untuk di tampilkan
// 		// $this->storeValueKamar($query->NAMA_KAMAR_INAP, $query->TGL_MASK, $query->TGL_KELUAR, $query->TOTAL_BIAYA_RWT);
// 		// detail kamar
// 		$dkamar = $this->m_kasir->getKamar($id); //get data detail resep
// 		$this->session->set_flashdata('detailkamar', $dkamar); //simpan variabel utk dikirim ke view
// 		redirect(base_url().'kasir');

// 		$dpemeriksaan = $this->m_kasir-getPemeriksaan($id);
// 		$this->session->set_flashdata('detailpemeriksaan', $dpemeriksaan);
// 		redirect(base_url().'kasir');



// 		//$this->getkasir($id);
// 		//$this->getkasir();

// 	} else {
// 		redirect(base_url().'kasir?error=invalidid');
//            return FALSE;
// 	}

// }


	public function getkasir(){
		$this->load->database();
		
		$id = $this->input->post('idpasien');
		$this->load->model('m_kasir');
//		$kamar = $this->m_kasir->getkamar();
//		$dokter = $this->m_kasir->getdokter();
		$query = $this->m_kasir->getcariid($id);

		$ro = $query->row();
		$data = array("ID_PASIEN"=> $ro->ID_PASIEN, "NAMA_PASIEN"=> $ro->NAMA_PASIEN, "JENIS_KELAMIN_PASIEN"=> $ro->JENIS_KELAMIN_PASIEN);
		$this->session->idpasien = $ro->ID_PASIEN;


//		$data['dpemeriksaan'] = $this->m_kasir->getpemeriksaan();
		$data['drawatinap'] = $this->m_kasir->getrawatinap();

		$this->load->view('v_header');
		$this->load->view('kasir/v_containmain', $data);
		$this->load->view('v_footer');
	}



	// public function getkasir() {
	// 	$this->load->database();
	// 	$this->load->model('m_kasir');
	// 	// $query = $this->m_kasir->getpemeriksaan();
	// 	// $data['totalbiayapemeriksaan'] = $query->TOTAL_BIAYA_PEMERIKSAAN;

	// 	// $query = $this->m_kasir->getrawatinap();
	// 	// $data['totalbiayarawat'] = $query->TOTAL_BIAYA_RWT;

	// 	//$query = $this->mambildata->getkamar();
	// 	//$data['totalbayardokterpemeriksaan'] = $query->BIAYA_DOKTER;


	// 	$data['drawatinap'] = $this->m_kasir->getrawatinap();

	// 	$this->load->view('v_header');
	// 	$this->load->view('kasir/v_contain', $data);
	// 	$this->load->view('v_footer');
	// }

}