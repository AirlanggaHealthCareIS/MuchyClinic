<div class="container" style="">
	<h1>Detail Resep</h1>
		<form class ="form-inline" action="<?php echo base_url(); ?>resep/cari_obat/<?php echo $idresep; ?>" method="post">
			<div class="form-group">
				<label for="IDResep">ID Resep</label><br>
				<input disabled type="normal" name="idresep" class="form-control" id="IDResep" placeholder="ID Resep" value="<?php echo $idresep; ?>">
			</div>
			<br></br>
			<div class="form-group">
				<input type="normal" name="namaobat" class="form-control" id="NamaObat" placeholder="Nama Obat"  value="<?php echo $namaobat; ?>">
			</div>
				<button type="submit" class="btn btn-info">Search Obat</button>
				<br></br>
		<div class = "row">
			<div class="col-md-6">
				 <table class="table table-bordered">
			          <tr>
			            <td class="info">Id obat</td>
			            <td class="info">Nama Obat</td>
			            <td class="info">Kategori</td>
			            <td class="info">Pilih</td>
			          </tr>

			          <?php if($query2!=null): ?>
			          <?php foreach ($query2->result_array() as $row): ?>

			          <tr>
			            <td ><?php echo $row['ID_OBAT']; ?></td>
			            <td ><?php echo $row['NAMA_OBAT']; ?></td>
			            <td ><?php echo $row['KATEGORI_OBAT']; ?></td>
			            <td ><a href="<?php echo base_url()."resep/index4/".$idresep."/".$row['ID_OBAT']; ?>" class = "btn btn-default"> Pilih </a></td>
			          </tr>
			          <?php endforeach ?>
			        <?php endif ?>   
			     </table>
			</div>
		</form>
		<form class ="form-inline" action="" method="post">
			<div class="col-md-6">
				 <table class="table table-bordered">
			          <tr>
			            <td class="info">Id obat</td>
			            <td class="info">Nama Obat</td>
			            <td class="info">Jumlah</td>
			          	<td class="info">Keterangan</td>
			          	<td class="info">Edit</td>
			          	<td class="info">Delete</td>
			          </tr>
			          <?php if (isset($detailresep)): ?>
				          <?php if($detailresep!=null): ?>
				          <?php foreach ($detailresep->result_array() as $row){ ?>

				          <tr>
				            <td ><?php echo $row['ID_OBAT']; ?></td>
				            <td ><?php echo $row['NAMA_OBAT']; ?></td>
				            <td ><?php echo $row['QTY_OBAT']; ?></td>
				            <td ><?php echo $row['KET_RESEP']; ?></td>
				            <td ><a href="<?php echo base_url(); ?>resep/index5/<?php echo $row['ID_DETAIL_RESEP']; ?>/<?php echo $row['ID_RESEP']; ?>" class = "btn btn-default"> Edit </a></td>
				            <td ><a href="<?php echo base_url(); ?>resep/hapusObat/<?php echo $row['ID_DETAIL_RESEP']; ?>/<?php echo $row['ID_RESEP']; ?>" class = "btn btn-default"> Delete </a></td>
				          </tr>
				          <?php }?>
				        <?php endif ?>   
			          <?php endif ?>
			     </table>
			     <form class ="form-inline" action="<?php echo base_url(); ?>resep/selesai" method="post">
					<a href="<?php echo base_url() ?>resep/selesai"class="btn btn-info">S E L E S A I</a><?php  ?>

				</form>
			</div>

		</form> 




			<br></br>
			
	</div>
	</div>
</div>
</div>