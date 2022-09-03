<?php
session_start();
require("dbconnect.php");

$oldpassword = mysqli_real_escape_string($conn, $_POST['opassword']);
$newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
$cnewpass = mysqli_real_escape_string($conn, $_POST['cnewpass']);

$q = "SELECT password FROM users WHERE username='" .$_SESSION['username']. "'";
$result = mysqli_query($conn, $q);
$data = mysqli_fetch_assoc($result);

if(hash('sha256',$oldpassword)==$data['password']){
    if($cnewpass==$newpass){
        $addnew = hash('sha256',$newpass);
        $q = "UPDATE users SET password='" .$addnew. "'  WHERE username='" .$_SESSION['username']. "'";
        $result = mysqli_query($conn,$q);
        $_SESSION['change_pass_alert'] = true;
    }else $_SESSION['pass_not_match_alert'] = true;
}else $_SESSION['old_pass_alert'] = true;


header("Location: ../user_profile.php");
?>