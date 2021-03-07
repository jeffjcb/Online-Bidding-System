<?php
//  delete
include('../db_connect.php');

try {
    if (isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $sql = "DELETE FROM categories WHERE id = $delete";
        if ($conn->query($sql) === TRUE) {
            header('Location:../categories.php?success=2');
          }

  }
}
  //catch exception
  catch(Exception $e) {

    header('Location:../categories.php?failure=2');
  }

 
  try{
    if(isset($_POST['category'])){
      $insert = ucwords($_POST['category']);
      $sql = "INSERT INTO `categories`(`category`) VALUES ('$insert')";
      if ($conn->query($sql) === TRUE) {
        header('Location:../categories.php?success=1');
      }
    }
  }
  
  catch(Exception $e){
    header('Location:../categories.php?failure=1');
  }
?>