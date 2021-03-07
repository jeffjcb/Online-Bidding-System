<?php include('headadmin.php');
include('db_connect.php'); ?>

<?php 
$results = $conn->query("SELECT * FROM bids");
$conn->query("UPDATE bids INNER JOIN products on product_id = products.id SET bids.status = 2 WHERE products.bid_end_datetime < NOW()");
?>
      <!-- End Navbar -->
      <div class="content">
        <?php if(isset($_GET['success'])){
          if($_GET['success']==2){?>
      <div class="alert alert-success a2" role="alert">
  Row Data deleted successfully
</div><?php }}?>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"><b> Biddings</b></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="myTtable">
                    <thead class=" text-primary">
                      <th>Bid ID</th><th>Product ID</th><th>Username</th><th>Highest Bid Amount</th><th>Status</th><th>Action</th></thead>
                    <tbody>
                    <?php while($row=$results->fetch_assoc()): 
                      //user id
                      $uid= $row['user_id'];
                      $results2 = $conn->query("SELECT * FROM users where id = $uid LIMIT 1 ");
                      $row2=$results2->fetch_assoc();
                       //product id
                      $pid= $row['product_id'];
                      $results3 = $conn->query("SELECT * FROM products where id = $pid LIMIT 1 ");
                      $row3=$results3->fetch_assoc();
                      ?>
                      <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row3['name'];?></td>
                        <td><?php echo $row2['username'];?></td>
                        <td><?php echo $row['bid_amount'];?></td>
                        <?php if($row['status']==1){ ?>
                          <td><span class="badge badge-secondary">Ongoing</span></td>
                        <?php }
                        elseif($row['status']==2){ ?>
                          <td><span class="badge badge-success">Wins in Bidding</span></td>
                        <?php }?>
                        <td><a href="#" class="btn btn-default" >View Buyer Details</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a></td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>

<?php include('footadmin.php');?>   
 <script>

    $('.a2').delay(4000).hide(0);
    </script>