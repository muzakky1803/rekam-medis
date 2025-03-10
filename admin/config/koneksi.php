<?php
$host = "localhost";
$user = "root"; // Sesuaikan jika berbeda
$pass = ""; // Jika ada password MySQL, isi di sini
$db   = "rekam_medis";

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
