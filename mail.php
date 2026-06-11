<?php

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$username = $_ENV['USERNAME'];
$password = $_ENV['PASSWORD'];

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($username, 'PHPMailer Test');
    $mail->addAddress('yogatest2006@gmail.com', 'Recipient Name');

    $mail->isHTML(true);
    $mail->Subject = 'PHPMailer Gmail SMTP Test';
    $mail->Body = '<h1>Hello from PHPMailer</h1><p>This email was sent using Gmail SMTP.</p>';
    $mail->AltBody = 'Hello from PHPMailer. This email was sent using Gmail SMTP.';

    $mail->send();
    echo 'Email sent successfully.';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
