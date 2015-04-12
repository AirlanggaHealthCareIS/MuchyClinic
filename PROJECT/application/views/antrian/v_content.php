
    <div class="container-fluid">
      <div class="container">
        

          <h1 class="text-center"> Sistem Antri On The Spot</h1>

            <br>
            <div class="row">
              <div class="col-md-6 text-center">
                <br>

                <table border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><script type="text/javascript" 
                src="http://www.worldtimeserver.com/clocks/embed.js"></script><script type="text/javascript" language="JavaScript">objUSNY=new Object;objUSNY.wtsclock="wtsclock001.swf";objUSNY.color="87CEEB";objUSNY.wtsid="US-NY";
                objUSNY.width=200;objUSNY.height=200;objUSNY.wmode="transparent";showClock(objUSNY);</script></td></tr><tr><td 
                align="center"><h2>Surabaya</h2></td></tr></table>
              </div>

              <div class="col-md-6 text-center">
                <br>
                <h1> Nomor Antrian Saat Ini</h1>
                <h1 style"font-size:="" 150px;"="" style="font-size: 150px;">001</h1>
              </div>
            </div>


            <br>
            <br>
            <br>

          <?php if ($this->input->get('error')=='null'): ?>
            <div class ="alert alert-danger" role="alert">
            Maaf Fild Kosong! Silahkan Input Id Pasien Kembali.
            </div>
          <?php endif ?>         

          <form class="form-horizontal" action = "<?php echo base_url()?>antri/validasi" method = "post">
            <div class="form-group">
              <div class="text-center">
                <button type="submit" class="btn btn-default btn-lg">Input ID pasien</button>
              </div>
            </div>
            <br>


         


            
              <label for="inputEmail3" class="col-sm-2 control-label">Tanggal :</label>
              <div class="col-sm-10">

            

                <input type="email" class="form-control" id="inputEmail3" placeholder="Senin, 12 April 2015" disabled>
              </div>

              <label for="inputEmail3" class="col-sm-2 control-label">Nama dokter :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputdokter" placeholder="Dokter Dony" disabled>
              </div>

              <label for="inputEmail3"  class="col-sm-2 control-label">ID pasien :</label>
              <div class="col-sm-10">
                <input type="text" name="id_pasien" class="form-control" id="inputidpasien" placeholder="ABCDEF123">
              </div>
            </div>
            <br>
            <br>
              
            
          
      </div>
      </form>
    </div>