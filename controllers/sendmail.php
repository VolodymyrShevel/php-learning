<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;

$mail->Username = "test.sender.spheremall@gmail.com";
$mail->Password = "fdxpevgwnkdcsgpi";

$mail->setFrom('test.sender.spheremall@gmail.com', 'Test Sender');
$mail->addReplyTo('test.sender.spheremall@gmail.com', '');

$mail->addAddress($_POST['email'], $_POST['name'].' '.$_POST['surname']);
$mail->Subject = 'Test task message';

$mailtext = 'This message has been generated automatically. Do not answer it!!! '."\r\n";
$mailtext .= 'You leave comment: '. $_POST['message'];
$mail->Body = $mailtext;

$mail->addAttachment('data/images/'.$_FILES['fileup']['name']);

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}