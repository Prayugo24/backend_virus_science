<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url();?>assets/production/images/favicon.ico" type="image/ico" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <title>BIOLOGI SCIENCE</title>

    <!-- datatables -->
<!--     <script type="text/javascript" src="<?php echo base_url();?>assets/datatable/js/jquery.js"></script> -->

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datatable/css/dataTables.bootstrap.css">

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>">
 

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url();?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">

    <!-- data table -->


    <!-- Jquery datatable -->

    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <link href="<?php echo base_url('assets/');?>css/blog-home.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/ac/jquery.easy-autocomplete.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/ac/easy-autocomplete.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/ac/easy-autocomplete.themes.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/datepicker/css/bootstrap-datepicker.min.css">

    


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('index.php/admin/index'); ?>" class="site_title"><i class="fa fa-paw"></i> <span>SCIENCE</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic" >
                 
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $this->session->userdata('user_name'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?>index.php"><i class="fa fa-home"></i> Dashboard</a></li>

                  <li><a href="<?php echo base_url().'index.php/admin/con_soal';?>"><i class="fa fa-pencil-square-o"></i> Soal</a>
                  <li><a href="<?php echo base_url().'index.php/admin/con_jawaban';?>"><i class="fa fa-book"></i> Pilihan Jawaban</a>
                  <li><a href="<?php echo base_url().'index.php/admin/con_deskripsi';?>"><i class="fa fa-pencil"></i> Deskripsi</a>
                  <?php if ($this->session->userdata['user_status']=="SP"){ ?>
                  <li><a href="<?php echo base_url().'index.php/admin_guru/TambahGuru';?>"><i class="fa fa-pencil"></i> Tambah Guru</a>
                  <li><a href="<?php echo base_url().'index.php/admin_guru/TambahSiswa';?>"><i class="fa fa-pencil"></i> Tambah Siswa</a>
                  <?php } ?>
                  <?php if ($this->session->userdata['user_status']=="GR"){ ?>
                  <li><a href="<?php echo base_url().'index.php/admin_guru/pertanyaanSiswa';?>"><i class="fa fa-pencil"></i> Pertanyaan Siswa</a>
                  <li><a href="<?php echo base_url().'index.php/admin_guru/JawabanGuru';?>"><i class="fa fa-pencil"></i> Jawaban Guru</a>
                  <?php } ?>
                  </li>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('index.php/admin/logout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php foreach ($gbr as $row) {?>
                    <img src="<?php echo base_url('assets/img/'.$row->gambar.'');?>" alt=""><?php echo $this->session->userdata('user_nama');?>
                    <?php } ?> 
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                    <?php if ($this->session->userdata['user_status']=="SP"){ ?>
                      <a href="<?php echo base_url('index.php/c_ganti/index'); ?>"><i class="fa fa-gear pull-right"></i>
                        <span>Ganti Password</span>
                      </a>
                    <?php } else { ?>
                      <a href="<?php echo base_url('index.php/Admin_Guru/profilGuru'); ?>"><i class="fa fa-gear pull-right"></i>
                        <span>Ganti Password</span>
                      </a>
                    <?php } ?>
                    </li>
                    <li><a href="<?php echo base_url('index.php/admin/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               
              </ul>
            </nav>
          </div>
        </div>