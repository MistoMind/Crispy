<?php
session_start();
require('dbconnect.php');

$q = "SELECT username, email, pic FROM users WHERE username='" .$_SESSION['username']. "'";
$result = mysqli_query($conn, $q);
$user = mysqli_fetch_assoc($result);
?>