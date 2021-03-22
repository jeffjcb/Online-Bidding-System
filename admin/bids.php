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
                <th>Bid ID</th>
                <th>Product ID</th>
                <th>Username</th>
                <th>Highest Bid Amount</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
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
                  <td>Php <b><?php echo number_format($row['bid_amount'],2);?></b></td>
                  <?php if($row['status']==1){ ?>
                  <td><span class="badge badge-secondary">Ongoing</span></td>
                  <?php }
                        elseif($row['status']==2){ ?>
                  <td><span class="badge badge-success">Wins in Bidding</span></td>
                  <?php }?>
                  <td><a href="" class="btn btn-default ModalClick" data-name="<?php echo $row2['name'];?>" data-uname="<?php echo $row2['username'];?>" data-cont="<?php echo $row2['contact'];?>" data-add="<?php echo $row2['address'];?>" data-email="<?php echo $row2['email'];?>" data-toggle="modal" data-target="#exampleModal">View Buyer
                      Details</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-warning"
                      onclick="return confirm('Are you sure?')">Delete</a></td>
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



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buyer Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="tim-icons icon-simple-remove"></i>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h4>Username: <b><input type="text" class="form-control" id="n2" value="" disabled></b></h4>
                        <p>
                          <h4>Name: <b><input type="text" class="form-control" id="n1" value="" disabled></b></h4>
                        </p>
                        <h4>Contact: <b><input type="text" class="form-control" id="n3" value="" disabled></b></h4>
                        <h4>Email: <b><input type="text" class="form-control"  id="n4" value="" disabled></b></h4>
                        <h4>Address: <b><input type="text" class="form-control"  id="n5" value="" disabled></b></h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
<?php include('footadmin.php');?>
<script>
    $(".ModalClick").click(function () {
        var passedID2 = $(this).data('name');//get the id of the selected button
        $('#n1').val(passedID2);//set the id to the input on the modal
        var passedID3 = $(this).data('uname');//get the id of the selected button
        $('#n2').val(passedID3);//set the id to the input on the modal
        var passedID4 = $(this).data('cont');//get the id of the selected button
        $('#n3').val(passedID4);//set the id to the input on the modal
        var passedID5 = $(this).data('email');//get the id of the selected button
        $('#n4').val(passedID5);//set the id to the input on the modal
        var passedID6 = $(this).data('add');//get the id of the selected button
        $('#n5').val(passedID6);//set the id to the input on the modal
    });


  $('.a2').delay(4000).hide(0);
</script>