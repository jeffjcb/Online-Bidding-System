<?php
  session_start();
  include('admin/db_connect.php');
    $pid = $_POST['pid'];
    $sql = "SELECT * FROM products where id=$pid LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_assoc($result);
?>

<!-- Modal -->
<div class="modal-body texts">
  <form action="check_bid.php" method='POST' onsubmit="return confirm('Do you really want to submit the bid?');">
    <div class="image  mb-3" style="height:260px; overflow: hidden;">
      <img class="card-img-top img-fluid" src="img/elsa.jpg" alt="">
    </div>
    <p>
      <h3 class="text-center bg-light p-3"><b><?php echo $row['name']; ?></b></h3>
    </p>
    <p>Product Id: <b><?php echo $row['id']; ?></b></p>
    <input type="hidden" name="prod_id" value=" <?php echo $row['id']; ?>">
    <p>Starting Amount: <b>Php <?php echo number_format($row['start_bid'],2); ?></b></p>
    <input type="hidden" name="startbid" value=" <?php echo $row['start_bid']; ?>">
    <p>Bidding Ends at: <b><?php echo date("M d,Y h:i A",strtotime($row['bid_end_datetime'])) ?></b></p>

<?php 
      $sql2 = "SELECT * FROM bids where product_id=$pid LIMIT 1";
      $result2 = mysqli_query($conn, $sql2);
      if(mysqli_num_rows($result2)>0){
        $row2 = mysqli_fetch_assoc($result2);
?>
    <p>Current Highest Bid: <b>Php <?php echo number_format($row2['bid_amount'],2);?></b></p>
    <?php
    }else{?>
<p>Current Highest Bid: <b>Php <?php echo number_format($row['start_bid'],2); ?></b></p>
<?php
    }
    ?>
    <p>Description: <b><?php echo $row['description'] ?></b></p>
    <div class="col-md-12 text-center">

      <button class="btn btn-warning btn-block btn-sm px-5 py-2 mb-3 bidbut" type="button" id="bid"><b>Bid</b></button>

      <?php
      // IF LOGGED IN 
  // if session login is set, display bid amount, else redirect to login or show modal of login
      if(isset($_SESSION['username'])){?>
      <div class="my-3 num bid_amount">
      <b>Amount to Bid</b>: <input type="number" name="amount" min="1" placeholder="Php" required>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark bid_amount"><b>Submit</b></button>
      </div>
      <script>
        $('.bid_amount').hide();
        $('.bidbut').click(function(){
          $('.bid_amount').show();
         }) 
       </script>
     <?php }


// IF NOT LOGGED IN
     else{ ?>
     <div class="alert alert-warning" role="alert">
      You must be logged in before you can bid. <br> Click here to <a href="login.php" class="alert-link">Login</a>
    </div>
    <!-- insert alert you must be signed in to bid -->

 <?php    }?>
  </form>
</div>
</div>
<?php
    }
?>