<?php
include("global.php");
include("header.php"); 


$first_name = $_POST["firstname"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];



if ($first_name == "") { 
$errormessage =  $errormessage . "You forgot your name!<br />";
}

if ($address == "") {
$errormessage =  $errormessage . "You forgot your address <br />";
}

if ($city == "") { 
$errormessage =  $errormessage . "You forgot your city! <br />";
}

if ($state == "") { 
$errormessage =  $errormessage . "You forgot your state! <br />";
}

if ($zip == "") { 
$errormessage =  $errormessage . "You forgot your zip code! <br />";
}

if ($errormessage != "") {  
include("checkout_form.php");
die();
}


$first_name = mysqli_real_escape_string($connection,$_POST["firstname"]);
$address = mysqli_real_escape_string($connection,$_POST["address"]);
$city = mysqli_real_escape_string($connection,$_POST["city"]);
$state = mysqli_real_escape_string($connection,$_POST["state"]);
$zip = mysqli_real_escape_string($connection,$_POST["zip"]);

?>


<h1><?php echo $first_name . "'s"; ?> Reciept</h1>

<?php 

echo "<div class='bold'>Address: </div>" . $address . "<br />";
echo "<div class='bold'>City: </div>" . $city . "<br />";
echo "<div class='bold'>State: </div>" . $state . "<br />";
echo "<div class='bold'>Zip Code: </div>" . $zip . "<br /><br/>";


$sql = "select products.product_name, cart.quantity, products.id
			FROM products
			inner join cart
			on products.id=cart.product_id
			WHERE session_id = '" . session_id() . "'";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));

while ($row = mysqli_fetch_assoc($res)) {	
	echo $row["product_name"] . "			";
	echo $row["quantity"] .  "<br/>";

	$sql  = "update products set quantity_remaining = quantity_remaining - " . $row["quantity"] . " where id =" . $row["id"];

	mysqli_query($connection,$sql) or die(mysqli_error($connection));

	};

include ("jwu_email.php");

	$email = "Name: " . $first_name . " Shipping Address: " . $address . " ";
	$email = $email . $city . ", " . $state . " " . $zip . " ";

$sql = "select products.product_name, cart.quantity, products.id
			FROM products
			inner join cart
			on products.id=cart.product_id
			WHERE session_id = '" . session_id() . "'";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));

while ($row = mysqli_fetch_assoc($res)) {
	$email = $email . "Product Purchased: " . $row["product_name"] . " ";
	$email = $email . "Quantity: " . $row["quantity"] . " ";
};

	jwu_mail("smalloy01@wildcats.jwu.edu","NEW ORDER",$email);

include("footer.php");
?>
