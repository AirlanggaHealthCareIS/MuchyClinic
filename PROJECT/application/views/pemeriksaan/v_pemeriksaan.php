    <div class="container-fluid" style = "padding: 100px">
      <div class="row"> 
        <div class="col-md-6 col-md-offset-3">
          <h1 class = "text-center">Pemeriksaan</h1>
            <div class = "container-fluid text-center">
              <img src = "<?php echo base_url()?>assets/images/logo2.png" alt="Responsive image"> 
            </div>
            <form>
                <div class="container-fluid" style="margin-bottom:50px; ">
          <div class="">
            <div class="row">
              <div class="col-md-8">
                <!-- pesan error -->
                <?php if ($this->input->get('error')=='null'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Please Fill in the blank</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('act')=='not_found'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Patient Not Found</p>
                  </div>
                <?php endif ?>
                <?php if ($this->input->get('error')=='symbol'): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>No symbol here</p>
                  </div>
                <?php endif ?>
  			<div class="form-group">
    		  <label for="exampleInputEmail1">ID Periksa : </label>
    		    <input type="normal" class="form-control" id="idperiksa" placeholder="Id Periksa">
  			</div>
            <div class="form-group">
    		<label for="exampleInputEmail1">ID Pasien : </label>
    		  <input type="normal" class="form-control" id="idpasien" placeholder="Id Pasien">
  			</div>

  			   <div class="form-group">
    		    <label for="exampleInputEmail1">ID Dokter : </label>
    		      <input type="normal" class="form-control" id="iddokter" placeholder="Id Dokter">
  			</div>

        <div class="form-group">
            <label for="exampleInputEmail1">ID Penyakit : </label>
              <input type="normal" class="form-control" id="iddokter" placeholder="Id Penyakit">
        </div>

         <label for="disabledTextInput">penyakit</label>

                <select class="form-control" name="penyakit">
                  <?php 
                      foreach ($getpeny as $row) {?>
                     <option value="<?php echo $row->ID_PENYAKIT?>"><?php echo $row->NAMA_PENYAKIT; ?></option>
                  <?php  }?>
                </select>
                <br>

  			<div class="form-group">
    		  <label for="disabledTextInput">Tanggal Periksa: </label>
    		    <input type="normal" class="form-control" id="tanggalperiksa" placeholder="<?php echo $da = date('Y-m-d');?>">
  			</div>

  			 <div class="form-group">
    		    <label for="exampleInputEmail1">Biaya Periksa </label>
    	     	<input type="normal" class="form-control" id="biayaperiksa" placeholder="biaya periksa">
  			</div>
  			<button type="submit" class="btn btn-default">deal</button>


            </form>

        </div>
      </div>
    </div>
