<?php
include "selectdb.php";
extract($_POST);

    if(isset($_POST['toDoctorSubmit'])){

        $newStatus="unread";
        $sql1="INSERT INTO doctor_message(doctor_id,sender,doctor_message,date,time,status) VALUES('$dId','$sender','$doctorSMS','$date','$time','$newStatus')";

            if(mysqli_query($conn,$sql1)){

            echo "it works";
            header("Location:../mid-contact-staff.php");
        }
        else {
            echo "Error";
        }
        
    }


    if(isset($_POST['toSisterSubmit'])){

        $newStatus="unread";
        $sql1="INSERT INTO sister_message(sister_id,sender,sister_message,date,time,status) VALUES('$sId','$sender','$sisterSMS','$date','$time','$newStatus')";

            if(mysqli_query($conn,$sql1)){

            echo "it works";
            header("Location:../mid-contact-staff.php");
        }
        
    }


    if(isset($_POST['toMidwifeSubmit'])){

        $newStatus="unread";
        $sql1="INSERT INTO midwife_message(midwife_id,sender,midwife_message,date,time,status) VALUES('$mId','$sender','$midwifeSMS','$date','$time','$newStatus')";

            if(mysqli_query($conn,$sql1)){

            echo "it works";
            header("Location:../mid-contact-staff.php");
        }
        
    }
?>