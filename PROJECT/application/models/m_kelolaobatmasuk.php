<?php 

class M_kelolaobatmasuk extends CI_Model {
	public function __construct()
        {
                parent::__construct();
        }

    

    public function getidapoteker ($idapoteker){
        
                $query = $this->db->query("SELECT A.`ID_APOTEKER` , A.`NAMA_APOTEKER` FROM `APOTEKER` AS A WHERE A.`ID_APOTEKER` = '".$idapoteker."'");
                return $query;
        }

    public function insert($idobatmasuk, $idapoteker, $tglmasuk){
    	$query = $this->db->query("INSERT INTO obat_masuk (`ID_OBAT_MASUK`, `ID_APOTEKER`, `TGL_MASUK`) VALUES ('".$idobatmasuk."','".$idapoteker."','".$tglmasuk."')");
                return $query;
                }  
    



}
 ?>