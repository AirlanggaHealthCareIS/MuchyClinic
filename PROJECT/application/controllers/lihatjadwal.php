 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lihatjadwal extends CI_Controller {

	public function Lihatjadwal(){
		parent::__construct();

		$this->load->model("m_jadwal");
		$this->load->model('m_lihatjadwal');
		$this->load->model('m_getdata');

		$this->id='A0001';
		$this->id_user = "";
		//$this->id = "";
		$this->idaaktor = substr($this->id,0,1);

	}

	public function logoutapoteker(){
		$this->session->unset_userdata('username_apoteker');
		redirect(base_url()."login_apoteker");

	}
	public function logoutdokter(){
		$this->session->unset_userdata('username_dokter');
		redirect(base_url()."login_dokter");

	}
	public function logoutadmin(){
		$this->session->unset_userdata('username_admin');
		redirect(base_url()."login_admin");

	}

	public function index()
	{	
		//$id = 'D0001';
        // $data = array("ida"=>$this->id, "nama"=>"", "lihatjadwal"=>null); //tampil data di tabel


		if($this->idaaktor == "D"){
			$this->showDokter($this->id);
		}
		else if($this->idaaktor == "A"){
			$this->showApoteker($this->id);
		}
		else if($this->idaaktor == "K"){
			$this->showKaryawan($this->id);
		}

		// $this->load->view("v_header");
		// $this->load->view("lihatjadwal/v_content", $data);
		// $this->load->view("v_footer");

	}

	public function validasi(){
		
		if($this->idaaktor == "D"){
			$this->showDokter($this->id);
		}
		else if($this->idaaktor == "A"){
			$this->showApoteker($this->id);
		}
		else if($this->idaaktor == "K"){
			$this->showKaryawan($this->id);
		}
	}  

	public function showApoteker() {
		
		$this->load->database();

		$this->idaaktor = "A";

		$this->load->model('m_lihatjadwal');
		$this->load->model('m_getdata');
		$this->header[0] = "active"; //untuk indikasi active header
		
		if (($this->session->userdata('username_apoteker'))=="" || ($this->session->userdata('username_apoteker'))==null) {
			redirect(base_url()."login_apoteker");
		}
		$this->user = $this->session->userdata('username_apoteker');

		$query = $this->m_lihatjadwal->getApoteker($this->user); //ambil data
		$ro = $query->row();
		// echo $ro->ID_APOTEKER;
		$data = array(
			"idaaktor"=>$this->idaaktor, "ida"=>$ro->ID_APOTEKER, "nama"=>$ro->NAMA_APOTEKER, "lihatjadwal"=>$this->m_lihatjadwal->getDataApoteker($ro->ID_APOTEKER)
		); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header_apoteker");
		$this->load->view("lihatjadwal/v_content", $data);
		$this->load->view("v_footer");

	}

	public function showDokter() {
		$this->load->database();

		$this->idaaktor = "D";
		
		$this->load->model('m_lihatjadwal');
		$this->load->model('m_getdata');
		$this->header[0] = "active"; //untuk indikasi active header	
		
		if (($this->session->userdata('username_dokter'))=="" || ($this->session->userdata('username_dokter'))==null) {
			redirect(base_url()."login_dokter");
		}
		$this->user = $this->session->userdata('username_dokter');

		$query = $this->m_lihatjadwal->getDokter($this->user); //ambil data
		$ro = $query->row();

		$data = array(
			"idaaktor"=>$this->idaaktor, "ida"=>$ro->ID_DOKTER, "nama"=>$ro->NAMA_DOKTER, "lihatjadwal"=>$this->m_lihatjadwal->getDataDokter($ro->ID_DOKTER)
			); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header_dokter");
		$this->load->view("lihatjadwal/v_content", $data);
		$this->load->view("v_footer");

	}

	public function showKaryawan() {
		$this->header[0] = "active"; //untuk indikasi active header

		$this->idaaktor = "K";
		
		$this->load->database();

		//$id = $this->input->post('id_aktor');
		
		$this->load->model('m_lihatjadwal');
		$this->load->model('m_getdata');
		$this->id_user = "";
		
		if (($this->session->userdata('username_admin'))=="" || ($this->session->userdata('username_admin'))==null) {
			redirect(base_url()."login_admin");
		}
		$this->user = $this->session->userdata('username_admin');

		$query = $this->m_lihatjadwal->getKaryawan($this->user); //ambil data
		$ro = $query->row();

		$data = array("idaaktor"=>$this->idaaktor, "ida"=>$ro->ID_KARYAWAN, "nama"=>$ro->NAMA_K, "lihatjadwal"=>$this->m_lihatjadwal->getDataKaryawan($ro->ID_KARYAWAN)); //tampil data di tabel dan ambil nilai

		$this->load->view("v_header");
		$this->load->view("lihatjadwal/v_content", $data);
		$this->load->view("v_footer");

	}

}