<div class ="container-fluid" style="margin-bottom:50px;">
      <div class="container">
        <h1><center>Rekam Medis</center></h1>
        <br></br>

        <div class="row">
          <div class="col-md-4">
            <?php if ($this->input->get('error')=='null'): ?>
              <div class ="alert alert-danger" role="alert">
              Maaf Fild Kosong! Silahkan Input Id Pasien Kembali.
            </div>
            <?php endif ?>

            

            <form class="form-inline" action = "<?php echo base_url()?>rekammedis/validasi" method = "post">
              <div class="form-group">
                <label class="sr-only" for="exampleInputId">ID Pasien</label>
                <input type="normal" name = "id_pasien" class="form-control" id="exampleInputId" placeholder="ID Pasien">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
              <br></br>

              <table class="" style="border: 0px currentColor; border-image: none;">

              <tr>
              <td style="width:43%">Nama Pasien</td>
              <td>DonyPrasetiyo</td>
              </tr>

              <tr>
              <td>TTL</td>
              <td>Samarinda, 30 Februari 1880</td>
              </tr>

              <tr>
              <td>Jenis Kelamin</td>
              <td>Laki-Laki</td>
              </tr>

              <tr>
              <td>Golongan Darah</td>
              <td>AB</td>
              </tr>

            </table>
            <br>
            </form>
            <br></br>

          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
          </div>
        </div>

        <table class="table table-bordered">
          <tr style="background-color: rgb(226, 246, 245);">
            <td >No</td>
            <td >ID Periksa</td>
            <td >Tanggal Periksa</td>
            <td >Dokter</td>
            <td >Diagnosa</td>
            <td >Obat</td>
          </tr>
          <tr>
            <td >...</td>
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
            <td >...</td>
          </tr>
          <tr>
            <td >...</td>
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
            <td >...</td>
          </tr>
        </table>
        <button type="reset" class="btn btn-default">Back</button>

      </div>
    </div>