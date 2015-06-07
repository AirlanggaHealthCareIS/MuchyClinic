<?php  

class M_obatkeluar extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }
          
  public function getResep($id, $tgl){
    $query = $this->db->query("SELECT * FROM resep AS r, dokter AS d, pasien AS p WHERE r.ID_DOKTER = d.ID_DOKTER AND r.ID_PASIEN=p.ID_PASIEN AND r.ID_PASIEN='".$id."' AND TGL_RESEP='".$tgl."'");
    if ($query->num_rows()>0) {
      return $query;
    } else {
      return 0;
    }
  }

  public function countObatKeluar(){
    $query = $this->db->query("SELECT count(*) AS N FROM `obat_keluar`");
    if ($query->num_rows()>0) {
      return $query->row()->N;
    } else {
      return 0;
    }
  }

  public function generateIdObatKeluar(){
    $id = $this->countObatKeluar() + 1;
    if ($id < 10) $id = "OK00".$id;
    else if ($id < 100) $id = "OK0".$id;
    else if ($id < 1000) $id = "OK".$id; 
    return $id;
  }

  public function countDetailObatKeluar(){
    $query = $this->db->query("SELECT count(*) AS N FROM `detail_obat_keluar`");
    if ($query->num_rows()>0) {
      return $query->row()->N;
    } else {
      return 0;
    }
  }

  public function generateBanyakIdDetailObatKeluar($n){
    $id_awal = $this->generateIdObatKeluar();
    $id = $this->countDetailObatKeluar();
    $kotak_id = array();
    for ($i=0; $i < $n; $i++) { 
      $id = $id + 1;
      $temp = "";
      if ($id < 10) $temp = "DOK000".$id;
      else if ($id < 100) $temp = "DOK00".$id;
      else if ($id < 1000) $temp = "DOK0".$id; 
      else if ($id < 10000) $temp = "DOK".$id;

      array_push($kotak_id, $temp);
    }
    return $kotak_id;
  }

  public function insertObatKeluar($ID_OBAT_KELUAR, $ID_APOTEKER, $ID_PASIEN, $TGL_OBAT_KELUAR) {
    $this->db->query("INSERT INTO `obat_keluar`(`ID_OBAT_KELUAR`, `ID_APOTEKER`, `ID_PASIEN`, `TGL_OBAT_KELUAR`) VALUES ('".$ID_OBAT_KELUAR."', '".$ID_APOTEKER."', '".$ID_PASIEN."', '".$TGL_OBAT_KELUAR."')");
  }

  public function selectDetailObatKeluar($detail_resep){
    $query = 'SELECT * FROM `detail_resep` AS dr, obat AS o WHERE dr.ID_OBAT=o.ID_OBAT AND (';
    for ($i=0; $i < count($detail_resep); $i++) { 
      if (($i+1)==count($detail_resep)) {
        $query = $query.'dr.ID_DETAIL_RESEP="'.$detail_resep[$i].'"';
      } else {
        $query = $query.'dr.ID_DETAIL_RESEP="'.$detail_resep[$i].'" OR ';
      }
    }
    $query = $query.');';
    $query = $this->db->query($query);
    return $query->result();
  }

  public function queryDo($query2){
    $query = $this->db->query($query2);
    return $query;
  }

}

?>