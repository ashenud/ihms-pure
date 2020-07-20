<?php
include('../../../php/basic/connection.php');
 
     
    if(isset($_POST['save'])){

       
        $remain_amount = $_POST['remain-amount'];
        $required_amount = $_POST['required-amount'];
        $expired_amount = $_POST['expired-amount'];
        $nested_amount = $_POST['nested-amount'];
        $month = $_POST['month'];
 
        $query2="INSERT INTO `doc_thriposha` ( `remain_amount`, `required_amount`, `expired_amount`, `nested_amount`, `month`) 
        VALUES ('$remain_amount','$required_amount','$expired_amount','$nested_amount','$month')";
    
        //print_r($query2);

        if(mysqli_query($conn,$query2)){

            echo "it works";
            header("Location:/admin/table?added-success");
        }
        
    }
?>