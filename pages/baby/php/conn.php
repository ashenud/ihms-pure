<?php


$serverName="localhost";
$userName="cs2019g6";
$password="cs2019g6pwd";

$conn= mysqli_connect($serverName,$userName,$password);

if(!$conn){

    die("connection failed<br>".mysqli_connect_error());
}

else{

   //echo "Connected.<br>";
}

?>