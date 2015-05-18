<?php
class M_kasir extends CI_Model {

    public function __construct()
    {
            parent::__construct();
    }

    public function getcariid ($id){
	// .$id untuk varchar
	// '".$id."' untuk int
	$query =  $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");
	return $query;
	}

    //cek id pasien dalam tabel rawat inap
    public function checkidKamar($idpasien){
		$query1 = $this->db->query("SELECT * FROM RAWAT_INAP WHERE id_pasien='".$idpasien."'");
		if ($query1->num_rows()>0) {
			return true;
		} else {
			return false;
		}
	}

	//cek id pasien dalam tabel rawat pemeriksaan
	public function checkidPemeriksaan($idpasien){
		$query2 = $this->db->query("SELECT * FROM PEMERIKSAAN WHERE id_pasien='".$idpasien."'");
		if ($query2->num_rows()>0) {
			return true;
		} else {
			return false;
		} 
	}

	//cek id pasien dalam tabel obat keluar
	public function checkidObat($idpasien){
		$query3 = $this->db->query("SELECT * FROM OBAT_KELUAR WHERE id_pasien='".$idpasien."'");
		if ($query3->num_rows()>0) {
			return true;
		} else {
			return false;
		} 
	}

	//menampilkan detail transaksi kamar
	public function getKamar($id) {
		$query = $this->db->query("SELECT ri.TGL_MASK, k.NAMA_KAMAR_INAP, dri.KETERANGAN, k.TARIF_KMR FROM rawat_inap AS ri, kamar AS k, detail_rawat_inap AS dri WHERE dri.ID_RAWAT_INAP=ri.ID_RAWAT_INAP AND ri.ID_KAMAR_INAP=k.ID_KAMAR_INAP AND ri.ID_PASIEN = '".$id."'");
		return $query->result();
	}

	//menampilkan detail transaksi pemeriksaan
	public function getPemeriksaan($id) {
		$query = $this->db->query("SELECT p.TANGGAL_PERIKSA, t.NAMA_TINDAKAN, dp.KETERANGAN, t.TARIF_TINDAKAN FROM tindakan AS t, pemeriksaan AS p, detail_periksa AS dp WHERE p.ID_PERIKSA = dp.ID_PERIKSA AND dp.ID_TINDAKAN = t.ID_TINDAKAN AND p.ID_PASIEN = '".$id."'");
		return $query->result();
	}

	//menampilkan detail transaksi obat
	public function getObat($id) {
		$query = $this->db->query("SELECT ok.TGL_OBAT_KELUAR, o.NAMA_OBAT, dok.KETERANGAN, dok.QTY, o.HARGA FROM obat_keluar AS ok, obat AS o, detail_obat_keluar AS dok WHERE o.ID_OBAT = dok.ID_OBAT AND dok.ID_OBAT_KELUAR= ok.id_OBAT_KELUAR AND ok.ID_PASIEN = '".$id."'");
		return $query->result();
	}

	//untuk testing id pasien
	public function getKasir($id) {
		$query =  $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");
		if ($query->num_rows()>0) {
			$query = $query->row();
			return $query->ID_PASIEN;
			// return $query->row();
		} else {
			return 0;
		}
	}
}