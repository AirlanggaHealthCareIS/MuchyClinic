    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Rawat Inap</h1>
      </div>
    </div>
    <div class="col-md-10">
      <div class="container-fluid" style="margin-bottom:50px; ">
          <div class="">
            <div class="row">
              <div class="col-md-8">
                <!-- pesan error -->
                <?php if ($this->input->get('error')=='null'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Please Check!!</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('act')=='not_found'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Id pasien tidak ditemukan!!</p>
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
                <form class=" " action="<?php echo base_url()?>crawatinap/validasi" method="post">
                  <div class="input-group">
                    <!-- <label class="form-control" for="exampleInputEmail3" >ID Pasien</label> -->
                    <input type="normal" name="id_pasien" maxlength="5" class="form-control" value="<?php echo $this->session->flashdata('id_pasien'); ?>" id="exampleInputEmail3" placeholder="ID Pasien">
                    <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">search</button>
                  </div>
                  
                  
                  <br></br>

                  <table class="table table-bordered" style="border: 0px currentColor; border-image: none;">
                    
                    <tr>
                    <td class="info">Id Pasien</td>
                    <td class="info"> <?php echo $this->session->flashdata('idpasien'); ?></td>
                    </tr>
                    <tr>
                    <td class="">Nama Pasien</td>
                    <td class=""><?php echo $this->session->flashdata('namapas'); ?></td>
                    </tr>

                    <tr>
                    <td class="info">no telp</td>
                    <td class="info"><?php echo $this->session->flashdata('telppas'); ?></td>
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
              <div class="col-md-8">
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
            
              <div class="col-md-2" style="padding-top:143px;"><br></br>
                <button type="submit" class="btn btn-primary" style="width:150px">submit</button>
              </div>
              <div class="col-md-2">
              </div>
            </div>
            </form>
          </div>
        </div>
    </div>
  </div>