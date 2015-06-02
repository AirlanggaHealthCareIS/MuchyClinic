<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanuang extends CI_Controller {

	public function LaporanUang(){
		parent::__construct();
		$this->load->model("m_ambildatalaporanuang");
	}


	public function index() {
		$data = array("tanggal"=>"", "id_transaksi"=>"", "id_kasir"=>"", "jam_transaksi"=>"", "total_transaksi"=>"", "dlaporanuang"=>null); //tampil data di tabel
		$this->load->view("v_header");
		$this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
		$this->load->view("v_footer");	
	}

	public function validasi(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		
		if ($tanggal_awal==null || $tanggal_awal=="" || $tanggal_akhir==null || $tanggal_akhir==""){
			redirect(base_url().'laporanuang?error=null');
		}
		else {
			$this->tampil($tanggal_awal, $tanggal_akhir);
			
		}
	}

	public function validasiTransaksi(){
		$this->load->database();
		$period = $this->input->post('jumlah_transaksi');
		$jumlah = $this->input->post('jumlah');
		$urut_berdasarkan = $this->input->post('urut_berdasarkan');
		
		if ($period=="0" || $jumlah==null || $jumlah=="" || $urut_berdasarkan=="0") {
			redirect(base_url().'laporanuang?error=null');
		}
		else if ($period == "hari"){
			$this->tampilTransaksiHari($jumlah, $urut_berdasarkan);
		}
		else if ($period == "bulan"){
			$this->tampilTransaksiBulan($jumlah, $urut_berdasarkan);
		}
		else if ($period == "tahun"){
			$this->tampilTransaksiTahun($jumlah, $urut_berdasarkan);
		}
		
		
	}

	public function tampil($tanggal_awal, $tanggal_akhir) {
		$this->load->database();
		$query = $this->m_ambildatalaporanuang->getlaporanuang($tanggal_awal, $tanggal_akhir); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI,
					"id_transaksi"=>$ro->ID_TRANSAKSI,
					"id_kasir"=>$ro->NAMA_K,
					"jam_transaksi"=>$ro->JAM_TRANSAKSI,
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

		public function tampilTransaksiBulan($jumlah, $urut_berdasarkan) {
		$this->load->database();
		$query = $this->m_ambildatalaporanuang->getlaporanuang2($jumlah, $urut_berdasarkan); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI,
					"id_transaksi"=>$ro->ID_TRANSAKSI,
					"id_kasir"=>$ro->NAMA_K,
					"jam_transaksi"=>$ro->JAM_TRANSAKSI,
					"total_transaksi"=>$ro->TOTAL,
					"dlaporanuang"=>$this->m_ambildatalaporanuang->getlaporanuang2($jumlah, $urut_berdasarkan)); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header");
				$this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
				$this->load->view("v_footer");
		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanuang?error=notfound');
		}
	}

		public function tampilTransaksiHari($jumlah, $urut_berdasarkan) {
		$this->load->database();
		$query = $this->m_ambildatalaporanuang->getlaporanuang3($jumlah, $urut_berdasarkan); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI,
					"id_transaksi"=>$ro->ID_TRANSAKSI,
					"id_kasir"=>$ro->NAMA_K,
					"jam_transaksi"=>$ro->JAM_TRANSAKSI,
					"total_transaksi"=>$ro->TOTAL,
					"dlaporanuang"=>$this->m_ambildatalaporanuang->getlaporanuang3($jumlah, $urut_berdasarkan)); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header");
				$this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
				$this->load->view("v_footer");
		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanuang?error=notfound');
		}
	}

		public function tampilTransaksiTahun($jumlah, $urut_berdasarkan) {
		$this->load->database();
		$query = $this->m_ambildatalaporanuang->getlaporanuang4($jumlah, $urut_berdasarkan); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI,
					"id_transaksi"=>$ro->ID_TRANSAKSI,
					"id_kasir"=>$ro->NAMA_K,
					"jam_transaksi"=>$ro->JAM_TRANSAKSI,
					"total_transaksi"=>$ro->TOTAL,
					"dlaporanuang"=>$this->m_ambildatalaporanuang->getlaporanuang4($jumlah, $urut_berdasarkan)); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header");
				$this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
				$this->load->view("v_footer");
		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanuang?error=notfound');
		}
	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */