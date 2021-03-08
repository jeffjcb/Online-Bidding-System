<?php

include('../db_connect.php'); 

if(isset($_POST['save'])){
    try {
          // get post data
      $pname = $_POST['pname'];
      $categ = $_POST['categ'];
      $desc = $_POST['desc'];
      $rprice = $_POST['rprice'];
      $bidamount = $_POST['bid_amount'];
      $endtime = $_POST['endtime'];
      $name = $_FILES['file']['name'];
      $target_dir = "../../img/";
      $target_file = $target_dir . basename($_FILES['file']['name']);
      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","svg");
      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
         // Insert record
         $sql = "INSERT INTO `products`(`category_id`, `name`, `description`, `start_bid`, `regular_price`, `bid_end_datetime`, `img_fname`) VALUES ('$categ','$pname','$desc','$bidamount','$rprice','$endtime','$name')";
         if (mysqli_query($conn, $sql)) {
                      // Upload file from origin location of the file to the new location
            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
            header('Location:../products.php?success=1');
        }}


      }
  

  catch(Exception $e) {
    header('Location:../products.php?failure=1');
  }
  }

?>