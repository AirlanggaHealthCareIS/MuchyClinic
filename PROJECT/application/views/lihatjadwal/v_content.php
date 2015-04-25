<div class="container-fluid">
      <div class="container">
        <h1>Jadwal</h1>
      </div>
    </div>
    <div class="container-fluid width: 900px">
      <div class="container">
        
        <?php if ($this->input->get('error')=='null'): ?>
          <div class="alert alert-danger" role="alert">
            Maaf inputan id anda kosong
          </div>
        <?php endif ?>

        <br>
        
          <div class = "col-md-6">
           
            <form class="form-horizontal" action="<?php echo base_url(); ?>lihatjadwal/validasi" method ="post">

              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Aktor</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-10">
                          <input name="id_aktor" maxlength="5" type="normal" class="form-control" id="inputIDAktor" placeholder="ID Aktor">    
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
                      <td class="info"><?php echo $ida ?></td>
                    </tr>

                    <tr>
                      <td class="info">Nama</td>
                      <td class="info"><?php echo $nama; ?></td>
                    </tr>
                  </table>
                </div>

                <div >
                  <table class="table table-bordered">
                  
                    <tr>
                      <th class="info">Hari</th>
                      <th class="info">Jam</th>
                    </tr>

                  <?php if ($lihatjadwal!=null): ?>
                      
                   <?php foreach($lihatjadwal->result() as $row) {?>
                    
                      <tr>
                        <td class="active"><?php echo $row->HARI_A ?></td>
                        <td class="active"><?php echo $row->JAM_KERJA_A ?></td>
                      </tr>

                    <?php } ?>

                    <?php endif ?>
                  </table>
                    
                </div>

              </div>
            </div>

            
            </form>       

          </div>
          
        </div>
      </div>