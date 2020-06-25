<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);

$role="sister";
$role_id="2";
$pwd=md5($password);

$sql2="SELECT * FROM sister";

    if(mysqli_query($conn,$sql2)){
        header("Location:/admin/remove-sisters?success=1");
   }
    else {
        header("Location:/admin/remove-sisters?error=1");
    }


mysqli_close($conn);
?>