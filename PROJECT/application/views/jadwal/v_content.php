<div class="container-fluid">
      <div class="container">
        <h1>Buat Jadwal</h1>
      </div>
    </div>
    <div class="container-fluid width: 900px">
      <div class="container">
        
        <br>
        <div class = "row">

          <?php if ($this->input->get('error')=='cbaktornull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum memilih aktor
            </div>
          <?php endif ?>

          <?php if ($this->input->get('error')=='cbbagiannull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum memilih bagian
            </div>
          <?php endif ?>

          <?php if ($this->input->get('error')=='null'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf inputan id anda kosong
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

          <div class = "col-md-6">
           
            <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/validasi" method ="post">

              <div class="form-group">
                <label for="Aktor" class="col-sm-2 control-label">Aktor</label>
                <div class="col-sm-10">
                  <select name="cbaktor" class="form-control">
                    <option value= "0">- Pilih Aktor -</option>
                    <option value="Dokter">Dokter</option>
                    <option value="Apoteker">Apoteker</option>
                    <option value="Karyawan">Karyawan</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="Bagian" class="col-sm-2 control-label">Bagian</label>
                <div class="col-sm-10">
                  <select name="cbbagian" class="form-control">
                    <option value="0">- Pilih Bagian -</option>
                    <option value ="Administrasi" >Administrasi</option>
                    <option value ="Pendaftaran" >Pendaftaran</option>
                    <option value ="Keuangan" >Keuangan</option>
                    <option value ="Kepegawaian" >Kepegawaian</option>
                    <option value ="Logistik" >Logistik</option>
                  </select>
                </div>
              </div>

              <br>

              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Aktor</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-10">
                          <input name="idaktor" maxlength="5" type="normal" class="form-control" id="inputIDAktor" placeholder="ID Aktor">    
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
                      <td class="info"><?php echo $ida; ?></td>
                    </tr>

                    <tr>
                      <td class="info">Nama</td>
                      <td class="info"><?php echo $nama; ?></td>
                    </tr>
                  </table>
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
                    <option value="07.00 - 12.00" >07.00 - 12.00</option>
                    <option value="12.00 - 17.00" >12.00 - 17.00</option>
                    <option value="17.00 - 22.00" >17.00 - 22.00</option>
                  </select>
                </div>
              </div>

              </div>
            </div>

            
            <div class="text-center">
              <button class="btn btn-default" type="submit">Add</button>
              <button class="btn btn-default" type="submit">Edit</button>
              <button class="btn btn-default" type="submit">Delete</button>
            </div>

            <br>

            <div >
              <table class="table table-bordered">
              
                <tr>
                  <td class="info">No.</td>
                  <td class="info">ID Karyawan</td>
                  <td class="info">Nama</td>
                  <td class="info">Hari</td>
                  <td class="info">Jam Kerja</td>
                </tr>
                
                <tr>
                  <td class="active">1.</td>
                  <td class="active"></td>
                  <td class="active"></td>
                  <td class="active"></td>
                  <td class="active"></td>
                </tr>

                <tr>
                  <td class="active">2.</td>
                  <td class="active"></td>
                  <td class="active"></td>
                  <td class="active"></td>
                  <td class="active"></td>
                </tr>

                <tr>
                  <td class="active">3.</td>
                  <td class="active"></td>
                  <td class="active"></td>
                  <td class="active"></td>
                  <td class="active"></td>
                </tr>

              </table>
              
            </div>
            </form>       

          </div>
          
        </div>
      </div>