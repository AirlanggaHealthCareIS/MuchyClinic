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

	public function testing (){
		$this->load->library ('unit_test');
		$this->unit->run($this->inputValidasi("", ""),true, "Test Method Validasi Periode Null");
		$this->unit->run($this->inputValidasi(2012-01-12, 2012-09-13),true, "Test Method Validasi Periode Awal dan Akhir True");
		$this->unit->run($this->inputValidasitransaksi("","",""),true,  "Test Method Validasi Periode n Transaksi Terakhir Null");
		$this->unit->run($this->inputValidasitransaksi("hari","10","Urut Dari Yang Terkecil"),true,  "Test Method Validasi Periode n Hari Transaksi Terakhir True");
		$this->unit->run($this->inputValidasitransaksi("bulan","12","Urut Dari Yang Terbesar"),true, "Test Method Validasi Periode n Bulan Transaksi Terakhir True");
		$this->unit->run($this->inputValidasitransaksi("tahun","1","Urut Dari Yang Terkecil"),true,  "Test Method Validasi Periode n Tahun Transaksi Terakhir True");
		echo $this->unit->report();
	}

	

	public function inputValidasi($tanggal_awal, $tanggal_akhir){
		if ($tanggal_awal==null || $tanggal_akhir==null ){
			return "error=null";
		}
		else if ($tanggal_awal>$tanggal_akhir) { //untuk symbol
			return "error=periodefalse";
		}	
		else {
			return "true";
		}
	}

	public function inputValidasitransaksi($period, $jumlah, $urut_berdasarkan){
		if ($period=="0" || $jumlah==null || $jumlah=="" || $urut_berdasarkan=="0") {
			return "error=null";
		}
		else if ($period == "hari"){
			return "true1";
		}
		else if ($period == "bulan"){
			return "true2";
		}
		else if ($period == "tahun"){
			return "true3";
		}
	}


	public function validasi(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$id2 = $this->inputValidasi($tanggal_awal, $tanggal_akhir);

		if ($id2=="error=null"){
			redirect(base_url().'laporanuang?error=null');
		}
		else if ($id2=="error=periodefalse"){
			redirect(base_url().'laporanuang?error=periodefalse');
			
		}
		else if ($id2=="true"){
			$this->tampil($tanggal_awal, $tanggal_akhir);	
		}
	}

	public function validasiTransaksi(){
		$this->load->database();
		$period = $this->input->post('jumlah_transaksi');
		$jumlah = $this->input->post('jumlah');
		$urut_berdasarkan = $this->input->post('urut_berdasarkan');
		$id2 = $this->inputValidasitransaksi($period, $jumlah, $urut_berdasarkan);
		$id3 = $this->inputValidasitransaksi($jumlah, $urut_berdasarkan);
		
		if ($id2=="error=null"){
			redirect(base_url().'laporanuang?error=null');
		}
		else if ($id2 == "true1"){
			$this->tampilTransaksiHari($jumlah, $urut_berdasarkan);
		}
		else if ($id2 == "true2"){
			$this->tampilTransaksiBulan($jumlah, $urut_berdasarkan);
		}
		else if ($id2 == "true3"){
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


	public function cetak(){
		// echo "y6thtrh";\
		$nama = "Bagus";
		$html = '
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<img src="'.base_url().'assets/images/header1.png" class="" alt="Responsive image">

			<h1>Laporan Pendapatan Muchy Clinic</h1>
			<h7>Periode : </h7>
			<br>
			</br>
			<br>
			<br>

			<table class="table table-bordered">
          <tr style="background-color: rgb(226, 246, 245);">
            <td width = "25%"><center>Tanggal Trnsaksi</center></td>
            <td width = "25%"><center>Id Transaksi</center></td>
            <td width = "25%"><center>Nama Kasir</center></td>
            <td width = "25%"><center>Waktu Transaksi</center></td>
            <td width = "25%"><center>Total Pembayaran</center></td>
          </tr>


          <tr>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
          </tr>
          <tr>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
          </tr>
          <tr>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
            <td ><center>...</center></td>
          </tr>
        </table>



		<p>Nama : '.$nama.'</p>
		</body>
		</html>
		';
		


		$this->load->library('pdf');
	    $pdf = $this->pdf->load();
	    $pdf->WriteHTML($html); // write the HTML into the PDF
	    $pdf->Output(); // save to file because we can

	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */