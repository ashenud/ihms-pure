<?php

                              if(!empty($_POST['submit2'])){
                                
                                send();
                              }
                              else{
                                header("Location:mid-inbox.php");
                              }

                                function send(){
                                      extract($_POST);
                                      session_start();
                                
                                      include "selectdb.php";

                                      if($subject==""){
                                        
                                      }
                                      else{
                                        $midId=$_SESSION['midwife_id'];
                                        $sql5="SELECT mother_nic FROM baby_register WHERE midwife_id='".$midId."' AND status='active'";
                                        $ansbefore=mysqli_query($conn,$sql5);
                                        
                                                                              
                                        
                                        
                                        require '/php/PHPMailer/PHPMailerAutoload.php';
                                        //require 'credential.php';

                                        $mail = new PHPMailer;
                                        
                                        $mail->SMTPDebug = 0;                               // Enable verbose debug output
                                        
                                        $mail->isSMTP();                                      // Set mailer to use SMTP
                                        $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                        $mail->Username = 'cs2019g6@gmail.com';                 // SMTP username
                                        $mail->Password = 'cs2019g6dwp';                           // SMTP password
                                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = 587;                                    // TCP port to connect to


                                     while($getId= mysqli_fetch_assoc($ansbefore)){  

                                        $setId=$getId["mother_nic"];
                                        
                                        $sql4="SELECT email FROM user WHERE user_id='".$setId."'";
                                        $ans=mysqli_query($conn,$sql4);
                                        $result=mysqli_fetch_assoc($ans);
                                          
                                            $to=$result['email'];
                                            
                                        
                                        $mail->setFrom('cs2019g6@gmail.com', 'MOH office');
                                        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
                                        $mail->addAddress($to);               // Name is optional
                                        //$mail->addReplyTo('info@example.com', 'Information');
                                        //$mail->addCC('cc@example.com');
                                        //$mail->addBCC('bcc@example.com');
                                        
                                        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        
                                        $mail->Subject = $subject;
                                        $mail->Body    = "<b><i>This Message from MOH office</i></b>"."<br>".$message;
                                       // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                       $mail->send();

                                       //echo "<meta http-equiv='Refresh' content='0; url=midHome.php'>";
                                       echo "<script>window.location.assign('/midwife/dashboard?success=1')</script>";
                                      }
                                                                           
                                       
                                      }
                                }
                              
                              
        ?>