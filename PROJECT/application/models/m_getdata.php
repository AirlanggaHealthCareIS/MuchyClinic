<?php 
class M_getdata extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();  
        }

        public function getDataAktor($id){
                $query = $this->db->query("SELECT `HARI_A`, `JAM_KERJA_A` FROM `jadwal_apoteker` WHERE `ID_APOTEKER` = '".$id."'");

                 return $query;
                // return $row;
        }
        public function getDataAktor_K($id){
                $query = $this->db->query("SELECT `HARI_K`, `JAM_K` FROM `jadwal_karyawan` WHERE `ID_KARYAWAN` = '".$id."'");

                 return $query;
                // return $row;
        }

}
 ?>