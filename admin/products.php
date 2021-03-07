<?php include('headadmin.php');
include('db_connect.php'); ?>
<?php 
$results = $conn->query("SELECT * FROM products");
?>
<!-- End Navbar -->
<div class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title"><b>Add new Entry</b></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <form method="post" action="server.php">
                <div class="w-75">
                  <label>Category</label><br>
                  <select class="form-select w-100 mb-3" name="categ" required>
                  <option selected>Choose</option>
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                  </select>
                  <label>Name</label>
                  <input type="text" class="form-control" required>
                  <label>Description</label>
                  <input type="text" class="form-control pb-5" required>
                  <div class="input-group">
                    <button class="btn" type="submit" name="save">Save</button>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="w-75">
                <label>Regular Price</label>
                <input type="text" class="form-control mb-3" required>
                <label>Starting Bid Amount</label>
                <input type="text" class="form-control mb-3" required>
                <label>Bid End Date/Time</label>
                <input type="text" class="form-control mb-3" required>
                <label>Product Image</label>
                <input type="file" name="image" accept="image/*" class="form-control mb-3" required>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>


  <div class="row">
    <div class="col-md-12">
        <?php if(isset($_GET['success'])){
          if($_GET['success']==2){?>
      <div class="alert alert-success a2" role="alert">
  Row Data deleted successfully
</div><?php }}?>

    <?php if(isset($_GET['failure'])){
          if($_GET['failure']==2){?>
      <div class="alert alert-danger a2" role="alert">
   Cannot Delete parent row due to foreign key constraints
</div><?php }}?>
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title"><b>Products</b></h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tablesorter " id="myTtable">
              <thead class=" text-primary">
                <th>Product ID</th>
                <th>Image</th>
                <th>Category</th>
                <th>Product</th>
                <th>Other Info</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php while($row=$results->fetch_assoc()): ?>
                <tr>
                  <td><?php echo $row['id'];?></td>
                  <td>
                    <!-- Image --> Niger</td>
                <?php $cid= $row['category_id'];
                      $results2 = $conn->query("SELECT * FROM categories where id = $cid LIMIT 1 ");
                      $row2=$results2->fetch_assoc(); ?>
                  <td><?php echo $row2['category'];?></td>
                  <td>
                    <h4>Name: <b><?php echo $row['name'];?></b></h4>
                    <h5>Description: <b><?php echo $row['description'];?></b></h5>
                  </td>
                  <td>
                    <h5>Regular Price: <b>Php <?php echo $row['regular_price'];?></b></h5>
                    <h5>Start Price: <b>Php <?php echo $row['start_bid'];?></b></h5>
                    <h5>End Date/Time: <b><?php echo $row['bid_end_datetime'];?></b></h5>
                    <h5>Highest Bid: </h5>
                  </td>
                  <td><a href="" class="btn btn-default">Edit</a>
                    <a href="resources/processprod.php?delete=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this row? This action cannot be undone.')">Delete</a></td>
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
</div>



<?php include('footadmin.php'); ?>
<script>
  $('.a2').delay(4000).hide(0);
</script>