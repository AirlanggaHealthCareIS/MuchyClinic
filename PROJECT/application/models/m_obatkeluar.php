<?php  

class M_obatkeluar extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
                
        public function insert_obat_keluar( $ID_OBAT_KELUAR, $ID_APOTEKER, $JMLH_STOK_KELUAR, $TOTAL_HARGA_OBAT ){
                $data = array(
                        'ID_OBAT_KELUAR' => $ID_OBAT_KELUAR,
                        'ID_APOTEKER' => $ID_APOTEKER,
                        'JMLH_STOK_KELUAR' => $JMLH_STOK_KELUAR,
                        'TOTAL_HARGA_OBAT' => $TOTAL_HARGA_OBAT
                );

                $this->db->insert('obat_keluar', $data);
        }

        public function insert_detail_obat_keluar( $ID_DETAIL_OBAT_KELUAR, $ID_OBAT_KELUAR, $ID_OBAT, $SUBTOTAL_OBAT_KELUAR, $JUMLAH_TOTAL_OBAT ){
                $data = array(
                        `ID_DETAIL_OBAT_KELUAR` => $ID_DETAIL_OBAT_KELUAR,
                        `ID_OBAT_KELUAR` => $ID_OBAT_KELUAR,
                        `ID_OBAT` => $ID_OBAT,
                        `SUBTOTAL_OBAT_KELUAR` => $SUBTOTAL_OBAT_KELUAR,
                        `JUMLAH_TOTAL_OBAT` => $JUMLAH_TOTAL_OBAT
                );

                $this->db->insert('detail_obat_keluar', $data);
        }

        public function getResep($id, $tgl){
                $query = $this->db->query("SELECT * FROM resep AS r, dokter AS d, pasien AS p WHERE r.ID_DOKTER = d.ID_DOKTER AND r.ID_PASIEN=p.ID_PASIEN AND r.ID_PASIEN='".$id."' AND TGL_RESEP='".$tgl."'");
                if ($query->num_rows()>0) {
                        $query = $query->row();
                        return $query->ID_RESEP;
                } else {
                        return 0;
                }
        }
}

?>