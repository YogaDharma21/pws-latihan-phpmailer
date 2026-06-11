<?php
require_once "./classes/User.php";
$user = new User();
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verifyUser = $user->login($email, $password);
    if (isset($verifyUser)) {
        $_SESSION['email'] = $verifyUser['email'];
        $_SESSION['is_verified'] = $verifyUser['is_verified'];

        if ($_SESSION['is_verified'] != 1) {
            echo "<script>alert('Akun belum diverifikasi, silakan cek email Anda'); window.location='login.php';</script>";
            exit();
        }
        header("Location: index.php");
        exit();
    } else {
        echo "Login Gagal";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="POST">
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <button type="submit">Login</button>
    </form>
    Belum memiliki akun? <a href="register.php">Register</a>
</body>

</html>
