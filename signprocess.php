<?php

session_start();
include('admin/db_connect.php');
// get post data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$addr = $_POST['addr'];
$cont = $_POST['cont'];
$_SESSION['log']=true;
$fullname = $fname." ".$lname;

$duplicate=mysqli_query($conn,"SELECT * from users where username='$uname' or email='$email'");
// if duplicate is found in the database
if (mysqli_num_rows($duplicate)>0)
{
    $_SESSION['log']=false;
header('Location:signup.php');
}else{
    // echo "no duplicates found";
    $sql = "INSERT INTO users (`name`, `username`, `password`, `email`, `contact`, `address`) VALUES ('$fullname', '$uname', '$pass', '$email', '$cont', '$addr')";
    if (mysqli_query($conn, $sql)) {
        header('Location:login.php?valid=true"');
  } else {
        echo "Error: inserting record: " . mysqli_error($conn);
  }
}


?>


