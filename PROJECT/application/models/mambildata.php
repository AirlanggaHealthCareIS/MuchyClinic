<?php
class Mambildata extends CI_Model {

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
		public function insertinap($id_pas, $kamar_r, $dokter_r, $tgl_masuk_r, $tgl_keluar_r, $newharga){
			$query = $this->db->query("INSERT INTO RAWAT_INAP(`ID_KAMAR_INAP`, `ID_PASIEN`, `ID_DOKTER`, `TGL_MASK`, `TGL_KELUAR`, `TOTAL_BIAYA_RWT`) VALUES ('".$kamar_r."', '".$id_pas."', '".$dokter_r."', '".$tgl_masuk_r."', '".$tgl_keluar_r."', '".$newharga."')");
			return $query;
		}
		public function getinap2 ($kamar_r){
			if ($kamar_r == 'KMR01') {
				$query = $this->db->query("SELECT  K.`NAMA_KAMAR_INAP`, P.`NAMA_PASIEN`, D.`NAMA_DOKTER`, R.`TGL_MASK`, R.`TGL_KELUAR`, R.`TOTAL_BIAYA_RWT` FROM `RAWAT_INAP` AS R, `PASIEN` AS P, `KAMAR` AS K, `DOKTER` AS D WHERE P.`ID_PASIEN` = R.`ID_PASIEN` AND K.`ID_KAMAR_INAP` = R.`ID_KAMAR_INAP` AND D.`ID_DOKTER` = R.`ID_DOKTER` AND R.`ID_KAMAR_INAP` = 'KMR01'");
				return $query->result();
			}
			else if($kamar_r == 'KMR02'){
				$query = $this->db->query("SELECT  K.`NAMA_KAMAR_INAP`, P.`NAMA_PASIEN`, D.`NAMA_DOKTER`, R.`TGL_MASK`, R.`TGL_KELUAR`, R.`TOTAL_BIAYA_RWT` FROM `RAWAT_INAP` AS R, `PASIEN` AS P, `KAMAR` AS K, `DOKTER` AS D WHERE P.`ID_PASIEN` = R.`ID_PASIEN` AND K.`ID_KAMAR_INAP` = R.`ID_KAMAR_INAP` AND D.`ID_DOKTER` = R.`ID_DOKTER` AND R.`ID_KAMAR_INAP` = 'KMR02'");
				return $query->result();
			}
		}
}