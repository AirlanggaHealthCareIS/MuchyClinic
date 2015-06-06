<?php 
class M_lihatjadwal extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();  
        }

        public function getApoteker($id){
                $query = $this->db->query("SELECT * FROM `jadwal_apoteker` AS A, `apoteker` AS P WHERE A.`ID_APOTEKER`= P.
                    `ID_APOTEKER` AND P.`ID_APOTEKER`= '".$id."'");

                 return $query;
        }

        public function getDokter($id){
                $query = $this->db->query("SELECT * FROM `jadwal_dokter` AS D, `dokter` AS P 
                    WHERE D.`ID_DOKTER`= P.`ID_DOKTER` AND P.`ID_DOKTER`= '".$id."'");

                return $query;
        }

        public function getKaryawan($id){
                $query = $this->db->query("SELECT * FROM `jadwal_karyawan` AS K, `karyawan` AS P 
                    WHERE K.`ID_KARYAWAN`= P.`ID_KARYAWAN` AND P.`ID_KARYAWAN`= '".$id."'");

                return $query;
        }        

        public function getDataApoteker($id){
                $query = $this->db->query("SELECT `HARI_A`, `JAM_KERJA_A` FROM `jadwal_apoteker` WHERE `ID_APOTEKER` = '".$id."'");

                 return $query;
        }

        public function getDataDokter($id){
                $query = $this->db->query("SELECT `HARI_D`, `JAM_D` FROM `jadwal_dokter` WHERE `ID_DOKTER` = '".$id."'");

                 return $query;
        }

        public function getDataKaryawan($id){
                $query = $this->db->query("SELECT `HARI_K`, `JAM_K` FROM `jadwal_karyawan` WHERE `ID_KARYAWAN` = '".$id."'");

                 return $query;
        }

}
 ?>