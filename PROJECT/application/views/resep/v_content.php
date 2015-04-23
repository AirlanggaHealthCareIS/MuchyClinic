<div class="container-fluid" style=" width: 900px;">
	<div class = "container" style="margin-top: 43px;">
		<h1>Resep Muchy Clinic</h1>
				<div class = "row">
					<div class = "col-md-3" >
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
						
						<form class ="" action="<?php echo base_url(); ?>resep/validasi" method="post">
						<div class="form-group">
							<label for="IDPemeriksaan" style =margin-top:30px;>ID Pemeriksaan</label>
									<input type="normal" name="idpemeriksaan" class="form-control" id="IDPemeriksaan" placeholder="ID Pemeriksaan">
									<button type="submit" class="btn btn-default">Search</button>
							</div>
						</form>	
							<table class="table">
								<tr>
									<td class="info">ID Pemeriksaan</td>
									<td class="info"><?php echo $idpemeriksaan ?></td>
								</tr>
								<tr>
									<td class="info">Nama Pasien</td>
									<td class="info"><?php echo $namapasien ?></td>
								</tr>
								<tr>
									<td class="info">Nama Dokter</td>
									<td class="info"><?php echo $namadokter ?></td>
								</tr>
							</table>
							<div>
							
						</div>
						</div>
						</div>
						


						<!-- <div class="form-group">
							<select id="inputIDPemeriksaan" name="idpemeriksaan" class="form-control" style="margin-top: 20px;">
							<option value="">ID Pemeriksaan</option>
			  				<option value="001">001</option>
			  				<option value="002">002</option>
			  				<option value="003">003</option>
			  				<option value="004">004</option>
							</select> 
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