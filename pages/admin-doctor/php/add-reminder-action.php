<?php include('../../../php/basic/connection.php'); ?>
<?php

if (isset($_POST['submitReminder'])) {
    extract($_POST);
    session_start();
    //echo $dateTime;

    $admin= $_SESSION["admin_id"];

    $sql="INSERT INTO admin_reminder(admin_id,admin_reminder,date_time) VALUES('$admin','$reminder','$dateTime')";

    if(mysqli_query($conn,$sql)){

        echo "data inserted.<br>";
        header("Location:../admin-doc-dashboard.php?Resuccess=1");
    }
    
    else{
    
        echo "data not insert.<br>";
        header("Location:../admin-doc-dashboard.php?Reerror=1");
    }
    
    mysqli_close($conn);

}


?>