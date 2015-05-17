<div class="container" style="">
	<!-- <div class = "container" style="margin-top: 43px;"> -->
		<h1>Detail Resep</h1>
	<!-- <div class = "row"> -->
		<!-- <div class = "col-md-4" >	 -->		
			<form class ="form-inline" action="<?php echo base_url(); ?>resep/cari_obat/<?php echo $idresep; ?>" method="post">
				<div class="form-group">
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
			            <td ><a href="" class = "btn btn-default"> Pilih </a></td>
			          </tr>
			          <?php endforeach ?>
			        <?php endif ?>   
			     </table>
			</div>
			<div class="col-md-6">
				 <table class="table table-bordered">
			          <tr>
			            <td class="info">Id obat</td>
			            <td class="info">Nama Obat</td>
			            <td class="info">Kategori</td>
			          
			          </tr>
			          <tr>
			            <td ><?php echo $row['ID_OBAT']; ?></td>
			            <td ><?php echo $row['NAMA_OBAT']; ?></td>
			            <td ><?php echo $row['KATEGORI_OBAT']; ?></td>
			          </tr>
			     </table>
			</div>




			<br></br>
			
	</div>
	<!-- <div class = "col-md-4">
		<form class ="form-inline" action="<?php echo base_url(); ?>resep/inputresep" method="post">
				<div class="form-group">
					<input type="normal" name="iddetailresep" class="form-control" id="IDDetailResep" placeholder="ID Detail Resep">
				</div>
				<div class="form-group">
					<input type="normal" name="ketobat" class="form-control" id="KetObat" placeholder="Ket Obat">
				</div>
					<button type="submit" class="btn btn-info">Search</button>

			<br></br>
			 -->
				
			
	</div>
</div>
</div>