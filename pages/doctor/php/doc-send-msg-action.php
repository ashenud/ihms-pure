<?php
include('../../../php/basic/connection.php');

extract($_POST);

mysqli_select_db($conn,'cs2019g6');

    if(isset($_POST['submit-to-mid'])){

        $new_status="unread";
        $query2="INSERT INTO midwife_message(midwife_id,sender,midwife_message,date,time,status) VALUES('$midwife_id','$sender','$midwife_msg',CURRENT_DATE(),CURRENT_TIME(),'$new_status')";

            if(mysqli_query($conn,$query2)){

            echo "it works";
            header("Location:../doc-send-messages.php?send2MidSuccess=1");
        }
        
    }


    if(isset($_POST['submit-to-sis'])){

        $new_status="unread";
        $query2="INSERT INTO sister_message(sister_id,sender,sister_message,date,time,status) VALUES('$sister_id','$sender','$sister_msg',CURRENT_DATE(),CURRENT_TIME(),'$new_status')";

            if(mysqli_query($conn,$query2)){

            echo "it works";
            header("Location:../doc-send-messages.php?send2SisSuccess=1");
        }
        
    }
?>