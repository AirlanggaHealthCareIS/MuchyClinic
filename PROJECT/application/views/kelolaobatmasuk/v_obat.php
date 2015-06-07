<h1>Obat</h1>
<div class="container" >
	<div class = "row">
		<div class = "col-md-4" >
			<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/index4" method="post">
				<button type="submit" class="btn btn-info">Add Obat</button>
			</form>
		</div>
	</div>
	<br></br>
	<div class = "row">
			<div class="col-md-12">
				 <table class="table table-bordered">
			          <tr>
			            <td class="info">ID Obat</td>
			            <td class="info">ID Supplier</td>
			            <td class="info">Nama Obat</td>
			            <td class="info">Kategori Obat</td>
			            <td class="info">Harga</td>
			            <td class="info">Obat Kritis</td>
			            <td class="info">Edit</td>
			            <td class="info">Delete</td>
			          </tr>

			         

			          <tr>
			            <?php if (isset($obat)== true): ?>
		                <?php foreach ($obat as $row): ?>
		                <tr>
		                    <td><?php echo $row->ID_OBAT ?></td>
		                    <td><?php echo $row->ID_SUPPLIER ?></td>
		                    <td><?php echo $row->NAMA_OBAT ?></td>
		                    <td><?php echo $row->KATEGORI_OBAT ?></td>
		                    <td><?php echo $row->HARGA ?></td>
		                    <td><?php echo $row->OBAT_KRITIS ?></td>
		                    <td ><a href="<?php echo base_url(); ?>kelolaobatmasuk/index8/<?php echo $row->ID_OBAT; ?>" class = "btn btn-default"> Edit </a></td>
				            <td ><a href="<?php echo base_url(); ?>kelolaobatmasuk/hapusObat/<?php echo $row->ID_OBAT; ?>" class = "btn btn-default"> Delete </a></td>
		                    
		                </tr>
		                <?php endforeach ?>
		                <?php endif ?>
			          </tr>
			         
			     </table>
			</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Message</h4>
      </div>
      <div class="modal-body">
          Data Berhasil Dihapus
      </div>      
    </div>
  </div>
</div>

<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
