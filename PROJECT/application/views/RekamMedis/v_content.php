<div class ="container-fluid" style="margin-bottom:50px;">
      <div class="container">
        <h1><center>Rekam Medis</center></h1>
        <br></br>

        <div class="row">
          <div class="col-md-4">
            <?php if ($this->input->get('error')=='null'): ?>
              <div class ="alert alert-danger" role="alert">
              Maaf Fild Kosong! Silahkan Input Id Pasien Kembali.
            </div>
            <?php endif ?>

            <form class="form-inline" action = "<?php echo base_url()?>rekammedis/validasi" method = "post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputId">ID Pasien</label>
                <input type="normal" name = "id_pasien" maxlength = "7" class="form-control" id="exampleInputId" placeholder="ID Pasien" style = "width:250px">
              </div>
              <button type="submit" class="btn btn-info" style = "width:100px">Search</button>
              <br></br>

              <div>
              <table class="table" style="border: 0px currentColor; border-image: none;">
              <tr>
                  <td class="info">Id Pasien</td>
                  <td class="info"><?php echo $id_pasien; ?></td>
              </tr>
              <tr>
              <td class="">Nama Pasien</td>
              <td class=""><?php echo $nama; ?></td>
              </tr>
              <tr>
              <td class="info">Golongan Darah</td>
              <td class="info"><?php echo $golongan_darah; ?></td>
              </tr>
              <tr>
              <td class="">Jenis Kelamin</td>
              <td class=""><?php echo $jenis_kelamin; ?></td>
              </tr>
            </table>
            </div>
            </form>
          </div>



          <div class="col-md-8">
            <table class="table table-bordered">
          <tr style="background-color: rgb(226, 246, 245);">
            <td ><center>ID Periksa</center></td>
            <td ><center>Tanggal Periksa</center></td>
            <td ><center>Dokter</center></td>
            <td ><center>Diagnosa</center></td>
            <td ><center>Obat</center></td>
            <!-- <td ><center>Tindakan Medis</center></td> -->
          </tr>

              <?php if ($drekammedis!=null): ?>       
                   <?php foreach($drekammedis->result() as $row) {?>
                    
                       <tr >
                        <td ><?php echo $row->ID_PERIKSA ?></td>
                        <td ><?php echo $row->TANGGAL_PERIKSA ?></td>
                        <td ><?php echo $row->NAMA_DOKTER ?></td>
                        <td ><?php echo $row->NAMA_PENYAKIT ?></td>
                        <td ><?php echo $row->NAMA_OBAT ?></td>
                        <!-- <td ><?php echo $row->NAMA_TINDAKAN ?></td> -->
                      </tr>

                    <?php } ?>
                    <?php endif ?>
            </table>
        <button type="reset" class="btn btn-info" style = "width:100px">Back</button>

          </div>
   </div>
      </div>
      </div>
    </div>