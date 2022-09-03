<?php	
session_start();
require('dbconnect.php');

if(isset($_SESSION['username'])){
	$feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
	$username = $_SESSION['username'];
	
	$q = "INSERT INTO feedback(username, description) VALUES('$username', '$feedback')";
	mysqli_query($conn, $q);

	$_SESSION['feedback_alert'] = true;
}

header("Location: ../user_profile.php");
?>