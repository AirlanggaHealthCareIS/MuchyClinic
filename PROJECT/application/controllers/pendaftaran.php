<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pendaftaran extends CI_Controller {




	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('pendaftaran/v_content');
		$this->load->view('v_footer');
	}

	public function validasi()
	{
		$carinama = $this->input->post("carinama");
		
		if($carinama==null || $carinama==""){
		// echo "maaf anda gagal" ;
		redirect(base_url().'pendaftaran?error=null');
		}
		else{
			echo $carinama;
		}

		// echo"hello";
	}
}
