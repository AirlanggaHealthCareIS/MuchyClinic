<?php
class Backup extends CI_Controller{
public function __construct()
{
	parent::__construct();
	$this->load->helper(array('download','file'));
}
		public function index(){
		redirect('backup');
		$this->load->view('v_header');
		$this->load->view('backup');
		}
		public function backup(){
			$now = date('d-m-Y');
			$this->load->dbutil();
			$config = array(
			'tables'=>array(
						'absensi',
						'apoteker',
						'bagian',
						'bayar_obat',
						'bayar_periksa',
						'bayar_rawat_inap',
						'detail_obat_keluar',
						'detail_obat_masuk',
						'detail_periksa',
						'detail_rawat_inap',
						'deatil_resep',
						'dokter',
						'jabatan',
						'jadwal_dokter',
						'jadwal_apoteker',
						'jadwal_karyawan',
						'jenis_dokter',
						'kamar',
						'karyawan',
						'obat',
						'obat_keluar',
						'obat_masuk',
						'pasien',
						'pemeriksaan',
						'penyakit',
						'rawat_inap',
						'rekam_medis',
						'resep',
						'supplier',
						'tindakan',
						'waiting_list'),
			'format'=>'txt',
			'filename'=>'backup.sql'
			);

			$backup =& $this->dbutil->backup($config);
			$file_name = 'backup-'.$now.'.sql';
			force_download($file_name, $backup);
}
}