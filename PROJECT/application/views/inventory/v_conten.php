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
            <form class="form-inline" action="<?php echo base_url()?>inventory/validasi" method="post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Nama Obat</label>
                <input type="normal" name= "id_obat" class="form-control" id="exampleInputEmail3" placeholder="Nama Obat">
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
            <td >No</td>
            <td >Nama Obat</td>
            <td >Jenis</td>
            <td >Stok</td>
            <td >Harga</td>
            
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
           
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
           
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            
          </tr>
          <tr>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
            <td >...</td>
           
          </tr>
        </table>

      </div>
    </div>