<?php 
class M_jadwal extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();  
        }

        public function getMahasiswa($id){
                $query = $this->db->query("SELECT * FROM `jadwal_apoteker` AS A, `apoteker` AS P WHERE A.`ID_APOTEKER`=P.`ID_APOTEKER` AND P.`ID_APOTEKER`= '".$id."'");

                 return $query;


                // return $row;
        }

}
 ?>