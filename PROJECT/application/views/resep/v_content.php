<div class="container-fluid" style=" width: 900px;">
	<!-- <div class = "container" style="margin-top: 43px;"> -->
		<h1 class = "text-center">Resep Muchy Clinic</h1>
			<div class = "container-fluid text-center">
            	<img src = "<?php echo base_url()?>assets/images/logo2.png" alt="Responsive image"> 
            </div>
				
						<?php if ($this->input->get('error')=="null"): ?>
							<div class="alert alert-danger" role="alert">
							Maaf Obat dan Keterangan Belum Terinput
							</div>	
						<?php endif ?>
						<?php if ($this->input->get('erroidpemeriksaan')=="null"): ?>
							<div class="alert alert-danger" role="alert">
							Maaf ID Pemeriksaan belum terinput
							</div>	
						<?php endif ?>
						<?php if ($this->input->get('errorobat')=="null"): ?>
							<div class="alert alert-danger" role="alert">
							Maaf Field Obat masih kosong
							</div>	
						<?php endif ?>
						<?php if ($this->input->get('errorketerangan')=="null"): ?>
							<div class="alert alert-danger" role="alert">
							Maaf Field Keterangan masih kosong
							</div>	
						<?php endif ?>

	<div class = "row">
		<div class = "col-md-4" >			
			<form class ="form-inline" action="<?php echo base_url(); ?>resep/validasi" method="post">
				<div class="form-group">
					<input type="normal" name="idpemeriksaan" class="form-control" id="IDPemeriksaan" placeholder="ID Pemeriksaan">
				</div>
					<button type="submit" class="btn btn-primary">Search</button>

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
						<input type="normal" name="tglresep" class="form-control" id="TglResep" placeholder="dd-mm-yy">
					</div>
				</form>
			</div>
			<div class = "col-md-4">
				<form class ="form-inline" action="<?php echo base_url(); ?>resep/input" method="post">
						<label for="NamaPasien">ID Pasien</label><br>
						<input type="normal" disabled name="namapasien" class="form-control" id="NamaPasien" placeholder="<?php echo $idpasien ?>">
					<div class="form-group">
						<label for="NamaDokter">ID Dokter</label><br>
						<input type="normal" disabled name="namadokter" class="form-control" id="NamaDokter" placeholder="<?php echo $iddokter ?>">
					</div>
					<br></br>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Save Data Resep</button>
					</div>
				</form>
			</div>		
				
	</div>

	<!-- <div class = "row">
			<div class = "col-md-4" >
				<form class ="form-inline" action="<?php echo base_url(); ?>resep/validasi" method="post">
					<div class="form-group">
						<label for="IDResep">ID Resep</label>
						<input type="normal" name="idresep" class="form-control" id="IDResep" placeholder="ID Resep">
					</div>	
					<div class="form-group">
						<label for="IDPemeriksaan">ID Pemeriksaan</label>
						<input type="normal" disabled name="idpemeriksaan" class="form-control" id="IDPemeriksaan" placeholder="<?php echo $idpemeriksaan ?>">
					</div>
			</div>
			<div class = "col-md-4">
						<label for="NamaPasien">Nama Pasien</label>
						<input type="normal" disabled name="namapasien" class="form-control" id="NamaPasien" placeholder="<?php echo $namapasien ?>">
					<div class="form-group">
						<label for="NamaDokter">Nama Dokter</label>
						<input type="normal" disabled name="namadokter" class="form-control" id="NamaDokter" placeholder="<?php echo $namadokter ?>">
					</div>
			</div>		
				</form>
			
	</div> -->

				<form class ="" action="<?php echo base_url(); ?>resep/validasi2" method="post">
					<div class = "col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="InputObat" style =margin-top:30px;>Input Obat</label>
									<input type="normal" name="inputobat" class="form-control" id="InputObat" placeholder="Input Obat">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Keterangan" style =margin-top:30px;>Keterangan</label>
									<input type="normal" name="keterangan" class="form-control" id="Keterangan" placeholder="Keterangan">
								</div>
							</div>
						</div>
								<button type="submit" class="btn btn-default" style=" margin-left: 325px;margin-top: 40px;">Add</button>
						
					</div>
				</form>
					
				</div>
				<!-- <div class="col-md-4 col-md-offset-2"> -->
					<hr>
					<table class="table table-bordered" style="margin-top: 45px;">
					<tr>
					<td class="success">No</td>
					<td class="success">Nama Obat</td>
					<td class="success">Keterangan</td>
					</tr>
					<tr>
					<td class="active"></td>
					<td class="active"></td>
					<td class="active"></td>
					</tr>
					<tr>
					<td class="active"></td>
					<td class="active"></td>
					<td class="active"></td>
					</tr>
				</table>
				<button type="submit" class="btn btn-default" style=" margin-left: 350px;margin-top: 40px;">Save</button>
 				</div>
 				<!-- </form>	 -->
			</div>
	</div>
</div>