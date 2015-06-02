<?php
class M_ambildatalaporanuang extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

		public function getlaporanuang ($tanggal_awal, $tanggal_akhir){
		$query = $this->db->query("SELECT T.`ID_TRANSAKSI`, K.`NAMA_K`, T.`TGL_TRANSAKSI`, T.`JAM_TRANSAKSI`, T.`TOTAL`
								   FROM `TRANSAKSI` AS T, `KARYAWAN` AS K
								   WHERE K.`ID_KARYAWAN` = T.`ID_KASIR` AND T.`TGL_TRANSAKSI` BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'");
		return $query;
		}


		public function getlaporanuang2 ($jumlah, $urut_berdasarkan){
		$query = $this->db->query(" SELECT T.`ID_TRANSAKSI`, K.`NAMA_K`, T.`TGL_TRANSAKSI`, T.`JAM_TRANSAKSI`, T.`TOTAL`
						            FROM `TRANSAKSI` AS T, `KARYAWAN` AS K
					                WHERE K.`ID_KARYAWAN` = T.`ID_KASIR` AND  TIMESTAMPDIFF(MONTH, TGL_TRANSAKSI, CURDATE()) < '".$jumlah."'
					                ORDER BY T.`TGL_TRANSAKSI` ".$urut_berdasarkan);
		return $query;
		}

		public function getlaporanuang3 ($jumlah, $urut_berdasarkan){
		$query = $this->db->query(" SELECT T.`ID_TRANSAKSI`, K.`NAMA_K`, T.`TGL_TRANSAKSI`, T.`JAM_TRANSAKSI`, T.`TOTAL`
						            FROM `TRANSAKSI` AS T, `KARYAWAN` AS K
					                WHERE K.`ID_KARYAWAN` = T.`ID_KASIR` AND  TIMESTAMPDIFF(DAY, TGL_TRANSAKSI, CURDATE()) < '".$jumlah."'
					                ORDER BY T.`TGL_TRANSAKSI` ".$urut_berdasarkan);
		return $query;
		}

		public function getlaporanuang4 ($jumlah, $urut_berdasarkan){
		$query = $this->db->query(" SELECT T.`ID_TRANSAKSI`, K.`NAMA_K`, T.`TGL_TRANSAKSI`, T.`JAM_TRANSAKSI`, T.`TOTAL`
						            FROM `TRANSAKSI` AS T, `KARYAWAN` AS K
					                WHERE K.`ID_KARYAWAN` = T.`ID_KASIR` AND  TIMESTAMPDIFF(YEAR, TGL_TRANSAKSI, CURDATE()) < '".$jumlah."'
					                ORDER BY T.`TGL_TRANSAKSI` ".$urut_berdasarkan);
		return $query;
		}




}