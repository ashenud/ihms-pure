<?php session_start(); ?>

<?php

include('../../php/basic/connection.php');



if(!isset($_SESSION['code'])) {
    exit("Link has expired");
}

$code=$_SESSION['code'];

mysqli_select_db($conn, 'cs2019g6');
$query1="SELECT reset_email FROM reset_password WHERE reset_code='$code'";
$result1=mysqli_query($conn, $query1);

if(mysqli_num_rows($result1) == 0) {
    exit("Link has expired");
}

if(isset($_POST['submit'])) {
           
    $new_pwd=mysqli_real_escape_string($conn, $_POST['new_password']);
    $hsd_new_pwd=md5($new_pwd);

    $confirm_pwd=mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $hsd_confirm_pwd=md5($confirm_pwd);
    
    $row=mysqli_fetch_array($result1);
    $email=$row['reset_email'];
    
    //check tow new passwords
    if($hsd_new_pwd==$hsd_confirm_pwd) {

        //success
        //change password in database
        $query2="UPDATE user SET password='{$hsd_confirm_pwd}' WHERE email='{$email}'";
        $result2=mysqli_query($conn, $query2);
        
        //updating last login
        $query3="UPDATE user SET update_date=NOW() WHERE email='{$email}' LIMIT 1";
        $result3=mysqli_query($conn,$query3);

        header('location:../../index.php?passChanged=1');
        session_destroy();
        
        if($result2) {
            $query4="DELETE FROM reset_password WHERE reset_email='{$email}'";
            $result4=mysqli_query($conn, $query4);
        }
        
    }
}

?>



