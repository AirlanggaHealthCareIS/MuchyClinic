<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanuang extends CI_Controller {

	public function index() {
		$this->load->view("v_header");
		$this->load->view("LaporanUangMasuk/v_contentLaporan");
		$this->load->view("v_footer");	
	}

	public function validasi(){
		$id = $this->input->post('tanggal');
		//echo $id;
		if ($id==null || $id==""){
			redirect(base_url().'laporanuang?error=null');
		}
		else if (preg_match('/[^a-z0-9]/i', $id)) { //untuk symbol
			redirect(base_url().'laporanuang?error=symbol');
		}	
		else {
			$this->tampil($tanggal);
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */