<?php include('../../../php/basic/connection.php'); ?>

<?php

extract($_POST);

$role="sister";
$status="active";
$role_id="2";
$pwd=md5($password);

$query1="SELECT * FROM sister WHERE sister_id='$user_id'";
$result1=mysqli_query($conn,$query1);
$check1=mysqli_num_rows($result1);

if($check1>0) {
    header("Location:/admin/add-sisters?userIdError=1");
}
else {

    $sql1="INSERT INTO user(user_id,role,role_id,password,email,status) 
                            VALUES('$user_id','$role','$role_id','$pwd','$email','$status')";

    $sql2="INSERT INTO sister(sister_id,sister_name,sister_division,sister_moh_division)
                            VALUES('$user_id','$sister_name','$sister_division','$sister_moh_division')";

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

}



mysqli_close($conn);
?>