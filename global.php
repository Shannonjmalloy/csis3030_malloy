<?php
//contains session and database connection information

	session_start();
//1. Connect to the database
								//server name, username, password, database
	$connection = mysqli_connect ("localhost","root","","ecommerce");


?>