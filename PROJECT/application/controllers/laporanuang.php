<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanuang extends CI_Controller {

	public function index() {
		$this->load->view("v_header");
		$this->load->view("LaporanUangMasuk/v_contentLaporan");
		$this->load->view("v_footer");	
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */