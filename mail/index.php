<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$x=$_SESSION["msg"];
$em=$_SESSION["email"];
$mail = new PHPMailer(true);   
$mail->isSMTP();  
$mail->SMTPDebug = 4;  
    $mail->Host = 'smtp.gmail.com';                                    
    $mail->SMTPAuth = true;                             
    $mail->Username = 'mistrys013@gmail.com';                 
    $mail->Password = '9879339580';    
    $mail->SMTPSecure = 'ssl';      
    $mail->SMTPAutoTLS = false;                                         
    $mail->Port = 465;   
    $mail->setFrom('mistrys013@gmail.com', 'Deep Mistry');  
    $mail->Subject = "Varification";
    $mail->Body    = '<a href="localhost/blog/auth.php?email='.$em.'&hash='.$x.'">'.$x.'</a>';
    $mail->AltBody = $_SESSION["msg"];
    $mail->addAddress($_SESSION["email"]); 
try{ $mail->send();
    echo "<script>alert('validate email from ur email account $em');window.location.href='../login.html'</script>";
   }
catch (Exception $e) {
echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>