<?php include('headadmin.php');
include('db_connect.php'); ?>
<?php 
$results = $conn->query("SELECT * FROM products");
$res = $conn->query("SELECT * FROM categories");
?>
<!-- End Navbar -->
<div class="content">
  <?php if(isset($_GET['success'])){
          if($_GET['success']==1){?>
  <div class="alert alert-success a2" role="alert">
    Product Created Successfully!
  </div><?php }}?>

  <?php if(isset($_GET['failure'])){
          if($_GET['failure']==1){?>
  <div class="alert alert-danger a2" role="alert">
    There was a problem in Creating/Updating a new Product.
  </div><?php }}?>
  <div class="row">
    <div class="col-md-6">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title"><b>Add new Entry</b></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <form method="post" action="resources/addprod.php" enctype='multipart/form-data'>
                <div class="w-75">
                  <label>Category</label><br>
                  <select class="form-select w-100 mb-3" name="categ" required>
                    <option disabled>Choose</option>
                    <?php while($rw=$res->fetch_assoc()): ?>
                    <option value="<?php echo $rw['id']; ?>"><?php echo $rw['category']; ?></option>
                    <?php endwhile; ?>
                  </select>
                  <label>Product Name</label>
                  <input type="text" name="pname" class="form-control" required>
                  <label>Description</label>
                  <input type="text" name="desc" class="form-control pb-5" required>
                  <label>Product Image</label>
                  <input type="file" name="file" accept="image/*" class="form-control mb-3" required />
                </div>
            </div>
            <div class="col-md-6">
              <div class="w-75">
                <label>Regular Price</label>
                <input type="number" min="0" name="rprice" class="form-control mb-3" required>
                <label>Starting Bid Amount</label>
                <input type="number" min="0" name="bid_amount" class="form-control mb-3" required>
                <label>Bid End Date/Time</label>
                <input type="text" id="date" name="endtime" class="form-control mb-3" required>
                <div class="input-group">
                  <button class="btn" type="submit" name="save">Save</button>
                </div>
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
        Row Data Updated Successfully
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
                  <div class="mt-3"></div>
                  <div class="image mt-5" style="height:160px; width:100px; overflow: hidden;" >
                  <div class="mt-3"></div>
                  <img src="../img/<?php echo $row['img_fname'];?>" class="img-fluid" alt="">
                  </div>
                 </td>
                  <?php $cid= $row['category_id'];
                      $results2 = $conn->query("SELECT * FROM categories where id = $cid LIMIT 1 ");
                      $row2=$results2->fetch_assoc(); ?>
                  <td><?php echo $row2['category'];?></td>
                  <td>
                    <h4>Name: <b><?php echo $row['name'];?></b></h4>
                    <h5>Description: <b><?php echo $row['description'];?></b></h5>
                  </td>
                  <td>
                    <h5>Regular Price: <b>Php <?php echo number_format($row['regular_price'],2);?></b></h5>
                    <h5>Start Price: <b>Php <?php echo number_format($row['start_bid'],2);?></b></h5>
                    <h5>End Date/Time: <b><?php echo $row['bid_end_datetime'];?></b></h5>
                  </td>
                  <td><a href="" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name'];?>" data-desc="<?php echo $row['description'];?>" data-sbid="<?php echo $row['start_bid'];?>" data-rprice="<?php echo $row['regular_price'];?>" data-endtime="<?php echo $row['bid_end_datetime'];?>"  data-toggle="modal" class="btn btn-default ModalClick" data-target="#myModal">Edit</a>
                    <a href="resources/processprod.php?delete=<?php echo $row['id']; ?>" class="btn btn-warning"
                      onclick="return confirm('Are you sure you want to delete this row? This action cannot be undone.')">Delete</a>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-title">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Manage Products</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      </div>
                    <div class="modal-body">
                        <form action="resources/editproducts.php" method="post">
                        <label class="col-form-label">Product Id:  </label>
                        <input type="text" disabled>
                        <input type="hidden" id="n0" name="pid">
                    
                          <div class="form-group">
                            <label  class="col-form-label"> Product Name: </label>
                            <input type="text" id="n1" name="pname" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label  class="col-form-label">Description: </label>
                            <input type="text" id="n2" name="desc" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label  class="col-form-label">Regular Price: </label>
                            <input type="number" id="n3" name="rprice" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label  class="col-form-label">Starting Price: </label>
                            <input type="number" id="n4" name="sprice" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label  class="col-form-label">End Date Time: </label>
                            <input type="text" id="n5" name="endtime" class="form-control date" >
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-info">Update</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>



</div>
</div>

<?php include('footadmin.php'); ?>
<script src="resources/bdatetimepicker/js/bootstrap-datetimepicker.js"></script>
<script>
    $(".ModalClick").click(function () {
        var passedID = $(this).data('id');//get the id of the selected button
        $('input:disabled').val(passedID);//set the id to the input on the modal
        $('#n0').val(passedID);//set the id to the input on the modal
        var passedID2 = $(this).data('name');//get the id of the selected button
        $('#n1').val(passedID2);//set the id to the input on the modal
        var passedID3 = $(this).data('desc');//get the id of the selected button
        $('#n2').val(passedID3);//set the id to the input on the modal
        var passedID4 = $(this).data('rprice');//get the id of the selected button
        $('#n3').val(passedID4);//set the id to the input on the modal
        var passedID5 = $(this).data('sbid');//get the id of the selected button
        $('#n4').val(passedID5);//set the id to the input on the modal
        var passedID6 = $(this).data('endtime');//get the id of the selected button
        $('#n5').val(passedID6);//set the id to the input on the modal
    });


  $("#date").datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
  });
  $(".date").datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
  });
  $('.a2').delay(4000).hide(0);
</script>