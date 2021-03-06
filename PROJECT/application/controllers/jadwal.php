<?php

class Jadwal extends CI_Controller{ 

	public function Jadwal() {
                // Call the CI_Model constructor
		parent::__construct();
		$this->load->model("m_jadwal");
		$this->id_user = "";
		
		if (($this->session->userdata('username_owner'))=="" || ($this->session->userdata('username_owner'))==null) {
		redirect(base_url()."login_owner");
		}
		$this->user = $this->session->userdata('username_owner');
	}

	public function index() {
		$this->load->model("m_jadwal");

        $data = array("ida"=>"", "nama"=>"", 
        "iddokter"=>"", "namadokter"=>"", 
        "idkaryawan"=>"", "namakaryawan"=>"",
        "idapoteker"=>"", "namaapoteker"=>"",
        "iddokter2"=>"", 
        "idjadwala"=>"", "idjadwald"=>"", "idjadwalk"=>"",
        "lihatjadwalapt"=>null,
        "lihatjadwaldok"=>null,
        "lihatjadwalkar"=>null); //tampil data di tabel

        //"lihatjadwalapt"=>$this->m_jadwal->getAllData(),

		$this->load->view("v_header_owner");
		$this->load->view("jadwal/v_content_karyawan", $data);
		$this->load->view("v_footer");

    }

    public function karyawan()
	{
		$this->load->model("m_jadwal");
		$this->header[3] = "active"; //untuk indikasi active header
				

        $data = array("ida"=>"", "nama"=>"", 
        "iddokter"=>"", "namadokter"=>"", 
        "idkaryawan"=>"", "namakaryawan"=>"",
        "idapoteker"=>"", "namaapoteker"=>"",
        "iddokter2"=>"", 
        "idjadwala"=>"", "idjadwald"=>"", "idjadwalk"=>"",
        "lihatjadwalapt"=>null,
        "lihatjadwaldok"=>null,
        "lihatjadwalkar"=>$this->m_jadwal->getDataKaryawan()); //tampil data di tabel

        //"lihatjadwalapt"=>$this->m_jadwal->getAllData(),

		$this->load->view("v_header_owner");
		$this->load->view("jadwal/v_content_karyawan", $data);
		$this->load->view("v_footer");

    }

    public function dokter()
	{
		$this->load->model("m_jadwal");
		$this->header[1] = "active"; //untuk indikasi active header

        $data = array("ida"=>"", "nama"=>"", 
        "iddokter"=>"", "namadokter"=>"", 
        "idkaryawan"=>"", "namakaryawan"=>"",
        "idapoteker"=>"", "namaapoteker"=>"",
        "iddokter2"=>"", 
        "idjadwala"=>"", "idjadwald"=>"", "idjadwalk"=>"",
        "lihatjadwalapt"=>null,
        "lihatjadwaldok"=>$this->m_jadwal->getDataDokter(),
        "lihatjadwalkar"=>null); //tampil data di tabel

        //"lihatjadwalapt"=>$this->m_jadwal->getAllData(),

		$this->load->view("v_header_owner");
		$this->load->view("jadwal/v_content_dokter", $data);
		$this->load->view("v_footer");

    }

    public function apoteker()
	{
		$this->load->model("m_jadwal");
		$this->header[2] = "active"; //untuk indikasi active header

        $data = array("ida"=>"", "nama"=>"", 
        "iddokter"=>"", "namadokter"=>"", 
        "idkaryawan"=>"", "namakaryawan"=>"",
        "idapoteker"=>"", "namaapoteker"=>"",
        "iddokter2"=>"", 
        "idjadwala"=>"", "idjadwald"=>"", "idjadwalk"=>"",
        "lihatjadwalapt"=>$this->m_jadwal->getDataApoteker(),
        "lihatjadwaldok"=>null,
        "lihatjadwalkar"=>null); //tampil data di tabel

        //"lihatjadwalapt"=>$this->m_jadwal->getAllData(),

		$this->load->view("v_header_owner");
		$this->load->view("jadwal/v_content_apoteker", $data);
		$this->load->view("v_footer");

    }

	//============================================================ T E S T I N G ====================================================================

	public function testing(){
		$this->load->library("unit_test");

		$this->unit->run($this->isValid(""), "null", "Test Validasi Null");
		$this->unit->run($this->isValid("*&&^^"), "symbolerror", "Test Validasi Symbol");
		$this->unit->run($this->isValidHari("Selasa"), true, "Test Validasi Hari");
		$this->unit->run($this->isValidJam("0"), false, "Test Validasi Jam");

		echo $this->unit->report();
	}

