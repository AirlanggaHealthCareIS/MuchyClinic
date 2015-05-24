<?php 
class M_rekammedis extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getRekamMedis($id){
                $query = $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");
                return $query;
        }

        public function getRekamMedisTest($id){
        	$query1 = $this->db->query("SELECT * FROM `pasien` WHERE `ID_PASIEN` = '".$id."'");
        	if ($query1->num_rows() > 0) { //cek jika hasil ada
			return $query1->row();
		    
		    $query = $this->db->query("SELECT `ID_PERIKSA`, `TANGGAL_PERIKSA`, `NAMA_DOKTER`, `NAMA_PENYAKIT`,`NAMA_OBAT`,`NAMA_TINDAKAN` FROM `rekam_medis` WHERE `ID_PASIEN`='".$id."'");
			if ($query->num_rows() > 0) { //cek jika hasil tidak ada
			return $query->row();	
			}

			else {
			return 0;	
			}
		}

		else{
			return 0;
		}

        }

}
 ?>