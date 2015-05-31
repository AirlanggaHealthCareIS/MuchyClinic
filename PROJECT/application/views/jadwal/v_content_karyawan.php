
<div class="container-fluid">
      <div class="">
        <h1>Buat Jadwal Karyawan</h1>
      </div>
    </div>
    <div class="container-fluid width: 900px">
      <div class="">
        
        <br>
        <div class = "row">

          <?php if ($this->input->get('error')=='idjadwalnull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum mengisi ID Jadwal Karyawan (Dimulai dengan JK---)
            </div>
          <?php endif ?>

          <?php if ($this->input->get('error')=='idkaryawannull'): ?>
            <div class="alert alert-danger" role="alert">
              Maaf anda belum mengisi ID Karyawan (untuk memilih karyawan yang akan diinputkan jadwalnya)
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
              Maaf ID Karyawan yang anda masukkan tidak ada dalam database
            </div>
          <?php endif ?>

          <?php if($this->input->get('error')=='apaya'): ?>
            <div class="alert alert danger alert dismissible" role="alert">
              Enaknya isi apa?
            </div>
          <?php endif ?>

          <div class = "col-md-6">
           
            <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/validasiKaryawan" method ="post">

              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Karyawan</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-10">
                          <input name="idkar" maxlength="5" type="normal" class="form-control" id="inputIDKaryawan" placeholder="ID Karyawan">    
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-default">Search</button>      
                        </div>
                      </div>
                    </div>
              </div>

              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Jadwal</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-12">
                          <input disabled name="idjadwal" maxlength="5" type="normal" class="form-control" id="inputIDJadwal" placeholder="ID Jadwal" value="<?php echo $idjadwalk ?>">    
                        </div>
                      </div>
                    </div>
                </div>

              <div>
                <table class="table">
                  <tr>
                    <td class="info">ID</td>
                    <td class="info"><?php echo $idkaryawan; ?></td>
                  </tr>

                  <tr>
                    <td class="info">Nama</td>
                    <td class="info"><?php echo $namakaryawan; ?></td>
                  </tr>
                </table>
              </div>

              </form> 

              <br>  

              <form class="form-horizontal" action="<?php echo base_url(); ?>jadwal/validasiKaryawan2" method ="post">
              
              <div class="form-group">
                
                  <label for="ID Karyawan" class="col-sm-2 control-label">ID Karyawan</label>
                  <div class="col-sm-10">
                    <div class="row">
                      <div class="col-sm-12">
                        <input name="idkaryawan" maxlength="5" type="normal" class="form-control" id="showIDKaryawan" placeholder="ID Karyawan" value="<?php echo $idkaryawan; ?>" >    
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

            <!-- // <form action="<?php echo base_url(); ?>" method="post"> -->
            <div class="text-center">
              <button name="submit" class="btn btn-default" value= "add" type="submit">Add</button>
            </div>

          <!-- </form> -->
        </form>

            <br>
            <br>

            <div >
              <table class="table table-bordered">

                <tr>
                  <td class="info">ID Jadwal</td>
                  <td class="info">ID Karyawan</td>
                  <td class="info">Nama</td>
                  <td class="info">Hari</td>
                  <td class="info">Jam Kerja</td>
                  <td class="info">Edit</td>
                  <td class="info">Delete</td>
                </tr>

                <?php if($lihatjadwalkar!=null): ?>
            
                <?php foreach($lihatjadwalkar->result() as $row) { ?>

                <tr>
                  <td class="active"><?php echo $row->ID_JADWAL_KRYN ?></td>
                  <td class="active"><?php echo $row->ID_KARYAWAN ?></td>
                  <td class="active"><?php echo $row->NAMA_K ?></td>
                  <td class="active"><?php echo $row->HARI_K ?></td>
                  <td class="active"><?php echo $row->JAM_K ?></td>
                  <td class="active">
                      <a href="<?php echo base_url() ?>/jadwal/editJadwalKaryawan/<?php echo $row->ID_JADWAL_KRYN ?>" class="btn btn-primary">Edit</a>                      <?php ?></td>
                  </tr>
                  <td class="active">
                      <a href="<?php echo base_url() ?>/jadwal/hapusJadwalKaryawan/<?php echo $row->ID_JADWAL_KRYN ?>" class="btn btn-primary">Delete</a>                      <?php ?></td>
                  </tr>
                </tr>

                <?php } ?>

                <?php endif ?>

              </table>
              
            </div>
          </div>
          
        </div>
      </div>