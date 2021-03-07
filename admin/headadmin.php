<?php
session_start();
if(isset($_SESSION['adminname'])){
}else{
  header('Location:adminlogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="node_modules/black-dashboard/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="node_modules/black-dashboard/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Bidding System</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="node_modules/black-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="node_modules/black-dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="node_modules/black-dashboard/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="node_modules/black-dashboard/assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  

  

</head>
<body class=" ">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="#" class="simple-text logo-normal">
           Longganisa Bidding System
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="./home.php" class="n1">
              <i class="tim-icons icon-mobile"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="./categories.php" class="n2">
              <i class="tim-icons icon-tag"></i>
              <p>Categories</p>
            </a>
          </li>
          <li>
            <a href="./products.php" class="n3">
              <i class="tim-icons icon-align-center"></i>
              <p>Products</p>
            </a>
          </li>
          <!--add class="active" -->
          <li >
            <a href="./bids.php" class="n4">
              <i class="tim-icons icon-money-coins"></i>
              <p>Bids</p>
            </a>
          </li>
          <li>
            <a href="./users.php" class="n5">
              <i class="tim-icons icon-single-02"></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent   ">
 <div class="mt-2">
            <img src="../img/logoblack.png" alt="">
          </div>
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>

          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>


          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto ">
              <div class="search-bar input-group">
                <li class="nav-item">
         <h4 class="mt-2"> Welcome back! <b> <?php echo $_SESSION['adminname']; ?></b></h4> 
                </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <div class="photo">
                    <img src="node_modules/black-dashboard/assets/img/anime3.png">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="adminlogin.php" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>