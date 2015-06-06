<h1>Edit Resep</h1>
<div class="container" >
	
		
				<form class ="form-inline" action="<?php echo base_url(); ?>resep/editResep/<?php echo $iddetailresep.'/'.$idresep; ?>" method="post">
					
					<div class="form-group">
						<label for="IDResep" >ID Detail Resep</label>
					</div>
					<br>
					<div class="form-group">
						<input disabled type="normal" name="idresep" class="form-control" id="IDResep" placeholder="ID Resep" value="<?php echo $iddetailresep; ?>">
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
					<button type="submit" class="btn btn-info">Edit</button>
			</form>
</div>