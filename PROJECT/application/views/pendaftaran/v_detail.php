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
	

<form class="form-horizontal" action="<?php echo base_url(); ?>pendaftaran/index2" method="post">  		

            <div class="row">
                <div class="col-md-5">
                    <input type="text" name="carinama" maxlength="30" size="50" id="cari_nama" />
                </div>
                <div class="col-md-3">
                   <button type="submit" name="cari" class="btn btn-primary" size="20">Cari</button>
                </div>
            </div>

    <br><br>
        <table class="table table-bordered">
          
          <tr>

            <!-- <td >No</td> -->
            <th style="color: white;background-color: rgb(39, 190, 196);">Id Pasien</th>
            <th style="color: white;background-color: rgb(39, 190, 196);">Nama Pasien</th>
            <th style="color: white;background-color: rgb(39, 190, 196);">Keluhan_Penyakit</th>
            <th style="color: white;background-color: rgb(39, 190, 196);">Tanggal Pendaftaran</th>
                       
 
          </tr>


		  <?php foreach ($isidata as $newisi): ?>          
          
          <tr>
            <!-- <td >  </td> -->
            <td > <?php echo $newisi->ID_PASIEN;  ?>  </td>
            <td > <?php echo $newisi->NAMA_PASIEN;  ?>  </td>
            <td > <?php echo $newisi->KELUHAN_PENYAKIT;  ?> </td>
            <td > <?php echo $newisi->TANGGAL_PENDAFTARAN;  ?> </td>
                      
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