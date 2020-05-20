<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);

$sql1="INSERT INTO growth(baby_id,weight,height,baby_age_in_months) 
                        VALUES('$user_id','$weight','$height','$month')";

if(mysqli_query($conn,$sql1)){
    header("Location:../mid-charts.php?success=1");
}
else {
    header("Location:../mid-chart.php?error=1");
}


mysqli_close($conn);
?>