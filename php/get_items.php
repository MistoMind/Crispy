<?php
session_start();
require('dbconnect.php');

if(isset($_SESSION['category'])){
	$category = $_SESSION['category'];
	$q = "SELECT * FROM items WHERE category_name='$category'"; 
	unset($_SESSION['category']);
}else if(isset($_POST['searched'])){
	$search = $_POST['searchitem'];
	$q = "SELECT * FROM items WHERE item_name LIKE '%" .$search. "%' OR category_name LIKE '%" .$search. "%'";
}else if(isset($_POST['filtered'])){
	$category = $_POST['category'];
	$type = $_POST['type'];
	if($category!="Select food category......" && isset($type)){
		$q = "SELECT * FROM items WHERE category_name='$category' AND item_type='$type'";
	}else if($category!="Select food category......"){
		$q = "SELECT * FROM items WHERE category_name='$category'";
	}else $q = "SELECT * FROM items WHERE item_type='$type'";
}else {
	$q = "SELECT * FROM items";
}

$result = mysqli_query($conn, $q);
?>