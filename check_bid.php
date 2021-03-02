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
include('admin/db_connect.php');
// ALL VARIABLES THAT IS NEEDED
$prod_id = $_POST['prod_id'];
$amount = $_POST['amount'];
$startbid = $_POST['startbid'];
// $_SESSION['username'];

$sql2 = "SELECT MAX(bid_amount) FROM `bids` WHERE product_id=1";
$results = mysqli_query($conn, $sql2);

if($amount > $startbid){
    if(mysqli_num_rows($results)>0){
        $row = mysqli_fetch_assoc($results);
        if($amount > $row['bid_amount']){
            // update query
        }else{
            $_SESSION['error_message2'] = true;
            header('Location:main.php');
            // display an alert that bid should be greater than current highest bid
        }
    }else{
        // insert new bid
    }
}else{
    $_SESSION['error_message1'] = true;
    header('Location:main.php');
    // display an alert that bid should be greater than starting bid for 6 seconds
}





?>