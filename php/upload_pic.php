<?php
session_start();
require('dbconnect.php');

if($_POST['submit']=="upload"){
	$target_path = "../images/user_pics/" . $_SESSION['username'] . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
	$db_path = "images/user_pics/" . $_SESSION['username'] . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
	
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
		$q = "UPDATE users SET pic='" .$db_path. "' WHERE username='" .$_SESSION['username']. "'";	
		mysqli_query($conn, $q);
	}

	$_SESSION['upload_pic_alert'] = true;
}else if($_POST['submit']=="remove"){
	$q = "SELECT pic FROM users WHERE username='" .$_SESSION['username']. "' AND pic LIKE '%" .$_SESSION['username']. "%'";
	$result = mysqli_query($conn, $q);
	$oldImg = mysqli_fetch_assoc($result);
	unlink("../".$oldImg['pic']);
	$img_path = "images/user_pics/user_pic.png";
	$q = "UPDATE users SET pic='" .$img_path. "' WHERE username='" .$_SESSION['username']. "'";	
	mysqli_query($conn, $q);

	$_SESSION['remove_pic_alert'] = true;
}

header("Location: ../user_profile.php")
?>