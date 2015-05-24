<div class="container" style="">
	<h1>Kelola Obat Masuk</h1>
	<?php if ($this->input->get('error')=="null"): ?>
		<div class="alert alert-danger" role="alert">
			Error! Belum Terinput
		</div>	
	<?php endif ?>

	<?php if ($this->input->get('error')=="symbol"): ?>
		<div class="alert alert-danger" role="alert">
			Maaf Symbol Tidak Diperbolehkan
		</div>	
	<?php endif ?>

		<div class = "row">
			<div class = "col-md-4">	
				<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/getidapoteker" method="post">
					<div class="form-group">
						<label for="IDApoteker">ID Apoteker</label>
					</div>
					<div class="form-group">
						<input type="normal" name="idapoteker" class="form-control" id="IdApoteker" placeholder="ID Apoteker">
					</div>
					<button type="submit" class="btn btn-info">Search</button>
					<br></br>
					<table class="table">
						<tr>
							<td class="info">ID Apoteker</td>
							<td class="info"><?php echo $idapoteker ?></td>
						</tr>
						<tr>
							<td class="active">Nama Apoteker</td>
							<td class="active"><?php echo $namaapoteker ?></td>
						</tr>	
					</table>
				</form>
			</div>
</div>
			<div class = "col-md-4">
				<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/input" method="post">
					<div class="form-group">
						<label for="IDObatMasuk">ID Obat Masuk</label>
					</div>
					<br>
					<div class="form-group">
						<input type="normal" name="idobatmasuk" class="form-control" id="IDObatMasuk" placeholder="ID Obat Masuk">
					</div>
					<br>
					<div class="form-group">
						<label for="IDApoteker">ID Apoteker</label>
					</div>
					<br>
					<div class="form-group">
						<input type="normal" disabled name="idapoteker" class="form-control" id="IdApoteker" placeholder="<?php echo $idapoteker ?>">
					</div>
					<br>
					<div class="form-group">
						<label for="TglObatMasuk">Tanggal Obat Masuk</label>
					</div>
					<br>
					<div class="form-group">
						<input type="date" name="tglmasuk" class="form-control" id="TglObatMasuk" placeholder=" ">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Process</button>
					</div>
				</form>



			</div>
			
		</div>
	</div>