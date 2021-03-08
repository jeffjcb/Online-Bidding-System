<?php include('headadmin.php'); 
 include('db_connect.php');

 $results = $conn->query("SELECT * FROM categories");?>

<div class="container">

    <div class="row" style="margin-bottom:5rem;">
    </div>

    <div class="row">
        
        <div class="col-md-4">
            <div class="card">
                <div class="col-md-12">
                    <div class="card-body">
                        <form action="resources/processcategories.php" method='post'>
                            <div class="form-group">
                                <label for="">Add a category.</label>
                                <input type="text" class="form-control" placeholder="Category" name="category" required>
                                <small class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure you want to add this category? ')">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_GET['success'])){
          if($_GET['success']==2){?>
      <div class="alert alert-success w-50 a2" role="alert">
  Row Data deleted successfully.
</div><?php }
elseif($_GET['success']==1){?>
    <div class="alert alert-success w-50 a2" role="alert">
    Category Updated successfully.
  </div>
<?php }}?>

    <?php if(isset($_GET['failure'])){
          if($_GET['failure']==2){?>
      <div class="alert alert-danger w-50 a2" role="alert">
   Cannot Delete parent row due to foreign key constraints
</div><?php }
elseif($_GET['failure']==3){?>
 <div class="alert alert-danger w-50 a2" role="alert">
   Failed to Update Category.
<?php
}
}?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="col-md-12">
                    <h4 class="card-title" style="padding-top:10px;"><b> Categories</b></h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTtable" class="table table sorter">
                                <thead>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <!-- INSERT BIDDINGS HERE -->
                                    <?php while($row=$results->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><a href="" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['category'];?>" data-toggle="modal" class="btn btn-default ModalClick" data-target="#myModal">Edit</a>
                                             <a href="resources/processcategories.php?delete=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this row? This action cannot be undone.')">Delete</a></td>
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
                        <h3 class="modal-title" id="exampleModalLongTitle">Manage Categories</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      </div>
                    <div class="modal-body">
                        <form action="resources/editcategory.php" method="post">
                        <label class="col-form-label">Category Id:  </label>
                        <input type="text" disabled>
                        <input type="hidden" id="n0" name="cid">
                          <div class="form-group">
                            <label  class="col-form-label">Category Name: </label>
                            <input type="text" id="n1" name="name" class="form-control" >
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




        <?php include('footadmin.php'); ?>
        <script>
        $(".ModalClick").click(function () {
        var passedID = $(this).data('id');//get the id of the selected button
        $('input:disabled').val(passedID);//set the id to the input on the modal
        $('#n0').val(passedID);//set the id to the input on the modal
        var passedID2 = $(this).data('name');//get the id of the selected button
        $('#n1').val(passedID2);//set the id to the input on the modal
    });
          $('.a2').delay(4000).hide(0);
    </script>