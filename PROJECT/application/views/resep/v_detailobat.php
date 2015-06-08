<br>
<h1>Detail Obat</h1>
<hr>
<div class="container" >
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

		
				<form class ="form-inline" action="<?php echo base_url(); ?>resep/inputdr/<?php echo $idresep."/".$idobat; ?>" method="post">
					<div class="form-group">
						<br>
						<label for="IDDetailResep" >ID Detail Resep</label>
					</div>
					<br>
					<div class="form-group">
						<input type="normal" name="iddetailresep" class="form-control" id="IDDetailResep" placeholder="ID Detail Resep" value="<?php echo $iddetailresepx ?>">
					</div>
					<br></br>
					<div class="form-group">
						<label for="IDResep" >ID Resep</label>
					</div>
					<br>
					<div class="form-group">
						<input disabled type="normal" name="idresep" class="form-control" id="IDResep" placeholder="ID Resep" value="<?php echo $idresep; ?>">
					</div>
					<br></br>
					<div class="form-group">
						<label for="IDObat" >ID Obat</label>
					</div>
					<br>
					<div class="form-group">
						<input disabled type="normal" name="idobat" class="form-control" id="IDObat" placeholder="ID Obat" value="<?php echo $idobat; ?>">
					</div>
					<br></br>
					<div class="form-group">
						<label for="JmlObat" >Jumlah Obat</label>
					</div>
					<br>
					<div class="form-group">
						<input type="normal" name="jmlobat" class="form-control" id="JmlObat" placeholder="Jumlah Obat" value="">
					</div>
					<br></br>
					<div class="form-group">
						<label for="KetObat" >Keterangan Obat</label>
					</div>
					<br>
					<div class="form-group">
						<input type="normal" name="ketobat" class="form-control" id="KetObat" placeholder="Keterangan Obat" value="">
					</div>
					<button type="submit" class="btn btn-info">Lanjut</button>
					<br>
					<br>
			
</div>


