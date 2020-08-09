<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.mailtrap.io';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = '';              
    $mail->Password   = '';                               
    $mail->SMTPSecure = 'tls';          
    $mail->Port       = 587;                                   
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;
    $start_time = microtime(true);
    $mail->setFrom('researchwithphp@gmail.com');
    $mail->addAddress('me@gmail.com', 'Me');

    $mail->Subject = 'CID image tes!';
    $mail->isHTML(TRUE);
    $mail->Body = '<html>Hi there.</html>';
    $mail->AltBody = 'Hi there.';
    // add attachment
    $mail->addAttachment('eleven.jpg');
    $mail->send();
    $end_time = microtime(true);
    $execution_time = ($end_time - $start_time);
    echo 'Message has been sent';
    echo '<br>';
    echo " Execution time of script = ".$execution_time." sec"; 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
