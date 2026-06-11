<?php
require_once __DIR__ . '/classes/User.php';

if (!isset($_GET['token']) || trim($_GET['token']) === '') {
    echo "<script>alert('Token verifikasi tidak ditemukan.'); window.location='login.php';</script>";
    exit();
}

$token = trim($_GET['token']);
$user = new User();

if ($user->verifyEmail($token)) {
    echo "<script>alert('Email berhasil diverifikasi. Silakan login.'); window.location='login.php';</script>";
} else {
    echo "<script>alert('Token verifikasi tidak valid atau sudah digunakan.'); window.location='login.php';</script>";
}
?>
