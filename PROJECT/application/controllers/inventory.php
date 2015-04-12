<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function index()
	{
      $this->load->view('v_header');
		$this->load->view('inventory/v_conten');
		$this->load->view('v_footer');

	}
	public function panggil()
	{
		
		$this->load->view('v_header');
		$this->load->view('inventory/v_conten');
		$this->load->view('v_footer');
	}
	public function validasi()
	{
	 $id = $this->input->post('id_obat');
	 echo $id;

 if ($id == "" || $id == null){
 	//echo "belum mengisi nama obat";
 	redirect (base_url().'inventory?error=null');
     }
     else {
     	echo $id;
     }
	}
}
