<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);

$role="sister";
$role_id="2";
$pwd=md5($password);

mysqli_select_db($conn, 'cs2019g6');

$sql1="INSERT INTO user(user_id,role,role_id,password,email) 
                        VALUES('$user_id','$role','$role_id','$pwd','$email')";

$sql2="INSERT INTO sister(sister_id,sister_name,sister_division)
                        VALUES('$user_id','$sister_name','$sister_division')";

if(mysqli_query($conn,$sql1)){

    if(mysqli_query($conn,$sql2)){
        header("Location:../doc-add-sisters.php?success=1");
    }
    else {
        header("Location:../doc-add-sisters.php?error=1");
    }
}
else{
    header("Location:../doc-add-sisters.php?error=2");
}


mysqli_close($conn);
?>