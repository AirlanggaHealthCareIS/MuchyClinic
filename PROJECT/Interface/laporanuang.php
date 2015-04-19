<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Laporan Uang Masuk</title>
    <style type="text/css">

    </style>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">

    <script type="text/javascript">
        $(document).ready(function(){
          $("#tgl").datepicker();
        });
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>



  <body>
    <div class = "container-fluid text-center" style="background-color: grey; padding : 15px">
      <img src="assets/image/logo2.png" class="" alt="Responsive image">
    </div>
    
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
                      <form class="form-horizontal">
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

    <div class = "container-fluid text-center" style="background-color: grey; padding : 15px">
      <h6 style="color: white;">Copy Right : Muchy Clinic</h6>
    </div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>