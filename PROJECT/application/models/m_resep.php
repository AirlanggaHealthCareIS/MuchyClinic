<?php  
class M_resep extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        
        }
        public function getcariid ($idpemeriksaan){
        
                $query = $this->db->query("SELECT P.`ID_PERIKSA` , PA.`ID_PASIEN` , PA.`NAMA_PASIEN` , D.`ID_DOKTER` , D.`NAMA_DOKTER` FROM `PEMERIKSAAN` AS P , `PASIEN` AS PA , `DOKTER` AS D WHERE P.`ID_PASIEN` = PA.`ID_PASIEN` AND P.`ID_DOKTER` = D.`ID_DOKTER`");
                return $query;
        }
        public function insert ($idresep,$idpemeriksaan,$idpasien,$iddokter,$tglresep){
                $query = $this->db->query("INSERT INTO resep (`ID_RESEP`, `ID_PASIEN`, `ID_DOKTER`, `ID_PERIKSA` , `TGL_RESEP`) VALUES ('".$idresep."','".$idpasien."','".$idpemeriksaan."','".$iddokter."','".$tglresep."')");
                return $query;
                }   
                

}
?>