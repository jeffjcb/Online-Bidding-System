<?php
//  delete
include('../db_connect.php');

try {

    if (isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $sql = "DELETE FROM users WHERE id = $delete";
        if ($conn->query($sql) === TRUE) {
            header('Location:../users.php?success=2');
          }

  }
}
  //catch exception
  catch(Exception $e) {
    header('Location:../users.php?failure=2');
  }
?>