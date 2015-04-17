<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function index()
	{
		$this->load->view("v_header");
		$this->load->view("kasir/v_contain");
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
				echo "Sukses";
			}
		}


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
