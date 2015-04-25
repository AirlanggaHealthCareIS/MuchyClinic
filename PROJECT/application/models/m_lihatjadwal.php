<?php 
class M_lihatjadwal extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();  
        }

        public function getAktor($id){
                $query = $this->db->query("SELECT * FROM `jadwal_apoteker` AS A, `apoteker` AS P WHERE A.`ID_APOTEKER`= P.
                    `ID_APOTEKER` AND P.`ID_APOTEKER`= '".$id."'");

                 return $query;
                // return $row;
        }

        public function getDataAktor($id){
                $query = $this->db->query("SELECT `HARI_A`, `JAM_KERJA_A` FROM `jadwal_apoteker` WHERE `ID_APOTEKER` = '".$id."'");

                 return $query;
                // return $row;
        }

}
 ?>