	//========================================================= E N D  O F  T E S T I N G ======================================================

	public function isValid($cek){
		if($cek==null || $cek==""){
			return "null";
		}

		else if(preg_match('/[^a-z0-9]/i', $cek)){
			return "symbolerror";
		}		
	}

	public function isValidHari($cekhari){
		if($cekhari=="0"){
			return false;
		}
		else if ($cekhari == "Senin" || $cekhari == "Selasa" || $cekhari == "Rabu" || $cekhari == "Kamis" || $cekhari == "Jumat" || $cekhari == "Sabtu" || $cekhari == "Minggu") {
			return true;
		}
	}

	public function isValidJam($cekjam){
		if($cekjam == "0"){
			return false;
		}
		else if ($cekjam == "07.00-12.00" || $cekjam == "12.00-17.00" || $cekjam == "17.00-22.00") {
			return true;
		}
	}

//======================================================================================================================================================

	
//=============================================================== D O K T E R ========================================================================
	public function validasiDokter(){

		$iddokter = $this->input->post('iddok');
		
		$cek = $this->isValid($iddokter);
		
		if($cek == "null"){
			redirect(base_url().'jadwal/dokter?error=iddokternull');

		}

		else if($cek == "symbolerror"){
			redirect(base_url().'jadwal/dokter?error=doktersymbolerror');
		}

		else {
			
			$this->tampilDokter($iddokter);
		}
	}

	public function validasiDokter2(){
		
		//$idjadwal = $this->input->post('idjadwal');
		$cb_hari = $this->input->post('cbhari');
		$cb_jam = $this->input->post('cbjam');

		//$cekjadwal = $this->isValid($idjadwal);
		$cekhari = $this->isValidHari($cb_hari);
		$cekjam = $this->isValidJam($cb_jam);

		if ($this->input->post('submit')=='add') {

			if($cekhari == false){
				redirect(base_url().'jadwal/dokter?error=cbharinull');
			}

			else if($cekjam == false){
				redirect(base_url().'jadwal/dokter?error=cbjamnull');
			}

			else{
				$this->inputJadwalDokter();
			}
		}
		else if ($this->input->post('submit')=='edit') {
			echo "Fitur ini belum dibuat";
		}

	}

	public function generateIdJadwalD(){
		$this->load->model('m_jadwal');

		$id = $this->m_jadwal->countIdJadwalD() + 1;

		if($id < 10){
			$id = "JD00".$id;
		}
		else if($id < 100){
			$id = "JD0".$id;
		}
		else if($id < 1000){
			$id = "JD".$id;
		}

		return $id;
	}

	public function tampilDokter($iddokter){
		$this->header[1] = "active"; //untuk indikasi active header
		$this->load->database();

		$iddokter = $this->input->post('iddok');

		$this->load->model("m_jadwal");

		$query = $this->m_jadwal->getDokter($iddokter);
		
		if($query->num_rows() > 0) {
			$ro = $query->row();	

			$data = array(
				"iddokter"=>$ro->ID_DOKTER, 
				"namadokter"=>$ro->NAMA_DOKTER,
				"idjadwald"=>$this->generateIdJadwalD(), 
				"lihatjadwaldok"=>$this->m_jadwal->getDataDokter());

			$this->session->set_flashdata("iddokter", $ro->ID_DOKTER);
			// $this->sessiom->idjadwald = $ro->generateIdJadwalD();

			$this->load->view("v_header_owner");
			$this->load->view("jadwal/v_content_dokter", $data);
			$this->load->view("v_footer");	

		}
		else{
			redirect(base_url().'jadwal/dokter?error=dokternotfound');
		}
	}

	private function inputJadwalDokter(){
		$this->header[1] = "active"; //untuk indikasi active header
		$this->load->model('m_jadwal');

		$IDJADWALD = $this->generateIdJadwalD();
		$IDDOKTER = $this->input->post('iddokter');
		$HARID = $this->input->post('cbhari');
		$JAMD = $this->input->post('cbjam');

		$inputJDokter = $this->m_jadwal->insertJadwalDokter($IDJADWALD, $IDDOKTER, $HARID, $JAMD);

		$this->showJadwalDokter($IDDOKTER);

	}

	public function hapusJadwalDokter($idJadwalD){
		$this->header[1] = "active"; //untuk indikasi active header
		$this->load->database();
		$this->load->model('m_jadwal');

		//$idJadwalD = $this->generateIdJadwalD();	
		$IDDOKTER = $this->input->post('iddokter');

		$deleteDokter = $this->m_jadwal->deleteJadwalDokter($idJadwalD);

		$this->showJadwalDokter($IDDOKTER);
	}

