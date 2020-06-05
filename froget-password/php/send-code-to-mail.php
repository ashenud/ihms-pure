<?php

include('../../php/basic/connection.php');

require '../../php/PHPMailer/PHPMailerAutoload.php';


if(isset($_POST['submit'])) {
    
    $reset_email=mysqli_real_escape_string($conn, $_POST['email']);
    $user_id=mysqli_real_escape_string($conn, $_POST['user_id']);
    
    $query1="SELECT * FROM user WHERE user_id='{$user_id}' AND email='{$reset_email}' LIMIT 1";

    $result1=mysqli_query($conn, $query1);

    if(mysqli_num_rows($result1) == 1) {
        
        $reset_code=md5(uniqid(true));
        
        $query2="INSERT INTO reset_password(reset_code,reset_email) VALUES ('{$reset_code}','{$reset_email}')";
        $result2=mysqli_query($conn, $query2);
        if(!$result2) {
            exit("error");
        }
        
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP(); 
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ihmsuor@gmail.com'; 
            $mail->Password   = 'ihmsuordwp';
            $mail->SMTPKeepAlive = true; 
            $mail->Mailer = 'smtp';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->CharSet = 'utf-8';  
            $mail->SMTPDebug  = 0; 

            //Recipients
            $mail->setFrom('ihmsuor@gmail.com', 'ihms');
            $mail->addAddress($reset_email);
            $mail->addReplyTo('no-reply@ihms.com');

            // Content
            $url="http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/../new-password.php?code=$reset_code";
            $mail->isHTML(true);
            $mail->Subject = 'Your Password Reset Link';
            $mail->Body    = "<h3>Your requested a password reset link</h3> </br>
                              click <a href='$url'>this link</a> to change password";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            header('location:/?mailSuccess=1');
        } 

        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        exit();
    }
    
    else {
        header('location:../froget-password.php?error=1');
    }
        
}

?>
