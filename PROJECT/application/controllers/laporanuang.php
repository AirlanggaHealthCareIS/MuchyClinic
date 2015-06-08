<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanuang extends CI_Controller {

	public function Laporanuang(){
		parent::__construct();
		$this->load->model("m_ambildatalaporanuang");
		$this->header[0] = "active"; //untuk indikasi active header
		$this->id_user = "";

		if (($this->session->userdata('username_owner'))=="" || ($this->session->userdata('username_owner'))==null) {
		redirect(base_url()."login_owner");
		}
		$this->user = $this->session->userdata('username_owner');

	}

	public function logout(){
		$this->session->unset_userdata('username_owner');
		redirect(base_url()."login_owner");

	}


	public function index() {
		$data = array("tanggal"=>"", "id_transaksi"=>"", "id_kasir"=>"", "jam_transaksi"=>"", "total_transaksi"=>"", "dlaporanuang"=>null); //tampil data di tabel
		$this->load->view("v_header_owner");
		$this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
		$this->load->view("v_footer");	
	}

	public function testing (){
		$this->load->library ('unit_test');
		$this->unit->run($this->inputValidasi("", ""),true, "Test Method Validasi Periode Null");
		$this->unit->run($this->inputValidasi(2012-01-12, 2012-09-13),true, "Test Method Validasi Periode Awal dan Akhir True");
		// $this->unit->run($this->inputValidasitransaksi("","",""),true,  "Test Method Validasi Periode n Transaksi Terakhir Null");
		// $this->unit->run($this->inputValidasitransaksi("hari","10","Urut Dari Yang Terkecil"),true,  "Test Method Validasi Periode n Hari Transaksi Terakhir True");
		// $this->unit->run($this->inputValidasitransaksi("bulan","12","Urut Dari Yang Terbesar"),true, "Test Method Validasi Periode n Bulan Transaksi Terakhir True");
		// $this->unit->run($this->inputValidasitransaksi("tahun","1","Urut Dari Yang Terkecil"),true,  "Test Method Validasi Periode n Tahun Transaksi Terakhir True");
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

	// public function inputValidasitransaksi($period, $jumlah, $urut_berdasarkan){
	// 	if ($period=="0" || $jumlah==null || $jumlah=="" || $urut_berdasarkan=="0") {
	// 		return "error=null";
	// 	}
	// 	else if ($period == "hari"){
	// 		return "true1";
	// 	}
	// 	else if ($period == "bulan"){
	// 		return "true2";
	// 	}
	// 	else if ($period == "tahun"){
	// 		return "true3";
	// 	}
	// }


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
			$this->session->set_flashdata('statusJangkaWaktu', true);
			$this->tampil($tanggal_awal, $tanggal_akhir);	
		}
	}

	public function validasiTransaksi(){
		$this->load->database();
		$period = $this->input->post('jumlah_transaksi');
		$jumlah = $this->input->post('jumlah');
		$urut_berdasarkan = $this->input->post('urut_berdasarkan');
		// $id2 = $this->inputValidasitransaksi($period, $jumlah, $urut_berdasarkan);
		// $id3 = $this->inputValidasitransaksi($jumlah, $urut_berdasarkan);
		
		if ($period=="0" || $jumlah==null || $jumlah=="" || $urut_berdasarkan=="0") {
			redirect(base_url().'laporanuang?error=null');
		}
		else if ($period == "hari"){
			// $this->session->set_flashdata('statusPeriode', true);
			$this->tampilTransaksiHari($jumlah, $urut_berdasarkan);
		}
		else if ($period == "bulan"){
			// $this->session->set_flashdata('statusPeriode', true);
			$this->tampilTransaksiBulan($jumlah, $urut_berdasarkan);
		}
		else if ($period == "tahun"){
			// $this->session->set_flashdata('statusPeriode', true);
			$this->tampilTransaksiTahun($jumlah, $urut_berdasarkan);
		}
		
		
	}

	public function tampil($tanggal_awal, $tanggal_akhir) {
	    // session_start();
		$this->load->database();
		$query = $this->m_ambildatalaporanuang->getlaporanuang($tanggal_awal, $tanggal_akhir); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$laporan = $this->m_ambildatalaporanuang->getlaporanuang($tanggal_awal, $tanggal_akhir);
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI,
					"id_transaksi"=>$ro->ID_TRANSAKSI,
					"id_kasir"=>$ro->NAMA_K,
					"jam_transaksi"=>$ro->JAM_TRANSAKSI,
					"total_transaksi"=>$ro->TOTAL,
					"dlaporanuang"=>$laporan
					); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header_owner");
				$htmlcetak = $this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
				$this->load->view("v_footer");
				
				// untuk cetak
				$html = '
				<body>
	     		<img src="'.base_url().'assets/images/muchy.jpg" class="" alt="Responsive image">
				<h1>Laporan Pendapatan Muchy Clinic</h1>
				
				<table>
				<tr>
				<td width = "30%">Period From : '.$tanggal_awal.'</td>
				<td width = "100%">Period To   : '.$tanggal_akhir.'</td>
				</tr>
				</table>
					<br></br>

				
				<table>
		          <tr style="background-color: rgb(226, 246, 245);">
		            <td width = "20%"><center>Tanggal Transaksi</center></td>
		            <td width = "20%"><center>Id Transaksi</center></td>
		            <td width = "20%"><center>Nama Kasir</center></td>
		            <td width = "20%"><center>Waktu Transaksi</center></td>
		            <td width = "20%"><p class="text-right">Total Pembayaran</p></td>
		          </tr>';
               foreach($laporan->result() as $row) {
                   $html = $html.'
                   <tr >
                    <td width = "20%"><center>'.$row->TGL_TRANSAKSI.'</center></td>
                    <td width = "20%"><center>'.$row->ID_TRANSAKSI. '</center></td>
                    <td width = "20%"><center>'.$row->NAMA_K.       '</center></td>
                    <td width = "20%"><center>'.$row->JAM_TRANSAKSI.'</center></td>
                    <td width = "20%"><p class="text-right">' .$row->TOTAL.'</p></td>
                  </tr>';

               }
	           $html = $html.'</table>
	           </body>';

			$_SESSION['cetak']=$html;

		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanuang?error=notfound');
		}
	}

		public function tampilTransaksiBulan($jumlah, $urut_berdasarkan) {
		// session_start();
		$this->load->database();
		$query = $this->m_ambildatalaporanuang->getlaporanuang2($jumlah, $urut_berdasarkan); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
			    $laporan = $this->m_ambildatalaporanuang->getlaporanuang2($jumlah, $urut_berdasarkan);
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI,
					"id_transaksi"=>$ro->ID_TRANSAKSI,
					"id_kasir"=>$ro->NAMA_K,
					"jam_transaksi"=>$ro->JAM_TRANSAKSI,
					"total_transaksi"=>$ro->TOTAL,
					"dlaporanuang"=> $laporan
					); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header_owner");
				$htmlcetak = $this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
				$this->load->view("v_footer");

				// untuk cetak
				$html = '
				<body>
	     		<img src="'.base_url().'assets/images/muchy.jpg" class="" alt="Responsive image">
				<h1>Laporan Pendapatan Muchy Clinic</h1>
				
				<table>
				<tr>
				<td width = "100%">Period From : '.$jumlah.' Bulan Terakhir</td>
				</tr>
				</table>
					<br></br>

				
				<table>
		          <tr style="background-color: rgb(226, 246, 245);">
		            <td width = "20%"><center>Tanggal Transaksi</center></td>
		            <td width = "20%"><center>Id Transaksi</center></td>
		            <td width = "20%"><center>Nama Kasir</center></td>
		            <td width = "20%"><center>Waktu Transaksi</center></td>
		            <td width = "20%"><p class="text-right">Total Pembayaran</p></td>
		          </tr>';
               foreach($laporan->result() as $row) {
                   $html = $html.'
                   <tr >
                    <td width = "20%"><center>'.$row->TGL_TRANSAKSI.'</center></td>
                    <td width = "20%"><center>'.$row->ID_TRANSAKSI. '</center></td>
                    <td width = "20%"><center>'.$row->NAMA_K.       '</center></td>
                    <td width = "20%"><center>'.$row->JAM_TRANSAKSI.'</center></td>
                    <td width = "20%"><p class="text-right">' .$row->TOTAL.'</p></td>
                  </tr>';

               }
	           $html = $html.'</table>
	           </body>';

			$_SESSION['cetak']=$html;

		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanuang?error=notfound');
		}
	}

		public function tampilTransaksiHari($jumlah, $urut_berdasarkan) {
		// session_start();
		$this->load->database();
		$query = $this->m_ambildatalaporanuang->getlaporanuang3($jumlah, $urut_berdasarkan); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$laporan = $this->m_ambildatalaporanuang->getlaporanuang3($jumlah, $urut_berdasarkan);
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI,
					"id_transaksi"=>$ro->ID_TRANSAKSI,
					"id_kasir"=>$ro->NAMA_K,
					"jam_transaksi"=>$ro->JAM_TRANSAKSI,
					"total_transaksi"=>$ro->TOTAL,
					"dlaporanuang"=>$laporan
					); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header_owner");
				$htmlcetak = $this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
				$this->load->view("v_footer");

				// untuk cetak
				$html = '
				<body>
	     		<img src="'.base_url().'assets/images/muchy.jpg" class="" alt="Responsive image">
				<h1>Laporan Pendapatan Muchy Clinic</h1>
				
				<table>
				<tr>
				<td width = "100%">Period From : '.$jumlah.' Hari Terakhir</td>
				</tr>
				</table>
					<br></br>

				
				<table>
		          <tr style="background-color: rgb(226, 246, 245);">
		            <td width = "20%"><center>Tanggal Transaksi</center></td>
		            <td width = "20%"><center>Id Transaksi</center></td>
		            <td width = "20%"><center>Nama Kasir</center></td>
		            <td width = "20%"><center>Waktu Transaksi</center></td>
		            <td width = "20%"><p class="text-right">Total Pembayaran</p></td>
		          </tr>';
               foreach($laporan->result() as $row) {
                   $html = $html.'
                   <tr >
                    <td width = "20%"><center>'.$row->TGL_TRANSAKSI.'</center></td>
                    <td width = "20%"><center>'.$row->ID_TRANSAKSI. '</center></td>
                    <td width = "20%"><center>'.$row->NAMA_K.       '</center></td>
                    <td width = "20%"><center>'.$row->JAM_TRANSAKSI.'</center></td>
                    <td width = "20%"><p class="text-right">' .$row->TOTAL.'</p></td>
                  </tr>';

               }
	           $html = $html.'</table>
	           </body>';

			$_SESSION['cetak']=$html;
		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanuang?error=notfound');
		}
	}

		public function tampilTransaksiTahun($jumlah, $urut_berdasarkan) {
		// session_start();
		$this->load->database();
		$query = $this->m_ambildatalaporanuang->getlaporanuang4($jumlah, $urut_berdasarkan); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$laporan = $this->m_ambildatalaporanuang->getlaporanuang4($jumlah, $urut_berdasarkan);
				$data = array(
					"tanggal"=>$ro->TGL_TRANSAKSI,
					"id_transaksi"=>$ro->ID_TRANSAKSI,
					"id_kasir"=>$ro->NAMA_K,
					"jam_transaksi"=>$ro->JAM_TRANSAKSI,
					"total_transaksi"=>$ro->TOTAL,
					"dlaporanuang"=>$laporan
					); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header_owner");
				$htmlcetak = $this->load->view("LaporanUangMasuk/v_contentLaporan", $data);
				$this->load->view("v_footer");

				// untuk cetak
				$html = '
				<body>
	     		<img src="'.base_url().'assets/images/muchy.jpg" class="" alt="Responsive image">
				<h1>Laporan Pendapatan Muchy Clinic</h1>
				
				<table>
				<tr>
				<td width = "100%">Period From : '.$jumlah.' Tahun Terakhir</td>
				</tr>
				</table>
					<br></br>

				
				<table>
		          <tr style="background-color: rgb(226, 246, 245);">
		            <td width = "20%"><center>Tanggal Transaksi</center></td>
		            <td width = "20%"><center>Id Transaksi</center></td>
		            <td width = "20%"><center>Nama Kasir</center></td>
		            <td width = "20%"><center>Waktu Transaksi</center></td>
		            <td width = "20%"><p class="text-right">Total Pembayaran</p></td>
		          </tr>';
               foreach($laporan->result() as $row) {
                   $html = $html.'
                   <tr >
                    <td width = "20%"><center>'.$row->TGL_TRANSAKSI.'</center></td>
                    <td width = "20%"><center>'.$row->ID_TRANSAKSI. '</center></td>
                    <td width = "20%"><center>'.$row->NAMA_K.       '</center></td>
                    <td width = "20%"><center>'.$row->JAM_TRANSAKSI.'</center></td>
                    <td width = "20%"><p class="text-right">' .$row->TOTAL.'</p></td>
                  </tr>';

               }
	           $html = $html.'</table>
	           </body>';

			$_SESSION['cetak']=$html;
		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanuang?error=notfound');
		}
	}


	public function cetak(){
		session_start();
		$html = $_SESSION['cetak'];
		

		$this->load->library('pdf');
	    $pdf = $this->pdf->load();
	    $pdf->SetFooter('Muchy Clinic'.'|{PAGENO}|'.date(DATE_RFC822));
	    $pdf->WriteHTML($html); // write the HTML into the PDF
	    $pdf->Output(); // save to file because we can


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */