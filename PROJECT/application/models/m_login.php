<?php 
class m_login extends CI_Model {

        
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function getdokter($username,$password)
        {
                $query = $this->db->query("SELECT * FROM `dokter` WHERE NAMA_DOKTER = '".$username."' OR PASSWORD = '".$password."'");
                if ($query->num_rows() ==1) {
                        return true;
                } else {
                        return false;
                }


        }
         public function getkaryawan($username,$password)
        {
                // $query = $this->db->query("SELECT * FROM `dokter` WHERE NAMA_DOKTER = '".$username."' OR PASSWORD = '".$password."'");
                
                $query = $this->db->query("SELECT * FROM `karyawan` WHERE NAMA_K = '".$username."' OR PASSWORD = '".$password."'");
                if ($query->num_rows() ==1) {
                        return true;
                } else {
                        return false;
                }

        
        }
}

 ?>