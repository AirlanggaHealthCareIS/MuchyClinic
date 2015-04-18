<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crawatinap extends CI_Controller {
	public function index()
	{
		$data = array("id_pasien"=> " ", "nama_pasien"=> " ", "no_telp_pas"=> " ");

		$this->load->view('v_header');
		$this->load->view('rawatinap/rawatinap', $data);
		$this->load->view('v_n_footer');	
		
	}

	public function forminap()
	{
		$data = array("id_pasien"=> " ", "nama_pasien"=> " ", "no_telp_pas"=> " ");

		$this->load->view('v_header');
		$this->load->view('rawatinap/rawatinap', $data);
		$this->load->view('v_n_footer');
	}
	public function daftarinap()
	{

		// $this->load->database();
		// $this->load->model('mrawatinap');
		// $query = $this->mrawatinap->getinap();
		// $ro = $query->row();
		$this->load->database();
		$data[] = $this->mrawatinap->getinap();

		$this->load->view('v_header');
		$this->load->view('rawatinap/daftarinap');
		$this->load->view('v_n_footer');
	}
	public function validasi()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$id= $this->input->post('id_pasien');
		if ($id == null || $id == ""){
			// echo "kossoonngg!!!, isien disik";
			redirect(base_url().'crawatinap?error=null 	');
		}
		else {
			$this->tampilid($id);
			
		}
	}

	public function tampilid($id){
		$this->load->database();
		
		$id = $this->input->post('id_pasien');
		$this->load->model('mrawatinap');
		$query = $this->mrawatinap->getcariid($id);
		$ro = $query->row();
		$data = array("id_pasien"=> $ro->ID_PASIEN, "nama_pasien"=> $ro->NAMA_PASIEN, "no_telp_pas"=> $ro->NO_TLP_PAS_);

		$this->load->view('v_header');
		$this->load->view('rawatinap/rawatinap', $data);
		$this->load->view('v_n_footer');
	}

	// public function contomodel(){
	// 	$this->load->database();
	// 	$this->load->model('mrawatinap');
	// 	$call = $this->mrawatinap->getcariid(1);
	// 	$ro = $call->row();
	// 	echo $ro->NAMA_PASIEN;
	// }
	// public function rawat()
	// {
	// 	$this->load->view('v_header');
	// 	$this->load->view('rawatinap/rawatinap');
	// 	$this->load->view('v_n_footer');
		
	// }
	// public function menurawatinap()
	// {
	// 	$this->load->view('v_header');
	// 	$this->load->view('rawatinap/menurawatinap');
	// 	$this->load->view('v_n_footer');
	// }

	// hanya mencoba
	// public function doRegRawatInap()
	// {
	// 	$required = array('nim', 'nama', 'alamat_as', 'kota', 'provinsi', 'telp', 'fak', 'email', 'jalur', 'nm_ayah', 'al_ayah', 'telp_ayah', 'pkrjn_ayah', 'nm_ibu', 'al_ibu', 'telp_ibu', 'pkrjn_ibu', 'hsl_ibu', 'jml_anak');
 //        $error = false;
 //        foreach ($required as $field) {
 //            if (empty($_POST[$field])) {
 //                $error = true;
 //            }
 //        }
 //        if (!$error) {
 //            $nim = $_POST['nim'];
 //            $nama = $_POST['nama'];
 //            $alamat = $_POST['alamat_as'];
 //            $kota = $_POST['kota'];
 //            $provinsi = $_POST['provinsi'];
 //            $telp = $_POST['telp'];
 //            $fakultas = $_POST['fak'];
 //            $mail = $_POST['email'];
 //            $jalur = $_POST['jalur'];
 //            $nm_ayah = $_POST['nm_ayah'];
 //            $almt_ayah = $_POST['al_ayah'];
 //            $telp_ayah = $_POST['telp_ayah'];
 //            $pkrjn_ayah = $_POST['pkrjn_ayah'];
 //            $nm_ibu = $_POST['nm_ibu'];
 //            $almt_ibu = $_POST['al_ibu'];
 //            $telp_ibu = $_POST['telp_ibu'];
 //            $pkrjn_ibu = $_POST['pkrjn_ibu'];
 //            $gaji_ortu = $_POST['hsl_ibu'];
 //            $anak = $_POST['jml_anak'];
 //            $foto = $_FILES['photo']['tmp_name'];
 //            $foto1 = $_FILES['photo1']['tmp_name'];
 //            $foto2 = $_FILES['photo2']['tmp_name'];
 //            $foto3 = $_FILES['photo3']['tmp_name'];
 //            $tgldftr = date('Y-m-d');
 //            parent::loadModel('Registrasi');
 //            $this->model->insertRegistrasi($nim, $nama, $alamat, $kota, $provinsi, $telp, $fakultas, $mail, $jalur, $nm_ayah, $almt_ayah, $telp_ayah, $pkrjn_ayah, $nm_ibu, $almt_ibu, $telp_ibu, $pkrjn_ibu, $gaji_ortu, $anak, $foto, $foto1, $foto2, $foto3, $tgldftr);
 //            echo "<script type='text/javascript'>alert('Input Succesfully!')</script>";
 //            $this->view->renderAdm('administrator/registrasi');
 //        } else {
 //            echo "<script type='text/javascript'>alert('Check your input!')</script>";
 //            $this->view->renderAdm('administrator/registrasi');
 //        }
	// }
}
