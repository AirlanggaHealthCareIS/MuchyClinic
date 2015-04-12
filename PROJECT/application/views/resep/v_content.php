<div class="container-fluid" style=" width: 900px;">
	<div class = "container" style="margin-top: 43px;">
		<h1>Resep Muchy Clinic</h1>
			<form class ="" action="<?php echo base_url(); ?>resep/validasi" method="post">
				<div class = "row">
					<div class = "col-md-3" >
						<?php if ($this->input->get('error')=="null"): ?>
							<div class="alert alert-danger" role="alert">
							Maaf field anda masih kosong
							</div>	
						<?php endif ?>
						
						<div class="form-group">
							<select class="form-control" style="margin-top: 20px;">
			  				<option>ID Pemeriksaan</option>
			  				<option>2</option>
			  				<option>3</option>
			  				<option>4</option>
			  				<option>5</option>
							</select> 
						</div>
					</div>
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
					
				</div>
				<div class="col-md-4 col-md-offset-2">
					<hr>
					<table class="table table-bordered" style="margin-top: 45px;">
					<tr>
					<td class="success">No</td>
					<td class="success">Nama Obat</td>
					<td class="success">Keterangan</td>
					</tr>
					<tr>
					<td class="active">1</td>
					<td class="active">Amoxicilin</td>
					<td class="active">3x1 sehari setelah makan</td>
					</tr>
					<tr>
					<td class="active">2</td>
					<td class="active">.......</td>
					<td class="active">.......</td>
					</tr>
				</table>
				<button type="submit" class="btn btn-default" style=" margin-left: 125px;margin-top: 40px;">Save</button>
 				</div>
 				</form>	
			</div>
	</div>
</div>