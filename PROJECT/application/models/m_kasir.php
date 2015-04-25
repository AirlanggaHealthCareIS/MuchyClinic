<?php
class M_kasir extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        //cek id pasien dalam database
        public function checkid($idpasien){
			$this->db->select('id_pasien');
			$this->db->from('pasien');
			$this->db->where('id_pasien', $idpasien);
		
			$this->db->limit(1);

			$query = $this->db->get();
			if ($query->num_rows()==1) {
				$result = $query->result();
				return $result;
			} else {
				return false;
			}
		}


		//menampikan biodata dari id pasien yang di seacrh
        public function getcariid ($id){
		// .$id untuk varchar
		// '".$id."' untuk int
		$query =  $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");
		return $query;
		}
		
		// public function getpemeriksaan() {
		// 	$query = $this->db->query("SELECT * FROM PEMERIKSAAN");
		// 	return $query->result();
		// }

		public function getrawatinap() {
			$query = $this->db->query("SELECT * FROM RAWAT_INAP");
			return $query->result();
		}

		// public function getinap (){
		// $query = $this->db->query("SELECT  K.`NAMA_KAMAR_INAP`, P.`NAMA_PASIEN`, D.`NAMA_DOKTER`, R.`TGL_MASK`, R.`TGL_KELUAR`, R.`TOTAL_BIAYA_RWT` FROM `RAWAT_INAP` AS R, `PASIEN` AS P, `KAMAR` AS K, `DOKTER` AS D WHERE P.`ID_PASIEN` = R.`ID_PASIEN` AND K.`ID_KAMAR_INAP` = R.`ID_KAMAR_INAP` AND D.`ID_DOKTER` = R.`ID_DOKTER`");
		// return $query->result();
		// }

}