<?php  
class m_pendaftaranpasien extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        
        }
        // public function getcariid ($idpemeriksaan){
        
        //         $query = $this->db->query("SELECT P.`ID_PERIKSA` , PA.`ID_PASIEN` , PA.`NAMA_PASIEN` , D.`ID_DOKTER` , D.`NAMA_DOKTER` FROM `PEMERIKSAAN` AS P , `PASIEN` AS PA , `DOKTER` AS D WHERE P.`ID_PASIEN` = PA.`ID_PASIEN` AND P.`ID_DOKTER` = D.`ID_DOKTER`");
        //         return $query;
        // }
        public function insert ($id_pasienkr,$nama_pasienkr,$tempat_lahirkr,$tanggal_lahirkr,$Alamatkr,$teleponkr,$goldarahkr,$jenis_kelaminkr,$pekerjaankr,$agamakr,$hpkr,$hubungankr,$pembayarankr,$tanggal_pendaftarankr){
                $query = $this->db->query("INSERT INTO PASIEN (ID_PASIEN, NAMA_PASIEN, TMPT_LAHIR_PASIEN, TGL_LAHIR_PASIEN , ALAMAT_PASIEN , NO_TLP_PASIEN ,GOL_DARAH_PASIEN, JENIS_KELAMIN_PASIEN , PEKERJAAN_PASIEN, AGAMA, NO_HP, HUBUNGAN, TYPE_PEMBAYARAN, TANGGAL_PENDAFTARAN ) VALUES ('".$id_pasienkr."','".$nama_pasienkr."','".$tempat_lahirkr."','".$tanggal_lahirkr."','".$Alamatkr."','".$teleponkr."','".$goldarahkr."','".$jenis_kelaminkr."','".$pekerjaankr."','".$agamakr."','".$hpkr."','".$hubungankr."','".$pembayarankr."','".$tanggal_pendaftarankr."')");
                return $query;

                }   


        public function getdatapasien($nama_pasien){
                $query = $this->db->query("SELECT * FROM `pasien` WHERE `NAMA_PASIEN` LIKE '%".$nama_pasien."%'");
                return $query;

        }

        public function countPasien(){
                $query = $this->db->query("SELECT MAX(ID_PASIEN) AS MAX FROM `pasien`");
                if ($query->num_rows() > 0) {
                        $query = $query->row();
                        $t = $query->MAX;
                        $t = substr($t, 1);
                        return $t;
                } else {
                        return 1;
                }
        }
                

}
?>