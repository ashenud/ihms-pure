<?php
extract($_POST);
include "selectdb.php";
session_start();
$mid=$_SESSION['midwife_id'];

    if(isset($_POST['submitThriposha'])){


        $currentMonth=date("Y-m");
        $sql09="SELECT updated_date,available_qty FROM thriposha_storage WHERE updated_date LIKE '%$currentMonth%'";
        $result09=mysqli_query($conn,$sql09);
        $value09=mysqli_fetch_assoc($result09);

        if(empty($value09)){
            $sql08="INSERT INTO thriposha_storage(midwife_id,updated_date,available_qty) VALUES('$mid','$today','$availableQty')";
            if($result08=mysqli_query($conn,$sql08)){
                header("Location:/midwife/thriposha?success=1");
            }
            else {
                header("Location:/midwife/thriposha?fail=1");
            }
        }
        else {
            $pastQty = $value09['available_qty'];
            $newQty= $availableQty + $pastQty;
            $sql07="UPDATE thriposha_storage SET available_qty='".$newQty."' WHERE updated_date LIKE '%$currentMonth%'";
            if($result07=mysqli_query($conn,$sql07)){
                header("Location:/midwife/thriposha?success=1");
            }
            else {
                header("Location:/midwife/thriposha?fail=1");
            }
        }


    }

?>