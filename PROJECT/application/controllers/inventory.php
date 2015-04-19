<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function index()
	{
		$data = array("ido"=>"", "nama_obat"=>"", "jenis"=>" ", "takaran"=>" ", "harga"=>""); 

      	$this->load->view('v_header');
	    $this->load->view('inventory/v_conten', $data);
		$this->load->view('v_footer');

		// $this->load->database();
		// $this->load->model("m_inventory");

		/*$call = $this->m_inventory->getObat("paramex");
		$ro = $call->row();*/
		//echo $ro->takaran;
		//echo $ro->nama_obat;



	}
	
	public function validasi()
	{
	 $nama_obat = $this->input->post('nama_obat');	  

 	if ($nama_obat == "" || $nama_obat == null){
 	//echo "belum mengisi nama obat";
 	redirect (base_url().'inventory?error=null');
  	}
   else {
  	$this->tampil($nama_obat);
  }

	}

	public function tampil($nama_obat)
	{ 
		$this->load->database();

		 $nama_obat = $this->input->post('nama_obat');

		$this->load->model("m_inventory");
		$query = $this->m_inventory->getObat($nama_obat);
		$ro = $query->row();

		$data = array("ido"=>$ro->id_obat, "nama_obat"=>$ro->nama_obat, "jenis"=>$ro->jenis, "takaran"=>$ro->takaran, "harga"=>$ro->harga); 
			$this->load->view('v_header');
	   		$this->load->view('inventory/v_conten', $data);
			$this->load->view('v_footer');

	}

	/*public function getObat($ido){
		$query = $this->db->query('SELECT * FROM `obat_pasien` WHERE `nama_obat`= "'.$nobat.'"');
		$row = $query->row();
		return $row->nama_obat;
	}*/
}
