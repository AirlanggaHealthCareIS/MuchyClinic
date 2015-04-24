<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obatkeluarresep extends CI_Controller {

	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('obatkeluar/v_resep');
		$this->load->view('v_footer');
	}

	public function validasi(){
		$id = $this->input->post('idpasien');
		if ($id==null || $id=="") {
			redirect(base_url()."obatkeluarresep?error=null");
		} 
		else if (preg_match('/[^a-z0-9]/', $id)) {
				redirect(base_url().'obatkeluarresep?error=symbol');
 		} 
 		else {
			echo "id pasien yang diiinputkan adalah ".$id;
		}
	}
}
