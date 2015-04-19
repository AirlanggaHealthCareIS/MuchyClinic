<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function index()
	{
        $data = array("ida"=>"", "nama"=>""); //tampil data di tabel

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content", $data);
		$this->load->view("v_footer");

	
    }

	public function validasi()
	{
		$id = $this->input->post('idaktor');
		$cb_aktor = $this->input->post('cbaktor');
		$cb_bagian = $this->input->post('cbbagian');
		$cb_hari = $this->input->post('cbhari');
		$cb_jam = $this->input->post('cbjam');

		if ($id==null || $id=="") {
			redirect(base_url().'jadwal?error=null');
		}

		else if($cb_aktor=="0"){
			redirect(base_url().'jadwal?error=cbaktornull');
		}

		else if($cb_bagian=="0"){
			redirect(base_url().'jadwal?error=cbbagiannull');
		}

		else if($cb_hari=="0"){
			redirect(base_url().'jadwal?error=cbharinull');
		}

		else if($cb_jam=="0"){
			redirect(base_url().'jadwal?error=cbjamnull');
		}

		else {
			
			$this->tampil($id);
		}
	}

	public function tampil($id)
	{
		$this->load->database();

		$id = $this->input->post('idaktor');
		
		$this->load->model("m_jadwal");
		
		$query = $this->m_jadwal->getMahasiswa($id); //ambil data
        $ro = $query->row();

		$data = array("ida"=>$ro->ID_APOTEKER, "nama"=>$ro->NAMA_APOTEKER); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content", $data);
		$this->load->view("v_footer");
       	
	}

	
}
