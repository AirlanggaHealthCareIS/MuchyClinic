<div class ="container-fluid" style="margin-bottom:50px;">
      <div class="">
        <h1>Rekam Medis</h1>
        <br></br>

        <div class="row">
          <div class="col-md-4">
            <?php if ($this->input->get('error')=='null'): ?>
              <div class ="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Sorry Fild is Empty! Please Input Id Pasien Again.
            </div>
            <?php endif ?>

            <?php if ($this->input->get('error')=='notfound'): ?>
              <div class ="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Sorry Id Pasien Not Found! Please Check Id Pasien Again.
            </div>
            <?php endif ?>





            <form class="form-inline" action = "<?php echo base_url()?>rekammedis/validasi" method = "post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputId">ID Pasien</label>
                <input type="normal" name = "id_pasien" maxlength = "7" class="form-control" id="exampleInputId" placeholder="ID Pasien" style = "width:210px">
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
            <td ><center>Tindakan Medis</center></td>
          </tr>

              <?php if ($drekammedis!=null): ?>       
                   <?php foreach($drekammedis->result() as $row) {?>
                    
                       <tr >
                        <td ><?php echo $row->ID_PERIKSA ?></td>
                        <td ><?php echo $row->TANGGAL_PERIKSA ?></td>
                        <td ><?php echo $row->NAMA_DOKTER ?></td>
                        <td ><?php echo $row->NAMA_PENYAKIT ?></td>
                        <td ><?php echo $row->NAMA_OBAT ?></td>
                        <td ><?php echo $row->NAMA_TINDAKAN ?></td>
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




<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Rekam Medis Pasien Baru</h4>
      </div>
      <div class="modal-body">
          Pasien Belum Memiliki Rekam Medis.
      </div>      
    </div>
  </div>
</div>




