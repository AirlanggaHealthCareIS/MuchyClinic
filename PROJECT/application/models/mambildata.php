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
		// public function getinap (){
		// $query = $this->db->query("SELECT  K.`NAMA_KAMAR_INAP`, P.`NAMA_PASIEN`, D.`NAMA_DOKTER`, R.`TGL_MASK`, R.`TGL_KELUAR`, R.`TOTAL_BIAYA_RWT` FROM `RAWAT_INAP` AS R, `PASIEN` AS P, `KAMAR` AS K, `DOKTER` AS D WHERE P.`ID_PASIEN` = R.`ID_PASIEN` AND K.`ID_KAMAR_INAP` = R.`ID_KAMAR_INAP` AND D.`ID_DOKTER` = R.`ID_DOKTER`");
		// return $query->result();
		// }
		public function getkamar(){
			$query = $this->db->query("SELECT * FROM KAMAR");
			return $query->result();
		}
		public function getdokter(){
			$query = $this->db->query("SELECT * FROM DOKTER");
			return $query->result();
		}
		public function insertinap($idRwtInap, $id_pas, $kamar_r, $dokter_r, $tgl_masuk_r){ // masuk ke tabel rawat inap //
			$query = $this->db->query("INSERT INTO RAWAT_INAP(`ID_RAWAT_INAP`,`ID_KAMAR_INAP`, `ID_PASIEN`, `ID_DOKTER`, `TGL_MASK`, `TGL_KELUAR`, `TOTAL_BIAYA_RWT`) VALUES ('".$idRwtInap."','".$kamar_r."', '".$id_pas."', '".$dokter_r."', '".$tgl_masuk_r."', NULL, 'NULL')");
			return $query;
		}
		public function insertinap2($iddetailRwtInap, $idRwtInap, $id_pas, $qty){ // masuk ke tabel detail rawat inap //
			$query = $this->db->query("INSERT INTO DETAIL_RAWAT_INAP(`ID_DETAIL_RAWAT_INAP`,`ID_RAWAT_INAP`,`ID_PERIKSA`, `KETERANGAN`, `QTY`, `SUBTOTAL`) VALUES ('".$iddetailRwtInap."','".$idRwtInap."', NULL , 'RAWAT INAP', '".$qty."' , 'NULL')");
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
		// buat generate ID //
		public function countRawatinap()
        {
            $query = $this->db->query("SELECT count(*) AS RI FROM `rawat_inap`");
            if ($query->num_rows()>0) {
              return $query->row()->RI;
            } else {
              return 0;
            }
          }

          public function generateRawatInap(){
            $id = $this->countRawatinap() + 1;
            if ($id < 10) $id = "RI00".$id;
            else if ($id < 100) $id = "RI0".$id;
            else if ($id < 1000) $id = "RI".$id; 
            return $id;
          }
          // end buat generate ID //
          // buat generate ID //
		public function countDetailRawatinap()
        {
            $query = $this->db->query("SELECT count(*) AS DI FROM `detail_rawat_inap`");
            if ($query->num_rows()>0) {
              return $query->row()->DI;
            } else {
              return 0;
            }
          }

          public function generateDetailRawatInap(){
            $id = $this->countDetailRawatinap() + 1;
            if ($id < 10) $id = "DI00".$id;
            else if ($id < 100) $id = "DI0".$id;
            else if ($id < 1000) $id = "DI".$id; 
            return $id;
          }
          // end buat generate ID //
          /////// view untuk updateRwtinap /////// 
          public function dmawar(){
			$query = $this->db->query("SELECT * FROM `rawat_inap` AS R, `PASIEN` AS P, `KAMAR` AS K WHERE P.`ID_PASIEN` = R.`ID_PASIEN` AND K.`ID_KAMAR_INAP` = R.`ID_KAMAR_INAP` AND R.`ID_KAMAR_INAP` ='KI001' AND TGL_KELUAR is NULL");
			return $query->result();
		}
			public function dmelati(){
				$query = $this->db->query("SELECT * FROM `rawat_inap` AS R, `PASIEN` AS P, `KAMAR` AS K WHERE P.`ID_PASIEN` = R.`ID_PASIEN` AND K.`ID_KAMAR_INAP` = R.`ID_KAMAR_INAP` AND R.`ID_KAMAR_INAP` ='KI002' AND TGL_KELUAR is NULL");
				return $query->result();
			}
		public function update_rawat($idr, $qty, $tgl_keluar, $biaya){
			$query = $this->db->query("UPDATE `RAWAT_INAP` AS R, `detail_rawat_inap` AS D SET R.`TGL_KELUAR`= '".$tgl_keluar."', R.`TOTAL_BIAYA_RWT` = '".$biaya."', D.`QTY` = '".$qty."', D.`SUBTOTAL` = '".$biaya."' WHERE D.`ID_RAWAT_INAP` = R.`ID_RAWAT_INAP` AND R.`ID_RAWAT_INAP` ='".$idr."'");
			// return "UPDATE `RAWAT_INAP` AS R, `detail_rawat_inap` AS D SET R.`TGL_KELUAR`= '".$tgl_keluar."', R.`TOTAL_BIAYA_RWT` = '".$biaya."', D.`QTY` = '".$qty."', D.`SUBTOTAL` = '".$biaya."' WHERE D.`ID_RAWAT_INAP` = R.`ID_RAWAT_INAP` AND R.`ID_RAWAT_INAP` ='".$idr."'";
			// return $query->result();
		}
}