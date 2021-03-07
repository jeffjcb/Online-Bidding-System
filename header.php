<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="admin/node_modules/black-dashboard/assets/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Bidspace</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/back.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/Timeupd.js"></script>
</head>
<body onload="startTime()">
<!-- NAVIGATION -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark px-5">
  <!-- Navbar content -->
  <div class="container-fluid">
  <div class="ml-5" data-aos="fade-down" >
    <a class="navbar-brand" href="index.php">
    <img src="img/logo.png" width="230"  class="d-inline-block align-top" alt="">
  </a></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navss">
    <li class="nav-item pe-3"><a class="nav-link active" aria-current="page">S.T. <strong id="txt"></strong></a></li>
        <li class="nav-item pe-3"><a class="nav-link n1" aria-current="page" href="index.php">Home</a></li>
        <li class="nav-item pe-3"><a class="nav-link n2" href="main.php">Bid</a></li>
        <li class="nav-item pe-3"><a class="nav-link n3" href="#">About</a></li>
        <?php
        if(isset($_SESSION['username'])){ ?>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome <?php echo $_SESSION['username']; ?></a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="login.php">Logout</a></li>
        </ul></li>
      <?php }else{ ?>
        <li class="nav-item pe-3"><a class="nav-link n4" href="login.php">Login</a></li>
        <li class="nav-item pe-3"><a class="nav-link n5" href="signup.php">Signup</a></li>
     <?php } ?>
    </ul>
    </div>
  </div>
</nav>