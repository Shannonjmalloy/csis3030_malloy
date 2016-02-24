<?php

//This should list all the products in a person's cart (product name) as well as the quantities inside text boxes. 

include("global.php");
include("header.php");

 
	$sql = "select products.product_name, cart.quantity, products.id
			FROM products
			inner join cart
			on products.id=cart.product_id
			WHERE session_id = '" . session_id() . "'";
 	$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
?>

<br/>
<br/>

<a href="category_list.php"> Keep Shopping </a> <br/> <br/>
	
<form action='cart_process.php' method='post'>

<?php
while ($row = mysqli_fetch_assoc($res)) {	
	echo $row["product_name"];
	echo "<input type='text' name='product_" . $row['id'] .  "' value='" . $row["quantity"] . "'/>";
	};
?>

<input type='submit' name='update_cart' value='Update Cart'/>
<input type='submit' name='checkout' value='Checkout'/>
</form>

<?php
include("footer.php");
?>