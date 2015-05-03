<?php 
class M_jadwal extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();  
        }

        public function getAktor($id){
                $query = $this->db->query("SELECT * FROM `jadwal_apoteker` AS A, `apoteker` AS P WHERE A.`ID_APOTEKER`=P.`ID_APOTEKER` AND P.`ID_APOTEKER`= '".$id."'");

                 return $query;
        }

        public function getDokter($iddok){
                $query = $this->db->query("SELECT `ID_DOKTER`, `NAMA_DOKTER` FROM `dokter` WHERE `ID_DOKTER` = '".$iddok."'");

                return $query;
        }

        public function getKaryawan($idkar){
                $query = $this->db->query("SELECT `ID_KARYAWAN`, `NAMA_K` FROM `karyawan` WHERE `ID_KARYAWAN` ='".$idkar."'");

                return $query;
        }

        public function getApoteker($idapt){
                $query = $this->db->query("SELECT `ID_APOTEKER`, `NAMA_APOTEKER` FROM `apoteker` WHERE `ID_APOTEKER` = '".$idapt."'");

                return $query;
        }

        public function insertJadwalApoteker($IDJADWAL, $IDAPOTEKER, $HARIA, $JAMA){
                $query = $this->db->query
                ("INSERT INTO `jadwal_apoteker`(`ID_JADWAL_APOTKR`, `ID_APOTEKER`, `HARI_A`, `JAM_KERJA_A`) VALUES ('".$IDJADWAL."', '".$IDAPOTEKER."', '".$HARIA."', '".$JAMA."')");

                return $query;
        }

        public function insertJadwalDokter($IDJADWAL, $IDDOKTER, $HARID, $JAMD){
                $query = $this->db->query
                ("INSERT INTO `jadwal_dokter`(`ID_JADWAL_DOKTER`, `ID_DOKTER`, `HARI_D`, `JAM_D`) VALUES ('".$IDJADWAL."', '".$IDDOKTER."', '".$HARID."', '".$JAMD."')");

                return $query;
        }

        public function insertJadwalKaryawan($IDJADWAL, $IDKARYAWAN, $HARIK, $JAMK){
                $query = $this->db->query
                ("INSERT INTO `jadwal_karyawan`(`ID_JADWAL_KRYN`, `ID_KARYAWAN`, `HARI_K`, `JAM_K`) VALUES ('".$IDJADWAL."', '".$IDKARYAWAN."', '".$HARIK."', '".$JAMK."')");

                return $query;
        }

        public function getAllDAta(){
            $query = $this->db->query
            ("SELECT J.`ID_JADWAL_APOTKR`, J.`ID_APOTEKER`, A.`NAMA_APOTEKER`, J.`HARI_A`, J.`JAM_KERJA_A` 
                FROM `jadwal_apoteker` AS J, `apoteker` AS A WHERE J.`ID_APOTEKER`= A.`ID_APOTEKER`
            ORDER BY `J`.`ID_JADWAL_APOTKR` ASC");
            return $query;
        }

        public function getDataApoteker(){
            $query = $this->db->query
            ("SELECT A.`NAMA_APOTEKER`, J.`ID_JADWAL_APOTKR`, J.`ID_APOTEKER`, J.`HARI_A`, J.`JAM_KERJA_A` 
                FROM `jadwal_apoteker` AS J, `apoteker` AS A 
                WHERE A.`ID_APOTEKER` = J.`ID_APOTEKER`
                ORDER BY `J`.`ID_JADWAL_APOTKR` ASC");

            return $query;
        }

        public function getDataDokter(){
            $query = $this->db->query
            ("SELECT D.`NAMA_DOKTER`, J.`ID_JADWAL_DOKTER`, J.`ID_DOKTER`, J.`HARI_D`, J.`JAM_D` 
                FROM `jadwal_dokter` AS J, `dokter` AS D
                WHERE D.`ID_DOKTER` = J.`ID_DOKTER`
                ORDER BY `J`.`ID_JADWAL_DOKTER` ASC");

            return $query; 
        }

        public function getDataKaryawan(){
            $query = $this->db->query
            ("SELECT K.`NAMA_K`, J.`ID_JADWAL_KRYN`, J.`ID_KARYAWAN`, J.`HARI_K`, J.`JAM_K` 
                FROM `jadwal_karyawan` AS J, `karyawan` AS K
                WHERE K.`ID_KARYAWAN` = J.`ID_KARYAWAN`
                ORDER BY `J`.`ID_JADWAL_KRYN` ASC");
        }

}
 ?>