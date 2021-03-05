<?php 
session_start();
unset($_SESSION['username']);
session_destroy();

 ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>JekBidder</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/back.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/Timeupd.js"></script>
</head>


<!-- NAVIGATION -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark px-5">
  <!-- Navbar content -->
  <div class="container-fluid">
  <div class="ml-5" data-aos="fade-down">
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
        <li class="nav-item pe-3"><a class="nav-link n4" href="login.php">Login</a></li>
        <li class="nav-item pe-3"><a class="nav-link n5" href="signup.php">Signup</a></li>
    </ul>
    </div>
  </div>
</nav>


  <body onload="startTime()">
  <div class="content mt-5">
    <div class="container">
    <div class="row mb-5">      <!-- error 1 -->
                        <?php 
                        if(isset($_GET['valid'])){ if($_GET['valid']==true){?>
                        <div class="alert alert-success a1" role="alert">
                        Account created <b>successfully</b>.
                        </div>
                        <?php }}?></div>
      <div class="row mb-5"></div>
      <div class="row">
        <div class="col-md-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
          <img src="img/asda.svg" alt="Image" class="img-fluid" >
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4"><b> Bidspace Login</b> enables people to have private & secure experiences in bidding, all with a click of a button.</p>
            </div>
            <form action="process.php" method="post">
              <div class="form-floating first mb-3">
                <input type="text" class="form-control" id="username floatingUName" placeholder="Username"  name="username">
                <label for="floatingUName">Username</label>
              </div>
              <div class="form-floating last mb-4">
                <input type="password" class="form-control" id="password floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
              </div>
              
              <div class="d-flex mb-4 align-items-center">
                <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                <label class="control control--checkbox mb-0"><span class="caption">&nbsp; Remember me</span>
                
                </label>
              </div>
              <input type="submit" value="Log In" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted">&mdash; don't have an account? &mdash; <br><a href="signup.php">Create an Account</a></span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include('footer.php'); ?>
<script>
  $('.n4').addClass('active');
  $('.a1').delay(4000).hide(0);
</script>
  </body>
</html>