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
            <li class="">
              <a href="#dokterCollapse" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="dokterCollapse"><i class="fa fa-user fa-fw"></i> Dokter<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collaps collapse" id="dokterCollapse">
                <li>
                  <a href="<?php echo base_url(); ?>resep"><i class="fa fa-edit fa-fw"></i> Resep</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>rekammedis"><i class="fa fa-edit fa-fw"></i> Rekam Medis</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#dokterCollapse2" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="dokterCollapse2"><i class="fa fa-user fa-fw"></i> Apoteker<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collaps collapse" id="dokterCollapse2">
                <li>
                  <a href="<?php echo base_url(); ?>obatkeluarresep"><i class="fa fa-edit fa-fw"></i> Pengambilan Obat</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>inventory"><i class="fa fa-edit fa-fw"></i> Inventory</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#dokterCollapse3" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="dokterCollapse3"><i class="fa fa-user fa-fw"></i> Owner<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collaps collapse" id="dokterCollapse3">
                <li>
                  <a href="<?php echo base_url(); ?>jadwal"><i class="fa fa-edit fa-fw"></i> Penjadwalan Karyawan</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>laporanuang"><i class="fa fa-edit fa-fw"></i> Laporan Uang</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#adminCollapse" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="adminCollapse"><i class="fa fa-user fa-fw"></i> Administrator<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse collapse" id="adminCollapse">
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
            <li>
              <a href="#"><i class="fa fa-user fa-fw"></i> All<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="<?php echo base_url(); ?>lihatjadwal"><i class="fa fa-edit fa-fw"></i> Lihat Jadwal</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>cabsensi"><i class="fa fa-edit fa-fw"></i> Absensi</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>clogin"><i class="fa fa-edit fa-fw"></i> Login</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div id="page-wrapper">