<h1>Add Supplier</h1>

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

<div class="container" >

	<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/addsupplier" method="post">
		<div class="form-group">
			<label for="IDSupplier" >ID Supplier</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="idsupplier" class="form-control" id="IDSupplier" placeholder="ID Supplier" value="<?php echo $idsupplier ?>">
		</div>
			<br></br>
		<div class="form-group">
			<label for="NamaSupp" >Nama Supplier</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="namasupp" class="form-control" id="NamaSupp" placeholder="Nama Supplier" value="">
		</div>
			<br></br>
		<div class="form-group">
			<label for="AlamatSupp" >Alamat Supplier</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="alamatsupp" class="form-control" id="AlamatSupp" placeholder="Alamat Supplier" value="">
		</div>
		<br></br>
		<div class="form-group">
			<label for="NoHp" >No Hp Supplier</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="nohpsupp" class="form-control" id="NoHpSupp" placeholder="No Hp Supplier" value="">
		</div>
			<button type="submit" class="btn btn-info">Add Supplier</button>
	</form>



</div>

