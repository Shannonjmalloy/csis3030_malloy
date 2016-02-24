<?php

	include("global.php");

include("header.php"); 

	$sql = "select * from categories order by category_name";	
	//run the query, store the result (if any) in $result
	$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
?>
<br/>
<br/>
<?php
	while ($row = mysqli_fetch_assoc($res)) {
		echo "<a href='product_list.php?category_id=" . $row["id"] . "'>". $row["category_name"] . "</a> <br/>";
	}

	include("footer.php");
?>