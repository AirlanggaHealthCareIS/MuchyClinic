<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function index()
	{
		$data = array("ID_PASIEN"=> " ", "NAMA_PASIEN"=> " ", "JENIS_KELAMIN_PASIEN"=> " ");

		$this->load->view("v_header");
		$this->load->view("kasir/v_contain",$data);
		$this->load->view("v_footer");

		// $this->load->database();
		// $call = $this->getcariid(p001);
		// echo $call;	
	}

	public function validation(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$id = $this->input->post("idpasien");
		if ($id==null || $id=="") {
			redirect(base_url().'kasir?error=null');
		} else {
			if (preg_match('/[^a-z0-9]/', $id)) {
				redirect(base_url().'kasir?error=simbol');
			} else{ 
				//echo 'sukses';
				//$this->getkasir($id);
				$this->check_database();
			}
		}
	}

	protected function check_database() {
		$idpasien = $this->input->post("idpasien");

		$this->load->model('m_kasir');
		$result = $this->m_kasir->checkid($idpasien);

		if ($result) {
			//$this->getkasir($id);
			$this->getkasir();

		} else {
			redirect(base_url().'kasir?error=invalidid');
            return FALSE;
		}
		
	}

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



	// private function cariid ($id) {
	// 	$query = $this->db->query("SELECT * FROM `pasien` WHERE `id_pasien`= '".$id."' ");
	// 	//$row = $query->row();

	// 	//return $row;
	// 	return $query;
	// }

	// public function tampilid() {
	// 	$this->load->database();
	// 	$call = $this->cariid("p01");
	// 	echo "Nama = ".$call->nama."<br>Keterangan = ".$call->keterangan;
	// 	// echo "string";
	// }
}