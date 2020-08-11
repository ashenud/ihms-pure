<?php

   include ('../../../php/basic/connection.php' ); 

   extract($_POST);

   $role="midwife";
   $role_id="3";
   $status="active";
   $pwd=md5($password);
   
   $query1="SELECT * FROM midwife WHERE midwife_id='$midwife_id'";
   $result1=mysqli_query($conn,$query1);
   $check1=mysqli_num_rows($result1);
   
   if($check1>0) {
       header("Location:/sister/add-midwife?userIdError=1");
   }
   else {
   
       $sql1="INSERT INTO user(user_id,role,role_id,password,email,status)
                               VALUES('$midwife_id','$role','$role_id','$pwd','$email','$status')";
   
       $sql2="INSERT INTO midwife(midwife_id,midwife_name,midwife_area,midwife_moh_division)
                               VALUES('$midwife_id','$midwife_name','$midwife_area','$midwife_moh_division')";
   
       if(mysqli_query($conn,$sql1)){
   
           if(mysqli_query($conn,$sql2)){
               header("Location:/sister/add-midwife?success=1");
           }
           else {
               header("Location:/sister/add-midwife?error=1");
           }
       }
       else{
           header("Location:/sister/add-midwife?error=2");
       }
   
   }

?>