<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanuang extends CI_Controller {

	public function LaporanUang(){
		parent::__construct();
		$this->load->model("m_ambildatalaporanuang");
	}


	public function index() {
		$data = array("tanggal"=>"", "total_rawat_inap"=>"", "total_pemeriksaan"=>"", "total_obat"=>"", "total_transaksi"=>"", "dlaporanuang"=>null); //tampil data di tabel
		$this->load->view("v_header");
		$this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
		$this->load->view("v_footer");	
	}

	public function validasi(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		
		if ($tanggal_awal==null || $tanggal_awal=="" || $tanggal_akhir=null || $tanggal_akhir=""){
			redirect(base_url().'laporanuang?error=null');
		}
		else {
			$this->tampil($tanggal_awal, $tanggal_akhir);
		}
	}

	public function tampil($tanggal_awal, $tanggal_akhir) {
		$query = $this->m_ambildatalaporanuang->getlaporanuang($tanggal_awal, $tanggal_akhir); //ambil data
		$this->load->database();
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query1->row();
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI, 
					"total_rawat_inap"=>$ro->SUBTOTAL, 
					"total_pemeriksaan"=>$ro->SUBTOTAL,
					"total_obat"=>$ro->SUBTOTAL,
					"total_transaksi"=>$ro->TOTAL,
					"dlaporanuang"=>$this->m_ambildatalaporanuang->getlaporanuang($tanggal_awal, $tanggal_akhir)); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header");
				$this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
				$this->load->view("v_footer");
		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanuang?error=notfound');
		}




			

	}









	// public function validasiTransaksi(){
	// 	$id = $this->input->post('tanggal');
	// 	//echo $id;
	// 	if ($id==null || $id==""){
	// 		redirect(base_url().'laporanuang?error=null');
	// 	}
	// 	else {
	// 		$this->tampil($tanggal);
	// 	}
	// }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */