<div class ="container-fluid" style="margin-bottom:50px;">
  <div class="">
    <h1>Laporan Obat</h1>
    <hr>
    <br>


    <div class="row">
      <div class="col-md-6">
        <?php if ($this->input->get('error')=='null'): ?>
        <div class ="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Sorry Fild is Empty! Please Input Periode Again.
        </div>
      <?php endif ?>



      <h4 style="margin-bottom: 25px;">Periode Laporan Obat </h4>
      <div class="col-sm-offset-1 col-sm-11">
        <div class="col-xs-5">
          <input type="radio" name="rad" id="rad1" value="1" class="rad"/> Obat Masuk
        </div>
        <div class="col-xs-7">
          <input type="radio" name="rad" id="rad2" value="2" class="rad"/> Obat Keluar
        </div>
      </div>


      <!-- form yang mau ditampilkan-->
      <br></br>
      <div id="form1" style ="<?php if ($this->session->flashdata('statusObatMasuk')==false){ echo 'display:none;'; } ?>">
        <div class="form-group">
         <form class="form-horizontal" action="<?php echo base_url(); ?>laporanobat/validasiObatMasuk" method="post">
          <div class="form-group">
            <label for="tanggal" class="col-sm-4 control-label">Periode Awal Obat Masuk</label>
            <div class="col-sm-8">
              <input type="date" name="tanggal_awal" value="" class="form-control" id="tanggal" placeholder="input tanggal" style = "width:270px">
            </div>
          </div>

          <div class="form-group">
            <label for="tanggal" class="col-sm-4 control-label">Periode Akhir Obat Masuk</label>
            <div class="col-sm-8">
              <input type="date" name="tanggal_akhir" value="" class="form-control" id="tanggal" placeholder="input tanggal" style = "width:270px">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-8 col-sm-offset-4">
              <button type="submit" class="btn btn-info" style = "width:100px">Submit</button>
            </div>
          </div>
          <br></br>
        </form>
        <table class="table table-bordered">
          <tr style="background-color: rgb(226, 246, 245);">
            <td ><center>Tanggal Obat Masuk</center></td>
            <td ><center>Id Obat</center></td>
            <td ><center>Nama Obat</center></td>
            <td ><center>Nama Apoteker</center></td>
            <td ><center>Quantity</center></td>
          </tr>

          <?php if ($dlaporanobat!=null): ?>       
          <?php foreach($dlaporanobat->result() as $row) {?>

          <tr>
            <td ><center><?php echo $row->TGL_MASUK ?> </center></td>
            <td ><center><?php echo $row->ID_OBAT_MASUK?>   </center></td>
            <td ><center><?php echo $row->NAMA_OBAT ?>        </center></td>
            <td ><center><?php echo $row->NAMA_APOTEKER ?> </center></td>
            <td ><p class="text-right"><?php echo $row->JUMLAH_OBAT_MASUK ?></p></td>
          </tr>

          <?php } ?>
        <?php endif ?>
      </table>
      <form class="form-horizontal" action="<?php echo base_url(); ?>laporanobat/cetak" method="post">
       <a type="submit" class="btn btn-info" style = "width:100px" href="<?php echo base_url(); ?>laporanuang/cetak" target="_blank">Cetak</a>
       <button type="submit" class="btn btn-info" style = "width:150px">Tampilkan Grafik</button>
     </form>

   </div>
 </div>

 <div id="form2" style ="<?php if ($this->session->flashdata('statusObatKeluar')==false){ echo 'display:none;'; } ?>">
  <div class="form-group">
   <form class="form-horizontal" action="<?php echo base_url(); ?>laporanobat/validasiObatKeluar" method="post">
    <div class="form-group">
      <label for="tanggal" class="col-sm-4 control-label">Periode Awal Obat Keluar</label>
      <div class="col-sm-8">
        <input type="date" name="tanggal_awal" value="" class="form-control" id="tanggal" placeholder="input tanggal" style = "width:270px">
      </div>
    </div>

    <div class="form-group">
      <label for="tanggal" class="col-sm-4 control-label">Periode Akhir Obat Keluar</label>
      <div class="col-sm-8">
        <input type="date" name="tanggal_akhir" value="" class="form-control" id="tanggal" placeholder="input tanggal" style = "width:270px">
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-8 col-sm-offset-4">
        <button type="submit" class="btn btn-info" style = "width:100px">Submit</button>
      </div>
    </div>
    <br></br>
  </form> 
  <table class="table table-bordered">
    <tr style="background-color: rgb(226, 246, 245);">
      <td ><center>Tanggal Obat Keluar</center></td>
      <td ><center>Id Obat</center></td>
      <td ><center>Nama Obat</center></td>
      <td ><center>Nama Apoteker</center></td>
      <td ><center>Quantity</center></td>
    </tr>

    <?php if ($dlaporanobat!=null): ?>       
    <?php foreach($dlaporanobat->result() as $row) {?>

    <tr >
      <td ><center><?php echo $row->TGL_OBAT_KELUAR ?> </center></td>
      <td ><center><?php echo $row->ID_OBAT_KELUAR?>   </center></td>
      <td ><center><?php echo $row->NAMA_OBAT ?>        </center></td>
      <td ><center><?php echo $row->NAMA_APOTEKER ?> </center></td>
      <td ><p class="text-right"><?php echo $row->QTY ?></p></td>
    </tr>

    <?php } ?>
  <?php endif ?>
</table>
<form class="form-horizontal" action="<?php echo base_url(); ?>laporanobat/cetak" method="post">
 <a type="submit" class="btn btn-info" style = "width:100px" href="<?php echo base_url(); ?>laporanuang/cetak" target="_blank">Cetak</a>
 <button type="submit" class="btn btn-info" style = "width:150px">Tampilkan Grafik</button>
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
    }
    else{
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





</div>         
</div>




<!-- Modal -->
<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Laporan Obat</h4>
      </div>
      <div class="modal-body">
        Laporan Obat Dengan Periode Tersebut Belum Tersedia.
      </div>      
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal5"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Laporan Obat</h4>
      </div>
      <div class="modal-body">
        Periode Awal dan Periode Akhir Salah (Periode Awal > Periode Akhir)<br>
        Mohon Periksa dan Isikan Periode Laporan Dengan Benar !
      </div>      
    </div>
  </div>
</div>