  <body>
    <div class="row">
    <div class="col-md-2">
      <div class="container-fluid" style="margin-bottom:50px; padding-top:120px; padding-left:50px;">
        <div class="container">
          <form action="<?php echo base_url()?>crawatinap/daftarinap">
            <button type="button" class="btn btn-primary" style="width:150px;" disabled="disabled">FORM RAWAT INAP</button><br></br>
            <button type="submit" class="btn btn-primary" style="width:150px;" >LIHAT KAMAR</button><br></br>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <div class="container-fluid" style="margin-bottom:50px; ">
          <div class="container">
            <h1>Rawat Inap</h1>
            <br></br>
            <div class="row">
              <div class="col-md-4">
                <!-- pesan error -->
                <?php if ($this->input->get('error')=='null'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Please Check!!</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('error')=='symbol'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>No symbol here!</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('succesfully')=='succesfully'): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Input Succesfully!!</p>
                  </div>
                <?php endif ?>
                <!-- pesan error -->
                <form class="form-inline" action="<?php echo base_url()?>crawatinap/validasi" method="post">
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3" >ID Pasien</label>
                    <input type="normal" name="id_pasien" maxlength="5" class="form-control" id="exampleInputEmail3" placeholder="ID Pasien">
                  </div>
                  
                  <button type="submit" class="btn btn-default">search</button>
                  <br></br>

                  <table class="table table-bordered" style="border: 0px currentColor; border-image: none;">
                    
                    <tr>
                    <td class="info">Id Pasien</td>
                    <td class="info"> <?php echo $id_pasien ?></td>
                    </tr>
                    <tr>
                    <td class="">Nama Pasien</td>
                    <td class=""><?php echo $nama_pasien ?></td>
                    </tr>

                    <tr>
                    <td class="info">no telp</td>
                    <td class="info"><?php echo $no_telp_pas ?></td>
                    </tr>

            
                </table><br> 
            </form>

              </div>
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
              </div>
            </div>

            <form action="<?php echo base_url()?>crawatinap/insertinap" method="post">
            <div class="row">
              <div class="col-md-4">
                <label for="disabledTextInput">Kamar</label>
                <select class="form-control" name="kamar">
                  <?php 
                      foreach ($getkam as $row) {?>
                      <option value="<?php echo $row->ID_KAMAR_INAP?>" selected><?php echo $row->NAMA_KAMAR_INAP; ?></option>
                  <?php    }?>
                </select>
                <br>

                <label for="disabledTextInput">Dokter</label>
                <select class="form-control" name="dokter">
                  <?php 
                      foreach ($getdok as $row) {?>
                      <option value="<?php echo $row->ID_DOKTER?>" selected><?php echo $row->NAMA_DOKTER; ?></option>
                  <?php    }?>
                </select>
                <br>
                <div class="row">
                  <div class="col-xs-6">
                    <label for="disabledTextInput">tanggal masuk</label>
                      <div class="form-group">
                          <label class="sr-only" for="exampleInputEmail3">Tanggal masuk</label>
                          <input type="date" name="tgl_masuk" class="form-control" id="tanggal" placeholder="tanggal masuk">
                      </div>
                  </div>
                  <div class="col-xs-6">
                    <label for="disabledTextInput">tanggal keluar</label>
                      <div class="form-group">
                          <label class="sr-only" for="exampleInputEmail3">Tanggal keluar</label>
                          <input type="date" name="tgl_keluar" class="form-control" id="tanggal2" placeholder="tanggal keluar">
                      </div>
                  </div>

                </div><br>
                </div>
            
              <div class="col-md-4">

              </div>
              <div class="col-md-4">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
            </form>
          </div>
        </div>
    </div>
  </div>
        

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>