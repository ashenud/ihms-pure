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
        
        $mail = new PHPMailer;

        try {
            //Server settings
            

            $mail->SMTPDebug = 0;                       // Enable verbose debug output
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'cs2019g6@gmail.com';     // SMTP username
            $mail->Password = 'cs2019g6dwp';            // SMTP password
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                          // TCP port to connect to

            //Recipients
            $mail->setFrom('privacy@ihms.com', 'ihms');
            $mail->addAddress($reset_email);
            $mail->addReplyTo('no-reply@ihms.com');

            // Content
            $url="http://".$_SERVER["HTTP_HOST"]."/change-password?code=$reset_code";
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
        header('location:/confirm-details?error=1');
    }
        
}

?>
