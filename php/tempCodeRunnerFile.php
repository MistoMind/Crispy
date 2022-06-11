<?php
while(true){
			echo $row[$i]['item_name'] . " " . $row[$i]['order_qunatity'] . " " . $row[$i]['price'] . "<br>";
			$nextID = $row[$i+1][0];
			if($currID!=$nextID) break;
			$i++;
		}