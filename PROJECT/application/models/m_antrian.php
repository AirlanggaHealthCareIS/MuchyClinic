<?php

class M_antrian extends CI_Model {


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

   		public function getAntri($idp){
			$query = $this->db->query('SELECT * FROM `pasien` WHERE `id_pasien`='.$idp);
			/*$row = $query->row();*/
			return $query;
		}
        public function getdokter(){
            $query = $this->db->query('SELECT * FROM DOKTER');
            /*$row = $query->row();*/
            return $query->result();
        }
}
	

?>