<?php

//shows all the entries in a particular menu category
include("global.php");
include("header.php");
?>

<?php 

	$sql = "select * from categories where id =".intval($_GET["category_id"]);
 	$result = mysqli_query($connection,$sql);

 	$row = mysqli_fetch_assoc($result);
 	echo $row["category_name"] . "<br /><br />" ;

	$category_id = intval($_GET["category_id"]);
	$sql = "select * from products where category_id = $category_id ";
	$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));


	while ($row = mysqli_fetch_assoc($res)) {
	echo $row["category_name"] . "<br/>";
	echo $row["product_name"] . "<br/>";
	echo $row["price"] . "<br/>";
	echo "Quantity Remaining: " . $row["quantity_remaining"] . "<br/>";
	echo $row['image'] . "<br/>";	
	echo "Description: " . $row['description'] . " </p>" . "<br/>";
	};

include("footer.php");
?>