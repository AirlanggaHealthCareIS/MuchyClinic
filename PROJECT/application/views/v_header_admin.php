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
  <body>
  <div class="wrapper">    
    
<div class="container-fluid text-center" style="background-color: #606062">
      <img src="<?php echo base_url(); ?>assets/images/header1.png" class="" alt="Responsive image">
    </div>  
    <div class="" role="navigation" style="margin-bottom: 0">
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li>
              <a href="#"><i class="fa fa-user fa-fw"></i> Administrator<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="<?php echo base_url(); ?>antri"><i class="fa fa-edit fa-fw"></i> Antrian</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>crawatinap"><i class="fa fa-edit fa-fw"></i> Rawat Inap</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>kasir"><i class="fa fa-edit fa-fw"></i> Kasir</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>pendaftaran"><i class="fa fa-edit fa-fw"></i> Pendaftaran</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div id="page-wrapper">