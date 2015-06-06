<?php  

// dian ramadhan hati hati ya pas comit
// ini model kita bersama
class M_resep extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
        
        public function getcariid ($idpemeriksaan){
        
                $query = $this->db->query("SELECT P.`ID_PERIKSA` , PA.`ID_PASIEN` , PA.`NAMA_PASIEN` , D.`ID_DOKTER` , D.`NAMA_DOKTER` FROM `PEMERIKSAAN` AS P , `PASIEN` AS PA , `DOKTER` AS D WHERE P.`ID_PASIEN` = PA.`ID_PASIEN` AND P.`ID_DOKTER` = D.`ID_DOKTER` AND P.`ID_PERIKSA` = '".$idpemeriksaan."'");
                return $query;
        }
        
        public function insert ($idresep,$idpemeriksaan,$idpasien,$iddokter,$tglresep){
                $query = $this->db->query("INSERT INTO resep (`ID_RESEP`, `ID_PASIEN`, `ID_DOKTER`, `ID_PERIKSA` , `TGL_RESEP`) VALUES ('".$idresep."','".$idpasien."','".$iddokter."','".$idpemeriksaan."','".$tglresep."')");
                return $query;
                }  

        public function getResep($id, $tgl){
                $query = $this->db->query("SELECT * FROM resep AS r, dokter AS d, pasien AS p WHERE r.ID_DOKTER = d.ID_DOKTER AND r.ID_PASIEN=p.ID_PASIEN AND r.ID_PASIEN='".$id."' AND TGL_RESEP='".$tgl."'");
                return $query;
        }

        public function getobat ($idobat){
                $query = $this->db->query("SELECT O.`ID_OBAT` , O.`NAMA_OBAT` FROM `OBAT` AS O WHERE O.`ID_OBAT` = '".$idobat."'");
                return $query;
        }

        public function getDetailResep($idr){
                $query = $this->db->query("SELECT * FROM detail_resep AS d, obat AS o WHERE d.ID_OBAT = o.ID_OBAT AND d.ID_RESEP='".$idr."'");
                return $query;
        } 
        

        public function getidresep($idresep){
                $query = $this->db->query("SELECT R.`ID_RESEP` FROM `RESEP` AS R WHERE R.`ID_RESEP` = '".$idresep."'");
                return $query;
        }

        public function insertdetailresep($iddetailresep, $idresep, $idobat, $jmlobat, $ketobat){
                $query = $this->db->query("INSERT INTO detail_resep (`ID_DETAIL_RESEP`, `ID_OBAT`, `ID_RESEP`, `KET_RESEP` , `QTY_OBAT`) VALUES ('".$iddetailresep."','".$idobat."','".$idresep."','".$ketobat."',".$jmlobat.")");
                return $query;
        }
        public function getObat($nobat){
                $query = $this->db->query("SELECT * FROM `obat` WHERE `NAMA_OBAT` LIKE '%".$nobat."%'");
                 // $row = $query->row();

                 //$row=$query_>row();
                return $query;
               
        }
        public function getDR($idresep){
            $query = $this->db->query
            ("SELECT * FROM `detail_resep` AS DR , `obat` AS O WHERE DR.`ID_OBAT` = O.`ID_OBAT` AND DR.`ID_RESEP` = '".$idresep."'");
            return $query;
        }

        public function insertdetailresep($iddetailresep, $idresep, $idobat, $jmlobat, $ketobat){
                $query = $this->db->query("INSERT INTO detail_resep (`ID_DETAIL_RESEP`, `ID_OBAT`, `ID_RESEP`, `KET_RESEP` , `QTY_OBAT`) VALUES ('".$iddetailresep."','".$idobat."','".$idresep."','".$ketobat."',".$jmlobat.")");
                return $query;
        }

        public function editresep($ketobat,$jmlobat,$iddetailresep){
            $query = $this->db->query
            ("UPDATE detail_resep SET `KET_RESEP`='".$ketobat."', `QTY_OBAT`=".$jmlobat." WHERE `ID_DETAIL_RESEP`='".$iddetailresep."'");
            
        }
            
        

        public function countIDResep(){
            $query = $this->db->query("SELECT COUNT(*) AS N FROM `resep`");

            if($query->num_rows() > 0){
                return $query->row()->N;
            }
            else {
                return 0;
            }
        }

        public function countIDDetailResep(){
            $query = $this->db->query("SELECT COUNT(*) AS N FROM `detail_resep`");

            if($query->num_rows() > 0){
                return $query->row()->N;
            }
            else {
                return 0;
            }
        }
        public function deleteObat($iddetailresep){
            $query = $this->db->query
            ("DELETE FROM `detail_resep` WHERE `ID_DETAIL_RESEP` = '".$iddetailresep."'");
        
            return $query;
        }
                

}
?>