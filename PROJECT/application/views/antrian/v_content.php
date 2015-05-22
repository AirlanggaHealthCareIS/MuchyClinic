
    <div class="container-fluid">
      <div class="container">
        
        <h1 class="text-center"> Sistem Antri On The Spot</h1>
        <br>

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
            <!-- tanggal -->
          </div>

          <div class="col-md-6 text-center">
            <!-- jam -->
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


          <br>
          <br>
            <div class="text-center">
                <h1> Nomor Antrian Saat Ini</h1>
                <h1 style"font-size:="" 150px;"="" style="font-size: 100px;">001</h1>
              <!-- no antri -->
            </div>
          <br>
          <br>
          <br>

          <!-- pesan eror -->
          <?php if ($this->input->get('error')=="null"): ?>
            <div class ="alert alert-danger" role="alert">
            Maaf field kosong! Silahkan input ID pasien kembali
            </div>

          <?php endif ?>
            <?php if ($this->input->get("error")=="symbol"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>Don't input symbol, Please enter a valid ID Pasien</p>
            </div>  
            <?php endif ?>  


          
            <br>
            <form class="form-horizontal" action = "<?php echo base_url()?>antri/validasi" method = "post">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama dokter :</label>
              <div class="col-sm-10">
                <select class="form-control" name="dokter">
                  <?php
                      foreach ($getdok as $row) {?>
                      <option value="<?php echo $row->ID_DOKTER?>" selected><?php echo $row->NAMA_DOKTER; ?></option>
                  <?php   }?>
                </select>      

              </div>
              <br>
              <br>
              <label for="inputEmail3"  class="col-sm-2 control-label">ID pasien :</label>
              <div class="col-sm-10">
                <input type="text" name="id_pasien" class="form-control" id="inputidpasien" placeholder="Masukkan id pasien">
              </div>
            </div>
            <br>

            
            <div class="form-group">
              <div class="text-center">
                <button type="submit" class="btn btn-default btn-lg">Input ID pasien</button>
              </div>
            </div>
            <br>
              
            
          
      </div>
      </form>
    </div>