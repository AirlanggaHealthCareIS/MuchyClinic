<?php

class M_antrian extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

   		public function getAntri($idp){
			$query = $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$idp."'");
			/*$row = $query->row();*/
			return $query;
		}
        public function getdokter(){
            $query = $this->db->query('SELECT * FROM DOKTER');
            /*$row = $query->row();*/
            return $query->result();
        }
        public function insert($no_antri, $id_pasien, $id_dokter, $tgldftr, $setAntri){
            $query = $this->db->query("INSERT INTO WAITING_LIST(`ID_ANTRI`, `ID_PASIEN`, `ID_DOKTER`, `NO_ANTRI`, `TGL_ANTRI`) VALUES ('".$no_antri."', '".$id_pasien."', '".$id_dokter."','".$setAntri."', '".$tgldftr."')");
            return $query;
        }
        public function antrian($tanggal){
            $query = $this->db->query("SELECT count(*) AS tanggal FROM `waiting_list` where TGL_ANTRI = '".$tanggal."'");
            $query = $query->row();

            return $query->tanggal;
        }
        public function countAntrian()
        {
            $query = $this->db->query("SELECT count(*) AS W FROM `waiting_list`");
            if ($query->num_rows()>0) {
              return $query->row()->W;
            } else {
              return 0;
            }
          }

          public function generateAntrian(){
            $id = $this->countAntrian() + 1;
            if ($id < 10) $id = "AT00".$id;
            else if ($id < 100) $id = "AT0".$id;
            else if ($id < 1000) $id = "AT".$id; 
            return $id;
          }
}
	

?>