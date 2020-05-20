<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);

$role="sister";
$role_id="2";
$pwd=md5($password);

$sql2="SELECT * FROM sister";

    if(mysqli_query($conn,$sql2)){
        header("Location:../doc-remove-sisters.php?success=1");
   }
    else {
        header("Location:../doc-remove-sisters.php?error=1");
    }


mysqli_close($conn);
?>