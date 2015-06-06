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

    public function countIdObatMasuk(){
            $query = $this->db->query("SELECT COUNT(*) AS N FROM `obat_masuk`");

            if($query->num_rows() > 0){
                return $query->row()->N;
            }
            else {
                return 0;
            }
        }

    public function countIdDetailObatMasuk(){
            $query = $this->db->query("SELECT COUNT(*) AS N FROM `detail_obat_masuk`");

            if($query->num_rows() > 0){
                return $query->row()->N;
            }
            else {
                return 0;
            }
        } 

    public function getDataSupplier($idsupplier){
        $query = $this->db->query
        ("SELECT DISTINCT O.`ID_SUPPLIER`, S.`NAMA_SUPPLIER` 
            FROM `obat` AS O, `supplier` AS S 
            WHERE O.`ID_SUPPLIER` = S.`ID_SUPPLIER` AND O.`ID_SUPPLIER` = '".$idsupplier."'");

        return $query;
    }

    public function insert($idobatmasuk, $idsupplier, $tglmasuk){
        $query = $this->db->query("INSERT INTO obat_masuk (`ID_OBAT_MASUK`, `ID_SUPPLIER`, `TGL_MASUK`) VALUES ('".$idobatmasuk."','".$idsupplier."','".$tglmasuk."')");
        
        return $query;
    }

    public function getDataObatS($idsupplier){
        $query = $this->db->query("SELECT `ID_OBAT`, `NAMA_OBAT` FROM `obat` WHERE `ID_SUPPLIER` = '".$idsupplier."'");

        return $query;
    }

    public function getDataObat($namaobat){
        $query = $this->db->query
        ("SELECT `ID_OBAT`, `ID_SUPPLIER`, `NAMA_OBAT` FROM `obat` WHERE `NAMA_OBAT` LIKE '%".$namaobat."%'");

        return $query;
    }

    public function getDataDetail($iddetailobatmasuk){
        $query = $this->db->query
        ("SELECT D.`ID_DETAIL_OBAT_MASUK`, D.`ID_OBAT_MASUK`, D.`ID_OBAT`, D.`QTY_OBAT_MASUK`, O.`NAMA_OBAT` 
            FROM `detail_obat_masuk` AS D, `obat` AS O 
            WHERE D.`ID_OBAT` = O.`ID_OBAT`AND D.`ID_DETAIL_OBAT_MASUK` = '".$iddetailobatmasuk."'");
    }

    public function insertDetailObat($iddetailobatmasuk, $idobat, $idobatmasuk, $qty){
        $query = $this->db->query
        ("INSERT INTO `detail_obat_masuk`(`ID_DETAIL_OBAT_MASUK`, `ID_OBAT`, `ID_OBAT_MASUK`, `QTY_OBAT_MASUK`) 
            VALUES ('".$iddetailobatmasuk."', '".$idobat."', '".$idobatmasuk."', '".$qty."')");

        return $query;
    }

    public function deleteDetailObat($iddetailobatmasuk){
        $query = $this->db->query
        ("DELETE FROM `detail_obat_masuk` WHERE `ID_DETAIL_OBAT_MASUK` = '".$iddetailobatmasuk."'");

        return $query;
    }

    



}
 ?>