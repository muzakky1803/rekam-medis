<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } elseif ($_SESSION['role'] == 'dokter') {
        header("Location: dokter/dashboard.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Poli Gigi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .login-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
            width: 700px;
            overflow: hidden;
        }
        .login-header {
            background: #007bff;
            color: white;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            padding: 15px;
        }
        .login-body {
            padding: 30px;
        }
        .login-card img {
            width: 100%;
            border-radius: 5px;
        }
        .login-form {
            padding-left: 30px;
            text-align: left;
        }
        .btn-primary {
            background: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .password-container input {
            flex: 1;
            padding-right: 40px;
        }
        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            cursor: pointer;
            color:rgb(106, 106, 106);
            font-size: 18px;
        }
        .footer-note {
            font-size: 12px;
            color: gray;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Tabel Login -->
<div class="login-card">
    <!-- Header -->
    <div class="login-header">
        Rekam Medis Poli Gigi
    </div>

    <!-- Body -->
    <div class="login-body d-flex">
        <!-- Bagian kiri: Gambar -->
        <div class="col-md-6">
            <img src="poligigi.png" alt="Dental Clinic">
        </div>

        <!-- Bagian kanan: Form Login -->
        <div class="col-md-6 login-form">
            <h3 class="mb-3 text-center">Login</h3>
            <form action="auth.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        <i class="fa-solid fa-eye-slash toggle-password" id="togglePassword" onclick="togglePassword()"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
        </div>
    </div>
</div>

<!-- Catatan Desain (DI LUAR FORM) -->
<p class="footer-note">Designed by Information Technology students. @pnmofficial</p>

<script>
function togglePassword() {
    var passwordField = document.getElementById("password");
    var toggleIcon = document.getElementById("togglePassword");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    }
}
</script>

</body>
</html>