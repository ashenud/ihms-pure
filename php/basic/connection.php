<?php
	$servername="localhost";
	$username="cs2019g6";
	$password="cs2019g6pwd";

	$conn=mysqli_connect($servername,$username,$password);

	if(!$conn) {
		die("Connection not connected: ".mysqli_connect_error($conn). '<br>');
	}
	/*else {
		echo("Connected Successfully <br> ");
	}*/
?> 
