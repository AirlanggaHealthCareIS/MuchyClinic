
<div class="container-fluid">
      <div class="container">
        <h1>Buat Jadwal Dokter</h1>
      </div>
    </div>
    <div class="container-fluid width: 900px">
      <div class="container">
        
        <br>
        <div class = "row">

          <?php if ($this->input->get('error')=='idjadwalnull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum mengisi ID Jadwal Dokter (Dimulai dengan JD---)
            </div>
          <?php endif ?>

          <?php if ($this->input->get('error')=='iddokternull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum mengisi ID Dokter (untuk memilih dokter yang akan diinputkan jadwalnya)
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
              Maaf ID Dokter yang anda masukkan tidak ada dalam database
            </div>
          <?php endif ?>

          <?php if($this->input->get('error')=='apaya'): ?>
            <div class="alert alert danger alert dismissible" role="alert">
              Enaknya isi apa?
            </div>
          <?php endif ?>

          <div class = "col-md-6">
           
            <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/validasiDokter" method ="post">

              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Dokter</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-10">
                          <input name="iddok" maxlength="5" type="normal" class="form-control" id="inputIDAktor" placeholder="ID Dokter">    
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-default">Search</button>      
                        </div>
                      </div>
                    </div>
              </div>

              <div>
                <table class="table">
                  <tr>
                    <td class="info">ID</td>
                    <td class="info"><?php echo $iddokter; ?></td>
                  </tr>

                  <tr>
                    <td class="info">Nama</td>
                    <td class="info"><?php echo $namadokter; ?></td>
                  </tr>
                </table>
              </div>

              </form> 

              <br>  

              <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/validasiDokter2" method ="post">
              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Jadwal</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <input name="idjadwal" maxlength="5" type="normal" class="form-control" id="inputIDJadwal" placeholder="ID Jadwal">    
                        </div>
                      </div>
                    </div>
                </div>

              <div class="form-group">
                
                  <label for="ID Aktor" class="col-sm-2 control-label">ID Dokter</label>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-sm-12">
                        <input name="iddokter" maxlength="5" type="normal" class="form-control" id="showIDDokter" value="<?php echo $iddokter; ?>" >    
                      </div>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label for="Hari" class="col-sm-2 control-label">Hari</label>
                <div class="col-sm-10">
                  <select name="cbhari" class="form-control">
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
                  <select name="cbjam" class="form-control">
                    <option value="0" >- Pilih Jam -</option>
                    <option value="07.00-12.00" >07.00-12.00</option>
                    <option value="12.00-17.00" >12.00-17.00</option>
                    <option value="17.00-22.00" >17.00-22.00</option>
                  </select>
                </div>
              </div>
              </div>
            </div>

            <br>

            <div class="text-center">
              <button name="submit" class="btn btn-default" value= "add" type="submit">Add</button>
              <button name="submit" class="btn btn-default" value= "edit" type="submit">Edit</button>
              <button name="submit" class="btn btn-default" type="submit">Delete</button>
            </div>

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
                  <td class="info">Delete</td>
                </tr>

                <?php if($lihatjadwaldok!=null): ?>
                
                <?php foreach($lihatjadwaldok->result() as $row) { ?>

                  <tr>
                    <td class="active"><?php echo $row->ID_JADWAL_DOKTER ?></td>
                    <td class="active"><?php echo $row->ID_DOKTER ?></td>
                    <td class="active"><?php echo $row->NAMA_DOKTER ?></td>
                    <td class="active"><?php echo $row->HARI_D ?></td>
                    <td class="active"><?php echo $row->JAM_D ?></td>
                    <td class="active">
                      <a data-toggle="modal" data-target="#myModal" href="<?php echo base_url() ?>/jadwal/hapusJadwalDokter/<?php echo $row->ID_JADWAL_DOKTER ?>" class="btn btn-primary">Delete</a>                      <?php ?></td>
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
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>