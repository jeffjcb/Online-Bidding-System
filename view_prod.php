<?php
  include('admin/db_connect.php');
    $pid = $_POST['pid'];
    $sql = "SELECT * FROM products where id=$pid LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_assoc($result);
?>

<!-- Modal -->
<div class="modal-body texts">
      <div class="image  mb-3" style="height:260px; overflow: hidden;" >
    <img class="card-img-top img-fluid" src="img/elsa.jpg" alt="" >
    </div>
    <p><h3  class="text-center bg-light p-3"><b><?php echo $row['name']; ?></b></h3></p>
    <p>Category: <b><?php echo $row['category_id']; ?></b></p>
    <p>Starting Amount: <b>Php <?php echo number_format($row['start_bid'],2); ?></b></p>
    <p>Bidding Ends at: <b><?php echo date("M d,Y h:i A",strtotime($row['bid_end_datetime'])) ?></b></p>
    <p>Current Highest Bid: <b>Php <?php echo number_format($row['start_bid'],2); ?></b></p>
    <p>Description: <b><?php echo $row['description'] ?></b></p>
      <div class="col-md-12 text-center">
  <?php 
  // if session login is set, display bid amount, else redirect to login or show modal of login
  ?>
		<button class="btn btn-warning btn-block btn-sm px-5 py-2" type="button" id="bid">Bid</button>
	</div>
  </div>
<?php
    }


?>


