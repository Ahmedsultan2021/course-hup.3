<?php 
  session_start();
  require_once('classes/User.php');
  if (empty($_SESSION["user"])) {
    header("location:index.php?error=login_first");
  }else{
    $user =  unserialize($_SESSION["user"]);
    if($page_name =="users"){
      if ($user->role != 'it') header("location:home.php");
    }
    // var_dump($_SESSION["user"] );
    // var_dump(  $user );
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link active">Home</a>
      </li>
      <?php
          if ($user->role == "it")  {
            ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="users.php" class="nav-link">Users</a>
        </li>
      <?php
          }
      ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Course Hub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fa fa-user" aria-hidden="true"></i>
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user->name ?> - (<?= $user->role ?> ) </a>
        </div>
      </div>

        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="home.php" class="nav-link <?= ($page_name =="home") ?  "active" :"" ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard              
              </p>
            </a>
           
          </li>
        <?php
          if ($user->role == "it")  {
            ?>
          <li class="nav-item <?= ($page_name =="users") ? "menu-is-opening menu-open" :"" ?>">   
          <!-- menu-is-opening menu-open -->
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Users</p>
                </a>
              </li>               
              <li class="nav-item">
                <a href="student_tuition.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Didn't Pay Tuition</p>
                </a>
              </li>             
            </ul>
          </li>

          <li class="nav-item <?= ($page_name =="courses") ? "menu-is-opening menu-open" :"" ?>">   
          <!-- menu-is-opening menu-open -->
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-codepen"></i>
              <p>
                Courses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="courses.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Courses</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="courses_details.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses Details</p>
                </a>
              </li>             
            </ul>
          </li>


        <?php
          }       
          elseif ($user->role == "profosser")  {
            ?>
          <li class="nav-item <?= ($page_name =="courses") ? "menu-is-opening menu-open" :"" ?>">   
          <!-- menu-is-opening menu-open -->
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-codepen"></i>
              <p>
                My Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="courses_prof.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>             
            </ul>
          </li>

        <?php
          }elseif ($user->role == "student")  {
            ?>
          <li class="nav-item <?= ($page_name =="courses") ? "menu-is-opening menu-open" :"" ?>">   
          <!-- menu-is-opening menu-open -->
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-codepen"></i>
              <p>
                Courses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="courses.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Available Courses </p>
                </a>
              </li>             
            </ul>
          </li>

        <?php
          }
        ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    <div class="sidebar-custom">
      <a href="logout.php" class="btn btn-link" style="color:white" >
      <i class="fas fa-sign-out-alt"></i> Log Out</a>
      <!-- <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a> -->
    </div>
  </aside>