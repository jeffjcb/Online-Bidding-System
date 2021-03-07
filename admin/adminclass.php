<?php 
session_start();
$form = $_POST['form'];

function loginuser(){
    include('db_connect.php');
// get post data
$username = $_POST['username'];
$password = $_POST['password'];
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
    if($rw['type']==1){
        
        // check if the username in db is same as the posted data
        if($rw['username']==$username && $rw['password']==$password){
            $_SESSION['a_id']= $rw['id'];
            $_SESSION['adminname']= $username;
            header('Location:home.php');
            
        }
    // if not
        else{
            // $_SESSION['loggedin']=false;
            header('Location:adminlogin.php?valid=0');
        }
    }
    else{
        header('Location:adminlogin.php?valid=2');
        // echo "this is for admin only";
    }
}
else{
    // $_SESSION['loggedin']=false;
    header('Location:adminlogin.php?valid=0');
}
}
else{
    exit('Please fill both the username and password fields!');
}
$conn -> close();
}



switch($form){
    case 1:{
        unset($form);
        loginuser();
    }

}

?>