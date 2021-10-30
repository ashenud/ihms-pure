<?php 
session_start();
include('../../../../php/basic/connection.php');

$query1="SELECT * FROM doctor_reminder WHERE doctor_id='".$_SESSION['doctor_id']."'";
$result1=mysqli_query($conn, $query1);
$num_rows1=mysqli_num_rows($result1);

echo $num_rows1;

?>