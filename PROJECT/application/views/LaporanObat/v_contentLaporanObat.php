<div class ="container-fluid" style="margin-bottom:50px;">
      <div class="">
        <h1>Laporan Obat</h1>
 

        <div class="row">
          <div class="col-md-5">
                
            <h4>Periode Laporan :</h4>
            <div class="col-sm-offset-1 col-sm-11">
            <div class="col-xs-5">
              <input type="radio" name="rad" id="rad1" value="1" class="rad"/> Jangka Waktu
            </div>
            <div class="col-xs-7">
              <input type="radio" name="rad" id="rad2" value="2" class="rad"/> n Periode Laporan
            </div>
            </div>
            <br></br>
                       
            <!-- form yang mau ditampilkan-->
            <br></br>
            <div id="form1" style="display:none">
                <div class="form-group">
                     <form class="form-horizontal" action="<?php echo base_url(); ?>laporanobat/validasi" method="post">
                        <div class="form-group">
                          <label for="tanggal" class="col-sm-4 control-label">Periode Awal</label>
                          <div class="col-sm-8">
                            <input type="date" name="tanggal" value="21/04/2015<?php?>" class="form-control" id="tanggal" placeholder="input tanggal">
                          </div>
                        </div>
                         
                        <div class="form-group">
                          <label for="tanggal" class="col-sm-4 control-label">Periode Akhir</label>
                          <div class="col-sm-8">
                            <input type="date" name="tanggal" value="21/04/2015<?php?>" class="form-control" id="tanggal" placeholder="input tanggal">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label">Tampilkan</label>
                          <div class="col-sm-8">
                            <select class="form-control" style = "width:263px">
                              <option>- Tampilkan -</option>
                              <option>Obat Masuk</option>
                              <option>Obat Keluar</option>
                            </select>
                          </div>
                        </div>
                    <button type="submit" class="btn btn-info" style = "width:100px">Submit</button>
                    <br></br>
                  </form>
        
          
                </div>
            </div>

            <div id="form2" style="display:none">
                <div class="form-group">
                       <form class="form-horizontal" action="<?php echo base_url(); ?>laporanobat/validasiTransaksi" method="post">
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-6 control-label">Jumlah Periode Laporan</label>
                          <div class="col-sm-6">
                            <select class="form-control" style = "width:200px">
                              <option>- Periode Laporan -</option>
                              <option>Januari - April</option>
                              <option>Mei - Agustus</option>
                              <option>September - Desember</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-6 control-label">Tahun Periode Laporan</label>
                          <div class="col-sm-6">
                            <select class="form-control" style = "width:200px">
                              <option>- Tahun Periode Laporan -</option>
                              <option>2015</option>
                              <option>2016</option>
                              <option>2017</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-6 control-label">Tampilkan</label>
                          <div class="col-sm-6">
                            <select class="form-control" style = "width:200px">
                              <option>- Tampilkan -</option>
                              <option>Obat Masuk</option>
                              <option>Obat Keluar</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-6 control-label">Urut Berdasarkan</label>
                          <div class="col-sm-6">
                            <select class="form-control" style = "width:200px">
                              <option>- Urut Berdasarkan -</option>
                              <option>Dari Yang Terkecil</option>
                              <option>Dari Yang Terbesar</option>
                            </select>
                          </div>
                        </div>
                          <button type="submit" class="btn btn-info" style = "width:100px">Submit</button>
                          <br></br>
                      </form>
                </div>
            </div>

            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
            <script type="text/javascript">
            $(function(){
            $(":radio.rad").click(function(){
            $("#form1, #form2").hide()
            if($(this).val() == "1"){
            $("#form1").show();
            }else{
            $("#form2").show();
            }
            });
            });
            </script>
      </div>

    <div class="col-md-7">  
    </div>


    <br></br>
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
        <br></br>
        </div>         

      </div>