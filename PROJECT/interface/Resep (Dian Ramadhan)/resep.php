<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muchy Clinic</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>


<div class="container-fluid">
	<div style = "background-color: rgb(109, 162,232); color: black; padding-top: 10px; ">
	<div class = "container" style="margin-top: 43px;">

		<h1>Resep Muchy Clinic</h1>
		<div class = "row">
			<div class = "col-md-3" >
				<select class="form-control" style="margin-top: 20px;">
	  				<option>ID Pemeriksaan</option>
	  				<option>2</option>
	  				<option>3</option>
	  				<option>4</option>
	  				<option>5</option>
				</select> 
			</div>
				<div class = "col-md-12">
					<form>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="InputObat" style =margin-top:30px;>Input Obat</label>
									<input type="obat" class="form-control" id="InputObat" placeholder="Input Obat">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="Keterangan" style =margin-top:30px;>Keterangan</label>
									<input type="keterangan" class="form-control" id="Keterangan" placeholder="Keterangan">
								</div>
							</div>
						</div>
								<button type="submit" class="btn btn-default" style=" margin-left: 325px;margin-top: 40px;">Add</button>
							
						</div>
					</form>
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
			</div>
			
 				
				
			</div>
		</div>

	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
