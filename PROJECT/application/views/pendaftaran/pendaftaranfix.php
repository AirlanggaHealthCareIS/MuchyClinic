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


<form class="form-horizontal" action="<?php echo base_url(); ?>pendaftaran/validasi" method="post">
<div id="pendaftaran" class="pendaftaran" >
	<div class="container-fluid" style="margin-bottom:50px;">
      <div class="container">
        <!-- <img src="images/logo2.png"> -->
        <!-- <h1 style="text-align: center;font-weight: 600;color: antiquewhite;background-color: #27bec4;">Pendaftaran</h1> -->
        
		      <div class="container-fluid text-center" style="background-color: #606062">
		      <h1 style="text-align: center;font-weight: 600;color: antiquewhite;background-color: #ffffff;">Pendaftaran</h1>
		      <!-- <img src="<?php echo base_url(); ?>assets/image/header1.png" class="" alt="Responsive image"> -->
		      </div>

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
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Jenis Kelamin
		  			</div>
		
		  			<div class="col-md-6">
						<input type="radio" name="Gender" value="Pria" />  Laki laki 
						<input type="radio" name="Gender" value="Wanita" />  Perempuan 
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Tempat Lahir
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Alamat
		  			</div>
		  			<div class="col-md-3">
						<textarea name="Address" rows="1" cols="74"></textarea>
		  			</div>
	  			</div>	  			

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Rt/Rw
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="5" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Kecamatan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
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
							<option value="1">Islam</option>
							<option value="2">Kristen Katolik</option>
							<option value="3">Kristen Protestan</option>
							<option value="4">Hindu</option>
							<option value="5">Bundha</option>
							<option value="5">Lain lain</option>
							</select>
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Telepon
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Penanggung
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
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
							<option value="1">Cash</option>
							<option value="2">Kredit</option>
							<option value="5">Lain lain</option>
							</select>
		  			</div>
	  			</div>

	  			<br><br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Tanggal Pendaftaran
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
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
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>


				<br><br><br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Tanggal Lahir
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br><br><br><br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Kelurahan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Kota
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Pekerjaan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Hp
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-4">
		  				Hubungan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">

	  				<div class="col-md-4">
	  					<input type="checkbox" name="Hobby_Drawing" value="Drawing" />
		  				Tanggungan Ibu
		  			</div>
		  			
		  			<div class="col-md-3">
						<input type="text" name="First_Name" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
		  			
		  			<div class="col-md-6">
						<input type="text" name="First_Name" maxlength="30" size="40" />
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