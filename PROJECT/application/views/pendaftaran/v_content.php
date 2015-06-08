
<br>
<h2>Pendaftaran Pasien Baru</h2>
<hr>
	<p>isi dan lengkapi form dengan benar</p>
	
	<div class="row">

		<div class="row">
  		<div class="col-md-4">
				
				
	
		</div>

  		</div>
  	</div>
  				

<form class="form-horizontal" action="<?php echo base_url(); ?>pendaftaran/validasi" method="post">  		

<?php if ($this->input->get("error")=="null"): ?>
				<div class="alert alert-danger" role="alert">
				Maaf Lengkapi Field Yang Kosong Terlebih Dahulu
				</div>
				<?php endif ?>
				<?php if ($this->input->get("sukses")=="benar"): ?>
				<div class="alert alert-success" role="alert">
				Data Telah Berhasil Disimpan 
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
						<input type="text" name="id_pasien" maxlength="30" size="20" value="<?php echo $this->id_genarate; ?>" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Jenis Kelamin
		  			</div>
		
		  			<div class="col-md-6">
						<!-- <input type="radio" name="laki" value="Pria" />  Laki laki  -->
						<!-- <input type="text" name="jenis_kelamin" maxlength="30" size="20" /> -->
						<!-- <input type="radio" name="perempuan" value="Wanita" />  Perempuan  -->
						<select name="jenis_kelamin" id="jenis_kelamin">
							<option value="-1">jenis_kelamin</option>
							<option value="Laki laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
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
						<textarea name="alamat" rows="1" cols="84"></textarea>
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
		  				Gol Darah
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="goldarah" maxlength="30" size="20" />
		  			</div>
	  			</div>	  			

	  			<br><br>
	  			<div class="row">
	  				<div class="col-md-5">
		  				Pembayaran
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
						<input type="date" name="tanggal_pendaftaran" maxlength="30" size="16" style="width: 167px;"/>
		  			</div>
	  			</div>

	  	</div>


  		<div class="row">
  		<div class="col-md-4">
  				
  				<br>
  				<div class="row">
	  				<div class="col-md-6">
		  				Nama Pasien
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="nama_pasien" maxlength="30" size="20" />
		  			</div>
	  			</div>

				<br>
  				<div class="row">
	  				<div class="col-md-6">
		  				
		  			</div>
		  			<div class="col-md-3">
						
		  			</div>
	  			</div>

				<br><br>
	  			<div class="row">
	  				<div class="col-md-6	">
		  				Tanggal Lahir
		  			</div>
		  			<div class="col-md-5">
						<input type="date" name="tanggal_lahir" maxlength="70" size="71" style="width: 167px;"/>
		  			</div>
	  			</div>

	  			<br><br><br>
	  			<div class="row">
	  				<div class="col-md-6">
		  				Pekerjaan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="pekerjaan" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-6">
		  				Hp
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="handphone" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br>
	  			<div class="row">
	  				<div class="col-md-6">
		  				Hubungan
		  			</div>
		  			<div class="col-md-3">
						<input type="text" name="hubungan" maxlength="30" size="20" />
		  			</div>
	  			</div>

	  			<br><br>
	  			<!-- <div class="row">

	  				<div class="col-md-6">
	  					Keluhan Penyakit
		  			</div>
		  			<div class="col-md-3">
						<textarea name="keluhan" rows="5" cols="22"></textarea>
		  			</div>
	  			</div> -->

	  		<br><br><br>	
	  		<div class="row">

			<div class="col-md-3">
				 <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
			</div>

			<div class="col-md-8">
				 <button type="submit" class="btn btn-primary">Simpan</button>


				 <button type="reset" class="btn btn-primary" onclick="return (location.reload())">Batal</button>
			</div>


		</div>

	  	</div>

</form>
  				
</body>


<!-- coba diatas -->
