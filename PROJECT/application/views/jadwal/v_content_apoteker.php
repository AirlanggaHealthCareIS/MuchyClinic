
<div class="container-fluid">
      <div class="">
        <h1>Buat Jadwal Apoteker</h1>
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

          <?php if($this->input->get('error')=='updatesuccess'): ?>
            <div class="alert alert-success" role="alert">
              Data berhasil di update
            </div>
          <?php endif ?>

          <div class = "col-md-6">
           
            <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/validasiApoteker" method ="post">

              <div class="form-group">
                
                    <label for="ID Apoteker" class="col-sm-2 control-label">ID Apoteker</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-10">
                          <input name="idapt" maxlength="5" type="normal" class="form-control" id="inputIDApoteker" placeholder="ID Apoteker">    
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
                    <td class="info"><?php echo $idapoteker; ?></td>
                  </tr>

                  <tr>
                    <td class="info">Nama</td>
                    <td class="info"><?php echo $namaapoteker; ?></td>
                  </tr>
                </table>
              </div>
              
              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Jadwal</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <input disabled name="idjadwal" maxlength="5" type="normal" class="form-control" id="inputIDJadwal" placeholder="ID Jadwal" value="<?php echo $idjadwala ?>">    
                        </div>
                      </div>
                    </div>
                </div>

            </form>

            <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/validasiApoteker2" method ="post">

              <div class="form-group">
                
                  <label for="ID Apoteker" class="col-sm-2 control-label">ID Apoteker</label>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-sm-12">
                        <input name="idapoteker" maxlength="5" type="normal" class="form-control" id="showIDApoteker" value="<?php echo $idapoteker; ?>" placeholder="ID Apoteker">    
                      </div>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                
                  <label for="Nama Apoteker" class="col-sm-2 control-label">Nama Apoteker</label>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-sm-12">
                        <input name="namaapoteker" maxlength="5" type="normal" class="form-control" id="showNamaDokter" value="<?php echo $namaapoteker; ?>" placeholder="Nama Apoteker">    
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
              <button name="submit" class="btn btn-default" value="add" type="submit">Add</button>
            </div>

          </form>

            <br>
            <br>

            <div >
              <table class="table table-bordered">
              
                <tr>
                  <td class="info">ID Jadwal</td>
                  <td class="info">ID Apoteker</td>
                  <td class="info">Nama</td>
                  <td class="info">Hari</td>
                  <td class="info">Jam Kerja</td>
                  <td class="info">Edit</td>  
                  <td class="info">Delete</td>
                </tr>

                <?php if ($lihatjadwalapt!=null): ?>

                <?php foreach($lihatjadwalapt->result() as $row) { ?>
                
                  <tr>
                    <td class="active"><?php echo $row->ID_JADWAL_APOTKR ?></td>
                    <td class="active"><?php echo $row->ID_APOTEKER ?></td>
                    <td class="active"><?php echo $row->NAMA_APOTEKER ?></td>
                    <td class="active"><?php echo $row->HARI_A ?></td>
                    <td class="active"><?php echo $row->JAM_KERJA_A ?></td>
                    <td class="active">
                      <a href="<?php echo base_url() ?>/jadwal/editJadwalApoteker/<?php echo $row->ID_JADWAL_APOTKR ?>" class="btn btn-primary">Edit</a>
                    <td class="active">
                      <a href="<?php echo base_url() ?>/jadwal/hapusJadwalApoteker/<?php echo $row->ID_JADWAL_APOTKR ?>" class="btn btn-primary">Delete</a>
                      <?php ?></td>
                  </tr>

                <?php } ?>

                <?php endif ?>

              </table>
              
            </div>
            </form>       

          </div>
          
        </div>
      </div>