<?php include('headadmin.php'); 
 include('db_connect.php');
 $results = $conn->query("SELECT * FROM users");?>
      <!-- End Navbar -->
      <div class="content">
      <?php if(isset($_GET['success'])){
          if($_GET['success']==1){?>
      <div class="alert alert-success a2" role="alert">
  Row has been updated.
</div><?php }}?>

    <?php if(isset($_GET['failure'])){
          if($_GET['failure']==1){?>
      <div class="alert alert-danger a2" role="alert">
   Username or Email is already taken.
</div><?php }
          elseif($_GET['failure']==3){?>
            <div class="alert alert-danger a2" role="alert">
         Failure to create/update account.
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
              <form method="post" action="resources/processusers.php">
                <div class="w-75">
                <label>Username</label>
                <input type="text" name="uname" class="form-control mb-3" required>
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" required>
                  <label>Password</label>
                  <input type="password" name="pass" class="form-control" required>
                  <label>Email</label>
                  <input type="email" name="email" class="form-control mb-4" required>
                </div>
            </div>
            <div class="col-md-6">
              <div class="w-75">
                  <label>Type</label><br>
                  <select class="form-select w-100 mb-4" name="type" required>
                    <option value="1">1-Admin</option>
                    <option value="2">2-Subscriber</option>
                  </select>

                <label>Address</label>
                <input type="text" name="addr" class="form-control mb-4" required>                  

                <label>Contact No.</label>
                <input type="text" name="cont" class="form-control mb-4" required>                  
                <div class="input-group">
                    <button class="btn" type="submit" name="save" onclick="return confirm('Are you sure you want to add this user? ')">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>







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
                  <td><a href="" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name'];?>" data-uname="<?php echo $row['username'];?>" data-pass="<?php echo $row['password'];?>" data-cont="<?php echo $row['contact'];?>" data-email="<?php echo $row['email'];?>" data-toggle="modal" class="btn btn-default ModalClick" data-target="#myModal">Edit</a>
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

  

    <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-title">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Manage Users</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      </div>
                    <div class="modal-body">
                        <form action="resources/edituser.php" method="post">
                        <label class="col-form-label">User Id:  </label>
                        <input type="text" disabled>
                        <input type="hidden" id="n0" name="uid">
                   
                            <label  class="col-form-label">Type: </label>
                            <select name="type" id="" required>
                            <option selected disabled>Choose</option>
                              <option value="1">1-Admin</option>
                              <option value="2" selected="selected">2-Subscriber</option>
                            </select>
                    
                          <div class="form-group">
                            <label  class="col-form-label">Name: </label>
                            <input type="text" id="n1" name="name" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label  class="col-form-label">Username: </label>
                            <input type="text" id="n2" name="uname" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label  class="col-form-label">Password: </label>
                            <input type="password" id="n3" name="pass" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label  class="col-form-label">Contact No.: </label>
                            <input type="text" id="n4" name="cont" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label  class="col-form-label">Email: </label>
                            <input type="text" id="n5" name="email" class="form-control" >
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
        var passedID3 = $(this).data('uname');//get the id of the selected button
        $('#n2').val(passedID3);//set the id to the input on the modal
        var passedID4 = $(this).data('pass');//get the id of the selected button
        $('#n3').val(passedID4);//set the id to the input on the modal
        var passedID5 = $(this).data('cont');//get the id of the selected button
        $('#n4').val(passedID5);//set the id to the input on the modal
        var passedID6 = $(this).data('email');//get the id of the selected button
        $('#n5').val(passedID6);//set the id to the input on the modal
    });

  $('.a2').delay(4000).hide(0);
</script>