<?php

session_start();

include('../../../php/basic/connection.php');

if (isset($_POST['submitReminder'])) {
    extract($_POST);

    $mid= $_SESSION["doctor_id"];

    $sql="INSERT INTO doctor_reminder(doctor_id,doctor_reminder,date_time) VALUES('$mid','$reminder','$dateTime')";

    if(mysqli_query($conn,$sql)){

        echo "data inserted.<br>";
       header("Location:/doctor/dashboard?Resuccess=1");
    }
    
    else{
    
        echo "data not insert.<br>";
        header("Location:/doctor/dashboard?Reerror=1");
    }
    
    mysqli_close($conn);

}


?>