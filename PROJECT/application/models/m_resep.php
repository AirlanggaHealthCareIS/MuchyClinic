<?php  

// dian ramadhan hati hati ya pas comit
// ini model kita bersama
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

        public function getResep($id, $tgl){
                $query = $this->db->query("SELECT * FROM resep AS r, dokter AS d, pasien AS p WHERE r.ID_DOKTER = d.ID_DOKTER AND r.ID_PASIEN=p.ID_PASIEN AND r.ID_PASIEN='".$id."' AND TGL_RESEP='".$tgl."'");
                return $query;
        }

        public function getDetailResep($idr){
                $query = $this->db->query("SELECT * FROM detail_resep AS d, obat AS o WHERE d.ID_OBAT = o.ID_OBAT AND d.ID_RESEP='".$idr."'");
                return $query;
        } 
                

}
?>