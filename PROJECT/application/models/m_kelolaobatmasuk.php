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

    public function getDataObat($namaobat, $idsupplier){
        $query = $this->db->query
        ("SELECT `ID_OBAT`, `ID_SUPPLIER`, `NAMA_OBAT` FROM `obat` WHERE `NAMA_OBAT` LIKE '%".$namaobat."%' AND `ID_SUPPLIER` = '".$idsupplier."'");

        return $query;
    }

    public function getDataDetail($idobatmasuk){
        $query = $this->db->query
        ("SELECT * FROM `detail_obat_masuk` AS D, `obat` AS O 
            WHERE D.`ID_OBAT` = O.`ID_OBAT`AND D.`ID_OBAT_MASUK` = '".$idobatmasuk."'");

        return $query;
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

    public function updateDetailObat($jumlahobatmasuk, $iddetailobatmasuk){
        $query = $this->db->query
        ("UPDATE `detail_obat_masuk` SET `QTY_OBAT_MASUK`='".$jumlahobatmasuk."' WHERE `ID_DETAIL_OBAT_MASUK` = '".$iddetailobatmasuk."'");
    }

    public function getObat($nobat){
        $query = $this->db->query("SELECT * FROM `obat` WHERE `NAMA_OBAT` LIKE '%".$nobat."%'");

        return $query;
       
    }

    public function addsupplier($idsupplier, $namasupp, $alamatsupp, $nohpsupp){
        $query = $this->db->query(
            "INSERT INTO supplier 
                    (`ID_SUPPLIER`,
                    `NAMA_SUPPLIER`,
                    `ALAMAT_SUPPLIER`,
                    `NO_TELP_SUPPLIER`)
            VALUES  ('".$idsupplier."',
                    '".$namasupp."',
                    '".$alamatsupp."',
                    '".$nohpsupp."')");
        return $query;
    }
    public function countIDSupplier(){
            $query = $this->db->query("SELECT COUNT(*) AS N FROM `supplier`");

            if($query->num_rows() > 0){
                return $query->row()->N;
            }
            else {
                return 0;
            }
        }

    public function addobat($idobat, $idsupplier, $namaobat, $katobat, $harga, $obatkritis){
        $query = $this->db->query(
            "INSERT INTO obat
                    (`ID_OBAT`,
                    `ID_SUPPLIER`,
                    `NAMA_OBAT`,
                    `KATEGORI_OBAT`,
                    `HARGA`,
                    `OBAT_KRITIS`)
            VALUES  ('".$idobat."',
                    '".$idsupplier."',
                    '".$namaobat."',
                    '".$katobat."',
                    ".$harga.",
                    '".$obatkritis."')");
        return $query;

    }
    public function countIDObat(){
            $query = $this->db->query("SELECT COUNT(*) AS N FROM `obat`");

            if($query->num_rows() > 0){
                return $query->row()->N;
            }
            else {
                return 0;
            }
        }
    public function tampilSupp(){
        $query = $this->db->query("SELECT * FROM `supplier`");

        return $query->result();
    }

    public function tampilObat(){
        $query = $this->db->query("SELECT * FROM `obat`");

        return $query->result();
    }

    

    public function editSupp($idsupplier, $namasupp, $alamatsupp, $nohpsupp){
        $query = $this->db->query
        ("UPDATE supplier SET `NAMA_SUPPLIER`='".$namasupp."', `ALAMAT_SUPPLIER`='".$alamatsupp."' , `NO_TELP_SUPPLIER`='".$nohpsupp."' WHERE `ID_SUPPLIER`='".$idsupplier."'");
    }

    public function editObat($idobat, $idsupplier, $namaobat, $katobat, $harga, $obatkritis){
        $query = $this->db->query
        ("UPDATE obat SET `ID_SUPPLIER`='".$idsupplier."', `NAMA_OBAT`='".$namaobat."' , `KATEGORI_OBAT`='".$katobat."' , `HARGA`=".$harga." , `OBAT_KRITIS`='".$obatkritis."' WHERE `ID_OBAT`='".$idobat."'");
    }

    public function deleteSupp($idsupplier){
            $query = $this->db->query
            ("DELETE FROM `supplier` WHERE `ID_SUPPLIER` = '".$idsupplier."'");
        
            return $query;
        }

    public function deleteObat($idobat){
            $query = $this->db->query
            ("DELETE FROM `obat` WHERE `ID_OBAT` = '".$idobat."'");
        
            return $query;
        }



    



}
 ?>