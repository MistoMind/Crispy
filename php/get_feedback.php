<?php	
session_start();
require('dbconnect.php');

$q = "SELECT fname, lname, description FROM users NATURAL JOIN feedback;";
$result = mysqli_query($conn, $q);
?>