	public function showJadwalDokter($iddok){
		$this->header[1] = "active"; //untuk indikasi active header
		$this->load->database();

		$iddok = $this->input->post('iddokter');

		$this->load->model('m_jadwal');

		$data= array("iddokter"=>null, "idjadwald"=>null, "namadokter"=>null, "lihatjadwaldok"=>$this->m_jadwal->getDataDokter());

		$this->load->view("v_header_owner");
		$this->load->view("jadwal/v_content_dokter", $data);
		$this->load->view("v_footer");
	}

	public function editJadwalDokter($IDJADWALD){
		$this->header[1] = "active"; //untuk indikasi active header

		 $this->load->database();
		 $this->load->model('m_jadwal');

		 $IDDOKTER = $this->input->post('iddokter2');

		 $query = $this->m_jadwal->getIDJadwalDokter($IDJADWALD);
	 	 $ro = $query->row();	
		 $data["iddokter2"] = $ro->ID_DOKTER;
		 $data['idjadwal2'] = $ro->ID_JADWAL_DOKTER;
		 $data["lihatjadwaldok"]= $this->m_jadwal->getDataDokter();

		 $this->load->view("v_header_owner");
		 $this->load->view("jadwal/v_content_edit_dokter", $data);
		 $this->load->view("v_footer");

	}

	public function updateJadwalD(){
		$this->header[1] = "active"; //untuk indikasi active header
		$this->load->model('m_jadwal');

		$IDJADWALD = $this->input->post('idjadwal2');
		$IDDOKTER = $this->input->post('iddokter2');
		$HARID = $this->input->post('cbhari2');
		$JAMD = $this->input->post('cbjam2');
		
		$updateJDokter = $this->m_jadwal->updateJadwalDokter($HARID, $JAMD, $IDJADWALD);

		redirect(base_url()."jadwal/showJadwalDokter/".$IDDOKTER);
	}

	//======================================================= E N D  O F  D O K T E R ========================================================================

	
	//=============================================================== A P O T E K E R ========================================================================
	public function validasiApoteker(){

		$this->load->model('m_jadwal');

		$data= array("idapoteker"=>null, "idjadwala"=>null, "namaapoteker"=>null, "lihatjadwalapt"=>$this->m_jadwal->getDataApoteker());

		$idapt = $this->input->post('idapt');

		$cek = $this->isValid($idapt);

		if($cek == "null"){
			redirect(base_url().'jadwal/apoteker?error=idapotekernull');

		}

		else if(preg_match('/[^a-z0-9]/i', $cek)){
			redirect(base_url().'jadwal/apoteker?error=symbolerror');
		}

		else {
			
			$this->tampilApoteker($idapt);
		}
	}

	public function validasiApoteker2(){

		$this->load->model('m_jadwal');

		$cb_hari = $this->input->post('cbhari');
		$cb_jam = $this->input->post('cbjam');

		$cekhari = $this->isValidHari($cb_hari);
		$cekjam = $this->isValidJam($cb_jam);

		if($this->input->post('submit')=='add'){
			if($cb_hari == false){
				redirect(base_url().'jadwal/apoteker?error=cbharinull');
			}

			else if($cb_jam == false){
				redirect(base_url().'jadwal/apoteker?error=cbjamnull');
			}

			else {
			
				$this->inputJadwalApoteker();
			}
		}

	}

	public function generateIdJadwalA(){
		$this->load->model('m_jadwal');

		$id = $this->m_jadwal->countIdJadwalA() + 1;

		if($id < 10){
			$id = "JA00".$id;
		}
		else if($id < 100){
			$id = "JA0".$id;
		}
		else if($id < 1000){
			$id = "JA".$id;
		}

		return $id;
	}

	public function tampilApoteker($idapt){
		$this->header[2] = "active"; //untuk indikasi active header

		$this->load->database();

		$idapt = $this->input->post('idapt');

		$this->load->model("m_jadwal");

		$query = $this->m_jadwal->getApoteker($idapt);

		if($query->num_rows() > 0) {
			$ro = $query->row();
		
				$data = array(
					"idapoteker"=>$ro->ID_APOTEKER, 
					"namaapoteker"=>$ro->NAMA_APOTEKER,
					"idjadwala"=>$this->generateIdJadwalA(), 
					"lihatjadwalapt"=>$this->m_jadwal->getDataApoteker());		
			
				$this->session->set_flashdata("idapoteker", $ro->ID_APOTEKER);

				$this->load->view("v_header_owner");
				$this->load->view("jadwal/v_content_apoteker", $data);
				$this->load->view("v_footer");
		}
		else{
			redirect(base_url().'jadwal/apoteker?error=notfound');	
		}
	}

	

