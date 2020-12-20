<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  	  					// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = ''; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = ''; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';// Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('', 'ПЕРСОНА BIA'); // от кого будет уходить письмо?
$mail->addAddress('');     // Кому будет уходить письмо
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

// E4tueI%oLuE2

$message = '';

$message .='<p><b>Имя клиента</b>: '.$_POST['user_name'].'</p>';
$message .='<p><b>E-mail клиента</b>: '.$_POST['user_email'].'</p>';
$message .='<p><b>Номер телефона клиента</b>: <a href="'.$_POST['user_tel'].'">'.$_POST['user_tel'].'</a></p>';

$mail->Subject = $_POST['subject'];
$mail->Body    = $message;
$mail->AltBody = '';


if(!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
?>