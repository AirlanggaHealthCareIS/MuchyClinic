<?php
class M_ambildata extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

		public function getrekammedis ($id){
		$query = $this->db->query("SELECT P.`ID_PERIKSA`, P.`TANGGAL_PERIKSA`, D.`NAMA_DOKTER`, PN.`NAMA_PENYAKIT`, O.`NAMA_OBAT`, T.`NAMA_TINDAKAN`
								   FROM `PEMERIKSAAN` AS P,`PASIEN`AS PS, `DOKTER` AS D, `PENYAKIT` AS PN, `OBAT` AS O, `DETAIL_RESEP` AS DR, `RESEP` AS R, `TINDAKAN` AS T, `DETAIL_PERIKSA` AS DP
								   WHERE PS.`ID_PASIEN` = P.`ID_PASIEN` AND P.`ID_DOKTER` = D.`ID_DOKTER` AND P.`ID_PENYAKIT`= PN.`ID_PENYAKIT` AND P.`ID_PERIKSA` = R.`ID_PERIKSA` AND R.`ID_RESEP` = DR.`ID_RESEP` AND DR.`ID_OBAT` = O.`ID_OBAT` AND DP.`ID_TINDAKAN` = T.`ID_TINDAKAN` AND PS.`ID_PASIEN` LIKE '".$id."'");
		return $query;
		}

}