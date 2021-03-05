<?php 
session_start();
include('admin/db_connect.php');
// get post data
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['loggedin']=false;
// prevent sql injection
if(isset($username, $password)){
$username =  stripcslashes($username);
$password =  stripcslashes($password);
$username =  mysqli_real_escape_string($conn,$username);
$password =  mysqli_real_escape_string($conn,$password);
// query database
$res = $conn->query("SELECT * from users where username = '$username' and password = '$password'") or die("Failed to query database".mysql_error());
$rw = $res -> fetch_assoc();
// check if db username and password is retrieved
if(isset($rw['username'], $rw['password'])){
    // check if the username in db is same as the posted data
    if($rw['username']==$username && $rw['password']==$password){
        $_SESSION['username']= $username;
        $_SESSION['u_id']= $rw['id'];
        $_SESSION['loggedin']=true;

        header('Location:main.php');
    }
// if not
    else{
        // $_SESSION['loggedin']=false;
        header('Location:login.php');
    }
}else{
    // $_SESSION['loggedin']=false;
    header('Location:login.php');
}
}
else{
    exit('Please fill both the username and password fields!');
}

$conn -> close();

?>