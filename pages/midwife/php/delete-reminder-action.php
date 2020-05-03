<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);

mysqli_select_db($conn, 'cs2019g6');

    if (isset($_POST['submit3'])) {

        $query1="DELETE FROM midwife_reminder WHERE date_time='$date_time'";
        $result1=mysqli_query($conn,$query1);
            if ($result1) {
                header("Location:../mid-dashboard.php?ReminderDeleteSuccess=1");
            } 
            else {
                header("Location:../mid-dashboard.php?ReminderDeleteError=1");
            }
    }

?>