	private function inputJadwalApoteker(){
		$this->header[2] = "active"; //untuk indikasi active header

		$this->load->model('m_jadwal');

		//$IDJADWAL = $this->input->post('idjadwal');
		$IDJADWALA = $this->generateIdJadwalA();
		$IDAPOTEKER = $this->input->post('idapoteker');
		$HARIA = $this->input->post('cbhari');
		$JAMA = $this->input->post('cbjam');

		$inputJApoteker = $this->m_jadwal->insertJadwalApoteker($IDJADWALA, $IDAPOTEKER, $HARIA, $JAMA);

		$this->showJadwalApoteker($IDAPOTEKER);
		
	}

	public function hapusJadwalApoteker($idJadwalA){
		$this->header[2] = "active"; //untuk indikasi active header

		$this->load->database();

		$IDAPOTEKER = $this->input->post('idapoteker');

		$this->load->model('m_jadwal');	

		$deleteDokter = $this->m_jadwal->deleteJadwalApoteker($idJadwalA);

		$this->showJadwalApoteker($IDAPOTEKER);
	}

	public function showJadwalApoteker($idapt){
		$this->header[2] = "active"; //untuk indikasi active header

		$this->load->database();

		$idapt = $this->input->post('idapoteker');

		$this->load->model("m_jadwal");

		$data= array("idapoteker"=>null, "idjadwala"=>null, "namaapoteker"=>null, "lihatjadwalapt"=>$this->m_jadwal->getDataApoteker());

		$this->load->view("v_header_owner");
		$this->load->view("jadwal/v_content_apoteker", $data);
		$this->load->view("v_footer");
	}

	public function editJadwalApoteker($IDJADWALA){
		$this->header[2] = "active"; //untuk indikasi active header

		 $this->load->database();
		 $this->load->model('m_jadwal');

		 $IDAPOTEKER = $this->input->post('idapt2');

		 $query = $this->m_jadwal->getIDJadwalApoteker($IDJADWALA);
	 	 $ro = $query->row();	
		 $data["idapt2"] = $ro->ID_APOTEKER;
		 $data['idjadwal2'] = $ro->ID_JADWAL_APOTKR;
		 $data["lihatjadwalapt"]= $this->m_jadwal->getDataApoteker();

		 $this->load->view("v_header_owner");
		 $this->load->view("jadwal/v_content_edit_apoteker", $data);
		 $this->load->view("v_footer");

	}

	public function updateJadwalA(){
		$this->header[2] = "active"; //untuk indikasi active header

		$this->load->model('m_jadwal');

		$IDJADWALA = $this->input->post('idjadwal2');
		$IDAPOTEKER = $this->input->post('idapt2');
		$HARIA = $this->input->post('cbhari2');
		$JAMA = $this->input->post('cbjam2');
		
		$updateJApoteker = $this->m_jadwal->updateJadwalApoteker($HARIA, $JAMA, $IDJADWALA);

		//redirect(base_url().'jadwal?success==updatesuccess');
		redirect(base_url()."jadwal/showJadwalApoteker/".$IDAPOTEKER);
	}
	//=======================================================E N D  O F  A P O T E K E R ========================================================================

	//=============================================================== K A R Y A W A N ========================================================================

	public function validasiKaryawan(){


		$idkar = $this->input->post('idkar');

		$cek = $this->isValid($idkar);

		if($cek == "null"){
			redirect(base_url().'jadwal/karyawan?error=idkaryawannull');
		}

		else if($cek == "symbolerror"){
			redirect(base_url().'jadwal/karyawan?error=symbolerror');
		}

		else {
			
			$this->tampilKaryawan($idkar);
		}

	}

	public function validasiKaryawan2(){

		//$idjadwal = $this->input->post('idjadwal');
		$cb_hari = $this->input->post('cbhari');
		$cb_jam = $this->input->post('cbjam');

		//$cekjadwal = $this->isValid($idjadwal);
		$cekhari = $this->isValidHari($cb_hari);
		$cekjam = $this->isValidJam($cb_jam);


		if ($this->input->post('submit')=='add'){
			if($cb_hari == false){
				redirect(base_url().'jadwal/karyawan?error=cbharinull');
			}

			else if($cb_jam == false){
				redirect(base_url().'jadwal/karyawan?error=cbjamnull');
			}

			else {
				
				$this->inputJadwalKaryawan();
			}
		}

		else if($this->input->post('submit')=='edit'){
			echo "Fitur ini belum ada";
		}
	}

