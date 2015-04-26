<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obatkeluarresep extends CI_Controller {

	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('obatkeluar/v_resep');
		$this->load->view('v_footer');
	}

	public function validasi()
	{
		//get post data
		$id = $this->input->post('idpasien');
		$tgl = $this->input->post('tanggal');
		if ($id==null || $id=="") { //untuk id pasien kosong
			redirect(base_url()."obatkeluarresep?error=null");
		} 
		else if (preg_match('/[^a-z0-9]/i', $id)) { //untuk symbol
			redirect(base_url().'obatkeluarresep?error=symbol');
 		} 
 		else {
			$this->checkDatabase($id, $tgl); //jika inputan valid
		}
	}

	private function checkDatabase($id, $tgl){ //search ke db
		//simpan input untuk di set ke text field
		$this->session->set_flashdata('idpasien', $id);
		$this->session->set_flashdata('tanggal', $this->convertDate($tanggal));

		$this->load->model('m_resep');
		$query = $this->m_resep->getResep($id, $tgl); //get data
		if ($query->num_rows() > 0) { //cek jika hasil ada
			$query = $query->row();
			//simpan data untuk di tampilkan
			$this->storeValueResep($query->ID_RESEP, $query->TGL_RESEP, $query->NAMA_DOKTER, $query->NAMA_PASIEN);
			// detail resep
			$dresep = $this->m_resep->getDetailResep($query->ID_RESEP); //get data detail resep
			$dresep = $dresep->result();
			$this->session->set_flashdata('detailr', $dresep); //simpan variabel utk dikirim ke view
			redirect(base_url().'obatkeluarresep');
		} else { // jika hasil tidak ada
			redirect(base_url().'obatkeluarresep?act=notfound');
		}
	}

	private function storeValueResep($idr, $tglr, $dokterr, $pasienr){
		$this->session->set_flashdata('idr', $idr);
		$tglr = $this->convertDate($tglr);
		$this->session->set_flashdata('tanggalr', $tglr);
		$this->session->set_flashdata('dokterr', $dokterr);
		$this->session->set_flashdata('pasienr', $pasienr);
	}

	private function convertDate($tglr){
		$a = explode("-", $tglr);
		return $a[2]."/".$a[1]."/".$a[0];
	}
}
