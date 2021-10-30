<?php
include "selectdb.php";
extract($_POST);

$sql1="UPDATE baby_register SET status='active' WHERE baby_id='".$active_baby_id."'";
$run1=mysqli_query($conn,$sql1);
$sql2="SELECT mother_nic FROM baby_register WHERE baby_id='".$active_baby_id."'";
$run2=mysqli_query($conn,$sql2);
$result2=mysqli_fetch_assoc($run2);
$sql3="UPDATE user SET status='active' WHERE user_id='".$result2['mother_nic']."'";
$sql4="UPDATE mother SET status='active' WHERE mother_nic='".$result2['mother_nic']."'";
$sql5="UPDATE locations SET status='active' WHERE mother_nic='".$result2['mother_nic']."'";
mysqli_query($conn,$sql3);
mysqli_query($conn,$sql4);
mysqli_query($conn,$sql5);
mysqli_close($conn);
header("Location:/midwife/view-babies");
?>