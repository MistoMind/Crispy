<?php
session_start();
require("dbconnect.php");

$name = mysqli_real_escape_string($conn, $_POST['username']);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$age = (int)mysqli_real_escape_string($conn, $_POST['age']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
$address=mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);

if($cpassword!=$password){
    $_SESSION['pass_not_match_alert'] = true;
    header("Location: ../signup.php");
}else {
    $q="SELECT * FROM users WHERE username = '$name' or email= '$email'";
    $result=mysqli_query($conn,$q);
    if(mysqli_num_rows($result)>0){
        header("Location: ../signup.php");     //redirecting to same page
    }
    else{
        $q="INSERT INTO users(username,fname,lname,age,gender,email,password,address,phonenumber) VALUES('$name','$fname','$lname','$age','$gender','$email',SHA2('$password',256),'$address','$phone')";
        $result=mysqli_query($conn,$q);

        $_SESSION['registration_alert'] = true;
        
        header("Location: ../login.php");     //redirecting to login page
    }
}

?>