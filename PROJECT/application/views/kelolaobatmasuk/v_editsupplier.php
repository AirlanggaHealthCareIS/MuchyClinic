<h1>Edit Supplier</h1>
<div class="container" >
	<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/editSupp/<?php echo $idsupplier; ?>" method="post">
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

