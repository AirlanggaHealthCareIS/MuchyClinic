<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antri extends CI_Controller {

	public function index()
	{
		//echo "hello";
		$this->load->view("v_header");
		$this->load->view("antrian/v_content");
		$this->load->view("v_footer");
		$this->load->model("m_antrian");
		$call = $this->m_antrian->getAntri("12340");
		$row=$call->row();
		//echo $row ->nm_pasien;
		// echo "sukses";
	}

	public function validasi(){
		$antrian = $this->input->post('id_pasien');
		
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

		$id = $this->input->post("id_pasien");
		if ($id==null || $id=="") {
			redirect(base_url().'antri?error=null');
			//echo "Error";
		} 
		else if (preg_match('/[^a-z0-9]/', $id)) {
			redirect(base_url().'antri?error=symbol');
		} 
		else{
			echo "Sukses";
			
		}
	}


	
}


