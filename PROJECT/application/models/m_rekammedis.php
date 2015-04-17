<?php 
class M_rekammedis extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getRekamMedis($id){
                $query = $this->db->query("SELECT * FROM `data_pasien` WHERE `id_pasien` = '".$id."'");

                 return $query;


                // return $row;
        }

}
 ?>