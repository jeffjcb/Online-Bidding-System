<?php include('headadmin.php'); 
 include('db_connect.php');
 $results = $conn->query("SELECT * FROM users");?>
      <!-- End Navbar -->
      <div class="content">
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
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"><b>Users</b></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="myTtable">
                    <thead class=" text-primary">
                      <th>ID</th><th>Name</th><th>Username</th><th>Password</th><th>Contacts</th><th>Type</th><th>Date Created</th><th>Action</th></thead>
                    <tbody>
                    <?php while($row=$results->fetch_assoc()): ?>
                <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo md5($row['password']);?></td>
                  <td>
                    <h5>Contact No.: <b><?php echo $row['contact'];?></b></h5>
                    <h5>Email: <b><?php echo $row['email'];?></b></h5>
                  </td>
                  <td><?php if ($row['type']==1){echo "1-Admin";}else{echo "2-Subscriber";}?></td>
                  <td><?php echo $row['date_created'];?></td>
                  <td><a href="" class="btn btn-default">Edit</a>
                    <a href="resources/processusers.php?delete=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this row? This action cannot be undone.')">Delete</a></td>
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
<?php include('footadmin.php'); ?>
<script>
    $('.a2').delay(4000).hide(0);
    </script>