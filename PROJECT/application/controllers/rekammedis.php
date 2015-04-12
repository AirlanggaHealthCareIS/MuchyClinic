<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekammedis extends CI_Controller {

	public function index() {
		$this->load->view("v_header");
		$this->load->view("RekamMedis/v_content");
		$this->load->view("v_footer");	
	}

	public function validasi(){
		$id = $this->input->post('id_pasien');
		//echo $id;
		if ($id==null || $id==""){
			//echo "Maaf Fild Kosong! Silahkan Input Id Pasien Kembali.";
			redirect(base_url().'rekammedis?error=null');
		}
		else {
			echo $id;
		}
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */