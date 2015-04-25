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

            </div>
            <?php endif ?>
            <?php if ($this->input->get("error")=="simbol"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>Don't input symbol, Please enter a valid ID Pasien</p>
            </div>  
            <?php endif ?>
            <!-- end pesan error -->



            <form class="form-inline" action="<?php echo base_url(); ?>kasir/validation" method="post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">ID Pasien</label>
                <input type="normal" class="form-control" name="idpasien" id="exampleInputEmail3" placeholder="ID Pasien">
              </div>
              
              <button type="submit" class="btn btn-default">Search</button>
              <br></br>

              <table class="table table-bordered" style="border: 0px currentColor; border-image: none;">

                <tr>
                <td class="info">ID Pasien</td>
                <td class="info"><?php echo $ID_PASIEN ?></td>
                </tr>
                <tr>
                <td class="">Nama Pasien</td>
                <td class=""><?php echo $NAMA_PASIEN ?></td>
                </tr>

                <tr>
                <td class="info">Jenis Kelamin</td>
                <td class="info"><?php echo $JENIS_KELAMIN_PASIEN?></td>
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
          <tr style="background-color: rgb(226, 246, 245);">
            <td >Tanggal</td>
            <td >Transaksi</td>
            <td >Keterangan</td>
            <td >Harga</td>
            <td >QTY</td>
            <td >Total</td>

            <td >Total</td>
          </tr>



          <?php
          
                foreach($drawatinap as $row){
        ?>
            <tr>
            <td><?php echo $row->ID_RAWAT_INAP ?></td>
            <td><?php echo $row->ID_KAMAR_INAP ?></td>
            <td><?php echo $row->ID_PASIEN ?></td>
            <td><?php echo $row->ID_DOKTER ?></td>
            <td><?php echo $row->TGL_MASK ?></td>
            <td><?php echo $row->TGL_KELUAR ?></td>
            <td><?php echo $row->TOTAL_BIAYA_RWT ?></td>
            
        </tr>
           <?php } ?>


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