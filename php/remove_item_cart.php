<?php
session_start();
require('dbconnect.php');

$id = (int)$_POST['remove_me'];
$username = $_SESSION['username'];

$q = "DELETE FROM cart WHERE item_id=$id AND username='$username'";
$result = mysqli_query($conn, $q);

header("Location: ../cart.php");
?>