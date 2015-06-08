<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Muchy Clinic</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/muchy.css">
  </head>
  <body>
  <div class="wrapper" style="background-color: #27BEC4;">    
    
    <div class="container-fluid text-center" style="background-color: #606062">
      <img src="<?php echo base_url(); ?>assets/images/header1.png" class="" alt="Responsive image">
    </div>  
    <div class="" role="navigation" style="margin-bottom: 0">
      <div class="navbar-default sidebar" style="background-color: #27BEC4;" role="navigation">
        <div class="sidebar-nav navbar-collapse">

          <div class="text-center" style="margin-bottom:20px">
            <i class="fa fa-user fa-5" style="font-size: 80px; color: #FFFFFF;"></i> 
            <h4 style="color: #fff;"><?php if (isset($this->user)) echo $this->user; ?></h4>
          </div>

          <ul class="nav" id="side-menu">
            <li class="" style="border-bottom: 0; background-color: #84E9ED;">
              <a href="#submenu"><i class="fa fa-user fa-fw"></i> Administator<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level" id="submenu">
                <li <?php if (isset($this->header[0])) echo "class='active'"; ?>>
                  <a href="<?php echo base_url(); ?>jadwal/karyawan"><i class="fa fa-edit fa-fw"></i> Lihat Jadwal</a>
                </li>
                <li <?php if (isset($this->header[1])) echo "class='active'"; ?>>
                  <a href="<?php echo base_url(); ?>pendaftaran"><i class="fa fa-edit fa-fw"></i> Pendaftaran</a>
                </li>
                <li <?php if (isset($this->header[2])) echo "class='active'"; ?>>
                  <a href="<?php echo base_url(); ?>pendaftaran/index2 "><i class="fa fa-edit fa-fw"></i> Detail Pendaftaran</a>
                </li>
                <li <?php if (isset($this->header[3])) echo "class='active'"; ?>>
                  <a href="<?php echo base_url(); ?>antri"><i class="fa fa-edit fa-fw"></i> Antrian</a>
                </li>
                <li <?php if (isset($this->header[4])) echo "class='active'"; ?>>
                  <a href="<?php echo base_url(); ?>crawatinap"><i class="fa fa-edit fa-fw"></i> Rawat Inap</a>
                </li>
                <li <?php if (isset($this->header[5])) echo "class='active'"; ?>>
                  <a href="<?php echo base_url(); ?>kasir"><i class="fa fa-edit fa-fw"></i> Kasir</a>
                </li>
                <li <?php if (isset($this->header[6])) echo "class='active'"; ?>>
                  <a href="<?php echo base_url(); ?>crawatinap/logout"><i class="fa fa-edit fa-fw"></i> Log Out</a>
                </li>
              </ul>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
  <div id="page-wrapper">