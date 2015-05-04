<div class="container-fluid" style=" width: 900px;">
	<!-- <div class = "container" style="margin-top: 43px;"> -->
		<h1>Resep</h1>
		<?php if ($this->input->get('errorridobat')=="null"): ?>
			<div class="alert alert-danger" role="alert">
				Maaf ID Obat belum terinput
			</div>	
		<?php endif ?>
		<?php if ($this->input->get('errorridresep')=="null"): ?>
			<div class="alert alert-danger" role="alert">
				Maaf ID Resep belum terinput
			</div>	
		<?php endif ?>
	<div class = "row">
		<div class = "col-md-4" >			
			<form class ="form-inline" action="<?php echo base_url(); ?>resep/inputresep" method="post">
				<div class="form-group">
					<input type="normal" name="iddetailresep" class="form-control" id="IDDetailResep" placeholder="ID Detail Resep">
				</div>
				<div class="form-group">
					<input type="normal" name="idobat" class="form-control" id="IDObat" placeholder="ID Obat">
				</div>
					

			<br></br>
			
	</div>
	<div class = "col-md-4">
		<form class ="form-inline" action="<?php echo base_url(); ?>resep/inputresep" method="post">
				<div class="form-group">
					<input type="normal" name="idresep" class="form-control" id="IDResep" placeholder="ID Resep">
				</div>
				<div class="form-group">
					<input type="normal" name="ketobat" class="form-control" id="KetObat" placeholder="Ket Obat">
				</div>
					<button type="submit" class="btn btn-info">Search</button>

			<br></br>
			
				
			
	</div>
</div>
</div>