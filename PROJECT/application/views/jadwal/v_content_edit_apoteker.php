<div class="">
      <div class="">
        <h1>Edit Jadwal Apoteker</h1>
        <hr>
      </div>
    </div>
    <div class="container-fluid width: 900px">
      <div class="">
        
        <br>
        <div class = "row">

          <?php if ($this->input->get('error')=='idjadwalnull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum mengisi ID Jadwal Apoteker (Dimulai dengan JA---)
            </div>
          <?php endif ?>

          <?php if ($this->input->get('error')=='idapotekernull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum mengisi ID Apoteker (untuk memilih apoteker yang akan diinputkan jadwalnya)
            </div>
          <?php endif ?>
          
          <?php if ($this->input->get('error')=='cbharinull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum memilih hari
            </div>
          <?php endif ?>

          <?php if ($this->input->get('error')=='cbjamnull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum memilih jam
            </div>
          <?php endif ?>

          <?php if($this->input->get('error')=='symbolerror'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda memasukkan symbol yang tidak seharusnya diinput
            </div>
          <?php endif ?>

          <?php if($this->input->get('error')=='notfound'): ?>
            <div class="alert alert-danger " role="alert">
              Maaf ID Apoteker yang anda masukkan tidak ada dalam database
            </div>
          <?php endif ?>


          <div class = "col-md-6">
           
            <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/updateJadwalA" method ="post">
              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Jadwal</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <input name="idjadwal2" maxlength="5" type="normal" class="form-control" id="inputIDJadwal" value="<?php echo $idjadwal2 ?>">    
                        </div>
                      </div>
                    </div>
                </div>

              <div class="form-group">
                
                  <label for="ID Aktor" class="col-sm-2 control-label">ID Apoteker</label>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-sm-12">
                        <input name="idapt2" maxlength="5" type="normal" class="form-control" id="showIDApoteker" value="<?php echo $idapt2; ?>">    
                      </div>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="Hari" class="col-sm-2 control-label">Hari</label>
                <div class="col-sm-10">
                  <select name="cbhari2" class="form-control">
                    <option value="0" >- Pilih Hari -</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="Jam" class="col-sm-2 control-label">Jam</label>
                <div class="col-sm-10">
                  <select name="cbjam2" class="form-control">
                    <option value="0" >- Pilih Jam -</option>
                    <option value="07.00-12.00" >07.00-12.00</option>
                    <option value="12.00-17.00" >12.00-17.00</option>
                    <option value="17.00-22.00" >17.00-22.00</option>
                  </select>
                </div>
              </div>

              <div class="text-center">
                <button name="submit" class="btn btn-default" value= "add" type="submit">Edit</button>
              </div>
              
              </div>
            </div>

            <br>

        </form>

            <br>
            <br>

            <div >
              <table class="table table-bordered">
              
                <tr>
                  <td class="info">ID Jadwal</td>
                  <td class="info">ID Dokter</td>
                  <td class="info">Nama</td>
                  <td class="info">Hari</td>
                  <td class="info">Jam Kerja</td>
                </tr>

                <?php if($lihatjadwalapt!=null): ?>
                
                <?php foreach($lihatjadwalapt->result() as $row) { ?>

                  <tr>
                    <td class="active"><?php echo $row->ID_JADWAL_APOTKR ?></td>
                    <td class="active"><?php echo $row->ID_APOTEKER ?></td>
                    <td class="active"><?php echo $row->NAMA_APOTEKER ?></td>
                    <td class="active"><?php echo $row->HARI_A ?></td>
                    <td class="active"><?php echo $row->JAM_KERJA_A ?></td>
                  
                  </tr>

                <?php } ?>

              <?php endif ?>

              </table>
              
            </div>
          </div>
          
        </div>
      </div>

      <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>