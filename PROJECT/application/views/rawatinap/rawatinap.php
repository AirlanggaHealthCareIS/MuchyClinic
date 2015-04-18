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
                <p>Please Input ID Pasien Correctly!</p>
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
                <td class="info">Nama Pasien</td>
                <td class="info"><?php echo $nama_pasien ?></td>
                </tr>

                <tr>
                <td class="info">no telp</td>
                <td class="info"><?php echo $no_telp_pas ?></td>
                </tr>

        
            </table><br>
            <!-- TAABBBEEELLL -->
        <!-- TAABBBEEELLL --> 
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
            </div><br>
            </div>
        
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
        <button type="reset" class="btn btn-primary">cancel</button>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>