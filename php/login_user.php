<?php
session_start();
require("dbconnect.php");

$user=mysqli_real_escape_string($conn, $_POST['exampleInputUser']);
$pass=mysqli_real_escape_string($conn, $_POST['exampleInputPassword1']);

$q="SELECT * from users WHERE username='$user' && password=SHA2('$pass',256)";
$result=mysqli_query($conn,$q);
$rows=mysqli_fetch_assoc($result);

if((mysqli_num_rows($result))==1){
    $_SESSION['username']=$rows['username'];
    header("Location: ../explore.php");
}
else{
    $_SESSION['login_failed_alert'] = true;
    header("Location: ../login.php");
}
?>