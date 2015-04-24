<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawatinap extends CI_Controller {
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
		$this->load->view('rawatinap/rawatinap', $data);
		$this->load->view('v_footer');
	}
	public function daftarinap()
	{
		$this->load->database();
		$this->load->model('mambildata');
		$data['getkam'] = $this->mambildata->getkamar();

		$data['drawatinap'] = $this->mambildata->getinap();

		$this->load->view('v_header');
		$this->load->view('rawatinap/daftarinap', $data);
		$this->load->view('v_footer');
	}
	public function kamar()
	{
		$this->load->database();
		$this->load->model('mambildata');
		$data['getkam'] = $this->mambildata->getkamar();

		$this->load->view('v_header');
		$this->load->view('rawatinap/daftarinap', $data);
		$this->load->view('v_footer');
	}
	
	public function dokter()
	{
		$this->load->database();
		$this->load->model('mambildata');
		$data['getdok'] = $this->mambildata->getdokter();

		$this->load->view('v_header');
		$this->load->view('rawatinap/daftarinap', $data);
		$this->load->view('v_footer');
	}

	public function validasi()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$id= $this->input->post('id_pasien');
		if ($id == null || $id == ""){
			// echo "kossoonngg!!!, isien disik";
			redirect(base_url().'crawatinap?error=null 	');
		}
		else {
			$this->tampilid($id);
		}
	}

	public function tampilid($id){
		$this->load->database();
		
		$id = $this->input->post('id_pasien');
		$this->load->model('mambildata');
		$kamar = $this->mambildata->getkamar();
		$dokter = $this->mambildata->getdokter();
		$query = $this->mambildata->getcariid($id);
		$ro = $query->row();
		$data = array("id_pasien"=> $ro->ID_PASIEN, "nama_pasien"=> $ro->NAMA_PASIEN, "no_telp_pas"=> $ro->NO_TLP_PAS_, "getkam"=>$kamar, "getdok"=>$dokter);
		$this->session->idpasien = $ro->ID_PASIEN;

		$this->load->view('v_header');
		$this->load->view('rawatinap/rawatinap', $data);
		$this->load->view('v_footer');
	}

	public function insertinap(){
		//echo "id_pasien = ".$this->session->idpasien;

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();
		$id_pas = $this->session->idpasien;
		$kamar_r = $this->input->post('kamar');
		$dokter_r = $this->input->post('dokter');
		$tgl_masuk_r = $this->input->post('tgl_masuk');
		$tgl_keluar_r = $this->input->post('tgl_keluar');
		
		//hitung selisih hari
		$datetime1 = new DateTime($tgl_masuk_r);
  		$datetime2 = new DateTime($tgl_keluar_r);
		$day = $datetime1->diff($datetime2);
		//echo "hari = ".$day->days;
		$selisihday = $day->days;

		if ($kamar_r == 'KMR01'){
			$newharga = $selisihday*100000;
			$this->insertinap2($id_pas, $kamar_r, $dokter_r, $tgl_masuk_r, $tgl_keluar_r, $newharga);
		}
		else {
			$newharga = $selisihday*250000;
			$this->insertinap2($id_pas, $kamar_r, $dokter_r, $tgl_masuk_r, $tgl_keluar_r, $newharga);
		}
	}

	public function insertinap2($id_pas, $kamar_r, $dokter_r, $tgl_masuk_r, $tgl_keluar_r, $newharga){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();
		if ($id_pas == null || $kamar_r == null || $dokter_r == null || $tgl_masuk_r == null || $tgl_keluar_r == null || $newharga == null) {
			redirect(base_url().'crawatinap?error=null 	');
		} else {
			$this->load->model('mambildata');
			$insert_r = $this->mambildata->insertinap($id_pas, $kamar_r, $dokter_r, $tgl_masuk_r, $tgl_keluar_r, $newharga);
			$this->index2();
		}
	}

	public function lihatkamar(){
		$this->load->database();

		$kamar_r = $this->input->post('kamar');
		$this->load->model('mambildata');
		$data['drawatinap'] = $this->mambildata->getinap2($kamar_r);
		$data['getkam'] = $this->mambildata->getkamar();
		$this->load->view('v_header');
		$this->load->view('rawatinap/daftarinap', $data);
		$this->load->view('v_footer');
	}
}
