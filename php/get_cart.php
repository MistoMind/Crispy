<?php
session_start();
require('dbconnect.php');

$username = $_SESSION['username'];

$q = "SELECT cart.item_id, image, item_name, price, quantity FROM cart, items WHERE cart.item_id=items.item_id AND username='$username'";
$result = mysqli_query($conn, $q);
?>