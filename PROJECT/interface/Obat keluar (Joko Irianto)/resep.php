<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Resep | Obat keluar</title>

    <!-- Bootstrap -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    .box-keluar {
      /*background-color: #EEE;*/
      /*width: 600px;*/
      padding: 20px;
      /*margin-top: 35%;*/
      text-align: center;

    }
    .row{
      text-align: left;
    }

    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="container text-center">
        <div class="row">
          <div class="">
            <div class="box-keluar">        
              <h1>Muchy Clinic</h1>
              <h3>Resep</h3>
              <br>
              <div class="row">
                <div class="col-md-5 col-md-offset-1">
                  <form class="form-inline">
                    <div class="form-group">
                      <label for="exampleInputName2">ID Pasien </label>
                      <input type="text" class="form-control" id="exampleInputName2" placeholder="masukkan id pasien" value="K333iOP">
                      <button type="button" class="btn btn-primary ">Cari Resep</button>       
                    </div>
                  </form>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                      Tanggal
                    </div>
                    <div class="col-md-6">
                      20 Mei 2015
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      No Resep
                    </div>
                    <div class="col-md-6">
                      K34OAS
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      Dokter
                    </div>
                    <div class="col-md-6">
                      Rizki Sulistianto
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-5" style="text-align:right">
                  Apoteker - Joko Irianto
                </div>
              </div>
              <br>
              <br><br>
              <table class="table">
                <tr>
                  <td>Nama Obat</td>
                  <td>Keterangan</td>
                  <td>Jumlah</td>
                  <td>Keterangan</td>
                </tr>
                <tr>
                  <td>Paramex</td>
                  <td>3 x sehari</td>
                  <td>12 kapsul</td>
                  <td><input type="checkbox"> Ada</td>
                </tr>
                <tr>
                  <td>Parasetamol</td>
                  <td>3 x sehari</td>
                  <td>15 kapsul</td>
                  <td><input type="checkbox"> Ada</td>
                </tr>
              </table>
              <div style="text-align:right">
                <button type="button" class="btn btn-primary">Selesai</button>
              </div>
              <!-- <h3>Tanggal</h3> -->
            </div>
            
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