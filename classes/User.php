<?php
require_once __DIR__ . '/../config/Database.php';

require_once __DIR__ . '/../mail.php';
class User extends Database
{
    public function login($email, $password)
    {

    }
    public function register($email, $password)
    {
        $mail = new Mail();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $verification_token = bin2hex(random_bytes(16));
        $is_verified = 0;
        $qry = "INSERT INTO `users` (email, password, verification_token,is_verified) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param("sssi", $email, $hashedPassword, $verification_token, $is_verified);
        $mail->sendEmail($email, $verification_token);
        return $stmt->execute();
    }

    public function verifyEmail($email)
    {

    }
}
