<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekammedis extends CI_Controller {

	public function index() {
		$data = array("id_pasien"=>"", "nama"=>"", "golongan_darah"=>"", "jenis_kelamin"=>""); //tampil data di tabel

		$this->load->view("v_header");
		$this->load->view("RekamMedis/v_content", $data);
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
			$this->tampil($id);
		}
	}

	public function tampil($id)
	{
		$this->load->database();

		$id = $this->input->post('id_pasien');
		
		$this->load->model("m_rekammedis");
		$query = $this->m_rekammedis->getRekamMedis($id); //ambil data
        $ro = $query->row();

		$data = array(
			"id_pasien"=>$ro->id_pasien, 
			"nama"=>$ro->nama, 
			"golongan_darah"=>$ro->golongan_darah, 
			"jenis_kelamin"=>$ro->jenis_kelamin

		); //tampil data di tabel dan ambil nilai
		
		$this->load->view("v_header");
		$this->load->view("RekamMedis/v_content", $data);
		$this->load->view("v_footer");	
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */