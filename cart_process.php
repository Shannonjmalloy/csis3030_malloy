<?php
//cart_process.php
//This script receives data from the product_detail page as well as the cart_list page
//It is responsible for merging content into the 'cart' table, adding rows and fixing quantities

include("global.php");


//Make the variable easier to use
$session_id = session_id();


//loop over all the $_POST variables that were given to us
foreach ($_POST as $product_field => $quantity) {

	//if the $_POST variable name is "product_xxxx", then extract the ID and continue
	$pattern = "/product\_([0-9]+)/";
	if (preg_match_all($pattern,$product_field,$matches)) {
		$product_id = $matches[1][0];
	

		//If we came from the "product_detail" page and the product is already in the cart, 
		//then grab the old quantity and add it to the new quantity.
		$result = mysqli_query($connection,"select * from cart where session_id = '$session_id' and product_id = $product_id");
		if (mysqli_num_rows($result) != 0 && !($_POST["checkout"] || $_POST["update_cart"])) {
			$row = mysqli_fetch_assoc($result);
			$quantity = $quantity + $row["quantity"];
		}


		//delete the old cart entry (if it exists)
		mysqli_query($connection,"delete from cart where session_id = '$session_id' and product_id = $product_id");


		//add the new cart entry
		mysqli_query($connection,"insert into cart (session_id,product_id,quantity) values ('$session_id',$product_id,$quantity)");

	}

}

//If the person clicked 'checkout' button, go to checkout page, otherwise, to the cart
if ($_POST["checkout"])
	header("Location: checkout_form.php");
else
	header("Location: cart_list.php");
?>