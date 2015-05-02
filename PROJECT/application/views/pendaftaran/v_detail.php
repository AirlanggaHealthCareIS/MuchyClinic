<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Muchy Clinic | Pendaftaran</title>

    <!-- Bootstrap -->
    <!-- <link href ="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?php echo base_url (); ?>assets/css/bootstrap1.css" rel="stylesheet" type="text/css" media="all" />

    
  </head>
  <body>




<h4>Detail Pendaftaran pasien</h4>
	<p>cari menggunakan nama atau id pasien</p>
	

<form class="form-horizontal" action="<?php echo base_url(); ?>pendaftaran/tampil" method="post">  		

	<input type="text" name="carinama" maxlength="30" size="50" id="cari_nama" />
    <br><br>
        <table class="table table-bordered">
          
          <tr>

            <!-- <td >No</td> -->
            <td >Nama Pasien</td>
            <td >Id Pasien</td>
            <td >Keluhan_Penyakit</td>
 
          </tr>


		  <?php foreach ($isidata as $newisi): ?>          
          
          <tr>
            <!-- <td >  </td> -->
            <td > <?php echo $newisi->NAMA_PASIEN;  ?>  </td>
            <td > <?php echo $newisi->ID_PASIEN;  ?>  </td>
            <td > <?php echo $newisi->KELUHAN_PENYAKIT;  ?> </td>          
          </tr>
     
       <?php endforeach ?>


        </table>  				


  		<p>Jumlah Pasien = 22</p>
  		<input type="radio" name="Gender" value="satu" />  Satu Per satu <br>
		<input type="radio" name="Gender" value="semua" />  Cetak Semua

		<br><br>
		<button type="submit" class="btn btn-primary">Cetak</button>

		<br><br><br><br><br><br><br><br>
		<div class="row"><!-- 

			<div class="col-md-2">
				 <button type="submit" class="btn btn-primary">Ubah</button>
			</div>
 -->
		</div>

  		</div>

</form>
  				
</body>