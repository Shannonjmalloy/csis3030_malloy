<?php

//shows all the entries in a particular menu category
include("global.php");
include("header.php");
?>

<?php 

	$sql = "select * from categories where id =".intval($_GET["category_id"]);
 	$result = mysqli_query($connection,$sql);

 	$row = mysqli_fetch_assoc($result);

	$category_id = intval($_GET["category_id"]);
	$product_id = intval($_GET["product_id"]);
	$sql = "select * from products where category_id = $category_id ";
	$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));

	echo "<h1>" . $row["category_name"] . "</h1>";

	while ($row = mysqli_fetch_assoc($res)) {	
	echo "<h3>" . $row["product_name"] . "</h3>";
	echo "<a href='product_detail.php?product_id=" . $row["id"] .  "'>" .  "Click to view" . "</a> <br/>";	
	echo $row['image'] . "<br/><br/>";	
	};

include("footer.php");
?>