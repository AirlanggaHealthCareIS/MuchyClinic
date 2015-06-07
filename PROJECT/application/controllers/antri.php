<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antri extends CI_Controller {

	public function Antri()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->model("m_antrian");
                $this->header[0] = "active"; //untuk indikasi active header
				$this->id_user = "";
				$this->user = "Izmul Zamroni";
        }
	public function index()
	{
		$dokter = $this->m_antrian->getdokter();
		$tgldftr = date('Y-m-d');
		$this->load->model('m_antrian');
		$setAntri = $this->m_antrian->antrian($tgldftr);

		$setAntri2 = ($setAntri+1);
		$this->nomor_antri = $setAntri2;		
		$data = array("id_pasien"=> " ", "nama_pasien"=> " ", "no_telp_pas"=> " ", "getdok"=>$dokter);
		$this->load->view("v_header_admin");
		$this->load->view("antrian/v_content", $data);
		$this->load->view("v_footer");
	}

	public function validasi()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$id = $this->input->post("id_pasien");
		$namadokter = $this->input->post('dokter');
		$isvalid = $this->input_validasi($id);

		if ($isvalid == "error=null") {
			redirect(base_url().'antri?error=null');
		} 
		else if ($isvalid == "error=symbol") {
			redirect(base_url().'antri?error=symbol');
		} 
		else if ($isvalid == "true"){
			$this->checkdb($id);
		}
	}
	public function checkdb($id){
		$this->session->set_userdata('idpasien3', $id);
		$query = $this->m_antrian->getAntri($id);
		$this->load->database();
		

		if ($query->num_rows() > 0) { //cek jika hasil ada
			$query = $query->row();
		 	//simpan data untuk di tampilkan
			$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->NO_TLP_PASIEN);
			redirect(base_url().'antri');
		} else { // jika hasil tidak ada // if ($query == "act=not_found")
			redirect(base_url().'antri?act=not_found');
		}
	}
	public function storevalue($idpas, $namapas, $telppas){
		$this->session->set_flashdata('idpasien', $idpas);
		$this->session->set_flashdata('namapas', $namapas);
		$this->session->set_flashdata('telppas', $telppas);
	}

	public function insert(){
		$this->load->database();
		
		$id_pas = $this->session->userdata('idpasien3');
		$namadokter = $this->input->post('dokter');
		$tgldftr = date('Y-m-d');
		$this->load->model('m_antrian');
		$Antri = $this->m_antrian->generateAntrian();
		$setAntri = $this->m_antrian->antrian($tgldftr);

		$setAntri2 = ($setAntri+1);
		$this->nomor_antri = $setAntri2;		

		if ($id_pas == null || $namadokter == null){
			redirect(base_url().'antri?error=null');
		} else {
			$this->load->model('m_antrian');
			$input = $this->m_antrian->insert($Antri, $id_pas, $namadokter, $tgldftr, $setAntri2);
			redirect(base_url().'antri?act=succesfully');
		}
	}
	public function input_validasi($id)
	{
		if ($id==null || $id=="") {
			return "error=null";
		} 
		else if (preg_match('/[^a-z0-9]/i', $id)) {
			return "error=symbol";
		} 
		else{
			return "true";
		}
	}

	public function testing(){
		$this->load->library('unit_test');
		$this->unit->run($this->input_validasi(""),"error=null","Iki kosong rek");
		$this->unit->run($this->input_validasi("!!@$"),"error=symbol","Iki gak oleh rek");
		$this->unit->run($this->input_validasi("P0001"),"true","Iki bener rek");

		echo $this->unit->report();
	}

	
}


