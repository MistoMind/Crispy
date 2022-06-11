<?php
session_start();
require('dbconnect.php');

$q = "SELECT DISTINCT category_name FROM items";
$result = mysqli_query($conn, $q);
?>