 

    <div class="container-fluid" style = "padding: 10px" >
      <div class="row"> 
        <div class="col-md-6 col-md-offset-3" style="background-color: #B0C4DE">
          <h1 class = "text-center">Absensi</h1>
            <div class = "container-fluid text-center" style="background-color: F0FFFF;">
              <img src = "<?php echo base_url()?>assets/images/logo2.png" alt="Responsive image">
            
            <div class="row">
             <div class="col-xs-2 col-sm-2"></div>

            <!--div class="col-md-6 col-md-offset-3"--> 
            <div class="col-xs-12 col-sm-8">

            <?php if ($this->input->get('error')=='null'): ?>
            <div class="alert alert-danger" role="alert"> maaf, form yang wajib anda isi kurang </div>  
            <?php endif ?>

            <?php if ($this->input->get('status')=='sukses'): ?>
            <div class="alert alert-success" role="alert">form sukses</div>
            <?php endif ?>

            
            <form class="form-horizontal" action = "<?php echo base_url()?>cabsensi/validasi" method="post">
            <div class="form-group"> 
            <label for="exampleInputEmail2" class="col-sm-5 control-label"> Nomor Identitas    :</label>
            <div class="col-sm-5">
            <input type="normal" name="id_karyawan" class="form-control" id="exampleInputEmail2" placeholder="Id karyawan">
            </div>
          </div>
            
           <div class="form-group"> 
            <label for="exampleInputEmail2" class="col-sm-5 control-label"> Tanggal Sekarang    :</label>
            <div class="col-sm-5">
            <input type="nomal" name="date_masuk" class="form-control" id="exampleInputEmail2" placeholder="dd-mm-yy">
            </div>
          </div>

            <div class="form-group"> 
            <label for="exampleInputEmail2" class="col-sm-5 control-label"> Waktu Sekarang    :</label>
            <div class="col-sm-5">
            <input type="normal" name="time_masuk" class="form-control" id="exampleInputEmail2" placeholder="00:00">
             </div>
           </div>

            <div class="form-group"> 
            <label for="exampleInputEmail2" class="col-sm-5 control-label"> Waktu pulang    :</label>
            <div class="col-sm-5">
            <input type="normal" name="time_pulang" class="form-control" id="exampleInputEmail2" placeholder="00:00">
             </div>
           </div>

            <div class="form-group"> 
            <label for="exampleInputEmail2" class="col-sm-5 control-label"> keterangan   :</label>
            <div class="col-sm-5">
            <input type="normal" name="ket" class="form-control" id="exampleInputEmail2" placeholder="lembur/tepat">
             </div>
           </div>

              <button type="submit" class="btn btn-default">submit absen</button>
            </form>
            </div>
            
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

    