<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    echo "<script>alert('Anda sudah logout'); window.location='login.php';</script>";
    exit();
}

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Anda perlu login terlebih dahulu'); window.location='login.php';</script>";
    exit();
}

if ($_SESSION['is_verified'] != 1) {
    echo "<script>alert('Akun belum diverifikasi, silakan cek email Anda'); window.location='login.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <form method="GET">
        <button type="submit" name="logout" value="1">
            Logout
        </button>
    </form>
    <h1>halo <?= $_SESSION['email'] ?></h1>
</body>

</html>
