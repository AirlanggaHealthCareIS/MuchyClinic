<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid text-center" style = "background-color : grey">
      <img src="assets/images/logo_muchy_clinic.png" alt="Responsive image">
    </div>

    <div class="container-fluid" style = "padding: 100px">
      <div class="row"> 
        <div class="col-md-6 col-md-offset-3">
          <h1 class = "text-center">Absensi</h1>
            <div class = "container-fluid text-center">
              <img src = "assets/images/logo2.png" alt="Responsive image"> 
            </div>
            <form class="form-inline">
            <div class="form-group">
              <label for="exampleInputEmail2">ID Karyawan </label>
              <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Id karyawan">
            </div>
              <button type="submit" class="btn btn-default">absen</button>
            </form>
        </div>
      </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>