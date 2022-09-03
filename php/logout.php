<?php
session_start();
require("dbconnect.php");

session_destroy();
header("Location: ../index.php");
?>