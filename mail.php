<?php

$ename = $_POST["name"];
$eemail= $_POST["email"];
$etext= $_POST["message"];
$esubject= $_POST["subject"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\Users\DELL\Downloads\PHPMailer\src\Exception.php';
require 'C:\Users\DELL\Downloads\PHPMailer\src\PHPMailer.php';
require 'C:\Users\DELL\Downloads\PHPMailer\src\SMTP.php';

try {
    $mail = new PHPMailer();
    // $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "abc@gmail.com";
    $mail->Password = "abcabcabcxyzxyzxyz";
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    $mail->setFrom($eemail, $ename);
    $mail->addAddress('xyz@gmail.com', 'Kartik Sharma');
    
    $mail->isHTML(true);
    $mail->Subject = $esubject;
    $mail->Body = $etext;
    $mail->AltBody = 'Alt text';
    
    if($mail->send()){
        echo 'Message has been sent';
    } else {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ".$e->getMessage();
}
?>
