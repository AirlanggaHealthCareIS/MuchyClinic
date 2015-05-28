<?php
class M_ambildatalaporanuang extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

		public function getlaporanuang ($tanggal_awal, $tanggal_akhir){
		$query = $this->db->query("SELECT T.`TOTAL`, DTR.`SUBTOTAL`, DTP.`SUBTOTAL`, DTO.`SUBTOTAL`, T.`TGL_TRANSAKSI`, T.`ID_TRANSAKSI`
					FROM `TRANSAKSI` AS T, `DETAIL_TRANSAKSI_RAWAT_INAP` AS DTR, `DETAIL_TRANSAKSI_OBAT` AS DTO, `DETAIL_TRANSAKSI_PERIKSA` AS DTP
                    WHERE T.`ID_TRANSAKSI`= DTR.`ID_TRANSAKSI` AND DTR.`ID_TRANSAKSI`= DTP.`ID_TRANSAKSI` AND DTP.`ID_TRANSAKSI`= DTO.`ID_TRANSAKSI` AND T.`TGL_TRANSAKSI` BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'");
		return $query;
		}

}