<?php
class M_ambildatalaporanobat extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

		public function getlaporanobatkeluar ($tanggal_awal, $tanggal_akhir){
		$query = $this->db->query("SELECT OK.`TGL_OBAT_KELUAR`, OK.`ID_OBAT_KELUAR`, O.`NAMA_OBAT`, A.`NAMA_APOTEKER`, DOK.`QTY`
								   FROM `DETAIL_OBAT_KELUAR` AS DOK, `OBAT_KELUAR` AS OK, `APOTEKER` AS A, `OBAT` AS O
								   WHERE OK.`ID_OBAT_KELUAR` = DOK.`ID_OBAT_KELUAR` AND OK.`ID_APOTEKER` = A.`ID_APOTEKER` AND DOK.`ID_OBAT` = O.`ID_OBAT` AND OK.`TGL_OBAT_KELUAR` BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'
								   ");
		return $query;
		}

		public function getlaporanobatmasuk ($tanggal_awal, $tanggal_akhir){
		$query = $this->db->query("SELECT OM.`TGL_MASUK`, OM.`ID_OBAT_MASUK`, O.`NAMA_OBAT`, A.`NAMA_APOTEKER`, DOM.`JUMLAH_OBAT_MASUK`
								   FROM `DETAIL_OBAT_MASUK` AS DOM, `OBAT_MASUK` AS OM, `APOTEKER` AS A, `OBAT` AS O
								   WHERE OM.`ID_OBAT_MASUK` = DOM.`ID_OBAT_MASUK` AND OM.`ID_APOTEKER` = A.`ID_APOTEKER` AND DOM.`ID_OBAT` = O.`ID_OBAT` AND OM.`TGL_MASUK` BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'
								   ");
		return $query;
		}




}