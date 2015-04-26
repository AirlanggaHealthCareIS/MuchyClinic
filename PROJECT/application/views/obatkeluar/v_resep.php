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
                  <?php if ($this->input->get('act')=="notfound"): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Maaf data resep dengan id dan tanggal tersebut tidak ditemukan
                    </div>
                  <?php endif ?>
                  <!-- end of messages -->
                  
                  <!-- untuk form input id dan tanggal -->
                  <form class="form-horizontal" action="<?php echo base_url(); ?>obatkeluarresep/validasi" method="post">
                    <div class="form-group">
                      <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="date" name="tanggal" value="21/04/2015<?php //echo $this->session->flashdata('tanggal'); ?>" class="form-control" id="tanggal" placeholder="input tanggal">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="idpasien" class="col-sm-2 control-label">Id Pasien</label>
                      <div class="col-sm-10">
                        <input type="normal" autofocus name="idpasien" value="<?php echo $this->session->flashdata('idpasien'); ?>" class="form-control" id="idpasien" placeholder="input pasien id">
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
                        <td class="info" width="35%">No Resep</td>
                        <td class="info">: <?php echo $this->session->flashdata('idr'); ?></td>
                      </tr>
                      <tr>
                        <td class="info">Tanggal Resep</td>
                        <td class="info">: <?php echo $this->session->flashdata('tanggalr'); ?></td>
                      </tr>
                      <tr>
                        <td class="info">Nama Dokter</td>
                        <td class="info">: <?php echo $this->session->flashdata('dokterr'); ?></td>
                      </tr>
                      <tr>
                        <td class="info">Nama Pasien</td>
                        <td class="info">: <?php echo $this->session->flashdata('pasienr'); ?></td>
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
                  <td>No</td>
                  <td>Id Obat</td>
                  <td>Nama Obat</td>
                  <td>Keterangan</td>
                  <td>Kategori</td>
                  <td>Jumlah</td>
                  <td>Status</td>
                </thead>
                <?php if ($this->session->flashdata('detailr')!=null): ?> 
                  <?php $r = $this->session->flashdata('detailr'); $i=0; ?>
                  <?php foreach ($r as $row): ?>
                    <?php $i = $i + 1; ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->ID_OBAT; ?></td>
                      <td><?php echo $row->NAMA_OBAT; ?></td>
                      <td><?php echo $row->KET_RESEP; ?></td>
                      <td><?php echo $row->KATEGORI_OBAT; ?></td>
                      <td>QTY</td>
                      <td><input type="checkbox"> Ada</td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
                <?php if ($this->session->flashdata('detailr')==null): ?>
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                <?php endif ?>
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