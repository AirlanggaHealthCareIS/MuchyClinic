<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function Kasir(){
		parent::__construct();
		$this->load->model("m_kasir");
	}

	public function index($idpasien = "") {
		
		if ($idpasien!="") {
			$this->checkDatabase($idpasien);
		}

	//	$data = array("tanggal"=>"", "transaksi"=>"", "keterangan"=>"", "qty"=>"", "harga"=>"", "subtotal"=>"", "dtransaksiobat"=>null); //tampil data di tabel

		$this->load->view("v_header");
		$this->load->view("kasir/v_contain");
		$this->load->view("v_footer");

		// $html="bagus";
		// $_SESSION['cetak2']=$html;
	}

	public function validation(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$id = $this->input->post("idpasien");
		if ($id==null || $id=="") {
			redirect(base_url().'kasir?error=null');
		} else {
			if (preg_match('/[^a-z0-9]/i', $id)) {
				redirect(base_url().'kasir?error=simbol');
			} else{ 
				// $this->checkDatabase($id);
				redirect(base_url().'kasir/index/'.$id);
			}
		}
	}

	//method untuk testing
	public function isInputValidation($id){
		if ($id==null || $id=="") {
			return "error=null";
		} else {
			if (preg_match('/[^a-z0-9]/i', $id)) {
				return "error=simbol";
			} else{
				return "true";
			}
		}
	}

	public function test_isvalid() {
		$this->load->library("unit_test");
		$this->unit->run($this->isInputValidation(""), "error=null", "Test method isvalid");
		$this->unit->run($this->isInputValidation("@$#%5t"), "error=simbol", "Test method isvalid");
		$this->unit->run($this->isInputValidation("P0001"), "true", "Test method isvalid");
		echo $this->unit->report();
	}

	public function test_getkasir() {
		$this->load->model('m_kasir');
		$this->load->library("unit_test");
		$this->load->database();

		$this->unit->run($this->m_kasir->getKasir("P0000"), 0, "Test method isvalid");
		$this->unit->run($this->m_kasir->getKasir("P0001"), "P0001", "Test method isvalid");
		echo $this->unit->report();
	}
	//akhir dari method testing Id Pasien

	private function checkDatabase($id) {

		$total = 0;

		$this->session->set_flashdata('idpasien', $id);


		$this->session->set_userdata('idpasien', $id);

		$this->load->model('m_kasir');

		$query = $this->m_kasir->getcariid($id);
		if ($query->num_rows() > 0) {
			$query = $query->row();
			$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->JENIS_KELAMIN_PASIEN);
		}

		$query1 = $this->m_kasir->checkidKamar($id);
		$query2 = $this->m_kasir->checkidPemeriksaan($id);
		$query3 = $this->m_kasir->checkidObat($id);
		if ($query1==true) {
			$dkamar = $this->m_kasir->getKamar($id); //get data detail kamar

			foreach ($dkamar as $k) {
				$total = $total + $k->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailkamar', $dkamar);

		}
		if ($query2==true) {
			$dpemeriksaan = $this->m_kasir->getPemeriksaan($id);
			
			foreach ($dpemeriksaan as $p) {
				$total = $total + $p->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailpemeriksaan', $dpemeriksaan);

		}
		if ($query3==true) {
			$dobat = $this->m_kasir->getObat($id);

			foreach ($dobat as $o) {
				$total = $total + $o->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailobat', $dobat);

		}	else {
			redirect(base_url().'kasir?error=invalidid');
			return FALSE;
		}


			//redirect(base_url().'kasir');
	}

	public function storevalue($idpas, $namapas, $jkpas){
		$this->session->set_flashdata('idpasien', $idpas);
		$this->session->set_flashdata('namapas', $namapas);
		$this->session->set_flashdata('jkpas', $jkpas);
		$this->session->set_userdata('idpasienpdf', $idpas);
		$this->session->set_userdata('namapaspdf', $namapas);
		$this->session->set_userdata('jkpaspdf', $jkpas);
	}

	public function validationCash($id="") {
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('m_kasir');

		$byr = $this->input->post("bayar");
		if ($byr==null || $byr=="") {
			redirect(base_url().'kasir/index/'.$id.'?error=nullcash');
		} else {
			if (preg_match('/[^0-9]/i', $byr)) {
				redirect(base_url().'kasir/index/'.$id.'?error=simbolcash');
			} else {
				// $this->checkHitung($byr, $id);
				$this->session->set_flashdata('idpasien', $id);
				$query = $this->m_kasir->checkidPasienTransaksi($id);
				if ($query==true) {
					redirect(base_url().'kasir/index/'.$id.'?success=pasienlunas');
					} else {
						$this->checkHitung($byr, $id);
					}
			}
		}
	}

	//method untuk testing Cash
	public function isInputValidationCash($byr) {
		if ($byr==null || $byr=="") {
			return "error=null";
		} else {
			if (preg_match('/[^0-9]/i', $byr)) {
				return "error=simbol";
			} else{
				return "true";
			}
		}
	}

	public function test_isvalidCash() {
		$this->load->library("unit_test");
		$this->unit->run($this->isInputValidationCash(""), "error=null", "Test method test_isvalidCash");
		$this->unit->run($this->isInputValidationCash("@$#%at"), "error=simbol", "Test method test_isvalidCash");
		$this->unit->run($this->isInputValidationCash("5000"), "true", "Test method test_isvalidCash");
		echo $this->unit->report();
	}

	public function isInputValidationCash2($byr, $total) {

		if ($byr==$total || $byr>$total) {
			return "true";
		} else {
			return "FALSE";
		}
	}

	public function test_isvalidCash2() {
		$this->load->library("unit_test");
		$this->unit->run($this->isInputValidationCash2(700000, 50000), "true", "Test method test_isvalidCash2");
		$this->unit->run($this->isInputValidationCash2(700000, 700000), "true", "Test method test_isvalidCash2");
		$this->unit->run($this->isInputValidationCash2(40000, 700000), "FALSE", "Test method test_isvalidCash2");
		echo $this->unit->report();
	}
	//akhir dari method testing Cash

	public function gethitung($id){

		$total = 0;
		$this->load->model('m_kasir');
		$query1 = $this->m_kasir->checkidKamar($id);
		$query2 = $this->m_kasir->checkidPemeriksaan($id);
		$query3 = $this->m_kasir->checkidObat($id);
		if ($query1==true) {
			$dkamar = $this->m_kasir->getKamar($id); //get data detail kamar

			foreach ($dkamar as $k) {
				$total = $total + $k->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailkamar', $dkamar);

		}
		if ($query2==true) {
			$dpemeriksaan = $this->m_kasir->getPemeriksaan($id);
			
			foreach ($dpemeriksaan as $p) {
				$total = $total + $p->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailpemeriksaan', $dpemeriksaan);

		}
		if ($query3==true) {
			$dobat = $this->m_kasir->getObat($id);

			foreach ($dobat as $o) {
				$total = $total + $o->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}
			// $this->session->set_flashdata('detailobat', $dobat);
			return $total;
		}
	}

	public function checkHitung ($byr, $id) {

		$kembali = 0;
		$byr=$this->input->post('bayar');
		$total = $this->gethitung($id);

		// if ($byr>$total && $total==null || $byr>$total && $total==0) {
		// 	redirect(base_url().'kasir/index/'.$id.'?error=nullidpasien');
		// }

		if ($byr==$total || $byr>$total) {
			$kembali = $byr - $total;
			$this->session->set_flashdata('kembali', $kembali);
			$this->session->set_flashdata('bayar', $byr);
			$this->session->set_userdata('bayarpdf', $byr);
			$this->session->set_userdata('kembalipdf', $kembali);
			// $this->session->set_flashdata('bayarpdf', $byr);
			// $this->session->set_flashdata('kembalipdf', $kembali);

			//redirect(base_url().'kasir/index/'.$id);

			$this->saveTransaksi($id);
		    redirect(base_url().'kasir/index/'.$id.'?success=sukses');
			
		} else {
			redirect(base_url().'kasir/index/'.$id.'?error=invalidcash');
		}
	}

	// public function kembali ($byr, $id) {

	// 	$kembali = 0;
	// 	$byr=$this->input->post('bayar');
	// 	$total = $this->gethitung($id);

	// 	// if ($byr>$total && $total==null || $byr>$total && $total==0) {
	// 	// 	redirect(base_url().'kasir/index/'.$id.'?error=nullidpasien');
	// 	// }

	// 	if ($byr==$total || $byr>$total) {
	// 		$kembali = $byr - $total;
	// 		//redirect(base_url().'kasir/index/'.$id);

	// 	return $kembali;	
	// 	} 
	// }

	// public function bayar ($byr, $id) {

	// 	$kembali = 0;
	// 	$byr=$this->input->post('bayar');
	// 	$total = $this->gethitung($id);

	// 	// if ($byr>$total && $total==null || $byr>$total && $total==0) {
	// 	// 	redirect(base_url().'kasir/index/'.$id.'?error=nullidpasien');
	// 	// }

	// 	if ($byr==$total || $byr>$total) {
	// 		$kembali = $byr - $total;
	// 		//redirect(base_url().'kasir/index/'.$id);

	// 	return $byr;	
	// 	} 
	// }

	public function saveTransaksi($id) {

		//untuk set tanggal transaksi
		date_default_timezone_set('asia/jakarta');
		$tgltransaksi = date('Y-m-d');
		$timetransaksi = date('H:i:s');
		$this->load->model("m_kasir");

		$total = $this->gethitung($id);

		$idpasien = "$id";

		//echo " id transaksi = ".$idtransaksi." idkasir ".$idkasir." tgltransaksi ".$tgltransaksi." timetransaksi ".$timetransaksi." total ".$total;
		//save data transaksi
			
		$query = $this->m_kasir->setTransaksi($idtransaksi, $idkasir, $tgltransaksi, $timetransaksi, $total, $idpasien);

		$query1 = $this->m_kasir->checkidKamar($id);
		if ($query1==true) {
			$this->m_kasir->saveTransaksiKamar($id);
		}

		$query2 = $this->m_kasir->checkidPemeriksaan($id);
		if ($query2==true) {
			$this->m_kasir->saveTransaksiPemeriksaan($id);
		}

		$query3 = $this->m_kasir->checkidObat($id);
		if ($query3==true) {
			$this->m_kasir->saveTransaksiObat($id);
		}

		echo $id;
	}

	public function tampil($id) {
		$this->load->database();
		$total = 0;

		$this->session->set_flashdata('idpasien', $id);
		$this->load->model('m_kasir');
		//$query = $this->m_kasir->getcariid($id);
		// if ($query->num_rows() > 0) {
		// 	$query = $query->row();
		// 	$this->storevalue($query->ID_PASIEN, $query->NAMA_PASIEN, $query->JENIS_KELAMIN_PASIEN);
		// }

		// $query4 = $this->m_kasir->cekidpasien($id);
		// if ($query4->num_rows() > 0) {
		// 	$pasien = $this->m_kasir->getid($id);

		// 	$this->session->set_flashdata('detail',$pasien);

		// 	# code...
		// }

		$query1 = $this->m_kasir->checkidKamar($id);
		if ($query1==true) {
			$dkamar = $this->m_kasir->getKamar($id); //get data detail kamar

			foreach ($dkamar as $k) {
				$total = $total + $k->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailkamar', $dkamar);

		}

		$query2 = $this->m_kasir->checkidPemeriksaan($id);
        if ($query2==true) {
			$dpemeriksaan = $this->m_kasir->getPemeriksaan($id);
			
			foreach ($dpemeriksaan as $p) {
				$total = $total + $p->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailpemeriksaan', $dpemeriksaan);

		}

		$query3 = $this->m_kasir->checkidObat($id);
		if ($query3==true) {
			$dobat = $this->m_kasir->getObat($id);

			foreach ($dobat as $o) {
				$total = $total + $o->SUBTOTAL;
				$this->session->set_flashdata('total', $total);
			}

			$this->session->set_flashdata('detailobat', $dobat);
			//return $total;
			$total = $this->gethitung($id);
			// $byr = $this->checkHitung($byr);
			// $kembali = $this->checkHitung($kembali);




			$html = '<html>
			<head>
				<title></title>
			</head>
			<body>

			<img src="'.base_url().'assets/images/muchy.jpg" class="" alt="Responsive image">
				<h4><center>Transaksi Pembayaran Muchy Clinic</center></h4>

				<table>
					<tr>
						<td width = "100%">Nama Pasien   : '.$this->session->userdata('namapaspdf').' </td>
					</tr>
					<tr>
						<td width = "100%">Jenis Kelamin : '.$this->session->userdata('jkpaspdf').' </td>
					</tr>
				</table>

				<br>
				
				<table class="">
					<tr style="background-color: rgb(226, 246, 245);">
			
						<td width = "10%"><center>Tanggal</center></td>
			            <td width = "45%"><center>Transaksi</center></td>
			            <td width = "15%"><center>Keterangan</center></td>
			            <td width = "5%"><center>QTY</center></td>
			            <td width = "10%"><center>Harga</center></td>
			            <td width = "15%"><center>SubTotal</center></td>

					<tr>
					';

		if (isset($dkamar)) {

			foreach ($dkamar as $k) {
				$html = $html.'

              <tr class="active">
                <td>'.$k->TGL_MASK.'</td>
                <td>Kamar Rawat Inap : '.$k->NAMA_KAMAR_INAP.'</td>
                <td>'.$k->KETERANGAN.'</td>
                <td>'.$k->QTY.'</td>
                <td>'.$k->TARIF_KMR.'</td>
                <td>'.$k->SUBTOTAL.'</td>
              </tr>';
            }
		}
		if (isset($dpemeriksaan)) {
            foreach ($dpemeriksaan as $p) {
				$html = $html.'

              <tr class="success">
                <td>'.$p->TANGGAL_PERIKSA.'</td>
                <td>Tindakan : '.$p->NAMA_TINDAKAN.'</td>
                <td>'.$p->KETERANGAN.'</td>
                <td>'.$p->QTY.' </td>
                <td>'.$p->TARIF_TINDAKAN.'</td>
                <td>'.$p->SUBTOTAL.'</td>
              </tr>';
            }
		}
			
		if (isset($dobat)) {
			# code...
            foreach ($dobat as $o) {
            	$html = $html.'
	              <tr class="danger">
	                <td>'.$o->TGL_OBAT_KELUAR.'</td>
	                <td>Obat : '.$o->NAMA_OBAT.'</td>
	                <td>'.$o->KETERANGAN.'</td>
	                <td>'.$o->QTY.'</td>
	                <td>'.$o->HARGA.'</td>
	                <td>'.$o->SUBTOTAL.'</td>
	              </tr>';

	              
            }
				
		}
			$html = $html.'
				</table>

				<br>

				<table>
					<tr>
						<td width = "100%">Total   : '.$total.' </td>
					</tr>
					<tr>
						<td width = "100%">Bayar   : '.$this->session->userdata('bayarpdf').' </td>
					</tr>
					<tr>
						<td width = "100%">Kembali : '.$this->session->userdata('kembalipdf').' </td>
					</tr>
				</table>

			</body>
			</html>';
		
		return $html;

		}

		else { // jika hasil tidak ada

			redirect(base_url().'kasir/cetaktransaksi?error=notfound');
		}
	}

	public function cetak($id = "") {

		//$id = $this->session->userdata('idpasien');
	
		$html = $this->tampil($id);
		//$html = $this->tampil($this->session->userdata('idpasien'));

		$this->load->library('pdf');
	    $pdf = $this->pdf->load();
	    $pdf->SetFooter('Muchy Clinic'.'|{PAGENO}|'.date(DATE_RFC822));
	    $pdf->WriteHTML($html); // write the HTML into the PDF
	    $pdf->Output(); // save to file because we can
	}
}