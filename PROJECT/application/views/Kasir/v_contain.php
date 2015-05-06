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
      <div class="">

        <h1>KASIR</h1>

        <div class="row">
          <div class="col-md-4">
            <!-- pesan error -->
            <?php if ($this->input->get("error")=="null"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>Silahkan masukkan ID Pasien</p>

            </div>
            <?php endif ?>
            <?php if ($this->input->get("error")=="simbol"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>Jangan masukan ID Pasien dengan Simbol</p>
            </div>  
            
            <?php endif ?>
            <?php if ($this->input->get("error")=="invalidid"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>ID Pasien Tidak di temukan dalam database</p>
            </div>  
            <?php endif ?>
            <!-- end pesan error -->

            <form class="form-inline" action="<?php echo base_url(); ?>kasir/validation" method="post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">ID Pasien</label>
                <input type="normal" class="form-control" name="idpasien" id="exampleInputEmail3" placeholder="ID Pasien">
              </div>
              
              <button type="submit" class="btn btn-primary">Search</button>
              <br></br>

              <div>
                    <table class="table">
                      <tr>
                        <td class="info" width="35%">ID Pasien</td>
                        <td class="info">: <?php echo $this->session->flashdata('idpasien'); ?></td>
                      </tr>
                      <tr>
                        <td class="info">Nama Pasien</td>
                        <td class="info">: <?php echo $this->session->flashdata('namapas'); ?></td>
                      </tr>
                      <tr>
                        <td class="info">Jenis Kelamin</td>
                        <td class="info">: <?php echo $this->session->flashdata('jkpas'); ?></td>
                      </tr>
                    </table>
              </div>

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
             <h2><?php echo $this->session->flashdata('total'); ?></h2>
          </div>
        </div>
        <br>

        <h3>Detail Transaksi</h3>

        <table class="table table-bordered table-hover">
          <thead style="background-color: #337AB7;color: #FFF;">
            <td>Tanggal</td>
            <td>Transaksi</td>
            <td>Keterangan</td>
            <td>QTY</td>
            <td>Harga</td>
            <td>Total</td>

          </thead>
          <tbody>
            <?php if ($this->session->flashdata('detailkamar')): ?>
              <?php foreach ($this->session->flashdata('detailkamar') as $k): ?>
              <tr>
                <td><?php echo $k->TGL_MASK; ?></td>
                <td><?php echo $k->NAMA_KAMAR_INAP; ?></td>
                <td><?php echo $k->KETERANGAN; ?></td>
                <td></td>
                <td><?php echo $k->TARIF_KMR; ?></td>
                <td></td>
              </tr>
              <?php endforeach ?>
            <?php endif ?>

            <?php if ($this->session->flashdata('detailpemeriksaan')): ?>
              <?php foreach ($this->session->flashdata('detailpemeriksaan') as $p): ?>
              <tr>
                <td><?php echo $p->TANGGAL_PERIKSA; ?></td>
                <td><?php echo $p->NAMA_TINDAKAN; ?></td>
                <td><?php echo $p->KETERANGAN; ?></td>
                <td></td>
                <td><?php echo $p->TARIF_TINDAKAN; ?></td>
                <td></td>
              </tr>
              <?php endforeach ?>
            <?php endif ?>

            <?php if ($this->session->flashdata('detailobat')): ?>
              <?php foreach ($this->session->flashdata('detailobat') as $o): ?>
              <tr>
                <td><?php echo $o->TGL_OBAT_KELUAR; ?></td>
                <td><?php echo $o->NAMA_OBAT; ?></td>
                <td><?php echo $o->KETERANGAN; ?></td>
                <td><?php echo $o->QTY; ?></td>
                <td><?php echo $o->HARGA; ?></td>
                <td></td>
              </tr>
              <?php endforeach ?>
            <?php endif ?>

          </tbody>
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