    <div class="container-fluid">
      <div class="container text-center">
        <div class="row">
          <div class="">
            <div class="box-keluar">        
              <h3>Pengambilan Obat</h3>
              <br>
              <div class="row">
                <div class="col-md-6" style="text-align: left;">
                  <!-- untuk messages -->
                  <?php if ($this->input->get('error')=="null"): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Maaf Anda belum menginputkan id pasien
                    </div>
                  <?php endif ?>
                  <?php if ($this->input->get('error')=="symbol"): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Maaf Anda tidak diizinkan menginputkan simbol yang tidak diizinkan
                    </div>
                  <?php endif ?>
                  <!-- end of messages -->
                  
                  <!-- untuk form input id dan tanggal -->
                  <form class="form-horizontal" action="<?php echo base_url(); ?>obatkeluarresep/validasi" method="post">
                    <div class="form-group">
                      <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="input tanggal">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="idpasien" class="col-sm-2 control-label">Id Pasien</label>
                      <div class="col-sm-10">
                        <input type="normal" name="idpasien" class="form-control" id="idpasien" placeholder="input pasien id">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary ">Cari Resep</button>       
                      </div>
                    </div>
                  </form>
                  <!-- end of form -->

                  <br>
                  <!-- untuk interface get resep -->
                  <div>
                    <table class="table">
                      <tr>
                        <td class="info" width="30%">No Resep</td>
                        <td class="info"></td>
                      </tr>
                      <tr>
                        <td class="info">Tanggal</td>
                        <td class="info"></td>
                      </tr>
                      <tr>
                        <td class="info">Nama Dokter</td>
                        <td class="info"></td>
                      </tr>
                      <tr>
                        <td class="info">Nama Pasien</td>
                        <td class="info"></td>
                      </tr>
                    </table>
                  </div>
                  <!-- end get resep -->
                  
                </div>
                <!-- untuk mengetahui siapa apotekernya -->
                <div class="col-md-6" style="text-align:right">
                  Apoteker - Joko Irianto
                </div>
                <!-- end of apoteker -->
              </div>

              <br>
              <!-- untuk tabel show detail resep -->
              <table class="table table-bordered table-hover">
                <thead style="background-color: #337AB7;color: #FFF;">
                  <td>Nama Obat</td>
                  <td>Keterangan</td>
                  <td>Jumlah</td>
                  <td>Keterangan</td>
                </thead>
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
              <!-- end of tabel detail resep -->

              <div style="text-align:right">
                <button type="button" class="btn btn-primary">Selesai</button>
              </div>
            </div>
            <br><br>
          </div>
        </div>
      </div>
    </div>