<?php  
class M_resep extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function getcariid ($idpemeriksaan){
                $query = $this->db->query("SELECT P.`ID_PERIKSA` , PA.`NAMA_PASIEN` , D.`NAMA_DOKTER` FROM `PEMERIKSAAN` AS P , `PASIEN` AS PA , `DOKTER` AS D WHERE P.`ID_PASIEN` = PA.`ID_PASIEN` AND P.`ID_DOKTER` = D.`ID_DOKTER`");
                return $query;
        }

}
?>