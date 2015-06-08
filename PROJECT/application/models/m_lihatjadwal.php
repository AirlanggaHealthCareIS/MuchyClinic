<?php 
class M_lihatjadwal extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();  
        }

        public function getApoteker($username){
                $query = $this->db->query("SELECT * FROM `apoteker` WHERE `NAMA_APOTEKER`= '".$username."'");
                 return $query;
        }

        public function getDokter($username){
                $query = $this->db->query("SELECT * FROM `dokter` WHERE `NAMA_DOKTER`= '".$username."'");
                return $query;
        }

        public function getKaryawan($username){
                $query = $this->db->query("SELECT * FROM `karyawan` WHERE `NAMA_K`= '".$username."'");

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