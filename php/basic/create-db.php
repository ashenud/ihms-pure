<?php
	include('connection.php');

	$query1="CREATE DATABASE  cs2019g6";

	$result1=mysqli_query($conn,$query1); 

	if($result1) {
		echo("Create database sucsessfully <br>");
	}
	else {
		echo("Query error : ".mysqli_error($conn). '<br>');
	}


?>
