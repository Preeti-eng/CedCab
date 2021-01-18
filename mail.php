<?php
session_start();
 $email = $_POST['email'];
 
require "mail/PHPMailerAutoload.php";

$mail = new PHPMailer;

$mail->isSMTP();                                     
$mail->Host = "smtp.gmail.com";                    
$mail->SMTPAuth = true;                               
$mail->Username = "py6688822@gmail.com";                
$mail->Password = "Preeti@123";                           
$mail->SMTPSecure = "tls";                           
$mail->Port = 587;                                   

$mail->setFrom("py6688822@gmail.com");
$mail->addAddress( $email);    
$mail->addReplyTo("py6688822@gmail.com");

 $mail->isHTML(true);                                  

$mail->Subject = "OTP verification";
$randn = rand(100000,999999);
$mail->Body    = $randn;
$_SESSION["OTP"] = $randn;

if(!$mail->send()) {
    echo "Message could not be sent.";
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
        
?>
