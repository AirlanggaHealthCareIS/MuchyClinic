<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1 class = "page-header">Pemeriksaan</h1>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-6">
        <!-- alert alert -->
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
        <?php if ($this->input->get('succesfully')=='succesfully'): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>Input Succesfully!!</p>
          </div>
        <?php endif ?>
            <!-- alert alert -->
    </div>
    <div class="col-md-6"></div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <form class="form-inline" action="<?php echo base_url()?>cpemeriksaan/validasipemeriksaan" method="post">
            <div class="form-group">
              <label for="disabledTextInput">Pasien</label><br>
              <input type="normal" name="id_pasien" maxlength="5" class="form-control" value="<?php echo $this->session->flashdata('id_pasien'); ?>" id="exampleInputId" placeholder="ID Pasien">
              <button type="submit" class="btn btn-info" style = "width:100px">search</button>
            </div>
                                
            
            <br></br>

            <table class="table table-bordered" style="border: 0px currentColor; border-image: none;">
              
              <tr>
              <td class="info" style="width:200px">Id Pasien </td>
              <td class="info"> <?php echo $this->session->flashdata('idpasien'); ?></td>
              </tr>
              <tr>
              <td class="info">Nama Pasien </td>
              <td class="info"><?php echo $this->session->flashdata('namapas'); ?></td>
              </tr>

              <tr>
              <td class="info">no telp </td>
              <td class="info"><?php echo $this->session->flashdata('telppas'); ?></td>
              </tr>

      
            </table><br> 
        </form>
    </div>
    <div class="col-md-6"></div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <form>
      <label for="disabledTextInput">penyakit</label>
          <select class="form-control" name="penyakit">
          <?php 
            foreach ($getpeny as $row) {?>
             <option value="<?php echo $row->ID_PENYAKIT?>"><?php echo $row->NAMA_PENYAKIT; ?></option>
             <?php  }?>
             </select>
             <br>
<!-- 
        <div class="form-group">
        <label for="disabledTextInput">Tanggal Periksa: </label>
        <input type="normal" class="form-control" id="tanggalperiksa" placeholder="<?php echo $da = date('Y-m-d');?>">
        </div>
 -->
        <div class="form-group">
          <label for="exampleInputEmail1">Keluhan </label>
            <textarea class="form-control" rows="3" name="keluhan"></textarea>
        </div>

        <button type="submit" class="btn btn-default">deal</button>
      </form>
    </div>
    <div class="col-md-6"></div>
  </div> 
</div>