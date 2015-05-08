<div class="container-fluid" style="margin-bottom:50px;">
      <div class="container" style="width:900px">

        <h1>Inventori Obat</h1>
        <br></br>

        <div class="row">
          <div class="col-md-4">
            <?php if ($this->input->get('error')=='null'): ?>
               <div class= "alert alert-danger" role="alert">
                maaf
              </div>
             <?php endif ?>
            <!-- <form class="form-inline" action="<?php echo base_url()?>inventory/validasi" method="post">
              <div class="form-group">
                <button type="submit" class="btn btn-default">Stok Kritis</button>
              </div>
              <br></br>
            </form> -->



          </div>

          <div class="col-md-8" style="text-align: right;">

             
             
              

          </div>
        </div>
         

        <table class="table table-bordered">
          <tr>
            <td class="info">Id obat</td>
            <td class="info">Nama Obat</td>
            <td class="info">Harga</td>
            <td class="info">Jumlah obat</td>
            
          </tr>
          
          <?php 
          foreach ($stokkritis->result_array() as $row) {
            # code...
          
          ?>            
          <tr>
            <td ><?php echo $row['ID_OBAT']; ?></td>
            <td ><?php echo $row['NAMA_OBAT']; ?></td>
            <td ><?php echo $row['HARGA']; ?></td>
            <td ><?php echo $row['OBAT_KRITIS']; ?></td>
          </tr>
          <?php  }?>
        
          
          
        </table>

      </div>
    </div>