	public function generateIdJadwalK(){
		$this->load->model('m_jadwal');

		$id = $this->m_jadwal->countIdJadwalK() + 1;

		if($id < 10){
			$id = "JK00".$id;
		}
		else if($id < 100){
			$id = "JK0".$id;
		}
		else if($id < 1000){
			$id = "JK".$id;
		}

		return $id;
	}

	public function tampilKaryawan($idkar){
		$this->header[3] = "active"; //untuk indikasi active header

		$this->load->database();

		$idkar = $this->input->post('idkar');

		$this->load->model("m_jadwal");

		$query = $this->m_jadwal->getKaryawan($idkar);

		if($query->num_rows() > 0) {
			$ro = $query->row();
			
				$data = array(
					"idkaryawan"=>$ro->ID_KARYAWAN, 
					"namakaryawan"=>$ro->NAMA_K, 
					"idjadwalk"=>$this->generateIdJadwalK(),
					"lihatjadwalkar"=>$this->m_jadwal->getDataKaryawan());

				$this->session->set_flashdata("idkaryawan", $ro->ID_KARYAWAN);

				$this->load->view("v_header_owner");
				$this->load->view("jadwal/v_content_karyawan", $data);
				$this->load->view("v_footer");	
		}

		else{
			redirect(base_url().'jadwal/karyawan?error=notfound');
		}
	}

	private function inputJadwalKaryawan(){
		$this->header[3] = "active"; //untuk indikasi active header

		$this->load->model('m_jadwal');

		$IDJADWALK = $this->generateIdJadwalK();
		$IDKARYAWAN = $this->input->post('idkaryawan');
		$HARIK = $this->input->post('cbhari');
		$JAMK = $this->input->post('cbjam');

		$inputKaryawan = $this->m_jadwal->insertJadwalKaryawan($IDJADWALK, $IDKARYAWAN, $HARIK, $JAMK);

		$this->showJadwalKaryawan($IDKARYAWAN);
	}

	public function showJadwalKaryawan($idkar){
		$this->header[3] = "active"; //untuk indikasi active header

		$this->load->database();
		$this->load->model("m_jadwal");

		$idkar = $this->input->post('idkaryawan');

		$data= array("idkaryawan"=>null, "idjadwalk"=>null,"namakaryawan"=>null, "lihatjadwalkar"=>$this->m_jadwal->getDataKaryawan());		

		$this->load->view("v_header_owner");
		$this->load->view("jadwal/v_content_karyawan", $data);
		$this->load->view("v_footer");
	}

	public function hapusJadwalKaryawan($idJadwalK){

		$this->load->database();

		$IDKARYAWAN = $this->input->post('idkaryawan');

		$this->load->model('m_jadwal');	

		$deleteKaryawan = $this->m_jadwal->deleteJadwalKaryawan($idJadwalK);

		$this->showJadwalKaryawan($IDKARYAWAN);

	}

	public function editJadwalKaryawan($IDJADWALK){
		$this->header[3] = "active"; //untuk indikasi active header

		 $this->load->database();
		 $this->load->model('m_jadwal');

		 $IDKARYAWAN = $this->input->post('idapt2');

		 $query = $this->m_jadwal->getIDJadwalKaryawan($IDJADWALK);
	 	 $ro = $query->row();	
		 $data["idkar2"] = $ro->ID_KARYAWAN;
		 $data['idjadwal2'] = $ro->ID_JADWAL_KRYN;
		 $data["lihatjadwalkar"]= $this->m_jadwal->getDataKaryawan();

		 $this->load->view("v_header_owner");
		 $this->load->view("jadwal/v_content_edit_karyawan", $data);
		 $this->load->view("v_footer");

	}

	public function updateJadwalK(){
		$this->header[3] = "active"; //untuk indikasi active header

		$this->load->model('m_jadwal');

		$IDJADWALK = $this->input->post('idjadwal2');
		$IDKARYAWAN = $this->input->post('idkar2');
		$HARIK = $this->input->post('cbhari2');
		$JAMK = $this->input->post('cbjam2');
		
		$updateJApoteker = $this->m_jadwal->updateJadwalKaryawan($HARIK, $JAMK, $IDJADWALK);

		//redirect(base_url().'jadwal?success==updatesuccess');
		redirect(base_url()."jadwal/showJadwalKaryawan/".$IDKARYAWAN);
	}	
	//=======================================================E N D  O F  K A R Y A W A N ========================================================================	
	
}
