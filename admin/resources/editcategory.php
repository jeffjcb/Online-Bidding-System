<?php
include('../db_connect.php'); 

try{
    // get post data
    $id = $_POST['cid'];
    $name = $_POST['name'];

        $sql = "UPDATE `categories` SET `category`='$name' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            header('Location:../categories.php?success=1');
      } 
    }
    catch(Exception $e) {
      header('Location:../categories.php?failure=3');
    }
?>