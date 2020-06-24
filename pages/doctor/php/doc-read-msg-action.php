<?php

session_start();

include('../../../php/basic/connection.php');

if(isset($_POST['read-submit'])) {
    extract($_POST);
    $query1="UPDATE doctor_message SET status='read' WHERE date='".$msg_date."' AND time='".$msg_time."' AND doctor_id='".$_SESSION['doctor_id']."'";
    $result1=mysqli_query($conn,$query1);
    
    echo mysqli_error($conn);
    
    if($result1) {
        header("Location:/doctor/inbox");
    }
}

if(isset($_POST['delete-submit'])) {
    extract($_POST);
    $query1="DELETE FROM doctor_message WHERE doctor_message='".$msg_area."' AND date='".$msg_date."' AND time='".$msg_time."' AND doctor_id='".$_SESSION['doctor_id']."'";
    $result1=mysqli_query($conn,$query1);
    
    echo mysqli_error($conn);
    
    if($result1) {
        header("Location:/doctor/inbox?msgDelete=1");
    }
}

?>