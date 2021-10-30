<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);

    if (isset($_POST['submit3'])) {

        $query1="DELETE FROM midwife_reminder WHERE date_time='$date_time'";
        $result1=mysqli_query($conn,$query1);
            if ($result1) {
                header("Location:/midwife/dashboard?ReminderDeleteSuccess=1");
            } 
            else {
                header("Location:/midwife/dashboard?ReminderDeleteError=1");
            }
    }

?>