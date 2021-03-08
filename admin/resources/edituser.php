<?php
include('../db_connect.php'); 

try{
    // get post data
    $id = $_POST['uid'];
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $cont = $_POST['cont'];
    $type = $_POST['type'];

        $sql = "UPDATE `users` SET `name`='$name',`username`='$uname',`password`='$pass',`email`='$email',`contact`='$cont',`type`='$type' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            header('Location:../users.php?success=1');
      } 
    }
    catch(Exception $e) {
      header('Location:../users.php?failure=3');
    }
?>