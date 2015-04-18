<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Muchy Clinic | Pendaftaran</title>

    <!-- Bootstrap -->
    <!-- <link href ="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url (); ?>assets/css/bootstrap1.css" rel="stylesheet" type="text/css" media="all" />

    
  </head>
  <body>
   


   <!-- dari sini  -->


<form class="form-horizontal" action="<?php echo base_url(); ?>pendaftaran/save" method="post">
<div id="pendaftaran" class="pendaftaran" >
	<div class="container-fluid" style="margin-bottom:50px;">
      <div class="container">
        <!-- <img src="images/logo2.png"> -->

		        <!-- <div class="container-fluid text-center" style="background-color: #606062"> -->
		                <h1 style="text-align: center;font-weight: 600;color: #4b4b4d;">Pendaftaran</h1>

		      	<!-- <img src="<?php echo base_url(); ?>assets/image/header1.png" class="" alt="Responsive image"> -->
		    	<!-- </div> -->

        <br></br>


       <!--  <div class="row">

			<div class="row">
			<div class="col-md-4">
			
			<div class="alert alert-danger" role="alert">
				maaf anda harus melengkapi terlebih dahulu
				</div>

			</div>
			</div>

			<div class="row">
			<div class="col-md-4">
				
				<div class="alert alert-danger" role="alert">
				maaf anda harus melengkapi terlebih dahulu
				</div>

			</div>
			</div>

			<div class="row">
			<div class="col-md4">
			<div class="alert alert-danger" role="alert">
				maaf anda harus melengkapi terlebih dahulu
				</div>
			</div>
			</div>

		</div> -->

		

	<div class="row">

		<div class="row">
  		<div class="col-md-4">
				
				
	<h4>Detail Pendaftaran pasien</h4>
	<p>cari menggunakan nama atau id pasien</p>
	<input type="text" name="carinama" maxlength="30" size="50" id="cari_nama" />
    <br><br>
        <table class="table table-bordered">
          <tr>
            <td >No</td>
            <td >Nama Pasien</td>
            <td >Id Pasien</td>
            <td >Keterangan</td>
 
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
          </tr>
        </table>  				


  		<p>Jumlah Pasien = 22</p>
  		<input type="radio" name="Gender" value="satu" />  Satu Per satu <br>
		<input type="radio" name="Gender" value="semua" />  Cetak Semua

		<br><br>
		<button type="submit" class="btn btn-primary">Cetak</button>

		<br><br><br><br><br><br><br><br>
		<div class="row">

			<div class="col-md-3">
				 <button type="submit" class="btn btn-primary">Tambah</button>
			</div>

			<div class="col-md-2">
				 <button type="submit" class="btn btn-primary">Ubah</button>
			</div>

			<div class="col-md-3">
				 <button type="submit" class="btn btn-primary">Hapus</button>
			</div>

		</div>

  		</div>


  				<?php if ($this->input->get("error")=="null"): ?>
				<div class="alert alert-danger" role="alert">
				maaf anda harus melengkapi terlebih dahulu
				</div>
				<?php endif ?>
  		
  		<div class="row">
  		<div class="col-md-4">

  				<br>
  				<div class="row">
	  				<div class="col-md-5">
		  				ID Pasien
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="id_pasien" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Jenis Kelamin
		  			</div>
		
		  			<div class="col-md-6">
						<input type="radio" name="laki" value="Pria" />  Laki laki 
						<input type="radio" name="perempuan" value="Wanita" />  Perempuan 
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Tempat Lahir
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="tempat_lahir" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Alamat
		  			</div>
		  			<div class="col-md-3">
						<textarea name="alamat" rows="1" cols="74"></textarea>
		  			</div>
	  			</div>	  			

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Rt/Rw
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="rt_rw" maxlength="30" size="5" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Kecamatan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="kecamatan" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Agama
		  			</div>
		  			<div class="col-md-3">
						<select name="Agama" id="Agama">
							<option value="-1">Agama</option>
							<option value="Islam">Islam</option>
							<option value="Kristen Katolik">Kristen Katolik</option>
							<option value="Kristen Protestan">Kristen Protestan</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Bundha</option>
							<option value="Lain-lain">Lain lain</option>
							</select>
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Telepon
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="telepon" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Penanggung
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="penanggung" maxlength="30" size="20" />
		  			</div>
	  			</div>	  			

	  			<br><br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Type Pembayaran
		  			</div>
		  			<div class="col-md-3">
						<select name="Pembayaran" id="Pembayaran">
							<option value="-1">Pembayaran</option>
							<option value="Cash">Cash</option>
							<option value="Kredit">Kredit</option>
							<option value="Lain-lain">Lain lain</option>
							</select>
		  			</div>
	  			</div>

	  			<br><br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Tanggal Pendaftaran
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="tanggal_pendaftaran" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  	</div>


  		<div class="row">
  		<div class="col-md-4">
  				
  				<br>
  				<div class="row">
	  				<div class="col-md-4">
		  				Nama Pasien
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="nama_pasien" maxlength="30" size="20" />
		  			</div>
	  			</div>


				<br><br><br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Tanggal Lahir
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="tanggal_lahir" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br><br><br><br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Kelurahan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="kelurahan" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Kota
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="kota" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Pekerjaan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="pekerjaan" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Hp
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="handphone" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Hubungan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="hubungan" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">

	  				<div class="col-md-4">
	  					<input type="checkbox" name="tanggungan_ibu" value="tanggungan ibu" />
		  				Tanggungan Ibu
		  			</div>
		  			
		  			<div class="col-md-3">
						<input type="text" name="tanggungan_ibu" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
		  			
		  			<div class="col-md-6">
						<input type="text" name="keterangan" maxlength="30" size="40" />
		  			</div>
	  			</div>

	  		<br><br><br>	
	  		<div class="row">

			<div class="col-md-3">
				 <button type="submit" class="btn btn-primary">Simpan</button>
			</div>

			<div class="col-md-2">
				 <button type="submit" class="btn btn-primary">Batal</button>
			</div>

			<div class="col-md-3">
				 <button type="submit" class="btn btn-primary">Keluar</button>
			</div>

		</div>

	  	</div>


  	</div>

  				</div>
  		

	</div>        

</div>
</div>
</div>
</div>
</form>
	<!-- sampe sini -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>



</html>