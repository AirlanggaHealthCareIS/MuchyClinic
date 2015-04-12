<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rawat inap</title>
    <style type="text/css">

    </style>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

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
        <h1>Rawat Inap</h1>
        <br></br>
        <div class="row">
          <div class="col-md-4">
            <!-- pesan error -->
            <?php if ($this->input->get('error')=='null'): ?>
              <div class="alert alert-danger" role="alert">
                maaf
              </div>
            <?php endif ?>
            <!-- pesan error -->
            <form class="form-inline" action="<?php echo base_url()?>crawatinap/validasi" method="post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">ID Pasien</label>
                <input type="normal" name="id_pasien" class="form-control" id="exampleInputEmail3" placeholder="ID Pasien">
              </div>
              
              <button type="submit" class="btn btn-default">search</button>
              <br></br>

              <table class="" style="border: 0px currentColor; border-image: none;">
                <tr>
                <td style="width:43%">ID pasien</td>
                <td>PAS01</td>
                </tr>
                <tr>
                <td>Nama pasien</td>
                <td>Doni Prasetyo</td>
                </tr>
                <tr>
                <td>TTL</td>
                <td>Samarinda, 30 Februari 1880</td>
                </tr>

                <tr>
                <td>Jenis Kelamin</td>
                <td>Laki-Laki</td>
                </tr>
            </table><br>

            </form>

          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <label for="disabledTextInput">Kamar</label>
            <select class="form-control">
              <option>Melati 1</option>
              <option>Melati 2</option>
            </select>
            <br>

            <label for="disabledTextInput">Dokter</label>
            <select class="form-control">
              <option>Dr Karina</option>
              <option>Dr dian ramadhan</option>
            </select>
            <br>

            <div class="row">
              <div class="col-xs-6">
                <label for="disabledTextInput">tanggal masuk</label>
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Tanggal masuk</label>
                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="tanggal masuk">
            </div>
              </div>
              <div class="col-xs-6">
                <label for="disabledTextInput">tanggal keluar</label>
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Tanggal keluar</label>
                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="tanggal keluar">
            </div>
              </div>
            </div>

            <label for="disabledTextInput">Tunai</label>
              <div class="row">
                <div class="col-md-8">
                  
                  <label class="sr-only" for="exampleInputAmount">Tunai (in rupiah)</label>
                  <div class="input-group">
                    <div class="input-group-addon">Rp.</div>
                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="4.132.000">
                    <div class="input-group-addon">.00</div>
                  </div>
                </div>
                <div class="col-md-4">
                  
                  <br></br>
                </div>
              </div>
          </div>
        
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
          </div>
        </div>
        <button type="submit" class="btn btn-default">submit</button>
        <button type="reset" class="btn btn-default">cancel</button>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>