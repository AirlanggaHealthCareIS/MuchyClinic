<div class ="container-fluid" style="margin-bottom:50px;">
      <div class="">
        <h1>Laporan Uang Masuk</h1>
 

        <div class="row">
          <div class="col-md-6">
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
              <input type="radio" name="rad" id="rad2" value="2" class="rad"/> n Periode Laporan Terakhir
            </div>
            </div>

                             
            <!-- form yang mau ditampilkan-->
            <br></br>
            <div id="form1" style ="<?php if ($this->session->flashdata('statusJangkaWaktu')==false){ echo 'display:none;'; } ?>">
                <div class="form-group">
                     <form class="form-horizontal" action="<?php echo base_url(); ?>laporanuang/validasi" method="post">
                        <div class="form-group">
                          <label for="tanggal" class="col-sm-4 control-label">Periode Awal</label>
                          <div class="col-sm-8">
                            <input type="date" name="tanggal_awal" value="" class="form-control" id="tanggal" placeholder="input tanggal" style = "width:270px">
                          </div>
                        </div>
                         
                        <div class="form-group">
                          <label for="tanggal" class="col-sm-4 control-label">Periode Akhir</label>
                          <div class="col-sm-8">
                            <input type="date" name="tanggal_akhir" value="" class="form-control" id="tanggal" placeholder="input tanggal" style = "width:270px">
                          </div>
                        </div>
                    <button type="submit" class="btn btn-info" style = "width:100px">Submit</button>
                    <br></br>
                  </form>
                         
                </div>
            </div>

            <div id ="form2" style ="<?php if ($this->session->flashdata('statusPeriode')==false){ echo 'display:none;'; } ?>">
                <div class="form-group">
                       <form class="form-horizontal" action="<?php echo base_url(); ?>laporanuang/validasiTransaksi" method="post">
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label">Periode Laporan</label>
                          <div class="col-sm-4">
                            <select class="form-control"  name="jumlah_transaksi" style ="margin-left:25px">
                              <option value="0">- Periode -</option>
                              <option value="hari">Hari</option>
                              <option value="bulan">Bulan</option>
                              <option value="tahun">Tahun</option>
                            </select>
                          </div>
                          <div class="col-sm-4">
                           <input name="jumlah" type="text" class="form-control" style = "width:150px" placeholder="Jumlah">
                          </div>
                        </div>

                        
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 control-label">Urut Berdasarkan</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="urut_berdasarkan" style ="margin-left:20px">
                              <option value="0">- Urut Berdasarkan -</option>
                              <option value="ASC">Dari Tanggal Yang Terkecil</option>
                              <option value="DESC">Dari Tanggal Yang Terbesar</option>
                            </select>
                          </div>
                        </div>
                          <button type="submit" class="btn btn-info" style = "width:100px">Submit</button>
                          <br></br>
                      </form>
                    
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

    <div class="col-md-6">  
    </div>


        </div>
        <br></br>



        <div class="row">
          <div class="col-md-7">
            <table class="table table-bordered">
          <tr style="background-color: rgb(226, 246, 245);">
            <td ><center>Tanggal Transaksi</center></td>
            <td ><center>Id Transaksi</center></td>
            <td ><center>Nama Kasir</center></td>
            <td ><center>Waktu Transaksi</center></td>
            <td ><center>Total Pembayaran</center></td>
          </tr>

              <?php if ($dlaporanuang!=null): ?>       
                   <?php foreach($dlaporanuang->result() as $row) {?>
                    
                       <tr >
                        <td ><center><?php echo $row->TGL_TRANSAKSI ?> </center></td>
                        <td ><center><?php echo $row->ID_TRANSAKSI?>   </center></td>
                        <td ><center><?php echo $row->NAMA_K ?>        </center></td>
                        <td ><center><?php echo $row->JAM_TRANSAKSI ?> </center></td>
                        <td ><p class="text-right"><?php echo $row->TOTAL ?></p></td>
                      </tr>

                    <?php } ?>
                    <?php endif ?>
            </table>
             <form class="form-horizontal" action="<?php echo base_url(); ?>laporanuang/cetak" method="post">
             <button type="submit" class="btn btn-info" style = "width:100px">Cetak</button>
             <button type="submit" class="btn btn-info" style = "width:150px">Tampilkan Grafik</button>
             </form>

          </div>


          <div class="col-md-5">  
          </div>



          </div>
        </div>         


      </div>




      <!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Laporan Keuangan</h4>
      </div>
      <div class="modal-body">
          Laporan Keuangan Dengan Periode Tersebut Belum Tersedia.
      </div>      
    </div>
  </div>
</div>

      <!-- Modal -->
<div class="modal fade" id="myModal4"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Laporan Keuangan</h4>
      </div>
      <div class="modal-body">
          Periode Awal dan Periode Akhir Salah (Periode Awal > Periode Akhir)<br>
          Mohon Periksa dan Isikan Periode Laporan Dengan Benar !
      </div>      
    </div>
  </div>
</div>