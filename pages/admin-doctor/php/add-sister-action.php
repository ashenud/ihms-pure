<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);

$role="sister";
$role_id="2";
$pwd=md5($password);

$sql1="INSERT INTO user(user_id,role,role_id,password,email) 
                        VALUES('$user_id','$role','$role_id','$pwd','$email')";

$sql2="INSERT INTO sister(sister_id,sister_name,sister_division)
                        VALUES('$user_id','$sister_name','$sister_division')";

if(mysqli_query($conn,$sql1)){

    if(mysqli_query($conn,$sql2)){
        header("Location:/admin/add-sisters?success=1");
    }
    else {
        header("Location:/admin/add-sisters?error=1");
    }
}
else{
    header("Location:/admin/add-sisters?error=2");
}


mysqli_close($conn);
?>