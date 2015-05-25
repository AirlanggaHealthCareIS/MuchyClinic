    <div class="container-fluid">
        
      <div class="">
        <div class="row">
          <div class="">
            <div class="box-keluar">
              <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">Pengambilan Obat</h1>
                </div>
              </div>        
              <br>
              <div class="row">
                <div class="col-md-6" style="text-align: left; border-right: #D9EDF7 0.12em solid;">
                  <h4>Cari resep</h4>
                  <hr>
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
                      <label style="text-align:left; padding-right: 0;" for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input type="date" name="tanggal" value="<?php echo $this->session->flashdata('tanggal') ?>" class="form-control" id="tanggal" placeholder="input tanggal">
                      </div>
                    </div>
                    <div class="form-group">
                      <label style="text-align:left; padding-right: 0;" for="idpasien" class="col-sm-2 control-label">Id Pasien</label>
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
                  
                </div>
                <!-- untuk mengetahui siapa apotekernya -->
                <div class="col-md-6">
                  <!-- Apoteker - Joko Irianto -->
                  <!-- untuk interface get resep -->
                  <h4>Deskripsi resep</h4>
                  <hr>
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
                <!-- end of apoteker -->
              </div>

              <br>
              <br>
              <!-- untuk tabel show detail resep -->
              <h4>Resep</h4>
                  <hr>
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
                      <td><input id="ada" class="ada" type="checkbox" data-ada="<?php echo $row->ID_OBAT; ?>" value="<?php echo $row->ID_OBAT; ?>" name="obatcek"> Ada</td>
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
                <button type="button" onclick="return selesai()" class="btn btn-primary">Selesai</button>
              </div>
            </div>
            <br><br>
          </div>
        </div>
      </div>
    </div>

    <!-- Untuk Pop Up -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <div class="modal-body">
            Simpan data?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="button" onclick="return simpan()" class="btn btn-primary">Simpan</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

