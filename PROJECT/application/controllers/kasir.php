<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function index()
	{
		$this->load->view("v_header");
		$this->load->view("kasir/v_contain");
		$this->load->view("v_footer");
	
	}
	public function validation(){
		$id = $this->input->post("idpasien");
		echo $id;
		echo "wkwk";


		if ($id==null || $id=="") {
			redirect(base_url().'kasir?error=null');
		} else {
			echo "lanjutkan";
		}
		
	}
}
