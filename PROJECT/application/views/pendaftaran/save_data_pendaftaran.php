<?php 

include("koneksi.php");
error_reporting(0);
if (isset ($_POST['submit'])){
	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$Alamat = $_POST['alamat'];
	$rt_rw = $_POST['rt_rw'];
	$kelurahan = $_POST['kelurahan'];
	$kecamatan = $_POST['kecamatan'];
	$kota = $_POST['kota'];
	$Agama = $_POST['Agama'];
	$pekerjaan = $_POST['pekerjaan'];
	$telepon = $_POST['telepon'];
	$Hp = $_POST['handphone'];
	$penanggung = $_POST['penanggung'];
	$hubungan = $_POST['hubungan'];
	$Pembayaran = $_POST['Pembayaran'];
	$tanggungan_ibu = $_POST['tanggungan_ibu'];
	$tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
	$keterangan = $_POST['keterangan'];
	// $tgldftr = date('Y-m-d');

	if(!empty($id_pasien) && !empty($nama_pasien) && !empty($jenis_kelamin) && !empty($tempat_lahir) && !empty($tanggal_lahir) && !empty($Alamat) && !empty($rt_rw) && !empty($kelurahan) && !empty($kecamatan) && !empty($kota) && !empty($Agama) && !empty($pekerjaan) && !empty($telepon) && !empty($Hp) && !empty($penanggung) && !empty($hubungan) && !empty($Pembayaran) && !empty($tanggungan_ibu) && !empty($tanggal_pendaftaran) && !empty($keterangan) ) {
		
		
		
		$query = "INSERT INTO pendaftaran(id_pasien, nama_pasien, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, rt_rw, kelurahan, kecamatan, kota, agama, pekerjaan, telepon, hp, penanggung, hubungan, type_pembayaran, tanggungan_ibu, tanggal_pendaftaran, keterangan) VALUES ('".$id_pasien."','".$nama_pasien."','".$jenis_kelamin."','".$tempat_lahir."','".$tanggal_lahir."','".$Alamat."','".$rt_rw."','".$kelurahan."','".$kecamatan."','".$kota."','".$Agama."','".$pekerjaan."','".$telepon."','".$Hp."','".$penanggung."','".$hubungan."','".$Pembayaran."','".$tanggungan_ibu."','".$tanggal_pendaftaran."','".$keterangan."')";
		
		if (mysql_query($query, $link)===TRUE){
				echo "Database berhasil";
		}
		else{
				echo "GAGAL ".mysql_errno($link)." ".mysql_error($link);
		}
		
	}
	else {
		echo "Data tdk invalid";
	}
}

 ?>