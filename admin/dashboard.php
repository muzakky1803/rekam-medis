<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand">Dashboard Admin</a>
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Welcome Admin!</h2>
        <p>Jumlah Pasien: <strong>50</strong></p>
        <p>Riwayat Pasien: <strong>120</strong></p>
    </div>
</body>
</html>
