 

    <div class="container-fluid" style = "padding: 10px" style="background-color: F0FFFF;">
      <div class="row"> 
        <div class="col-md-6 col-md-offset-3">
          <h1 class = "text-center">Absensi</h1>
            <div class = "container-fluid text-center">
              <img src = "<?php echo base_url()?>assets/images/logo2.png" alt="Responsive image"> 
            </div>

            <?php if ($this->input->get('error')=='null'): ?>
            <div class="alert alert-danger" role="alert"> maaf, form yang wajib anda isi kurang </div>  
            <?php endif ?>
            
            <form class="form-inline" action = "<?php echo base_url()?>cabsensi/validasi" method="post">

            <div class="form-group">
            <table border="0" cellpadding="10">
             <tr>
            <td><label for="exampleInputEmail2">ID Karyawan     :</label></td>
            <td><input type="normal" name="id_karyawan" class="form-control" id="exampleInputEmail2" placeholder="Id karyawan"></td>
            </tr>
             <!--table border="0" cellpadding="7"-->
            <tr style = "padding :">
            <td><label for="exampleInputEmail2">Tanggal Hari ini:</label></td>
            <td><input type="nomal" name="date_masuk" class="form-control" id="exampleInputEmail2" placeholder="dd-mm-yy"></td>
            </tr>

            <tr>
            <td><label for="exampleInputEmail2">Waktu Kedatangan:</label></td>
            <td><input type="normal" name="time_masuk" class="form-control" id="exampleInputEmail2" placeholder="00:00"></td>
            </tr>
            </table>  

              <button type="submit" class="btn btn-default">submit absen</button>
            </form>

              <!--label for="exampleInputEmail2">ID Karyawan </label-->
              <!--input type="normal" name="id_karyawan" class="form-control" id="exampleInputEmail2" placeholder="Id karyawan"-->
            </div>
            
            <!--div class="form-group"-->
           
              <!--label for="exampleInputEmail2">Tanggal :</label-->
              <!--input type="nomal" name="date_masuk" class="form-control" id="exampleInputEmail2" placeholder="dd-mm-yy"-->
            <!--/div-->
            
            
              <!--label for="exampleInputEmail2">Waktu kedatangan :</label-->
              <!--input type="normal" name="time_masuk" class="form-control" id="exampleInputEmail2" placeholder="00:00"-->
            </div>
              
        </div>
      </div>
    </div>

    