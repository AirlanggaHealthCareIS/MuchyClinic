<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rekam Medis</title>
    <style type="text/css">


    </style>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid" style="margin-bottom:50px;">
      <div class="container">
        <h1>Rekam medis</h1>
        <br></br>

        <div class="row">
          <div class="col-md-4">

            <form class="form-inline">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">ID Pasien</label>
                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="ID Pasien">
              </div>
              
              <button type="submit" class="btn btn-default">Search</button>
              <br></br>

              <table class="" style="border: 0px currentColor; border-image: none;">

              <tr>
              <td style="width:43%">Nama Pasien</td>
              <td>DonyPrasetiyo</td>
              </tr>

              <tr>
              <td>TTL</td>
              <td>Samarinda, 30 Februari 1880</td>
              </tr>

              <tr>
              <td>Jenis Kelamin</td>
              <td>Laki-Laki</td>
              </tr>

            </table>
            <br>
            </form>

          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
          </div>
        </div>

        <table class="table table-bordered">
          <tr>
            <td >No</td>
            <td >ID periksa</td>
            <td >Tanggal periksa</td>
            <td >Dokter</td>
            <td >Diagnosa</td>
            <td >Obat</td>
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
          </tr>
        </table>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Cancel</button>

      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>