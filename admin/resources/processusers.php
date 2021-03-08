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

try{
// get post data
$name = $_POST['name'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$addr = $_POST['addr'];
$cont = $_POST['cont'];
$type = $_POST['type'];

$duplicate=mysqli_query($conn,"SELECT * from users where username='$uname' or email='$email'");
// if duplicate is found in the database
if (mysqli_num_rows($duplicate)>0)
{
header('Location:../users.php?failure=1');
}else{
    // echo "no duplicates found";
    $sql = "INSERT INTO users (`name`, `username`, `password`, `email`, `contact`, `type`, `address`) VALUES ('$name', '$uname', '$pass', '$email', '$cont','$type', '$addr')";
    if (mysqli_query($conn, $sql)) {
        header('Location:../users.php?success=1');
  } 
}}
catch(Exception $e) {
  header('Location:../users.php?failure=3');
}
?>