<?php

   include ('../../../php/basic/connection.php' ); 

        $role='midwife';
        $role_id=3;
        $Midwife_id=$_POST['id'];
        $Midwife_name=$_POST['mname'];
        $Midwife_area=$_POST['area'];
        $Midwife_email=$_POST['email'];
        $Midwife_password=md5($_POST['password']);
    
    $sql1="INSERT INTO user(user_id, password, role, role_id,email) values('{$Midwife_id}','{$Midwife_password}','{$role}','{$role_id}','{$Midwife_email}')";

    $sql2="INSERT INTO midwife(midwife_id,midwife_name,midwife_area) VALUES ('{$Midwife_id}','{$Midwife_name}','{$Midwife_area}')";
 
    if(mysqli_query($conn,$sql1)) {
        
        if(mysqli_query($conn,$sql2)) {
            header("Location:/sister/add-midwife?success=1");
        }
        else {
            header("Location:/sister/add-midwife?error=2");
        }
        
    }
    else {
        header("Location:/sister/add-midwife?error=1");     
    }

?>