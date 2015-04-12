<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Kasir</title>
    <style type="text/css">

    </style>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container-fluid" style="margin-bottom:50px;">
      <div class="container">

        <h1>KASIR</h1>

        <div class="row">
          <div class="col-md-4">
            <!-- pesan error -->
            <?php if ($this->input->get("error")=="null"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>Please enter a valid ID Pasien</p>
            <!-- end pesan error -->

            </div>
            <?php endif ?>

            <form class="form-inline" action="<?php echo base_url(); ?>kasir/validation" method="post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">ID Pasien</label>
                <input type="normal" class="form-control" name="idpasien" id="exampleInputEmail3" placeholder="ID Pasien">
              </div>
              
              <button type="submit" class="btn btn-default">Search</button>
              <br></br>

              <table class="" style="border: 0px currentColor; border-image: none;">

                <tr>
                  <td style="width:43%">Nama Pasien</td>
                  <td>Dony Prasetiyo</td>
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
            </form>
          </div>
          
          <div class="col-md-4">
          </div>
          
          <div class="col-md-4">

            <table class="" style="border: 0px currentColor; border-image: none;">
              <tr>
              <td>Kasir</td>
              <td style="width:43%">Irfan Nur Aulia</td>
              </tr>
            </table>
       
              <h3>TOTAL</h3>
             <h2>Rp. 4.131.345,-</h2>
          </div>
        </div>
        <br>

        <table class="table table-bordered">
          <tr>
            <td >No</td>
            <td >Tanggal</td>
            <td >Transaksi</td>
            <td >Keterangan</td>
            <td >Harga</td>
            <td >Total</td>
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

        <div class="row">
          <div class="col-md-4">
            <label for="disabledTextInput">Total</label>
            <input class="form-control" id="disabledInput" type="text" placeholder="4.131.345" disabled>
            <br>

            <label for="disabledTextInput">Tunai</label>
              <div class="row">
                <div class="col-md-9">
                  
                  <label class="sr-only" for="exampleInputAmount">Tunai (in rupiah)</label>
                  <div class="input-group">
                    <div class="input-group-addon">Rp.</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="4.132.000">
                    <div class="input-group-addon">.00</div>
                  </div>
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary">Cash</button>
                  <br></br>
                </div>
              </div>

            <label for="disabledTextInput">Kembali</label>
            <input class="form-control" id="disabledInput" type="text" placeholder="655" disabled>
          </div>
        
          <div class="col-md-4" style="text-align: center">
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <br>
            
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
            <button type="button" class="btn btn-primary">Print</button>
            <!-- Indicates a successful or positive action -->
            <button type="button" class="btn btn-success">New</button>

          </div>
          <div class="col-md-4">
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