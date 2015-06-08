<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekammedis extends CI_Controller {

	public function Rekammedis()
	{
		parent::__construct();
		// $this->load->model("mambildata");
		$this->header[3] = "active"; //untuk indikasi active header
		$this->id_user = "";
		
		if (($this->session->userdata('username_dokter'))=="" || ($this->session->userdata('username_dokter'))==null) {
			redirect(base_url()."login_dokter");
		}
		$this->user = $this->session->userdata('username_dokter');

	}

	public function logout(){
		$this->session->unset_userdata('username_dokter');
		redirect(base_url()."login_dokter");

	}

	public function index() {
		$data = array("id_pasien"=>"", "nama"=>"", "golongan_darah"=>"", "jenis_kelamin"=>"", "drekammedis"=>null); //tampil data di tabel

		$this->load->view("v_header_dokter");
		$this->load->view("RekamMedis/v_content", $data);
		$this->load->view("v_footer");	
	}

	public function test_login(){
		$this->load->library ('unit_test');
		$this->unit->run($this->sum(5,7),12, "Test Methot Sum");
		echo $this->unit->report();
	}

	public function sum($a, $b){
		$c = $a + $b;
		return $c;
	}

	public function testing (){
		$this->load->library ('unit_test');
		$this->unit->run($this->inputValidasi(""),"error=null", "Test Methot Validasi ID Null");
		$this->unit->run($this->inputValidasi("P0001"),"true", "Test Methot Validasi ID True");
		$this->unit->run($this->inputValidasi("P001@"),"error=symbol", "Test Methot Validasi ID Symbol");
		echo $this->unit->report();
	}

	public function testingModel (){
		$this->load->library ('unit_test');
		$this->load->model('m_rekammedis');
		$this->load->database();

		$this->unit->run($this->m_rekammedis->getRekamMedisTest("P0001"),true, "Pasien Terdaftar dan Memiliki Rekam Medis");
		$this->unit->run($this->m_rekammedis->getRekamMedisTest("P0004"),true, "Pasien Terdaftar dan tidak Memiliki Rekam Medis");
		$this->unit->run($this->m_rekammedis->getRekamMedisTest("P0006"),true, "Pasien Tidak Terdaftar");

		echo $this->unit->report();
	}


	public function validasi(){
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$id = $this->input->post('id_pasien');
		$id2=$this->inputValidasi($id);
		if ($id2=="error=null"){
			redirect(base_url().'rekammedis?error=null');
		}
		else if ($id2=="error=symbol"){
			redirect(base_url().'rekammedis?error=symbol');
		}	
		else if ($id2=="true"){
			$this->tampil($id);
		}
		
	}

	public function inputValidasi($id){
		if ($id==null || $id==""){
			return "error=null";
		}
		else if (preg_match('/[^a-z0-9]/i', $id)) { //untuk symbol
			return "error=symbol";
		}	
		else {
			return "true";
		}


	}





	public function tampil($id)
	{
		$this->load->database();
		$id = $this->input->post('id_pasien');
		
		$this->load->model("m_rekammedis");
		$this->load->model("m_ambildata");

		$query1 = $this->m_rekammedis->getRekamMedis($id); //ambil data 
		if ($query1->num_rows() > 0) { //cek jika hasil ada
			$ro = $query1->row();
		    
			$query = $this->m_ambildata->getRekamMedis($id); //ambil data
			if ($query->num_rows() > 0) { //cek jika hasil tidak ada
				$data = array(
					"id_pasien"=>$ro->ID_PASIEN, 
					"nama"=>$ro->NAMA_PASIEN, 
					"golongan_darah"=>$ro->GOL_DARAH_PASIEN,
					"jenis_kelamin"=>$ro->JENIS_KELAMIN_PASIEN,
					"drekammedis"=>$this->m_ambildata->getrekammedis($id)); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header");
				$this->load->view("RekamMedis/v_content", $data);
				$this->load->view("v_footer");	
			}
			else {
				redirect(base_url().'rekammedis?error=pasienbaru');
			}
		}

		else{ // jika hasil tidak ada
			redirect(base_url().'rekammedis?error=notfound');
		}

	}


}

/* End of file welcome.php *
/* Location: ./application/controllers/welcome.php */