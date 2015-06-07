<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header" id="ri">Rawat Inap</h1>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
          <form class="form-inline" action="<?php echo base_url()?>crawatinap" method="post">
            <button type="submit"  class="btn btn-primary" style="width:100%">Lihat kamar</button>
          </form>
        </div>
        <div class="col-md-6">
            <button type="submit" disabled class="btn btn-primary" style="width:100%">Insert Rawat Inap</button>
        </div>
      </div>
      <hr>
          <div class="row">
              <div class="col-md-8" style="text-align: left; border-right: #D9EDF7 0.12em solid;">
                <h4 class="">Insert Rawat Inap</h4>
                <hr>
                <!-- pesan error -->
                <?php if ($this->input->get('error')=='null'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Isian Kosong, Mohon Masukkan ID Pasien dengan Benar</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('act')=='not_found'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Pasien Yang Anda Masukkan Belum Terdaftar</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('error')=='symbol'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Mohon Tidak Memasukan Simbol</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('act')=='kamar_penuh'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Maaf, Kamar Penuh</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('succesfully')=='succesfully'): ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Input ID Pasien Sukses</p>
                  </div>
                <?php endif ?>
                <!-- pesan error -->
                <form class="form-inline" action="<?php echo base_url()?>crawatinap/validasi" method="post">
                  <div class="form-group">
                    <input type="normal" name="id_pasien" maxlength="5" class="form-control" value="<?php echo $this->session->flashdata('id_pasien'); ?>" id="exampleInputId" placeholder="ID Pasien">
                  </div>
                    <button type="submit" class="btn btn-info" style = "width:100px">search</button>                  
                  
                  <br></br>

                  <table class="table">
                    
                    <tr>
                    <td class="info" width="35%">Id Pasien</td>
                    <td class="info">: <?php echo $this->session->flashdata('idpasien'); ?></td>
                    </tr>
                    <tr>
                    <td class="info">Nama Pasien</td>
                    <td class="info">: <?php echo $this->session->flashdata('namapas'); ?></td>
                    </tr>

                    <tr>
                    <td class="info">no telp</td>
                    <td class="info">: <?php echo $this->session->flashdata('telppas'); ?></td>
                    </tr>

            
                </table><br> 
            </form>

              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-2">
              </div>
            </div>

            <form action="<?php echo base_url()?>crawatinap/insertinap" method="post">
            <div class="row">
              <div class="col-md-8" style="text-align: left; border-right: #D9EDF7 0.12em solid;">
                <label for="disabledTextInput">Kamar</label>

                <select class="form-control" name="kamar">
                  <?php 
                      foreach ($getkam as $row) {?>
                      <option value="<?php echo $row->ID_KAMAR_INAP?>"><?php echo $row->NAMA_KAMAR_INAP; ?></option>
                  <?php    }?>
                </select>
                <br>
                
                <label for="disabledTextInput">Dokter</label>

                <select class="form-control" name="dokter">
                  <?php 
                      foreach ($getdok as $row) {?>
                      <option value="<?php echo $row->ID_DOKTER?>"><?php echo $row->NAMA_DOKTER; ?></option>
                  <?php    }?>
                </select>
                </div>
            
              <div class="col-md-2" style="padding-top:143px;"><br></br>
                
              </div>
              <div class="col-md-2">
              </div>
            </div>
            <button type="submit" class="btn btn-primary" style="width:150px">submit</button>
            </form>
          <div class="row">
            <div class="col-md-12"></div>
          </div>
          </div>
            
</div>