<?php
session_start();
require("dbconnect.php");

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$age = (int)mysqli_real_escape_string($conn, $_POST['age']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);

$q="UPDATE users SET fname='" .$fname. "', lname='" .$lname. "', age=" .$age. ", gender='" .$gender. "', email='" .$email. "', address='" .$address. "', phonenumber=" .$phone. " WHERE username='" .$_SESSION['username']. "'";
$result=mysqli_query($conn,$q);

$_SESSION['edit_profile_alert'] = true;
header("Location: ../user_profile.php");     //redirecting to login page
?>