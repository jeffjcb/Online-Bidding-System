<?php 
include('header.php');
include('admin/db_connect.php');
$cid = isset($_GET['category_id'])? $_GET['category_id']:0; ?>

<!-- Categories -->
<div class="container-fluid my-5">
    <div class="col-lg-12">
        <div class="row" > 
            <div class="col-md-3">
                <div class="card  text-center">
                    <div class="card-header"><h4>Categories</h4> </div>
                    <div class="card-body">
                        <ul class="list-group " id="cat-list" >
                            <li class='list-group-item list-group-item-action'  style="cursor:pointer;" data-id="all" data-href="main.php?page=home&category_id=0">All</li>
                            <?php
                                $cat = $conn->query("SELECT * FROM categories");
                                // while there is a category in the db, fetch the row and store in the result
                                while($result=$cat->fetch_assoc()):
                                    // each array index in cat_arr, store the category name
                                    $cat_arr[$result['id']]=$result['category'];
                            ?>
                            <li class='list-group-item list-group-item-action' style="cursor:pointer;" data-id="<?php echo $result['id'] ?>" data-href="main.php?page=home&category_id=<?php echo $result['id']?>"><?php echo $result['category'];?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>


<!-- Content based on categories -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <?php
                                $where = "";
                                // checks if category_id is 0 or not,
                                if($cid > 0){
                                    // if not zero, assign "and category_id=$cid" for future url
                                    $where  = " and category_id =$cid ";
                                    $cat = $conn->query("SELECT * FROM products where unix_timestamp(bid_end_datetime) >= ".strtotime(date("Y-m-d H:i"))." $where order by name asc");
                                }
                                else{
                                    $cat = $conn->query("SELECT * FROM products");
                                }
                                
                                //  if 0 Dont display anything
                                if($cat->num_rows <= 0){
                                    echo "<center><h4><i>Oops. There seems to be no products available yet.</i></h4></center>";
                                } 
                                while($result=$cat->fetch_assoc()):
                             ?>
                            <div class="col-sm-3">
                                <div class="card">
                                     <!-- Image in card -->
                                    <div class="image " style="height:260px; overflow: hidden;" >
                                        <a href="img/manok.jpg" data-fancybox><img class="card-img-top img-fluid" src="img/manok.jpg" alt="" ></a>
                                    </div>
                                    <!-- Small Tag for date -->
                                    <h5 class="card-header bg-light text-left mb-0"><?php echo $result['name'] ?></h5>
                                    <div class="card-body">
                                    <div class="float-right align-top d-flex "><span class="badge bg-dark text-light ">Until: <?php echo date("M d,Y h:i A",strtotime($result['bid_end_datetime'])) ?></span></div>
                                    <span class="badge badge-info bg-dark text-light">Starting Bid Price: Php<?php echo number_format($result['start_bid'],2) ?></span>
                                       <b> <p class="mb-0"><?php echo $cat_arr[$result['category_id']] ?></p></b>
                                        <i><p style="height:80px; overflow: hidden;"><?php echo $result['description'] ?></p></i>
                                        <div class="card-text text-center">
                                    <button class="btn btn-primary btn-sm px-4 py-2 view_prod" id="<?php echo $result['id']?>" type="button" data-id="<?php echo $result['id']?>">View</button></div>
                                    </div>
                                </div>
                            </div>
                            <script>
                        // SHOWS MODAL
                        $(document).ready(function(){
                        $('#<?php echo $result['id']?>').click(function(){
                            var vid = $('#<?php echo $result['id']?>').attr('data-id');
                            console.log(vid);  
                            $(".texts").load('view_prod.php', {
                                pid:vid
                            });
                            $('#myModal').modal('show');
                            });
                        });
                            </script>
                            <?php endwhile; ?>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bid on the Product</h5>
        <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body texts">
      <div class="image  mb-3" style="height:260px; overflow: hidden;" >
    <img class="card-img-top img-fluid" src="img/manok.jpg" alt="" >
    </div>
    <p>Category: <b></b></p>
    <p>Starting Amount: <b></b></p>
    <p>Bidding Ends at: <b></b></p>
    <p>Current Highest Bid: <b></b></p>
    <p>Description: <b></b></p>
      <div class="col-md-12 text-center">
		<button class="btn btn-warning btn-block btn-sm px-5 py-2" type="button" id="bid">Bid</button>
	</div>
      </div>
      <!-- show footer when user is only logged in -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close">Cancel</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<?php include('footer.php');?>

<script>
// ACTIVE CLASS
$('#cat-list li').click(function(){
    location.href=$(this).attr('data-href')
})

$('#cat-list li').each(function(){
    var id = '<?php echo $cid > 0? $cid:'all' ?>';
    if (id == $(this).attr('data-id')){
        $(this).addClass('active')
    }
})

$(".close").click(function(){
    $('#myModal').modal('hide');
});

$('.n2').addClass('active');

</script>
</body>
</html>
