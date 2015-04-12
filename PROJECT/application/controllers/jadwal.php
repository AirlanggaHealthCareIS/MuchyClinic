<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function index()
	{
		$this->load->view("v_header");
		$this->load->view("jadwal/v_content");
		$this->load->view("v_footer");
	}

	public function validasi()
	{
		$id = $this->input->post('idaktor');

		if ($id==null || $id=="") {
			//echo "Maaf, yang anda inputkan kosong :(";
			redirect(base_url().'jadwal?error=null');
		}
		else{
			echo $id;
			echo " Data berhasil terinput";
		}
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */