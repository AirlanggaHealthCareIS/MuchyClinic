<?php 

class m_absensi extends CI_Model {

        
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function getMahasiswa($idm){
                $query = $this->db->query('SELECT * FROM `nm_mhs` WHERE `id_mahasiswa`='.$idm);
                //$row =$query ->row();

                return $query;

        }
        public function getAbsensi($idk, $timek, $datek){
                $query = $this->db->query('INSERT INTO `absensi`(`id_karyawan`, `time`, `date`) VALUES ("'.$idk.'", "'.$timek.'","'.$datek.'")');
                return $query;
        }

       
}


?>