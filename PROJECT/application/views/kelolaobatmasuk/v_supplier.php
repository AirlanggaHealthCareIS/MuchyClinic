<h1>Supplier</h1>
<div class="container" >
	<div class = "row">
		<div class = "col-md-4" >
			<form class ="form-inline" action="<?php echo base_url(); ?>kelolaobatmasuk/index3" method="post">
				<button type="submit" class="btn btn-info">Add Supplier</button>
			</form>
		</div>
	</div>
	<br></br>
	<div class = "row">
			<div class="col-md-12">
				 <table class="table table-bordered">
			          <tr>
			            <td class="info">ID Supplier</td>
			            <td class="info">Nama Supplier</td>
			            <td class="info">Alamat Supplier</td>
			            <td class="info">No Telp Supplier</td>
			            <td class="info">Edit</td>
			            <td class="info">Delete</td>
			          </tr>

			         

			          <tr>
			            <?php if (isset($supplier)== true): ?>
		                <?php foreach ($supplier as $row): ?>
		                <tr>
		                    <td><?php echo $row->ID_SUPPLIER ?></td>
		                    <td><?php echo $row->NAMA_SUPPLIER ?></td>
		                    <td><?php echo $row->ALAMAT_SUPPLIER ?></td>
		                    <td><?php echo $row->NO_TELP_SUPPLIER ?></td>
		                    <td ><a href="<?php echo base_url(); ?>kelolaobatmasuk/index7/<?php echo $row->ID_SUPPLIER; ?>" class = "btn btn-default"> Edit </a></td>
				            <td ><a href="<?php echo base_url(); ?>kelolaobatmasuk/hapusSupp/<?php echo $row->ID_SUPPLIER; ?>" class = "btn btn-default"> Delete </a></td>
		                    
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
