<?php
session_start();
require('dbconnect.php');

$username = $_SESSION['username'];
$q = "SELECT SUM(price*quantity) AS total FROM cart, items WHERE cart.item_id=items.item_id AND username='$username'";
$result = mysqli_query($conn, $q);
$total = mysqli_fetch_assoc($result)['total'];

if($total==NULL)
	$total = 0;
?>