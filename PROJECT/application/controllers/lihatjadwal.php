<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lihatjadwal extends CI_Controller {

	public function index()
	{
        $data = array("ida"=>"", "nama"=>"", "lihatjadwal"=>null); //tampil data di tabel

		$this->load->view("v_header");
		$this->load->view("lihatjadwal/v_content", $data);
		$this->load->view("v_footer");

	    }

	public function validasi(){
		$id = $this->input->post('id_aktor');

		if($id==null || $id==""){
			redirect(base_url().'lihatjadwal?error=null');
		}
		else{
			$this->show($id);
			
		}
	}  

    public function show($id) {
		
		$this->load->database();

		$id = $this->input->post('id_aktor');
		
		$this->load->model('m_lihatjadwal');
		$this->load->model('m_getdata');
		
		$query = $this->m_lihatjadwal->getAktor($id); //ambil data
        $ro = $query->row();

		$data = array("ida"=>$ro->ID_APOTEKER, "nama"=>$ro->NAMA_APOTEKER, "lihatjadwal"=>$this->m_getdata->getDataAktor($id)); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header");
		$this->load->view("lihatjadwal/v_content", $data);
		$this->load->view("v_footer");
       	
	}

}