<div class ="container-fluid" style="margin-bottom:50px;">
      <div class="">
        <h1>Laporan Uang Masuk</h1>
 

        <div class="row">
          <div class="col-md-5">
            <?php if ($this->input->get('error')=='null'): ?>
              <div class ="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Sorry Fild is Empty! Please Input Periode Again.
            </div>
            <?php endif ?>


            <h4>Periode Laporan :</h4>
            <div class="col-sm-offset-1 col-sm-11">
            <div class="col-xs-5">
              <input type="radio" name="rad" id="rad1" value="1" class="rad"/> Jangka Waktu
            </div>
            <div class="col-xs-7">
              <input type="radio" name="rad" id="rad2" value="2" class="rad"/> n Transaksi Terakhir
            </div>
            </div>

                             
            <!-- form yang mau ditampilkan-->
            <br></br>
            <div id="form1" style="display:none">
                <div class="form-group">
                     <form class="form-horizontal" action="<?php echo base_url(); ?>laporanuang/validasi" method="post">
                        <div class="form-group">
                          <label for="tanggal" class="col-sm-4 control-label">Periode Awal</label>
                          <div class="col-sm-8">
                            <input type="date" name="tanggal_awal" value="" class="form-control" id="tanggal" placeholder="input tanggal">
                          </div>
                        </div>
                         
                        <div class="form-group">
                          <label for="tanggal" class="col-sm-4 control-label">Periode Akhir</label>
                          <div class="col-sm-8">
                            <input type="date" name="tanggal_akhir" value="" class="form-control" id="tanggal" placeholder="input tanggal">
                          </div>
                        </div>
                    <button type="submit" class="btn btn-info" style = "width:100px">Submit</button>
                    <br></br>
                  </form>
                  <br></br>         
                </div>
            </div>

            <div id="form2" style="display:none">
                <div class="form-group">
                       <form class="form-horizontal" action="<?php echo base_url(); ?>laporanuang/validasiTransaksi" method="post">
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-6 control-label">Jumlah Transaksi Terakhir</label>
                          <div class="col-sm-6">
                            <select class="form-control" style = "width:200px">
                              <option>- Transaksi Terakhir -</option>
                              <option>5 Transaksi Terakhir</option>
                              <option>10 Transaksi Terakhir</option>
                              <option>15 Transaksi Terakhir</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-6 control-label">Tampil Berdasarkan</label>
                          <div class="col-sm-6">
                            <select class="form-control" style = "width:200px">
                              <option>- Tampil Berdasarkan -</option>
                              <option>Tanggal Transaksi</option>
                              <option>Jumlah Total Biaya</option>
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
                      <br></br>
                </div>
            </div>

                  <!-- tambahkan jquery-->
                  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
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

          <div class="">
            <table class="table table-bordered">
          <tr style="background-color: rgb(226, 246, 245);">
            <td ><center>Tanggal Transaksi</center></td>
            <td ><center>Id Transaksi</center></td>
            <td ><center>Total Bayar Rawat Inap</center></td>
            <td ><center>Total Bayar Pemeriksaaan</center></td>
            <td ><center>Total Bayar Obat</center></td>
            <td ><center>Total Jumlah Pembayaran</center></td>
          </tr>

              <?php if ($dlaporanuang!=null): ?>       
                   <?php foreach($dlaporanuang->result() as $row) {?>
                    
                       <tr >
                        <td ><?php echo $row->TGL_TRANSAKSI ?></td>
                        <td ><?php echo $row->ID_TRANSAKSI?></td>
                        <td ><?php echo $row->SUBTOTAL ?></td>
                        <td ><?php echo $row->SUBTOTAL ?></td>
                        <td ><?php echo $row->SUBTOTAL ?></td>
                        <td ><?php echo $row->TOTAL ?></td>
                      </tr>

                    <?php } ?>
                    <?php endif ?>
            </table>
             <button type="submit" class="btn btn-info" style = "width:100px">Cetak</button>
             <button type="submit" class="btn btn-info" style = "width:150px">Tampilkan Grafik</button>
          </div>


          </div>
        <br></br>
        </div>         

      </div>