<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Back UP And Restore</title>

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
                
              <h2>
              </h2>
              <br>

              
              <div class="container">
                      <div class="row">
                      <div class="col-lg-12 col-md-12 col-xs-12">
                      <h3>Restore Database</h3>
                      <hr>
                      <?php echo $error;?>
                      <?php echo $this->session->flashdata('pesan');?>
                      <?php echo form_open_multipart('restore/prosesrestore');?>
                      <table class="table table-striped">
                      <tr>
                      <th>
                      Pilih File<br>
                      <input type="file" class="form-control" name="resfile" id="resfile" required>
                      </th>
                      <td><br>
                      <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Restore Database</button>
                      </td>
                      </tr>
                      </table>
                      <?php echo form_close();?>
                      </div>
                      </div>
                      </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>