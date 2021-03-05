<!-- 
retreive post form variables
query db bids
check bid is greater tham the starting bid
    if greater
        check if there are bids on the productid
            if none,
                insert new bid
            else
                check if post bid is greater than startbid 
                if true
                    update user id and and bid_amount
                    go back to the main page and display success
                if false
                    go back to the main page and display fail and error
        -->

<?php 
session_start();
$_SESSION['error_message1'] = false;
$_SESSION['error_message2'] = false;
$_SESSION['success_message1'] = false;
$_SESSION['success_message2'] = false;
include('admin/db_connect.php');
// ALL VARIABLES THAT IS NEEDED
$prod_id = $_POST['prod_id'];
$amount = $_POST['amount'];
$startbid = $_POST['startbid'];
$uid = $_SESSION['u_id'];

$sql2 = "SELECT bid_amount FROM `bids` WHERE product_id=$prod_id";
$results = mysqli_query($conn, $sql2);

if($amount > $startbid){
    // if results is greater than 0
        $row = mysqli_fetch_assoc($results);
        if(!empty($row['bid_amount'])){
            // check if bid is greater than bid amount
            if($amount > $row['bid_amount']){
                // update query
                $sql3 = "UPDATE bids SET user_id = $uid, bid_amount = $amount WHERE product_id=$prod_id";
                if (mysqli_query($conn, $sql3)) {
                    $_SESSION['success_message1'] = true;
                    header('Location:main.php');
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }
            else{
                // display an alert that bid should be greater than current highest bid
                $_SESSION['error_message2'] = true;
                header('Location:main.php');
            }
        }
        // if no set value in max, create new
        else{
            $sql4 = "INSERT INTO `bids`(`user_id`, `product_id`, `bid_amount`) VALUES ($uid, $prod_id, $amount)";
            if (mysqli_query($conn, $sql4)) {
                $_SESSION['success_message2'] = true;
                header('Location:main.php');
          } else {
                echo "Error: inserting record: " . mysqli_error($conn);
          }
        }

}else{ 
       // display an alert that bid should be greater than starting bid for 6 seconds
    $_SESSION['error_message1'] = true;
    header('Location:main.php');

}





?>