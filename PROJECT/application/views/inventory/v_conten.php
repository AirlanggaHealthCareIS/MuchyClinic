<div class="container-fluid" style="margin-bottom:50px;">
      <div class="container" style="width:900px">

        <h1>Inventori Obat</h1>
        <br></br>

        <div class="row">
          <div class="col-md-4">
            <?php if ($this->input->get('error')=='null'): ?>
               <div class= "alert alert-danger" role="alert">
                Maaf penulisan nama obat tidak lengkap
              </div>
             <?php endif ?>

             <?php if ($this->input->get('error')=='symbol'):?>
              <div class= "alert alert-danger" role="alert">
               Mohon tidak menulis symbol ketika mencari nama obat
              </div>
             <?php endif ?>



            <form class="form-inline" action="<?php echo base_url()?>inventory/validasi" method="post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Nama Obat</label>
                <input type="normal" name= "nama_obat" class="form-control" id="exampleInputEmail3" placeholder="Nama Obat">
              </div>
              
              <button type="submit" class="btn btn-default">Search</button>
              <br></br>


            </form>



          </div>

          <div class="col-md-8" style="text-align: right;">

             
              <button type="submit" class="btn btn-default">Stok kritis</button>
              

          </div>
        </div>
         

        <table class="table table-bordered">
          <tr>
            <td class="info">Id obat</td>
            <td class="info">Nama Obat</td>
            <td class="info">Kategori</td>
            <td class="info">Harga</td>
            <td class="info">Obat Kritis</td>
            
          </tr>
          <?php if($query2!=null): ?>
          <?php foreach ($query2->result_array() as $row): ?>            
          <tr>
            <td ><?php echo $row['ID_OBAT']; ?></td>
            <td ><?php echo $row['NAMA_OBAT']; ?></td>
            <td ><?php echo $row['KATEGORI_OBAT']; ?></td>
            <td ><?php echo $row['HARGA']; ?></td>
            <td ><?php echo $row['OBAT_KRITIS']; ?></td>
          </tr>
          <?php endforeach ?>
        <?php endif ?>
          
          
        </table>

      </div>
    </div>