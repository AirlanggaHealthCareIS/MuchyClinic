<?php 

class m_pemeriksaan extends CI_Model {

        
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
            }
       
        public function getPenyakit(){

                $query = $this->db->query("SELECT * FROM PENYAKIT");
				return $query->result() ;
        }
        public function getcariid ($idpasien){
        // .$id untuk varchar
        // '".$id."' untuk int
        $query =  $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$idpasien."'");
        return $query;
        }

        public function getPemeriksaan($idp, $iddokter, $idpasien, $idpenyakit, $tglperiksa, $biayaperiksa){
        		//$query = $this->db->query("INSERT INTO `muchy`.`pemeriksaan` (`ID_PERIKSA`, `ID_DOKTER`, `ID_PENYAKIT`, `ID_PASIEN`, `TANGGAL_PERIKSA`, `BIAYA_DOKTER`, `TOTAL_BIAYA_PERIKSA`, `KELUHAN`) VALUES ('K001', 'D02', 'P001', 'PS001', '2015-06-02', '50000', '10000', 'pusing');")
        }


    }

       



?>