<?php
//  delete
include('../db_connect.php');

try {
    if (isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $sql = "DELETE FROM products WHERE id = $delete";
        if ($conn->query($sql) === TRUE) {
            header('Location:../products.php?success=2');
          }

  }
}
  //catch exception
  catch(Exception $e) {
    header('Location:../products.php?failure=2');
  }



?>