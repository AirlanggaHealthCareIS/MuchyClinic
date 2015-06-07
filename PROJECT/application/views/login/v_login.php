<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Muchy Clinic2 | Buat Jadwal</title>
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <!-- Timeline CSS -->
  <link href="<?php echo base_url(); ?>assets/dist/css/timeline.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
  <!-- Morris Charts CSS -->
  <link href="<?php echo base_url(); ?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
          body::-webkit-scrollbar {
            width: 0.5em;
          }

          body::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 3px rgba(0,0,0,0.3);
          }

          body::-webkit-scrollbar-thumb {
            background-color: #27BEC4;
            outline: 1px solid slategrey;
          }
        </style>
      </head>
      <body style="background-color: #7AE0E4;">

        <div class = "container-fluid">
          <div class = "container text-center" style="width:350px; background-color: #FFF; margin-top: 5%;">
            <img src="<?php echo base_url(); ?>assets/images/icons.svg.png" style="width: 50%;margin-top: 30px;">
            <h2 style="color: #069CA1;">Login <?php if(isset($this->login_title)) echo $this->login_title; ?></h2>
            <br>
            <?php if ($this->input->get("error")=="null"): ?>
              <div class = "alert alert-danger" role = "alert"> 
                <p>Maaf Anda harus menginputkan form dengan lengkap</p> 
              </div>  
            <?php endif ?>
            <?php if ($this->input->get("error")=="nullusername"): ?>
              <div class = "alert alert-danger" role = "alert"> 
                <p>Maaf username Anda tidak boleh kosong</p> 
              </div>  
            <?php endif ?>
            <?php if ($this->input->get("error")=="nullpassword"): ?>
              <div class = "alert alert-danger" role = "alert"> 
                <p>Maaf password Anda tidak boleh kosong</p> 
              </div>  
            <?php endif ?>
            <?php if ($this->input->get("error")=="symbol"): ?>
              <div class = "alert alert-danger" role = "alert">
                <p>Maaf Anda tidak diizinkan menginputkan symbol</p>
              </div>  
            <?php endif ?>
            <?php if ($this->input->get("error")=="m_login"): ?>
              <div class = "alert alert-danger" role = "alert"> 
                <p>Maaf username atau password yang Anda masukkan salah</p> 
              </div>  
            <?php endif ?>
            <form class="form-horizontal" action="<?php if(isset($this->login_url_validasi)) echo $this->login_url_validasi; ?>" method="post">
              <div class="form-group" style="margin-left: 30px; margin-right:30px">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-user fa-2"></i></div>
                  <input type="Username" class="form-control" id="inputUsername" name="username" placeholder="Username">
                </div>
              </div>
              <div class="form-group" style="margin-left: 30px; margin-right:30px">
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-key fa-2"></i></div>
                  <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="">
                  <button type="submit" class="btn btn-default" style="width: 75%;margin-bottom: 21px;min-height: 40px;">Log In</button>
                </div>
              </div>
            </form>

          </div>
        </div>


      </div>  
    </div>
  </div>
  <!-- <div class="container-fluid text-center" style="background-color: rgb(105, 102, 102); padding:15px">
    <h6 style="color: white;">copyright | Muchy Team</h6>
  </div> -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- // <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> -->
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Untuk custom js  -->
  <?php if (isset($this->js_to_load)): ?>
    <?php foreach ($this->js_to_load as $url): ?>
      <script src="<?php echo $url ?>"></script>
    <?php endforeach ?>
  <?php endif ?>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Metis Menu Plugin JavaScript -->
  <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <!-- Morris Charts JavaScript -->
  <script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael-min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>
</body>
</html>