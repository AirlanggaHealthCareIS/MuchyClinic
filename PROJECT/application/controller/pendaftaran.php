<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class pendaftaran extends CI_Controller {



	function pendaftaran()
	{
		parent::__construct();
		$this->header[1] = "active"; //untuk indikasi active header
		$this->id_user = "";
		
		if (($this->session->userdata('username_admin'))=="" || ($this->session->userdata('username_admin'))==null) {
			redirect(base_url()."login_admin");
		}

		$this->id_genarate = $this->generateIdPasien();
		// $this->user = $this->session->userdata('username_admin');
		// echo "Joko";
	}

	public function index()
	{
		$this->load->view('v_header_admin');
		$this->load->view('pendaftaran/v_content');
		$this->load->view('v_footer');
	}


	public function index2()
	{
		$this->load->database();
		$daftarpasien = $this->input->post('carinama');
		$this->load->model('m_pendaftaranpasien');
		
		$ambil = $this->m_pendaftaranpasien->getdatapasien($daftarpasien);
		$newambil = $ambil->result();
		// foreach ($q as $re) {
		// 	echo "<br>".$re->ID_PASIEN;
		// 	echo "<br>".$re->NAMA_PASIEN;
		// }

		// $databaru['isidata'] = $newambil;
		$databaru = array('isidata'=>$newambil);

		$this->load->view('v_header_admin');
		$this->load->view('pendaftaran/v_detail', $databaru);
		$this->load->view('v_footer');
		// echo "indra";
	}


	public function validasi()
	{

			$id_pasien = $this->input->post('id_pasien');  //1
			$nama_pasien = $this->input->post('nama_pasien');  //2
			$jenis_kelamin = $this->input->post('jenis_kelamin');  //3
			$tempat_lahir = $this->input->post('tempat_lahir');  //4
			$tanggal_lahir = $this->input->post('tanggal_lahir');  //5
			$Alamat = $this->input->post('alamat');  //6
			$agama = $this->input->post('Agama');  //7
			$pekerjaan = $this->input->post('pekerjaan');  //8
			$telepon = $this->input->post('telepon');  //9
			$hp = $this->input->post('handphone');  //10
			$goldarah = $this->input->post('goldarah');  //11
			$hubungan = $this->input->post('hubungan');  //12
			$pembayaran = $this->input->post('Pembayaran');  //13
			// $tanggungan_ibu = $_POST['tanggungan_ibu'];  //14
			$tanggal_pendaftaran = $this->input->post('tanggal_pendaftaran');  //15
			// $keluhan = $this->input->post('keluhan');  //16

			$isvalid=$this->inputvalidasi($id_pasien, $nama_pasien, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $Alamat, $agama, $pekerjaan, $telepon, $hp, $goldarah, $hubungan, $pembayaran, $tanggal_pendaftaran);

		//echo $id; 
			if ($isvalid == "error=null"){
			//echo "Maaf Fild Kosong! Silahkan Input Data Pasien Dengan Benar.";
				redirect(base_url().'pendaftaran?error=null');
			}

			else if ($isvalid=="TRUE") {

				$this->save();
				redirect(base_url().'pendaftaran?sukses=benar');

			// $this->load->view('v_header');
			// $this->load->view('pendaftaran/v_content');
			// $this->load->view('v_footer');
			// echo "Selamat.";


			}


		// $carinama = $this->input->post("carinama");

		// if($carinama==null || $carinama==""){
		// // echo "maaf anda gagal" ;
		// redirect(base_url().'pendaftaran?error=null');
		// }
		// else{
		// 	echo $carinama;
		// }

		// echo"hello";
		}


		public function inputvalidasi($id_pasien, $nama_pasien, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $Alamat, $agama, $pekerjaan, $telepon, $hp, $goldarah, $hubungan, $pembayaran, $tanggal_pendaftaran){

			if ($id_pasien==null || $nama_pasien==null || $jenis_kelamin==null || $tempat_lahir==null || $tanggal_lahir==null || $Alamat==null || $agama==null || $pekerjaan==null || $telepon==null || $hp==null || $goldarah==null || $hubungan==null || $pembayaran==null || $tanggal_pendaftaran==null){

				return "error=null" ;

			}

			else {

				return "TRUE" ;

			}

		}

		public function testing () {

			$this->load->library ('unit_test');
			$this->unit->run($this->inputvalidasi("", "", "", "", "", "", "", "", "", "", "", "", "", " ", ""),"error=null", "idkosong") ;
			$this->unit->run($this->inputvalidasi("p0001", "Dony Prasetiyo", "Laki_laki", "samarinda", "12/04/1995", "bungtomo gangreel", "islam", "designer", "081211611039", "085350013118", "ab", "anak kandung", "cash", "11/10/2015", "ngelu"),"TRUE", "ada isinya");
			echo $this->unit->report();
		}


		public function save(){
		// include("koneksi.php");
		// error_reporting(0);
		// if (isset ($_POST['submit'])){
			// $this->load->helper(array('form','url'));
			// $this->load->library('form_validation');
			// $this->load->database();
			
			$id_pasienkr = $this->input->post('id_pasien');  //1
			$nama_pasienkr = $this->input->post('nama_pasien');  //2
			$jenis_kelaminkr = $this->input->post('jenis_kelamin');  //3
			$tempat_lahirkr = $this->input->post('tempat_lahir');  //4
			$tanggal_lahirkr = $this->input->post('tanggal_lahir');  //5
			$Alamatkr = $this->input->post('alamat');  //6
			$agamakr = $this->input->post('Agama');  //7
			$pekerjaankr = $this->input->post('pekerjaan');  //8
			$teleponkr = $this->input->post('telepon');  //9
			$hpkr = $this->input->post('handphone');  //10
			$goldarahkr = $this->input->post('goldarah');  //11
			$hubungankr = $this->input->post('hubungan');  //12
			$pembayarankr = $this->input->post('Pembayaran');  //13
			// $tanggungan_ibu = $_POST['tanggungan_ibu'];  //14
			$tanggal_pendaftarankr = $this->input->post['tanggal_pendaftaran'];  //15
			// $keluhankr = $this->input->post('keluhan');  //16
			// $tgldftr = date('Y-m-d');  //17
					// $tgldftr = date('Y-m-d');

			$this->load->model("m_pendaftaranpasien");
			$inputX = $this->m_pendaftaranpasien->insert($id_pasienkr,$nama_pasienkr,$tempat_lahirkr,$tanggal_lahirkr,$Alamatkr,$teleponkr,$goldarahkr,$jenis_kelaminkr,$pekerjaankr,$agamakr,$hpkr,$hubungankr,$pembayarankr,$tanggal_pendaftarankr);

			// $query = $this->db->query("INSERT INTO pendaftaran(id_pasien, nama_pasien, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, rt_rw, kelurahan, kecamatan, kota, agama, pekerjaan, telepon, hp, penanggung, hubungan, type_pembayaran, tanggungan_ibu, tanggal_pendaftaran, keterangan) VALUES ('".$id_pasien."','".$nama_pasien."','".$jenis_kelamin."','".$tempat_lahir."','".$tanggal_lahir."','".$Alamat."','".$rt_rw."','".$kelurahan."','".$kecamatan."','".$kota."','".$Agama."','".$pekerjaan."','".$telepon."','".$Hp."','".$penanggung."','".$hubungan."','".$Pembayaran."','".$tanggungan_ibu."','".$tanggal_pendaftaran."','".$keterangan."')");
			// echo "id pasien = ".$id_pasien;


			// if(!empty($id_pasien) && !empty($nama_pasien) && !empty($jenis_kelamin) && !empty($tempat_lahir) && !empty($tanggal_lahir) && !empty($Alamat) && !empty($rt_rw) && !empty($kelurahan) && !empty($kecamatan) && !empty($kota) && !empty($Agama) && !empty($pekerjaan) && !empty($telepon) && !empty($Hp) && !empty($penanggung) && !empty($hubungan) && !empty($Pembayaran) && !empty($tanggungan_ibu) && !empty($tanggal_pendaftaran) && !empty($keterangan) ) {



			// 	$query = "INSERT INTO pendaftaran(id_pasien, nama_pasien, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, rt_rw, kelurahan, kecamatan, kota, agama, pekerjaan, telepon, hp, penanggung, hubungan, type_pembayaran, tanggungan_ibu, tanggal_pendaftaran, keterangan) VALUES ('".$id_pasien."','".$nama_pasien."','".$jenis_kelamin."','".$tempat_lahir."','".$tanggal_lahir."','".$Alamat."','".$rt_rw."','".$kelurahan."','".$kecamatan."','".$kota."','".$Agama."','".$pekerjaan."','".$telepon."','".$Hp."','".$penanggung."','".$hubungan."','".$Pembayaran."','".$tanggungan_ibu."','".$tanggal_pendaftaran."','".$keterangan."')";

			// 	if (mysql_query($query, $link)===TRUE){
			// 			echo "Database berhasil";
			// 	}
			// 	else{
			// 			echo "GAGAL ".mysql_errno($link)." ".mysql_error($link);
			// 	}

			// }
			// else {
			// 	echo "Data tdk invalid";
			// }
		// }

		}


		public function tampil()
		{
			$this->load->database();

			$this->load->model('m_pendaftaranpasien');

			$ambil = $this->m_pendaftaranpasien->getdatapasien();
			$newambil = $ambil->result();
		// foreach ($q as $re) {
		// 	echo "<br>".$re->ID_PASIEN;
		// 	echo "<br>".$re->NAMA_PASIEN;
		// }

			$databaru['isidata'] = $newambil;


			$this->load->view('v_header_admin');
			$this->load->view('pendaftaran/v_detail', $databaru);
			$this->load->view('v_footer');
		}

		public function hitung ($a,$b) {
			return $a+$b;
		}

		public function generateIdPasien(){
			$this->load->model('m_pendaftaranpasien');
			$id = $this->m_pendaftaranpasien->countPasien();
			$id = $id + 1;
			if ($id<10) {
				$id = "P000".$id;
			}
			else if ($id<100) {
				$id = "P00".$id;
			}
			else if ($id<1000) {
				$id = "P0".$id;
			}
			else if ($id<10000) {
				$id = "P".$id;
			}
			return $id;
		}

	}

