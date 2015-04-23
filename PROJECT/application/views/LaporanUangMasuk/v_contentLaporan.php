<div class ="container-fluid" style="margin-bottom:50px;">
      <div class="container">
        <h1><center>Laporan Uang Masuk</center></h1>
        <br></br>

        <div class="row">
          <div class="col-md-6">

              <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Pilihan Jangka Waktu
                  </label>
                   <div class="form-group">
                      <form class="form-horizontal" action = "<?php echo base_url()?>laporanuang" method = "post">
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-5 control-label">Periode Awal Transaksi</label>
                          <div class="col-sm-7">
                            <select class="form-control" style = "width:250px">
                              <option>- Pilih Periode Awal Transaksi -</option>



                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-5 control-label">Periode Akhir Transaksi</label>
                          <div class="col-sm-7">
                            <select class="form-control" style = "width:250px">
                              <option>- Pilih Periode Akhir Transaksi -</option>
                             
                            </select>
                          </div>
                        </div>
                      </form>
                </div>
                </div>
          <br></br>     
          </div>

          <div class="col-md-6">
              <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    n Transaksi Terakhir
                  </label>
                  
                  <div class="form-group">
                      <form class="form-horizontal">
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-5 control-label">Jumlah Transaksi Terakhir</label>
                          <div class="col-sm-7">
                            <select class="form-control" style = "width:250px">
                              <option>- Pilih Transaksi Terakhir -</option>
                              <option>5 Transaksi Terakhir</option>
                              <option>10 Transaksi Terakhir</option>
                              <option>15 Transaksi Terakhir</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-5 control-label">Tampil Berdasarkan</label>
                          <div class="col-sm-7">
                            <select class="form-control" style = "width:250px">
                              <option>- Pilih Tampil Berdasarkan -</option>
                              <option>Tanggal Transaksi</option>
                              <option>Jumlah Total Biaya</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-5 control-label">Urut Berdasarkan</label>
                          <div class="col-sm-7">
                            <select class="form-control" style = "width:250px">
                              <option>- Pilih Urut Berdasarkan -</option>
                              <option>Mulai Dari Yang Terkecil</option>
                              <option>Mulai Dari Yang Terbesar</option>
                            </select>
                          </div>
                        </div>
                      </form>
                </div>
          </div>
        <br></br>
        </div>

          <div class="text-center">
          <button type="submit" class="btn btn-info" style = "width:100px">Submit</button>
          <button type="reset" class="btn btn-info" style = "width:100px">Back</button>
          </div>
          <br></br>
          </div>

        <table class="table table-bordered">
          <tr style="background-color: rgb(226, 246, 245);">
            <td ><center>Tanggal Trnsaksi</center></td>
            <td ><center>Id Transaksi</center></td>
            <td ><center>Total Biaya Pemeriksaan</center></td>
            <td ><center>Total Biaya Rawat Inap</center></td>
            <td ><center>Total Biaya Resep</center></td>
            <td ><center>jumlah Total Biaya</center></td>
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
        

      </div>
    </div>