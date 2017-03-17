<?php
require 'PHPMailer/PHPMailerAutoload.php';

//$mail = new PHPMailer;
//
//$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp.rabby.ml';  // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = 'shahariar@rabby.ml';                 // SMTP username
//$mail->Password = 'shaheed01816';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
//$mail->Post = 465;
//$mail->From = 'shahariar@rabby.ml';
//$mail->FromName = 'Mailer';
////$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
//$mail->addAddress('shahariar@rabby.ml');               // Name is optional
////$mail->addReplyTo('info@example.com', 'Information');
////$mail->addCC('cc@example.com');
////$mail->addBCC('bcc@example.com');
//
//$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
////$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
////$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//$mail->isHTML(true);                                  // Set email format to HTML
//
//$mail->Subject = 'Here is the subject';
//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//if(!$mail->send()) {
//    echo 'Message could not be sent.';
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
//} else {
//    echo 'Message has been sent';
//}




$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only

$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 25; // or 587
$mail->IsHTML(true);
$mail->Username = "admin@rabby.ml";
$mail->Password = "shaheed01816";
$mail->SetFrom("admin@rabby.ml");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("admin@rabby.ml");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
?>