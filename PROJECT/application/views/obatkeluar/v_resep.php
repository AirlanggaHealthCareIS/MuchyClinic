    <div class="container-fluid">
      <div class="container text-center">
        <div class="row">
          <div class="">
            <div class="box-keluar">        
              <h3>Resep</h3>
              <br>
              <div class="row">
                <div class="col-md-5 col-md-offset-1">
                  <?php if ($this->input->get('error')=="null"): ?>
                    <div class="alert alert-danger">
                      Maaf Anda belum menginputkan id pasien
                    </div>
                  <?php endif ?>
                  <form class="form-inline" action="<?php echo base_url(); ?>obat_keluar_resep/validasi" method="post">
                    <div class="form-group">
                      <label for="exampleInputName2">ID Pasien </label>
                      <input name="idpasien" type="text" class="form-control" id="exampleInputName2" placeholder="masukkan id pasien" value="">
                      <button type="submit" class="btn btn-primary ">Cari Resep</button>       
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
            <br><br>
          </div>
        </div>
      </div>
    </div>