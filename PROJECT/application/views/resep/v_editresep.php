<br>
<h1>Edit Resep</h1>
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

<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Message</h4>
      </div>
      <div class="modal-body">
          Data Berhasil Diedit
      </div>      
    </div>
  </div>
</div>