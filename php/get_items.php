<?php
session_start();
require('dbconnect.php');

if(isset($_SESSION['category'])){ // Getting using DropDown in Navbar
	$category = $_SESSION['category'];
	$q = "SELECT * FROM items WHERE category_name='$category'"; 
	unset($_SESSION['category']);
}else if(isset($_POST['searched'])){ // Getting using search bar
	$search = $_POST['searchitem'];
	$q = "SELECT * FROM items WHERE item_name LIKE '%" .$search. "%' OR category_name LIKE '%" .$search. "%' OR item_type LIKE '" .$search. "%';";
}else if(isset($_POST['filtered'])){ // Getting using filter
	$category = $_POST['category'];
	$type = $_POST['type'];
	if($category!="Select food category......" && isset($type)){ // Both set
		$q = "SELECT * FROM items WHERE category_name='$category' AND item_type='$type'";
	}else if($category!="Select food category......"){ // Only Category is set
		$q = "SELECT * FROM items WHERE category_name='$category'";
	}else if(isset($type)){ // Only Type is set
		$q = "SELECT * FROM items WHERE item_type='$type'";
	}
}else{
	$q = "SELECT * FROM items";
}

$result = mysqli_query($conn, $q);
?>