<br>
<h1>Resep</h1>
<hr>
<div class="container">				
		                <?php if ($this->input->get('error')=="null"): ?>
							<div class="alert alert-danger" role="alert">
							Error! Belum Terinput
							</div>	
						<?php endif ?>

						 <?php if ($this->input->get('errorresep')=="null"): ?>
							<div class="alert alert-danger" role="alert">
							Maaf Field Belum Lengkap
							</div>	
						<?php endif ?>

						<?php if ($this->input->get('error')=="symbol"): ?>
							<div class="alert alert-danger" role="alert">
							Maaf Symbol Tidak Diperbolehkan
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
				<tr>
					<td class="active">Keluhan</td>
					<td class="active"><?php echo $keluhan ?></td>
				</tr>
			</table>
			</form>	
		</div>

		<div class = "col-md-4" >
				<form class ="form-inline" action="<?php echo base_url(); ?>resep/input" method="post">
					<div class="form-group">
						<label for="IDPemeriksaan">ID Pemeriksaan</label><br>
						<input type="normal" disabled name="idpemeriksaan" class="form-control" id="IDPemeriksaan" placeholder="<?php echo $idpemeriksaan ?>">
					</div>

					<div class="form-group">
						<label for="NamaPasien">ID Pasien</label><br>
						<input type="normal" disabled name="idpasien" class="form-control" id="NamaPasien" placeholder="<?php echo $idpasien ?>">
					</div>

					<div class="form-group">
						<label for="NamaDokter">ID Dokter</label><br>
						<input type="normal" disabled name="iddokter" class="form-control" id="NamaDokter"  placeholder="<?php echo $iddokter ?>">
					</div>
					
					<div class="form-group">
						<label for="IDResep">ID Resep</label><br>
						<input type="normal" name="idresep" class="form-control" id="IDResep" placeholder="ID Resep" value="<?php echo $idresepx ?>">
					</div>	

					<div class="form-group">
						<label for="TglResep">Tanggal Resep</label><br>
						<input type="date" name="tglresep" class="form-control" id="TglResep" placeholder=" ">
					</div>
					
					<br></br>
					<div class="form-group">
						<button type="submit" class="btn btn-info">Save Data Resep</button>
					</div>
						</form>
		</div>

		<div class = "col-md-4">
			
		</div>
	
	</div>
<hr>


 				
			</div>
	</div>
</div>






<!-- Modal -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Resep - ID Pemeriksaan</h4>
      </div>
      <div class="modal-body">
          Pasien Belum Melakukan Pemeriksaan
      </div>      
    </div>
  </div>
</div>

