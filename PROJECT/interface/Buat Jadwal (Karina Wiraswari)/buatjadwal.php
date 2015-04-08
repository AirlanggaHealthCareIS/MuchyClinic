<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Muchy Clinic | Buat Jadwal</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
    <div class="container-fluid">
      <div class="container">
        <h1>Buat Jadwal</h1>
      </div>
    </div>
    <div class="container-fluid">
      <div class="container">
        
        <br>
        <div class = "row">
          <div class = "col-md-6">

            <form class="form-horizontal">
              <div class="form-group">
                <label for="Aktor" class="col-sm-2 control-label">Aktor</label>
                <div class="col-sm-10">
                  <select class="form-control">
                    <option>Dokter</option>
                    <option>Apoteker</option>
                    <option>Karyawan</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Bagian</label>
                <div class="col-sm-10">
                  <select class="form-control">
                    <option>Administrasi</option>
                    <option>Pendaftaran</option>
                    <option>Keuangan</option>
                    <option>Kepegawaian</option>
                    <option>Logistik</option>
                  </select>
                </div>
              </div>

              <br>
              <div class="form-group">
                
                    <label for="ID Aktor" class="col-sm-2 control-label">ID Aktor</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-10">
                          <input type="ID Aktor" class="form-control" id="inputPassword3" placeholder="ID Aktor" value="K0001">    
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-default">OK</button>      
                        </div>
                      </div>
                    </div>
                </div>

                <div>
                  <table class="table">
                    <tr>
                      <td class="info">ID Karyawan</td>
                      <td class="info">K0001</td>
                    </tr>

                    <tr>
                      <td class="info">Nama</td>
                      <td class="info">Ani Yuliani</td>
                    </tr>

                    <tr>
                      <td class="info">Jabatan</td>
                      <td class="info">Karyawan Administrasi</td>
                    </tr>
                  </table>
                </div>

              </div>
            </div>
            
            

            <div class="text-center">
              
              <button class="btn btn-default" type="submit">Add</button>
              <button class="btn btn-default" type="submit">Edit</button>
              <button class="btn btn-default" type="submit">Delete</button>
            </div>

            <br>

            <div >
              <table class="table table-bordered">
              
                <tr>
                  <td class="info">No.</td>
                  <td class="info">ID Karyawan</td>
                  <td class="info">Nama</td>
                  <td class="info">Hari</td>
                  <td class="info">Jam Kerja</td>
                </tr>
                
                <tr>
                  <td class="active">1.</td>
                  <td class="active">K0001</td>
                  <td class="active">Ani Yuliani</td>
                  <td class="active">Senin</td>
                  <td class="active">07:00 - 13:00</td>
                </tr>

                <tr>
                  <td class="active">2.</td>
                  <td class="active">K0002</td>
                  <td class="active">Budi Hari</td>
                  <td class="active">Senin</td>
                  <td class="active">07:00 - 13:00</td>
                </tr>

                <tr>
                  <td class="active">3.</td>
                  <td class="active">K0003</td>
                  <td class="active">Caca Handika</td>
                  <td class="active">Senin</td>
                  <td class="active">13:00 - 19:00</td>
                </tr>

              </table>
              
            </div>
            </form>       

            

            
          </div>
          
        </div>
      </div>
      
    </div>
    


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>