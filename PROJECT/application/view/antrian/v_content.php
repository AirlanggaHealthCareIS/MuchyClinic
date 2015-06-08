<div class="container-fluid">
        <div class="">
      <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Antrian On The Spot</h1>
      
      </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <!-- tanggal -->
             <script language="javascript"> 
              var tanggallengkap = new String(); 
              var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu"); 
              namahari = namahari.split(" "); 
              var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober Nopember Desember"); 
              namabulan = namabulan.split(" "); 
              var tgl = new Date(); 
              var hari = tgl.getDay(); 
              var tanggal = tgl.getDate(); 
              var bulan = tgl.getMonth(); 
              var tahun = tgl.getFullYear(); 
              tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun; 
              document.write(tanggallengkap); 
            </script> 
            </font>
          </div>
          <!-- tanggal -->

          <!-- Jam -->
          <div class="col-md-6 text-center">
            <style>
                .jam {
                 font-family : tahoma;
                 font-weight : ;
                 font-size : 11px;
                 position : relative;
                 top : 0px;
                 left : 0px;
                 }
                </style>
                <script language="javascript">
                <!--
                function tampilkanjam()
                 {
                 var waktu = new Date();
                 var jam = waktu.getHours();
                 var menit = waktu.getMinutes();
                 var detik = waktu.getSeconds();
                 var teksjam = new String();
                 if ( menit <= 9 )
                 menit = "0" + menit;
                 if ( detik <= 9 )
                 detik = "0" + detik;
                 teksjam = jam + ":" + menit + ":" + detik;
                 tempatjam.innerHTML = teksjam;
                 setTimeout ("tampilkanjam()",1000);
                 }
                 window.onload = tampilkanjam
                 //-->
                </script>
                 </font>
                 <body>
                <font color=#660066>
                <div id="tempatjam" ></div>
                </font>
                </body>
                <!-- jam -->
          </div>
        </div>

          <!-- Header -->
          <br>
          <br>
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8" style="font-size:50px">
              <center><h1 style="font-size:40px; font-family:arial black;"> NOMOR ANTRI</h1></center>
              <center><h1 style="font-size:60px; font-family:arial;"><?php if(isset($this->nomor_antri)) echo $this->nomor_antri; ?></h1><center></div>
            <div class="col-md-2">
            </div>
          </div>
          <h1 class="page-header" style="padding-bottom:10px"></h1>
          <br>

          <!-- pesan eror -->
          <?php if ($this->input->get('error')=="null"): ?>
            <div class ="alert alert-danger" role="alert">
            Maaf field kosong! Silahkan input ID pasien kembali
            </div>

            <!-- Error input symbol -->
          <?php endif ?>
            <?php if ($this->input->get("error")=="symbol"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>Don't input symbol, Please enter a valid ID Pasien</p>
            </div>  
            <?php endif ?>  

            <!-- Tidak ada pasien -->
            <?php if ($this->input->get("act")=="not_found"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>Pasien tidak ada</p>
            </div>  
            <?php endif ?>
            <?php if ($this->input->get('act')=='succesfully'): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p>Input Succesfully!!</p>
              </div>
            <?php endif ?>

            <!-- validasi -->
            <br>
            <form class="form-horizontal" action = "<?php echo base_url()?>antri/validasi" method = "post">
              <label for="inputEmail3" class="col-sm-2 control-label">ID PASIEN :</label>
              <div class="col-sm-10">
                <input type="text" name="id_pasien" class="form-control" id="inputidpasien" placeholder="Masukkan id pasien">
                <button type="submit" class="btn btn-info" style = "width:100px">search</button><br></br>

                <table class="table table-bordered" style="border: 0px currentColor; border-image: none;">
                    
                    <tr>
                    <td class="info">Id Pasien</td>
                    <td class="info"> <?php echo $this->session->flashdata('idpasien'); ?></td>
                    </tr>
                    <tr>
                    <td class="">Nama Pasien</td>
                    <td class=""><?php echo $this->session->flashdata('namapas'); ?></td>
                    </tr>

                    <tr>
                    <td class="info">no telp</td>
                    <td class="info"><?php echo $this->session->flashdata('telppas'); ?></td>
                    </tr>

            
                </table><br>   

              </div>

            </form>
              <br>
              </br>
              <form class="form-horizontal" action = "<?php echo base_url()?>antri/insert" method ="post">
                <label for="inputEmail3"  class="col-sm-2 control-label">NAMA DOKTER :</label>
              <div class="col-sm-10">
                <select class="form-control" name="dokter">
                  <?php
                      foreach ($getdok as $row) {?>
                      <option value="<?php echo $row->ID_DOKTER?>"><?php echo $row->NAMA_DOKTER; ?></option>
                  <?php   }?>
                </select> 
              </div>
            </div>
            <br>

            
            <div class="form-group">
              <div class="text-center">
                <button type="submit" class="btn btn-default btn-lg">Input ID pasien</button>
              </div>
              </form>
              
            </div>
            <br>
              
            
          
      </div>
    </div>