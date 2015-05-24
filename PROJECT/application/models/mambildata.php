<?php
class Mambildata extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function getcariid2 ($id)
        {
		// .$id untuk varchar
		// '".$id."' untuk int
		$query =  $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");
		if ($query->num_rows()>0) {
                        // $query = $query->row();
                        // return $query->ID_RESEP;
                        return $query->row();
                } else {
                        return 0;
                }
		}
		public function getcariid ($id){
		// .$id untuk varchar
		// '".$id."' untuk int
		$query =  $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");
		return $query;
		}
		public function getinap (){
		$query = $this->db->query("SELECT  K.`NAMA_KAMAR_INAP`, P.`NAMA_PASIEN`, D.`NAMA_DOKTER`, R.`TGL_MASK`, R.`TGL_KELUAR`, R.`TOTAL_BIAYA_RWT` FROM `RAWAT_INAP` AS R, `PASIEN` AS P, `KAMAR` AS K, `DOKTER` AS D WHERE P.`ID_PASIEN` = R.`ID_PASIEN` AND K.`ID_KAMAR_INAP` = R.`ID_KAMAR_INAP` AND D.`ID_DOKTER` = R.`ID_DOKTER`");
		return $query->result();
		}
		public function getkamar(){
			$query = $this->db->query("SELECT * FROM KAMAR");
			return $query->result();
		}
		public function getdokter(){
			$query = $this->db->query("SELECT * FROM DOKTER");
			return $query->result();
		}
		public function insertinap($id_pas, $kamar_r, $dokter_r, $tgl_masuk_r){
			$query = $this->db->query("INSERT INTO RAWAT_INAP(`ID_KAMAR_INAP`, `ID_PASIEN`, `ID_DOKTER`, `TGL_MASK`, `TGL_KELUAR`, `TOTAL_BIAYA_RWT`) VALUES ('".$kamar_r."', '".$id_pas."', '".$dokter_r."', '".$tgl_masuk_r."', NULL, 'NULL')");
			return $query;
		}
		public function jumlahKamar($idkamar){
			$query = $this->db->query("SELECT count(*) AS jumlah FROM `rawat_inap` where ID_kamar_inap = '".$idkamar."' AND TGL_KELUAR is NULL");
			$query = $query->row();

			return $query->jumlah;
		}
		public function kapasitasKamar($idkamar){
			$query = $this->db->query("SELECT kapasitas_kmr FROM  `kamar` WHERE id_kamar_inap = '".$idkamar."' ");
			$query = $query->row();

			return $query->kapasitas_kmr;
		}
}