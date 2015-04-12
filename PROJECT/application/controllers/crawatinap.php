<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawatinap extends CI_Controller {
	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('rawatinap/rawatinap');
		$this->load->view('v_footer');
	}
	public function validasi()
	{
		$id_pas = $this->input->post('id_pasien');
		if ($id_pas == null || $id_pas == ""){
			// echo "kossoonngg!!!, isien disik";
			redirect(base_url().'crawatinap?error=null 	');
		}
		else {
			echo $id_pas;
		}
	}	
}
