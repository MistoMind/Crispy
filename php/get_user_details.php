<?php
session_start();
require('dbconnect.php');

$q = "SELECT fname, lname, age, gender, email, address, phonenumber FROM users WHERE username='" .$_SESSION['username']. "'";
$result = mysqli_query($conn, $q);
$user = mysqli_fetch_assoc($result);
?>