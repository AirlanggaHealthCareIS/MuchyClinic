<?php
class M_ambildata extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

		public function getrekammedis ($id){
		$query = $this->db->query("SELECT P.`ID_PERIKSA`, P.`TANGGAL_PERIKSA`, D.`NAMA_DOKTER`, PN.`NAMA_PENYAKIT`
								   FROM `PEMERIKSAAN` AS P,`PASIEN`AS PS, `DOKTER` AS D, `PENYAKIT` AS PN
								   WHERE PS.`ID_PASIEN` = P.`ID_PASIEN` AND P.`ID_DOKTER` = D.`ID_DOKTER` AND P.`ID_PENYAKIT`= PN.`ID_PENYAKIT` AND PS.`ID_PASIEN` LIKE '".$id."'");
		return $query;
		}

}