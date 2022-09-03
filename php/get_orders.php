<?php	
session_start();
require('dbconnect.php');

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	
	$q = "SELECT order_id, order_date, total_price, item_name, order_quantity, price FROM items NATURAL JOIN orders NATURAL JOIN ordered_item WHERE username = '$username' ORDER BY order_date";
	$result = mysqli_query($conn, $q);

	$row = mysqli_fetch_all($result, MYSQLI_BOTH);
	$tot_rows = sizeof($row);
}
?>