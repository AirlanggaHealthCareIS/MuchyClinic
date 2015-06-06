<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpemeriksaan extends CI_Controller {
	public function Cpemeriksaan()
	{
		parent::__construct();
		$this->load->model("m_pemeriksaan");
		$this->tperiksa = date('Y-m-d');

		$this->id_dokter = "DI001";
	}
	public function index()
	{
		// $this->load->model('m_pemeriksaan');
		$penyakit = $this->m_pemeriksaan->getPenyakit();
		$data = array("id_pasien"=> " ", "nama_pasien"=> " ", "no_telp_pas"=> " ", "getpeny" => $penyakit);


		$this->load->view('v_header');
		$this->load->view('pemeriksaan/v_pemeriksaan',$data);
		$this->load->view('v_footer');	

		
	}

	public function validasiPemeriksaan(){
		
		// $idp      		= $this->input->post('id_periksa');

		// if($idp=="null"||$idp==""){
		// 	redirect(base_url().'cpemeriksaan?error=null');
		// }
		// else{
		// 	$in=$this->inputpemeriksaan();
		// 	redirect(base_url()."cpemeriksaan?status=sukses");
		// }

		// $idpasien 		= $this->input->post('idpasien');
		// if($idpasien=="null"||$idpasien==" "){
		// 	redirect(base_url().'Cpemeriksaan?=null');
		// }
		// else{
		// 	$in=$this->inputpemeriksaan();
		// 	redirect(base_url()."Cpemeriksaan?=sukses");
		// }

		// $iddokter 		= $this->input->post('iddokter');
		// $tglperiksa		= $this->input->post('tanggalpemeriksaan');
		// $biayaperiksa	= $this->input->post('biayaperiksa');

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$id= $this->input->post('id_pasien'); //nama di viewer

		$isValid = $this->inValidasi($id);
		if ($isValid == "error=null"){ // null
			redirect(base_url().'cpemeriksaan?error=null 	');
		}
		else if ($isValid == "error=symbol") { // symbol
				redirect(base_url().'cpemeriksaan?error=symbol');
 		} 
		else if ($isValid == "true"){ // true
			$this->checkdb($id);
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
	public function checkdb($id){
		$this->session->set_userdata('idpasien3', $id);

		// $this->load->model('mambildata');
		$this->load->database();
		$query = $this->m_pemeriksaan->getcariid($id);
		
		

		if ($query->num_rows() > 0) { //cek jika hasil ada
			$query = $query->row();
		 	//simpan data untuk di tampilkan
			$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->NO_TLP_PASIEN);
			redirect(base_url().'cpemeriksaan');
		} else { // jika hasil tidak ada // if ($query == "act=not_found")
			redirect(base_url().'cpemeriksaan?act=not_found');
		}
	}
	public function insert_periksa(){
		$this->load->database();
		$id_pas = $this->session->userdata('idpasien3');
		$id_pemeriksaan = $this->mambildata->generatePemeriksaan();
		$pnyakit = $this->input->post('penyakit');
		$keluhan = $this->input->post('keluhan');
		$tanggal = $this->tperiksa;
		$dok = $this->id_dokter;

	}
	public function inputpemeriksaan(){
		
		echo $idp;
	}
	public function storevalue($idpas, $namapas, $telppas){
		$this->session->set_flashdata('idpasien', $idpas);
		$this->session->set_flashdata('namapas', $namapas);
		$this->session->set_flashdata('telppas', $telppas);
	}
}