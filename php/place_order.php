<?php
session_start();
require("dbconnect.php");

if($_POST['total_price']!=0){
	$username = $_SESSION['username'];
	$total_price = $_POST['total_price'];
	$currdate = date("Y-m-d h:i:s");
	$order_id = md5("$username.$currdate");

	$q = "INSERT INTO orders(order_id, username, order_date, total_price) VALUES('$order_id', '$username', NOW(), '$total_price')";
	mysqli_query($conn, $q);	
	$q = "SELECT item_id, quantity FROM cart";
	$result = mysqli_query($conn, $q);
	
	while($row=mysqli_fetch_assoc($result)){
		$item_id = $row['item_id'];
		$order_quantity = $row['quantity'];
		$q = "INSERT INTO ordered_item(order_id, item_id, order_quantity) VALUES('$order_id',	$item_id, $order_quantity)";
		mysqli_query($conn, $q);
		$q = "DELETE FROM cart WHERE item_id=$item_id";
		mysqli_query($conn, $q);
	}

	$_SESSION['place_order_alert'] = true;
}

header("Location: ../cart.php");
?>