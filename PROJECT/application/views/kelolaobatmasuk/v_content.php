<div class="container" style="">
	<h1>Kelola Obat Masuk</h1>
	
	<br>
	
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
			<div class = "col-md-5">	
				<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/getidapoteker" method="post">
					<div class="form-group">
						<label for="IDApoteker">ID Supplier</label>
					</div>
					<div class="form-group">
						<input type="normal" name="idsupplier" class="form-control" id="IdSupplier" placeholder="ID Supplier">
					</div>
					<button type="submit" class="btn btn-info">Search</button>
					<br></br>
					<table class="table">
						<tr>
							<td class="info">ID Supplier</td>
							<td class="info"><?php echo $idsupplier ?></td>
						</tr>
						<tr>
							<td class="active">Nama Supplier</td>
							<td class="active"><?php echo $namasupplier ?></td>
						</tr>	
					</table>
				</form>
			</div>

			<div class = "col-md-6">
				<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/input/<?php echo $idsupplier ?>" method="post">

					<label for="ID Obat Masuk" class="col-sm-3 control-label">ID Obat Masuk</label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-sm-10">
                          <input disabled name="idobatmasuk" type="normal" class="form-control" id="IDObatMasuk" placeholder="ID Obat Masuk" value="<?php echo $idobatmasukx ?>">    
                        </div>
                      </div>
                    </div>

					<br>
					<br>
					<br>

					<label for="ID Obat Masuk" class="col-sm-3 control-label">ID Supplier</label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-sm-10">
                          <input disabled name="idsupplier" type="normal" class="form-control" id="IDSupplier" placeholder="" value="<?php echo $idsupplier ?>">    
                        </div>
                      </div>
                    </div>

					<br>
					<br>
					<br>

					<div class="form-group">
						<label for="TglObatMasuk">Tanggal Obat Masuk</label>
					</div>
					<div class="form-group">
						<input type="date" name="tglmasuk" class="form-control" id="TglObatMasuk" placeholder=" ">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Process</button>
					</div>

					 <div class="form-group">
                
                    
                	</div>

				</form>
			</div>

		</div>

			
			
		</div>
	</div>