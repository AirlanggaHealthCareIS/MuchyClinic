<div class="container-fluid">
    <div class = "">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Rawat Inap</h1>
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
                  <!-- <td>Tgl Keluar</td> -->
                  <!-- <td>Total Biaya Rawat</td> -->
                  <td>Keterangan</td>
                </thead>
                <?php if (isset($mawar)== true): ?>
                <?php foreach ($mawar as $row): ?>
                <tr>
                    <td><?php echo $row->ID_RAWAT_INAP ?></td>
                    <td><?php echo $row->NAMA_PASIEN ?></td>
                    <td><?php echo $row->TGL_MASK ?></td>
                    <!-- <td><?php echo $row->TGL_KELUAR ?></td> -->
                    <!-- <td><?php echo $row->TOTAL_BIAYA_RWT ?></td> -->
                    <td><input id="ada" class="ada" type="checkbox" data-ada=" " value=" " name="obatcek"> Cek</td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>
              </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <h4 class="page-header">Kamar Melati</h4>
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
                  <!-- <td>Tgl Keluar</td> -->
                  <!-- <td>Total Biaya Rawat</td> -->
                  <td>Keterangan</td>
                </thead>
                <?php if (isset($melati)== true): ?>
                <?php foreach ($melati as $row): ?>
                <tr>
                    <td><?php echo $row->ID_RAWAT_INAP ?></td>
                    <td><?php echo $row->NAMA_PASIEN ?></td>
                    <td><?php echo $row->TGL_MASK ?></td>
                    <!-- <td><?php echo $row->TGL_KELUAR ?></td> -->
                    <!-- <td><?php echo $row->TOTAL_BIAYA_RWT ?></td> -->
                    <td><input id="ada" class="ada" type="checkbox" data-ada=" " value=" " name="obatcek"> Cek</td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>
              </table>
        </div>
      </div>
      <form class="form-horizontal" action="<?php echo base_url(); ?>cupdaterawatinap/..." method="post">
        <div class="row">
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary" style="width:150px">Cek</button>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
      </form>
    </div>  
</div>