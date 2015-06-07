<h1>Edit Obat</h1>
<div class="container" >

	<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/editObat/<?php echo $idobat; ?>" method="post">
		<div class="form-group">
			<label for="IDObat" >ID Obat</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="idobat" class="form-control" id="IDObat" placeholder="ID Obat" value="<?php echo $idobat ?>">
		</div>
			<br></br>
		<div class="form-group">
			<label for="IDSupplier" >ID Supplier</label>
		</div>
			<br>
                <select class="form-control" name="idsupplier">
                  <?php 
                      foreach ($supplier as $row) {?>
                      <option value="<?php echo $row->ID_SUPPLIER?>" selected><?php echo $row->NAMA_SUPPLIER; ?></option>
                  <?php    }?>
                </select>
		<br></br>
		<div class="form-group">
			<label for="NamaObat" >Nama Obat</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="namaobat" class="form-control" id="NamaObat" placeholder="Nama Obat" value="">
		</div>
			<br></br>
		<div class="form-group">
			<label for="KatObat" >Kategori Obat</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="katobat" class="form-control" id="KatObat" placeholder="Kategori Obat" value="">
		</div>
		<br></br>
		<div class="form-group">
			<label for="Harga" >Harga</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="harga" class="form-control" id="Harga" placeholder="Harga" value="">
		</div>
		<br></br>
		<div class="form-group">
			<label for="ObatKritis" >Obat Kritis</label>
		</div>
			<br>
		<div class="form-group">
			<input type="normal" name="obatkritis" class="form-control" id="ObatKritis" placeholder="Obat Kritis" value="">
		</div>
			<button type="submit" class="btn btn-info">Add Obat</button>
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