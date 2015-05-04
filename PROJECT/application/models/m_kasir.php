<?php
class M_kasir extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        //cek id pasien dalam database
        public function checkid($idpasien){
			$query = $this->db->query("SELECT * FROM RAWAT_INAP WHERE id_pasien='".$idpasien."'");
			$query2 = $this->db->query("SELECT * FROM PEMERIKSAAN WHERE id_pasien='".$idpasien."'");
			if ($query->num_rows()>0) {
				return true;
			} else if ($query2->num_rows()>0) {
						return true;
					} else {
						return false;
					}

		}

		// public function checkid($idpasien){
		// 	$query = $this->db->query("SELECT * FROM RAWAT_INAP WHERE id_pasien='".$idpasien."'");
		// 	if ($query->num_rows()>0) {
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }

		//menampikan biodata dari id pasien yang di seacrh
        public function getPasien ($id){
		// .$id untuk varchar
		// '".$id."' untuk int
		$query =  $this->db->query("SELECT ID_PASIEN, NAMA_PASIEN, JENIS_KELAMIN_PASIEN  FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");
		return $query->result();
		}

		
		public function getKamar($id) {
			$query = $this->db->query("SELECT k.NAMA_KAMAR_INAP, r.TGL_MASK, r.TGL_KELUAR, r.TOTAL_BIAYA_RWT FROM rawat_inap AS r, kamar AS k WHERE r.ID_KAMAR_INAP=k.ID_KAMAR_INAP AND r.ID_PASIEN= '".$id."'");
			return $query->result();
		}
		public function getPemeriksaan($id) {
			$query = $this->db->query("SELECT t.NAMA_TINDAKAN, p.TANGGAL_PERIKSA, t.TARIF_TINDAKAN FROM tindakan AS t, pemeriksaan AS p, detail_periksa AS dp WHERE p.ID_PERIKSA = dp.ID_PERIKSA AND dp.ID_TINDAKAN = t.ID_TINDAKAN AND p.ID_PASIEN = '".$id."'");
			return $query->result();
		}
}