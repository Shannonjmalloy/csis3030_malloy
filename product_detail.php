

<?php
include("global.php");
include("header.php");
//Create product_detail.php which shows the full name, photo, and description of the product. 

	$sql = "select * from products where id =".intval($_GET["product_id"]);
 	$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));

 	$row = mysqli_fetch_assoc($res);
	echo "<h2>" . $row["category_name"] . "</h2>";
	echo $row["product_name"] . "<br/>";
	echo "$" . $row["price"] . "<br/>";
	echo "Quantity Remaining: " . $row["quantity_remaining"] . "<br/>";
	echo $row['image'] . "<br/>";	
	echo "Description: " . $row['description'] . " </p>" . "<br/>";

?>


<form action="cart_process.php" method="POST">
	Quantity: <input class="quantity" type="text" name="product_<?php echo $row['id'] ?>" size="3"/> <br/> <br/>

	<input class="submit" type="submit" value="Add to Cart"/>
<form>


<?php 
include("footer.php");
?>
