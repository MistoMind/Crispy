<?php
$server="localhost";
$username="root";
$password="mysql2022";
$dbname="crispy";

$conn=mysqli_connect($server,$username,$password,$dbname);

if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
?>
