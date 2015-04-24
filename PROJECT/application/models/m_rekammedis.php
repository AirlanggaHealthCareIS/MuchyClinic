<?php 
class M_rekammedis extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getRekamMedis($id){
                $query = $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");

                 return $query;
        }

}
 ?>