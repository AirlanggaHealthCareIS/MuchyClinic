  <body>
    <div class="row">
      <div class="col-md-2">
        <div class="container-fluid" style="margin-bottom:50px; padding-top:120px; padding-left:50px;">
        <div class="container">
          <form action="<?php echo base_url()?>crawatinap">
            <button type="submit" class="btn btn-primary" style="width:150px;">FORM RAWAT INAP</button><br></br>
            <button type="button" class="btn btn-primary" style="width:150px;" disabled="disabled">LIHAT KAMAR</button><br></br>
          </form>  
        </div>
      </div>
      </div>
      <div class="col-md-10">
        <div class="container-fluid" style="margin-bottom:50px;">
          <div class="container">
            <h1>Daftar Pasien Rawat Inap</h1>
            <br></br>
            <div class="row">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-8">
                    <form action="<?php echo base_url()?>crawatinap/lihatkamar" method="post">
                      <label for="disabledTextInput">Kamar</label>
                      <select class="form-control" name="kamar">
                      <?php 
                          foreach ($getkam as $row) {?>
                          <option value="<?php echo $row->ID_KAMAR_INAP?>" selected><?php echo $row->NAMA_KAMAR_INAP; ?></option>
                      <?php    }?>
                      </select><br>
                      <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                  </div>
                  <div class="col-md-4">
                  </div>
                </div>
              </div>
              <div class="col-md-8">
              </div>
            </div>
            <br></br>
            <div class="row">
              <div class="col-xs-12 col-md-10">
                <table class="table table-bordered">           
                  <tr style="background-color: rgb(226, 246, 245);">
                    <th >KAMAR</th>
                    <th >NAMA PASIEN</th>
                    <th >NAMA DOKTER</th>
                    <th >TANGGAL MASUK</th>
                    <th >TANGGAL KELUAR</th>
                    <th >TOTAL BIAYA</th>
                  </tr>
                  <?php
                        foreach($drawatinap as $row){
                ?>
                    <tr>
                    <td><?php echo $row->NAMA_KAMAR_INAP ?></td>
                    <td><?php echo $row->NAMA_PASIEN ?></td>
                    <td><?php echo $row->NAMA_DOKTER ?></td>
                    <td><?php echo $row->TGL_MASK ?></td>
                    <td><?php echo $row->TGL_KELUAR ?></td>
                    <td><?php echo $row->TOTAL_BIAYA_RWT ?></td>
                    
                </tr>
                   <?php } ?>
                </table>
              </div>
              <div class="col-xs-6 col-md-2">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>