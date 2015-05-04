<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function index()
	{
		$this->load->model("m_jadwal");

        $data = array("ida"=>"", "nama"=>"", 
        "iddokter"=>"", "namadokter"=>"", 
        "idkaryawan"=>"", "namakaryawan"=>"",
        "idapoteker"=>"", "namaapoteker"=>"",
        "lihatjadwalapt"=>null,
        "lihatjadwaldok"=>null,
        "lihatjadwalkar"=>null); //tampil data di tabel

        //"lihatjadwalapt"=>$this->m_jadwal->getAllData(),

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content_dokter", $data);
		$this->load->view("v_footer");

    }

	public function validasi()
	{
		$id = $this->input->post('idaktor');
		$cb_aktor = $this->input->post('cbaktor');
		$cb_bagian = $this->input->post('cbbagian');
		$cb_hari = $this->input->post('cbhari');
		$cb_jam = $this->input->post('cbjam');

		if ($id==null || $id=="") {
			redirect(base_url().'jadwal?error=null');
		}

		else if($cb_aktor=="0"){
			redirect(base_url().'jadwal?error=cbaktornull');
		}

		else if($cb_bagian=="0"){
			redirect(base_url().'jadwal?error=cbbagiannull');
		}

		else if($cb_hari=="0"){
			redirect(base_url().'jadwal?error=cbharinull');
		}

		else if($cb_jam=="0"){
			redirect(base_url().'jadwal?error=cbjamnull');
		}

		else {
			
			$this->tampil($id);
		}
	}

	public function validasiDokter(){

		$iddokter = $this->input->post('iddok');
		

		if($iddokter==null || $iddokter==""){
			redirect(base_url().'jadwal?error=iddokternull');

		}

		else if(preg_match('/[^a-z0-9]/i', $iddokter)){
			redirect(base_url().'jadwal?error=symbolerror');
		}

		else {
			
			$this->tampilDokter($iddokter);
		}
	}

	public function validasiDokter2(){
		
		$idjadwal = $this->input->post('idjadwal');
		$cb_hari = $this->input->post('cbhari');
		$cb_jam = $this->input->post('cbjam');

		if ($this->input->post('submit')=='add') {
			if ($idjadwal==null || $idjadwal=="") {
				redirect(base_url().'jadwal?error=idjadwalnull');
			}

			else if($cb_hari=="0"){
				redirect(base_url().'jadwal?error=cbharinull');
			}

			else if($cb_jam=="0"){
				redirect(base_url().'jadwal?error=cbjamnull');
			}

			else{
				$this->inputJadwalDokter();
			}
		}
		else if ($this->input->post('submit')=='edit') {
			echo "Fitur ini belum dibuat";
		}

	}

	public function validasiKaryawan(){

		$idkar = $this->input->post('idkar');

		if($idkar==null || $idkar==""){
			redirect(base_url().'jadwal?error=idkaryawannull');
		}

		else if(preg_match('/[^a-z0-9]/i', $idkar)){
			redirect(base_url().'jadwal?error=symbolerror');
		}

		else {
			
			$this->tampilKaryawan($idkar);
		}

	}

	public function validasiKaryawan2(){

		$idjadwal = $this->input->post('idjadwal');
		$cb_hari = $this->input->post('cbhari');
		$cb_jam = $this->input->post('cbjam');


		if ($this->input->post('submit')=='add'){
			if ($idjadwal==null || $idjadwal=="") {
				redirect(base_url().'jadwal?error=idjadwalnull');
			}

			else if($cb_hari=="0"){
				redirect(base_url().'jadwal?error=cbharinull');
			}

			else if($cb_jam=="0"){
				redirect(base_url().'jadwal?error=cbjamnull');
			}

			else {
				
				$this->inputJadwalKaryawan();
			}
		}

		else if($this->input->post('submit')=='edit'){
			echo "Fitur ini belum ada";
		}
		

	}

	public function validasiApoteker(){

		$this->load->model('m_jadwal');

		$data= array("idapoteker"=>null, "namaapoteker"=>null, "lihatjadwalapt"=>$this->m_jadwal->getDataApoteker());

		$idapt = $this->input->post('idapt');

		if($idapt==null || $idapt==""){
			redirect(base_url().'jadwal?error=idapotekernull');

		}

		else if(preg_match('/[^a-z0-9]/i', $idapt)){
			redirect(base_url().'jadwal?error=symbolerror');
		}

		else {
			
			$this->tampilApoteker($idapt);
		}
	}

	public function validasiApoteker2(){

		$this->load->model('m_jadwal');

		$idjadwal = $this->input->post('idjadwal');
		$cb_hari = $this->input->post('cbhari');
		$cb_jam = $this->input->post('cbjam');

		if($this->input->post('submit')=='add'){
			if ($idjadwal==null || $idjadwal=="") {
				redirect(base_url().'jadwal?error=idjadwalnull');
			}

			else if($cb_hari=="0"){
				redirect(base_url().'jadwal?error=cbharinull');
			}

			else if($cb_jam=="0"){
				redirect(base_url().'jadwal?error=cbjamnull');
			}

			else {
			
				$this->inputJadwalApoteker();
			}
		}
		else if($this->input->post('submit')=='edit'){
			echo "Fitur ini belum ada";
		}

	}

	public function tampil($id)
	{
		$this->load->database();

		$id = $this->input->post('idaktor');
		
		$this->load->model("m_jadwal");
		
		$query = $this->m_jadwal->getAktor($id); //ambil data
        $ro = $query->row();

		$data = array("ida"=>$ro->ID_APOTEKER, "nama"=>$ro->NAMA_APOTEKER); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content", $data);
		$this->load->view("v_footer");
       	
	}

	public function tampilDokter($iddokter){
		$this->load->database();

		$iddokter = $this->input->post('iddok');

		$this->load->model("m_jadwal");

		$query = $this->m_jadwal->getIDDokter($iddokter);
		
		if($query->num_rows() > 0) {
			$ro = $query->row();	

			$query1 = $this->m_jadwal->getDokter($iddokter);
			if($query1->num_rows() > 0) {
				$data = array(
					"iddokter"=>$ro->ID_DOKTER, 
					"namadokter"=>$ro->NAMA_DOKTER, 
					"lihatjadwaldok"=>$this->m_jadwal->getDataDokter());

				$this->load->view("v_header");
				$this->load->view("jadwal/v_content_dokter", $data);
				$this->load->view("v_footer");	

			}
			else{
				redirect(base_url().'jadwal?error=apaya');
			}
		}
		else{
			redirect(base_url().'jadwal?error=notfound');
		}

		

			
	}

	public function tampilKaryawan($idkar){
		$this->load->database();

		$idkar = $this->input->post('idkar');

		$this->load->model("m_jadwal");

		$query = $this->m_jadwal->getKaryawan($idkar);
		$ro = $query->row();

		$data = array("idkaryawan"=>$ro->ID_KARYAWAN, "namakaryawan"=>$ro->NAMA_K, "lihatjadwalkar"=>$this->m_jadwal->getDataKaryawan());

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content_karyawan", $data);
		$this->load->view("v_footer");
	}

	public function tampilApoteker($idapt){
		$this->load->database();

		$idapt = $this->input->post('idapt');

		$this->load->model("m_jadwal");

		$query = $this->m_jadwal->getApoteker($idapt);
		$ro = $query->row();

		$data = array("idapoteker"=>$ro->ID_APOTEKER, "namaapoteker"=>$ro->NAMA_APOTEKER, "lihatjadwalapt"=>$this->m_jadwal->getDataApoteker());

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content_apoteker", $data);
		$this->load->view("v_footer");
	}

	private function inputJadwalDokter(){
		$this->load->model('m_jadwal');

		$IDJADWALD = $this->input->post('idjadwal');
		$IDDOKTER = $this->input->post('iddokter');
		$HARID = $this->input->post('cbhari');
		$JAMD = $this->input->post('cbjam');

		$inputJDokter = $this->m_jadwal->insertJadwalDokter($IDJADWALD, $IDDOKTER, $HARID, $JAMD);

		$this->showJadwalDokter($IDDOKTER);

	}

	public function showJadwalDokter($iddok){
		$this->load->database();

		$iddok = $this->input->post('iddokter');

		$this->load->model('m_jadwal');

		$data= array("iddokter"=>null, "namadokter"=>null, "lihatjadwaldok"=>$this->m_jadwal->getDataDokter());

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content_dokter", $data);
		$this->load->view("v_footer");
	}

		private function inputJadwalApoteker(){
		$this->load->model('m_jadwal');

		$IDJADWALA = $this->input->post('idjadwal');
		$IDAPOTEKER = $this->input->post('idapoteker');
		$HARIA = $this->input->post('cbhari');
		$JAMA = $this->input->post('cbjam');

		$inputJApoteker = $this->m_jadwal->insertJadwalApoteker($IDJADWALA, $IDAPOTEKER, $HARIA, $JAMA);

		$this->showJadwalApoteker($IDAPOTEKER);
		
	}

	public function showJadwalApoteker($idapt){
		$this->load->database();

		$idapt = $this->input->post('idapoteker');

		$this->load->model("m_jadwal");

		$data= array("idapoteker"=>null, "namaapoteker"=>null, "lihatjadwalapt"=>$this->m_jadwal->getDataApoteker());

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content_apoteker", $data);
		$this->load->view("v_footer");
	}

	private function inputJadwalKaryawan(){
		$this->load->model('m_jadwal');

		$IDJADWALK = $this->input->post('idjadwal');
		$IDKARYAWAN = $this->input->post('idkaryawan');
		$HARIK = $this->input->post('cbhari');
		$JAMK = $this->input->post('cbjam');

		$inputKaryawan = $this->m_jadwal->insertJadwalKaryawan($IDJADWALK, $IDKARYAWAN, $HARIK, $JAMK);

		$this->showJadwalKaryawan($IDKARYAWAN);
	}

	public function showJadwalKaryawan($idkar){
		$this->load->database();

		$idkar = $this->input->post('idkaryawan');

		$data= array("idkaryawan"=>null, "namakaryawan"=>null, "lihatjadwalkar"=>$this->m_jadwal->getDataKaryawan());		

		$this->load->view("v_header");
		$this->load->view("jadwal/v_content_karyawan", $data);
		$this->load->view("v_footer");
	}



	
}
