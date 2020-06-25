<?php include('../../../php/basic/connection.php'); ?>

<?php if(!isset($_SESSION['sister_id'])) {	
	header('location:/?noPermission=1');
	}
?>

<?php

    session_start();
    $user=$_SESSION['sister_id'];

    if($user) {

        if(isset($_POST['submit'])) {
           
            $old_pwd=mysqli_real_escape_string($conn, $_POST['old_password']);
            $hsd_old_pwd=md5($old_pwd);

            $new_pwd=mysqli_real_escape_string($conn, $_POST['new_password']);
            $hsd_new_pwd=md5($new_pwd);

            $confirm_pwd=mysqli_real_escape_string($conn, $_POST['confirm_password']);
            $hsd_confirm_pwd=md5($confirm_pwd);
        
            $query1="SELECT password FROM user WHERE user_id='{$user}'";
            $result1=mysqli_query($conn, $query1);

            $array=mysqli_fetch_assoc($result1);

            $old_pwd_db=$array['password'];

            //check passwords
            if($hsd_old_pwd==$old_pwd_db) {

                //check tow new passwords
                if($hsd_new_pwd==$hsd_confirm_pwd) {

                    //success
                    //change password in database
                    $query2="UPDATE user SET password='{$hsd_confirm_pwd}' WHERE user_id='{$user}'";
                    $result2=mysqli_query($conn, $query2);
                    
                    //updating last login
                    $query3="UPDATE user SET update_date=NOW() WHERE user_id='{$user}' LIMIT 1";
                    $result3=mysqli_query($conn,$query3);

                    header('location:/?passChanged=1');
                    session_destroy();

                }
                else {
                    header('location:/sister/password-change?errorNewPass=1');
                }
            }
            else {
                header('location:/sister/password-change?errorOldPass=1');
            }

        }

    }
?>


<?php mysqli_close($conn); ?>