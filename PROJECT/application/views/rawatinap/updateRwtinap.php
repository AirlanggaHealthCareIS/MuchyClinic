<div class="container-fluid">
    <div class = "">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"  id="ri">Rawat Inap</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <button type="submit" disabled class="btn btn-primary" style="width:100%">Lihat kamar</button>
        </div>
        <div class="col-md-6">
          <form class="form-inline" action="<?php echo base_url()?>crawatinap/index2" method="post">
            <button type="submit" class="btn btn-primary" style="width:100%">Insert Rawat Inap</button>
          </form>
        </div>
      </div>
      <hr>

      <!-- // radio button -->
      <div class="col-sm-offset-1 col-sm-11">
        <div class="col-xs-5">
          <input type="radio" name="rad" id="rad1" value="1" class="rad"/> Kamar Mawar
        </div>
        <div class="col-xs-7">
          <input type="radio" name="rad" id="rad2" value="2" class="rad"/> Kamar Melati
        </div>
      </div>

      <!-- form tampilan -->
      <div id="form1" style="display:none">
        <div class="row">
          <div class="col-md-12">
          <h4 class="page-header">Kamar Mawar</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-hover">
                  <thead style="background-color: #337AB7;color: #FFF;">
                    <!-- <td>No</td> -->
                    <td>Id Rawat Inap</td>
                    <td>Nama Pasien</td>
                    <td>Tgl Masuk</td>
                    <td>Kamar</td>
                    <td>Keterangan</td>
                  </thead>
                  <?php if (isset($mawar)== true): ?>
                  <?php foreach ($mawar as $row): ?>
                  <tr>
                      <td><?php echo $row->ID_RAWAT_INAP ?></td>
                      <td><?php echo $row->NAMA_PASIEN ?></td>
                      <td ><span class="tanggal" data-tgl="<?php echo $row->TGL_MASK ?>"><?php echo $row->TGL_MASK ?></span></td>
                      <td ><span class="kamar" data-tgl="<?php echo $row->ID_KAMAR_INAP ?>"><?php echo $row->NAMA_KAMAR_INAP ?></span></td>
                      <td><input id="ada" class="ada" type="checkbox" data-ada="<?php echo $row->ID_RAWAT_INAP; ?>" value="<?php echo $row->ID_RAWAT_INAP; ?>" name="rwtcek"> Cek</td>
                  </tr>
                  <?php endforeach ?>
                  <?php endif ?>
                </table>
          </div>
        </div>
          <div class="row">
            <div class="col-md-4">
              <button type="button" onclick="return selesai2()" class="btn btn-primary" style="width:150px"> update Mawar</button>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
          </div>
      </div>
      <div id="form2" style="display:none">  
        <div class="row">
          <div class="col-md-12">
          <h4 class="page-header">Kamar Melati</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-hover">
                  <thead style="background-color: #337AB7;color: #FFF;">
                    <td>Id Rawat Inap</td>
                    <td>Nama Pasien</td>
                    <td>Tgl Masuk</td>
                    <td>Nama Kamar</td>
                    <td>Keterangan</td>
                  </thead>
                  <?php if (isset($melati)== true): ?>
                  <?php foreach ($melati as $row): ?>
                  <tr>
                      <td><?php echo $row->ID_RAWAT_INAP ?></td>
                      <td><?php echo $row->NAMA_PASIEN ?></td>
                      <td><span class="tanggal" data-tgl="<?php echo $row->TGL_MASK ?>"><?php echo $row->TGL_MASK ?></span></td>
                      <td><span class="kamar" data-tgl="<?php echo $row->ID_KAMAR_INAP ?>"><?php echo $row->NAMA_KAMAR_INAP ?></span></td>
                      <td><input id="ada" class="ada" type="checkbox" data-ada="<?php echo $row->ID_RAWAT_INAP; ?>" value="<?php echo $row->ID_RAWAT_INAP; ?>" name="rwtcek"> Cek</td>
                  </tr>
                  <?php endforeach ?>
                  <?php endif ?>
                </table>
          </div>
        </div>
          <div class="row">
            <div class="col-md-4">
              <button type="button" onclick="return selesai2()" class="btn btn-primary" style="width:150px"> Update Melati</button>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
          </div>
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
                  <script type="text/javascript">
                  $(function(){
                  $(":radio.rad").click(function(){
                  $("#form1, #form2").hide()
                  if($(this).val() == "1"){
                  $("#form1").show();
                  }else{
                  $("#form2").show();
                  }
                  });
                  });
                  </script>
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
            <button type="button" onclick="return simpan2()" class="btn btn-primary">Simpan</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->