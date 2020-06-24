<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);


$sql1="INSERT INTO home_visit(mother_id,midwife_id,day1,day2,day3,day4,lat,lng) 
                        VALUES('$mNic','$midwife_id','$day1','$day2','$day3','$day4','$latInput','$longInput')";

if(mysqli_query($conn,$sql1)){
    header("Location:/midwife/visiting-record?success=1");
}
else {
    header("Location:/midwife/visiting-record?error=1");
}


mysqli_close($conn);
?>