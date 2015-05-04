<div class="container-fluid" style=" width: 900px;">
	<!-- <div class = "container" style="margin-top: 43px;"> -->
		<h1>Resep</h1>
				
						<?php if ($this->input->get('erroidpemeriksaan')=="null"): ?>
							<div class="alert alert-danger" role="alert">
							Maaf ID Pemeriksaan belum terinput
							</div>	
						<?php endif ?>

						

						<?php if ($this->input->get('succesfully')=='succesfully'): ?>
		                  <div class="alert alert-success alert-dismissible" role="alert">
		                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                    <p>Data Berhasil Tersimpan</p>
		                  </div>
		                <?php endif ?>

		                <?php if ($this->input->get('resepsukses')=='succesfully'): ?>
		                  <div class="alert alert-success alert-dismissible" role="alert">
		                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                    <p>Resep Berhasil Terinput</p>
		                  </div>
		                <?php endif ?>

	<div class = "row">
		<div class = "col-md-4" >			
			<form class ="form-inline" action="<?php echo base_url(); ?>resep/getidpemeriksaan" method="post">
				<div class="form-group">
					<input type="normal" name="idpemeriksaan" class="form-control" id="IDPemeriksaan" placeholder="ID Pemeriksaan">
				</div>
					<button type="submit" class="btn btn-info">Search</button>

			<br></br>
			<table class="table">
				<tr>
					<td class="info">ID Pemeriksaan</td>
					<td class="info"><?php echo $idpemeriksaan ?></td>
				</tr>
				<tr>
					<td class="active">ID Pasien</td>
					<td class="active"><?php echo $idpasien ?></td>
				</tr>
				<tr>
					<td class="info">Nama Pasien</td>
					<td class="info"><?php echo $namapasien ?></td>
				</tr>
				<tr>
					<td class="active">ID Dokter</td>
					<td class="active"><?php echo $iddokter ?></td>
				</tr>
				<tr>
					<td class="info">Nama Dokter</td>
					<td class="info"><?php echo $namadokter ?></td>
				</tr>
			</table>
			</form>	
		</div>

		<div class = "col-md-4" >
				<form class ="form-inline" action="<?php echo base_url(); ?>resep/input" method="post">
					<div class="form-group">
						<label for="IDResep">ID Resep</label><br>
						<input type="normal" name="idresep" class="form-control" id="IDResep" placeholder="ID Resep">
					</div>	
					<div class="form-group">
						<label for="IDPemeriksaan">ID Pemeriksaan</label>
						<input type="normal" disabled name="idpemeriksaan" class="form-control" id="IDPemeriksaan" placeholder="<?php echo $idpemeriksaan ?>">
					</div>
					<div class="form-group">
						<label for="TglResep">Tanggal Resep</label>
						<input type="date" name="tglresep" class="form-control" id="TglResep" placeholder=" ">
					</div>
		</div>

		<div class = "col-md-4">
			<label for="NamaPasien">ID Pasien</label><br>
			<input type="normal" disabled name="idpasien" class="form-control" id="NamaPasien" placeholder="<?php echo $idpasien ?>">
			<div class="form-group">
				<label for="NamaDokter">ID Dokter</label><br>
				<input type="normal" disabled name="iddokter" class="form-control" id="NamaDokter" placeholder="<?php echo $iddokter ?>">
			</div>
			<br></br>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Save Data Resep</button>
			</div>
				</form>
		</div>
	
	</div>
<hr>


 				
			</div>
	</div>
</div>