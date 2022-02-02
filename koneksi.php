<?php 
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "e-commerce";
	

	mysql_connect($hostname, $username, $password);
	mysql_select_db($database) or die("Database tidak dapat dibuka");
 ?>