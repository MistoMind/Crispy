<?php
session_start();
require("dbconnect.php");

$q = "SELECT items.item_name, items.item_type, items.price, items.image, SUM(order_quantity) AS quantity_ordered FROM items, ordered_item WHERE items.item_id=ordered_item.item_id GROUP BY ordered_item.item_id ORDER BY SUM(order_quantity) DESC, item_name ASC";
$result = mysqli_query($conn, $q);
?>