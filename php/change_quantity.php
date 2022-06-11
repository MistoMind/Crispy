<?php
session_start();
require('dbconnect.php');

$id = $_POST['item_id'];
$quantity = (int)$_POST['item_quantity'];
$username = $_SESSION['username'];

$q = "UPDATE cart SET quantity='$quantity' WHERE item_id='$id' AND username='$username'";
$result = mysqli_query($conn, $q);

header("Location: ../cart.php");
?>