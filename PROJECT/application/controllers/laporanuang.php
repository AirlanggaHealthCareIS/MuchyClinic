<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaporanObat extends CI_Controller {
	public function LaporanObat(){
		parent::__construct();
		$this->load->model("m_ambildatalaporanobat");
	}

	public function index() {
		$data = array("tanggal"=>"", "id_obat"=>"", "nama_obat"=>"", "nama_apoteker"=>"", "quqntity"=>"", "dlaporanobat"=>null); //tampil data di tabel
		$this->load->view("v_header");
		$this->load->view("LaporanObat/v_contentLaporanObat", $data);
		$this->load->view("v_footer");	
	}

	public function validasiObatKeluar(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		if ($tanggal_awal=="" || $tanggal_awal == null || $tanggal_akhir =="" || $tanggal_akhir == null){
			redirect(base_url().'laporanobat?error=null');
		}
		
		else {
			$this->session->set_flashdata('statusObatKeluar', true);
			$this->tampilObatKeluar($tanggal_awal, $tanggal_akhir);
		}
	}

	public function validasiObatMasuk(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		if ($tanggal_awal=="" || $tanggal_awal == null || $tanggal_akhir =="" || $tanggal_akhir == null){
			redirect(base_url().'laporanobat?error=null');
		}
		
		else {
			$this->session->set_flashdata('statusObatKeluar', true);
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
				<h1>Laporan Obat Muchy Clinic</h1>
				
				<table>
				<tr>
				<td width = "30%">Period From : '.$tanggal_awal.'</td>
				<td width = "100%">Period To   : '.$tanggal_akhir.'</td>
				</tr>
				</table>
					<br></br>

				
				<table>
		          <tr style="background-color: rgb(226, 246, 245);">
		            <td width = "20%"><center>Tanggal</center></td>
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