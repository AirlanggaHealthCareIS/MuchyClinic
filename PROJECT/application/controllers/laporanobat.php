<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaporanObat extends CI_Controller {
	public function LaporanObat(){
		parent::__construct();
		$this->load->model("m_ambildatalaporanobat");
		$this->header[4] = "active"; //untuk indikasi active header
		$this->id_user = "";
		
		if (($this->session->userdata('username_apoteker'))=="" || ($this->session->userdata('username_apoteker'))==null) {
		redirect(base_url()."login_apoteker");
		}
		$this->user = $this->session->userdata('username_apoteker');

	
	}
	public function index() {
		$data = array("tanggal"=>"", "id_obat"=>"", "nama_obat"=>"", "nama_apoteker"=>"", "quqntity"=>"", "dlaporanobat"=>null); //tampil data di tabel
		$this->load->view("v_header_apoteker");
		$this->load->view("LaporanObat/v_contentLaporanObat", $data);
		$this->load->view("v_footer");	
	}

	public function validasiObatKeluar(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$this->header[4] = "active"; //untuk indikasi active header

		if ($tanggal_awal=="" || $tanggal_awal == null || $tanggal_akhir =="" || $tanggal_akhir == null){
			redirect(base_url().'laporanobat?error=null');
		}
		else if ($tanggal_awal>$tanggal_akhir) { //untuk symbol
			redirect(base_url().'laporanobat?error=periodefalse');
		}	
		else {
			$this->session->set_flashdata('statusObatKeluar', true);
			$this->tampilObatKeluar($tanggal_awal, $tanggal_akhir);
		}
	}

	public function validasiObatMasuk(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		$this->header[4] = "active"; //untuk indikasi active header

		if ($tanggal_awal=="" || $tanggal_awal == null || $tanggal_akhir =="" || $tanggal_akhir == null){
			redirect(base_url().'laporanobat?error=null');
		}
		else if ($tanggal_awal>$tanggal_akhir) { //untuk symbol
			redirect(base_url().'laporanobat?error=periodefalse');
		}	
		else {
			$this->session->set_flashdata('statusObatMasuk', true);
			$this->tampilObatMasuk($tanggal_awal, $tanggal_akhir);
		}
	}

	
	public function tampilObatKeluar($tanggal_awal, $tanggal_akhir) {
		
		// session_start();
		$this->load->database();
		$query = $this->m_ambildatalaporanobat->getlaporanobatkeluar($tanggal_awal, $tanggal_akhir); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$laporan = $this->m_ambildatalaporanobat->getlaporanobatkeluar($tanggal_awal, $tanggal_akhir);
				$data = array(
					"tanggal"=>$ro->TGL_OBAT_KELUAR,
					"id_obat"=>$ro->ID_OBAT_KELUAR,
					"nama_obat"=>$ro->NAMA_OBAT,
					"nama_apoteker"=>$ro->NAMA_APOTEKER,
					"quantity"=>$ro->QTY,
					"dlaporanobat"=>$laporan
					); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header");
				$htmlcetak = $this->load->view("LaporanObat/v_contentLaporanObat", $data);
				$this->load->view("v_footer");
				
				// untuk cetak
				$html = '
				<body>
	     		<img src="'.base_url().'assets/images/muchy.jpg" class="" alt="Responsive image">
				<h1>Laporan Obat Keluar Muchy Clinic</h1>
				
				<table>
				<tr>
				<td width = "30%">Period From : '.$tanggal_awal.'</td>
				<td width = "100%">Period To   : '.$tanggal_akhir.'</td>
				</tr>
				</table>
					<br></br>

				
				<table>
		          <tr style="background-color: rgb(226, 246, 245);">
		            <td width = "20%"><center>Tanggal Obat Keluar</center></td>
		            <td width = "20%"><center>Id Obat</center></td>
		            <td width = "20%"><center>Nama Obat</center></td>
		            <td width = "20%"><center>Nama Apoteker</center></td>
		            <td width = "20%"><center>Quantity</center></td>
		          </tr>';
               foreach($laporan->result() as $row) {
                   $html = $html.'
                   <tr >
                    <td width = "20%"><center>'.$row->TGL_OBAT_KELUAR.'</center></td>
                    <td width = "20%"><center>'.$row->ID_OBAT_KELUAR. '</center></td>
                    <td width = "20%"><center>'.$row->NAMA_OBAT.       '</center></td>
                    <td width = "20%"><center>'.$row->NAMA_APOTEKER.'</center></td>
                    <td width = "20%"><p class="text-right">' .$row->QTY.'</p></td>
                  </tr>';

               }
	           $html = $html.'</table>
	           </body>';

			$_SESSION['cetak']=$html;

		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanobat?error=notfound');
		}
	}

		public function tampilObatMasuk($tanggal_awal, $tanggal_akhir) {
		// session_start();
		$this->load->database();
		$query = $this->m_ambildatalaporanobat->getlaporanobatmasuk($tanggal_awal, $tanggal_akhir); //ambil data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$ro = $query->row();
				$laporan = $this->m_ambildatalaporanobat->getlaporanobatmasuk($tanggal_awal, $tanggal_akhir);
				$data = array(
					"tanggal"=>$ro->TGL_MASUK,
					"id_obat"=>$ro->ID_OBAT_MASUK,
					"nama_obat"=>$ro->NAMA_OBAT,
					"nama_apoteker"=>$ro->NAMA_APOTEKER,
					"quantity"=>$ro->JUMLAH_OBAT_MASUK,
					"dlaporanobat"=>$laporan
					); //tampil data di tabel dan ambil nilai
				
				$this->load->view("v_header_apoteker");
				$htmlcetak = $this->load->view("LaporanObat/v_contentLaporanObat", $data);
				$this->load->view("v_footer");
				
				// untuk cetak
				$html = '
				<body>
	     		<img src="'.base_url().'assets/images/muchy.jpg" class="" alt="Responsive image">
				<h1>Laporan Obat Masuk Muchy Clinic</h1>
				
				<table>
				<tr>
				<td width = "30%">Period From : '.$tanggal_awal.'</td>
				<td width = "100%">Period To   : '.$tanggal_akhir.'</td>
				</tr>
				</table>
					<br></br>

				
				<table>
		          <tr style="background-color: rgb(226, 246, 245);">
		            <td width = "20%"><center>Tanggal Obat Masuk</center></td>
		            <td width = "20%"><center>Id Obat</center></td>
		            <td width = "20%"><center>Nama Obat</center></td>
		            <td width = "20%"><center>Nama Apoteker</center></td>
		            <td width = "20%"><center>Quantity</center></td>
		          </tr>';
               foreach($laporan->result() as $row) {
                   $html = $html.'
                   <tr >
                    <td width = "20%"><center>'.$row->TGL_MASUK.'</center></td>
                    <td width = "20%"><center>'.$row->ID_OBAT_MASUK. '</center></td>
                    <td width = "20%"><center>'.$row->NAMA_OBAT.       '</center></td>
                    <td width = "20%"><center>'.$row->NAMA_APOTEKER.'</center></td>
                    <td width = "20%"><p class="text-right">' .$row->JUMLAH_OBAT_MASUK.'</p></td>
                  </tr>';

               }
	           $html = $html.'</table>
	           </body>';

			$_SESSION['cetak']=$html;

		}

		else{ // jika hasil tidak ada
			redirect(base_url().'laporanobat?error=notfound');
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

/* End of file welcome.php *
/* Location: ./application/controllers/welcome.php */