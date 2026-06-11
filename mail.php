<?php

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

class Mail
{
    public function sendEmail($email, $token)
    {
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

            $mail->setFrom($username, 'Pengirim');
            $mail->addAddress($email, 'Penerima');

            $mail->isHTML(true);
            $mail->Subject = 'Verifikasi Email Anda';
            $mail->Body = '<h1>Untuk memverifikasi email Anda, klik tautan di bawah ini:</h1> <a href="http://localhost:8000/verify.php?token=' . $token . '">Verifikasi Email</a>';
            $mail->AltBody = 'Hello from PHPMailer. This email was sent using Gmail SMTP.';

            $mail->send();
            echo 'Email sent successfully.';
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
