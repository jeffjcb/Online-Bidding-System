<?php
include('header.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Bidspace</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>


  <body>
      <div class="container">
        <div class="row mb-5"></div>
        <div class="row">
          <div class="col-md-6" data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
            <img src="img/aboutus.svg" style="margin-top: 15%" alt="Image" class="img-fluid" >
          </div>
          <div class="col-md-6 card text-dark" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2)" data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
  <img src="img/aboutus2.svg" style="margin-top: 35%" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title"><img src="img/logoblack.png" style="width:40%"></h5>
    <br>
    <p class="card-text">BIDSpace is community driven, accepting product donations or buying at a reasonable price. BidSpace's profits are used to provide long-term service to the people.</p>
    <br>
    <p class="card-text text-white"><button class="btn btn-block btn-secondary modal-btn" data-bs-toggle="modal" data-bs-target="#contactus"><span class="text-light">Contact Us</span></button></p>
  </div>
</div>
        </div>
      </div>
      <div class="row mb-5"></div>
      <div class="row mb-5"></div>
      <div class="row mb-5"></div>

      <div id="contactus" class="modal fade">
  <div class="modal-xl modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="row">
        <div class="col">
          <div class="modal-header">
            <h5 class="modal-title" id="msgModalLabel">Send us a Message</h5>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingsubj" placeholder="Subject">
                <label for="floatingsubj">Subject</label>
              </div>
              <div class="mb-4">
                <label for="message-text" class="col-form-label">Message</label>
                <textarea class="form-control" id="message-text" rows="5"></textarea>
              </div>
            </form>
          </div>
    </div>
    <div class="col">
      <img src="img/contactus.svg" style="margin-top: 5%" class="card-img">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning">Send message</button>
      </div>
    </div>

  </div>
  </div>
</div>
      </div>
<?php include('footer.php'); ?>
<script>
  $('.n3').addClass('active');

</script>
  </body>
</html>
