<?php	
session_start();
require('dbconnect.php');

if(isset($_SESSION['username'])){
	$id = $_POST['addtocart'];
	$username = $_SESSION['username'];

	$q = "INSERT ignore INTO cart VALUES('$username', $id, 1)";

	mysqli_query($conn, $q);

	$_SESSION['addtocart_alert'] = true;

	header("Location: ../explore.php");
}else header("Location: ../login.php");
?>