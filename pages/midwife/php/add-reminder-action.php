<?php

if (isset($_POST['submitReminder'])) {
    include "selectdb.php";
    extract($_POST);
    session_start();

    $mid= $_SESSION["midwife_id"];

    $sql="INSERT INTO midwife_reminder(midwife_id,midwife_reminder,date_time) VALUES('$mid','$reminder','$dateTime')";

    if(mysqli_query($conn,$sql)){

        echo "data inserted.<br>";
       header("Location:/midwife/dashboard?Resuccess=1");
    }
    
    else{
    
        echo "data not insert.<br>";
        header("Location:/midwife/dashboard?Reerror=1");
    }
    
    mysqli_close($conn);

}


?>