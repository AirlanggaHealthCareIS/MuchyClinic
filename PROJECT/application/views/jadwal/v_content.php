<div class="container-fluid">
      <div class="container">
        <h1>Buat Jadwal</h1>
      </div>
    </div>
    <div class="container-fluid width: 900px">
      <div class="container">
        
        <br>
        <div class = "row">
          <?php if ($this->input->get('error')=='null'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf inputan anda kosong
            </div>
          <?php endif ?>
          
          
          <div class = "col-md-6">
           
            <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/validasi" method ="post">
              <div class="form-group">
                <label for="Aktor" class="col-sm-2 control-label">Aktor</label>
                <div class="col-sm-10">
                  <select class="form-control">
                    <option>- Pilih Aktor -</option>
                    <option>Dokter</option>
                    <option>Apoteker</option>
                    <option>Karyawan</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="Bagian" class="col-sm-2 control-label">Bagian</label>
                <div class="col-sm-10">
                  <select class="form-control">
                    <option>- Pilih Bagian -</option>
                    <option>Administrasi</option>
                    <option>Pendaftaran</option>
                    <option>Keuangan</option>
                    <option>Kepegawaian</option>
                    <option>Logistik</option>
                  </select>
                </div>
              </div>

              <br>

              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Aktor</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-10">
                          <input name="idaktor" type="normal" class="form-control" id="inputIDAktor" placeholder="ID Aktor">    
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
                      <td class="info">ID Karyawan</td>
                      <td class="info">K0001</td>
                    </tr>

                    <tr>
                      <td class="info">Nama</td>
                      <td class="info">Ani Yuliani</td>
                    </tr>

                    <tr>
                      <td class="info">Jabatan</td>
                      <td class="info">Karyawan Administrasi</td>
                    </tr>
                  </table>
                </div>

                <div class="form-group">
                <label for="Hari" class="col-sm-2 control-label">Hari</label>
                <div class="col-sm-10">
                  <select class="form-control">
                    <option>- Pilih Hari -</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                    <option>Minggu</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="Jam" class="col-sm-2 control-label">Jam</label>
                <div class="col-sm-10">
                  <select class="form-control">
                    <option>- Pilih Jam -</option>
                    <option>07.00 - 12.00</option>
                    <option>12.00 - 17.00</option>
                    <option>17.00 - 22.00</option>
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
                  <td class="active">K0001</td>
                  <td class="active">Ani Yuliani</td>
                  <td class="active">Senin</td>
                  <td class="active">07:00 - 13:00</td>
                </tr>

                <tr>
                  <td class="active">2.</td>
                  <td class="active">K0002</td>
                  <td class="active">Budi Hari</td>
                  <td class="active">Senin</td>
                  <td class="active">07:00 - 13:00</td>
                </tr>

                <tr>
                  <td class="active">3.</td>
                  <td class="active">K0003</td>
                  <td class="active">Caca Handika</td>
                  <td class="active">Senin</td>
                  <td class="active">13:00 - 19:00</td>
                </tr>

              </table>
              
            </div>
            </form>       

          </div>
          
        </div>
      </div>