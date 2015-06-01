<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class = "container-fluid">
            <div class = "container" style="width:500px;">
                
              <h2>SELAMAT DATANG DI MUCHY CLINIC!
              </h2>
              <br>

              <?php if ($this->input->get("error")=="null"): ?>
            <div class = "alert alert-danger" role = "alert"> 
              <p>sepurane isien disek boss</p> 
            </div>  
            <?php endif ?>

              <?php if ($this->input->get("error")=="nullusername"): ?>
            <div class = "alert alert-danger" role = "alert"> 
              <p>sepurane isien disek boss username mu</p> 
            </div>  
            <?php endif ?>

            <?php if ($this->input->get("error")=="nullpassword"): ?>
            <div class = "alert alert-danger" role = "alert"> 
              <p>sepurane isien disek boss password mu</p> 
            </div>  
            <?php endif ?>

        
            <?php if ($this->input->get("error")=="symbol"): ?>
            <div class = "alert alert-danger" role = "alert">
              <p>sing temen nek ngisi username bos ojok atek alay !@#$%^&*</p>
            </div>  
            <?php endif ?>
            
            <?php if ($this->input->get("error")=="m_login"): ?>
            <div class = "alert alert-danger" role = "alert"> 
              <p>sepurane boss login mu salah</p> 
            </div>  
            <?php endif ?>

            <?php if ($this->input->get("error")=="n_login"): ?>
            <div class = "alert alert-danger" role = "alert"> 
              <p>sepurane boss login mu salah</p> 
            </div>  
            <?php endif ?>

              <form class="form-horizontal"action="<?php echo base_url(); ?>welcome/validasi " method="post">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="Username" class="form-control" id="inputUsername" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Log In</button>
                  </div>
                </div>
              </form>

            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>