<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antri extends CI_Controller {

	public function index()
	{
		//echo "hello";
		
		$this->load->model("m_antrian");
		//$call = $this->m_antrian->getAntri("12340");
		$dokter = $this->m_antrian->getdokter();
		//$row=$call->row();

		$data = array("getdok"=>$dokter);
		$this->load->view("v_header");
		$this->load->view("antrian/v_content", $data);
		$this->load->view("v_footer");
		//echo $row ->nm_pasien;
		// echo "sukses";
	}

	public function validasi()
	{
		// $antrian = $this->input->post('id_pasien');

		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$id = $this->input->post("id_pasien");
		$namadokter = $this->input->post('dokter');
		$isvalid = $this->input_validasi($id);

		if ($isvalid == "error=null") {
			redirect(base_url().'antri?error=null');
			//echo "Error";
		} 
		else if ($isvalid == "error=symbol") {
			redirect(base_url().'antri?error=symbol');
		} 
		else if ($isvalid == "true"){
			echo "Sukses";
			$this->insert($id,$namadokter);
		}
	}

	public function insert($id,$namadokter){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->database();
		$this->load->model('m_antrian');
		$this->m_antrian->insert($id, $namadokter);
	}

	public function input_validasi($id)
	{
		if ($id==null || $id=="") {
			return "error=null";
			//redirect(base_url().'antri?error=null');
			//echo "Error";
		} 
		else if (preg_match('/[^a-z0-9]/i', $id)) {
			return "error=symbol";
			//redirect(base_url().'antri?error=symbol');
		} 
		else{
			return "true";
			//echo "Sukses";
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


