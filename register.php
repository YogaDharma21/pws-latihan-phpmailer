<?php
require_once "./classes/User.php";
$user = new User();
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $register = $user->register($email, $password);
    if (isset($register)) {
        echo "<script>alert('Register berhasil'); window.location='login.php';</script>";
        exit();
    } else {
        echo "Register Gagal";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="" method="POST">
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <button type="submit">Register</button>
    </form>

    sudah memiliki akun? <a href="login.php">Login</a>
</body>

</html>
