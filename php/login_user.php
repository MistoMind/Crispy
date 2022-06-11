<?php
session_start();
require("dbconnect.php");

$email=$_POST['exampleInputEmail1'];
$pass=$_POST['exampleInputPassword1'];

$q="SELECT * from users WHERE email='$email' && password=SHA2('$pass',256)";
$result=mysqli_query($conn,$q);
$rows=mysqli_fetch_assoc($result);

if((mysqli_num_rows($result))==1){
    $_SESSION['username']=$rows['username'];
    // echo $_SESSION['username'];
    header("Location: ../explore.php");
}
else{
    header("Location: ../signup.php");
}
?>