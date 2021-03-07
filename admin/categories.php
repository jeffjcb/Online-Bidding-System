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
    Category Inserted successfully.
  </div>
<?php }}?>

    <?php if(isset($_GET['failure'])){
          if($_GET['failure']==2){?>
      <div class="alert alert-danger w-50 a2" role="alert">
   Cannot Delete parent row due to foreign key constraints
</div><?php }}?>
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
                                        <td><a href="" class="btn btn-default">Edit</a>
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
        <?php include('footadmin.php'); ?>
        <script>
          $('.a2').delay(4000).hide(0);
    </script>