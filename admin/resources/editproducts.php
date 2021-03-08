<?php
include('../db_connect.php'); 

try{
    // get post data
    $id = $_POST['pid'];
    $pname = $_POST['pname'];
    $desc = $_POST['desc'];
    $rprice = $_POST['rprice'];
    $sprice = $_POST['sprice'];
    $endtime = $_POST['endtime'];

        $sql = "UPDATE `products` SET `name`='$pname',`description`='$desc',`start_bid`='$sprice',`regular_price`='$rprice',`bid_end_datetime`='$endtime' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            header('Location:../products.php?success=2');
      } 
    }
    catch(Exception $e) {
      header('Location:../products.php?failure=2');
    }
?>