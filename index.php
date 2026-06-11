<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    echo "<script>alert('Anda sudah logout'); window.location='login.php';</script>";
    exit();
}

if (!isset($_SESSION['login']) || !isset($_SESSION['username'])) {
    echo "<script>alert('Anda perlu login terlebih dahulu'); window.location='login.php';</script>";
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
    <form method="GET" style="display:inline;"><button type="submit" name="logout" value="1">
            <button>
                Logout
            </button>
    </form>
    <h1>halo <?= $_SESSION['username'] ?></h1>
</body>

</html>
