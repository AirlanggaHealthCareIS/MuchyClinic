<?php
class Mrawatinap extends CI_Model {

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

		public function getinap ($){
		$query = $this->db->query("SELECT R.ID_RAWAT_INAP, P.NAMA_PASIEN, K.NAMA_KAMAR_INAP,D.NAMA_DOKTER FROM RAWAT_INAP AS R, KAMAR AS K, PASIEN AS P, DOKTER AS D WHERE P.ID_PASIEN = R.ID_PASIEN AND R.ID_PASIEN = '".PAS01."'");
		return $query->result();
		}

}