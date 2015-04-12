 

    <div class="container-fluid" style = "padding: 10px">
      <div class="row"> 
        <div class="col-md-6 col-md-offset-3">
          <h1 class = "text-center">Absensi</h1>
            <div class = "container-fluid text-center">
              <img src = "<?php echo base_url()?>assets/images/logo2.png" alt="Responsive image"> 
            </div>

            <?php if ($this->input->get('error')=='null'): ?>
            <div class="alert alert-danger" role="alert"> maaf </div>  
            <?php endif ?>
            
            <form class="form-inline" action = "<?php echo base_url()?>cabsensi/validasi" method="post">
            <div class="form-group">

              <label for="exampleInputEmail2">iD Karyawan </label>
              <input type="normal" name="id_karyawan" class="form-control" id="exampleInputEmail2" placeholder="Id karyawan">
            </div>
              <button type="submit" class="btn btn-default">absen</button>
            </form>
        </div>
      </div>
    </div>

    