<?php 

class M_inventory extends CI_Model {

      

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

       public function getObat($nobat){
                $query = $this->db->query("SELECT * FROM `obat_pasien` WHERE `nama_obat`= '".$nobat."'");
                 // $row = $query->row();
                 //$row=$query_>row();

                return $query;
               
        }
}

?>