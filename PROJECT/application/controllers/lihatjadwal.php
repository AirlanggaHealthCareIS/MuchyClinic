<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lihatjadwal extends CI_Controller {

	public function Lihatjadwal(){
		parent::__construct();

		$this->id='A0001';
		$this->idaaktor = substr($this->id,0,1);
	}

	public function index()
	{	
		//$id = 'D0001';
        // $data = array("ida"=>$this->id, "nama"=>"", "lihatjadwal"=>null); //tampil data di tabel


        if($this->idaaktor == "D"){
			$this->showDokter($this->id);
		}
		else if($this->idaaktor == "A"){
			$this->showApoteker($this->id);
		}
		else if($this->idaaktor == "K"){
			$this->showKaryawan($this->id);
		}

		// $this->load->view("v_header");
		// $this->load->view("lihatjadwal/v_content", $data);
		// $this->load->view("v_footer");

	    }

	public function validasi(){
		
		if($this->idaaktor == "D"){
			$this->showDokter($this->id);
		}
		else if($this->idaaktor == "A"){
			$this->showApoteker($this->id);
		}
		else if($this->idaaktor == "K"){
			$this->showKaryawan($this->id);
		}
	}  

    public function showApoteker() {
		
		$this->load->database();

		$this->load->model('m_lihatjadwal');
		$this->load->model('m_getdata');
		
		$query = $this->m_lihatjadwal->getApoteker($this->id); //ambil data
        $ro = $query->row();

		$data = array("idaaktor"=>$this->idaaktor, "ida"=>$ro->ID_APOTEKER, "nama"=>$ro->NAMA_APOTEKER, "lihatjadwal"=>$this->m_lihatjadwal->getDataApoteker($this->id)); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header");
		$this->load->view("lihatjadwal/v_content", $data);
		$this->load->view("v_footer");
       	
	}

	public function showDokter() {
		
		$this->load->database();

		//$id = $this->input->post('id_aktor');
		
		$this->load->model('m_lihatjadwal');
		$this->load->model('m_getdata');
		
		$query = $this->m_lihatjadwal->getDokter($this->id); //ambil data
        $ro = $query->row();

		$data = array("idaaktor"=>$this->idaaktor, "ida"=>$ro->ID_DOKTER, "nama"=>$ro->NAMA_DOKTER, "lihatjadwal"=>$this->m_lihatjadwal->getDataDokter($this->id)); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header");
		$this->load->view("lihatjadwal/v_content", $data);
		$this->load->view("v_footer");
       	
	}

	public function showKaryawan() {
		
		$this->load->database();

		//$id = $this->input->post('id_aktor');
		
		$this->load->model('m_lihatjadwal');
		$this->load->model('m_getdata');
		
		$query = $this->m_lihatjadwal->getKaryawan($this->id); //ambil data
        $ro = $query->row();

		$data = array("idaaktor"=>$this->idaaktor, "ida"=>$ro->ID_KARYAWAN, "nama"=>$ro->NAMA_K, "lihatjadwal"=>$this->m_lihatjadwal->getDataKaryawan($this->id)); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header");
		$this->load->view("lihatjadwal/v_content", $data);
		$this->load->view("v_footer");
       	
	}

}