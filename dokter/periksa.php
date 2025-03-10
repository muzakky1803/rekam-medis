<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'dokter') {
    header("Location: ../index.php");
    exit();
}

include '../config.php';

if (!isset($_GET['id'])) {
    header("Location: pemeriksaan.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM pasien WHERE id = $id";
$result = mysqli_query($conn, $query);
$pasien = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diagnosa = $_POST['diagnosa'];
    $tindakan = $_POST['tindakan'];

    // Simpan hasil pemeriksaan ke database
    $updateQuery = "UPDATE pasien SET diagnosa = '$diagnosa', tindakan = '$tindakan', status = 'Selesai' WHERE id = $id";
    mysqli_query($conn, $updateQuery);

    header("Location: pemeriksaan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemeriksaan Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Pemeriksaan Pasien</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" value="<?php echo $pasien['nama']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Diagnosa</label>
                <textarea class="form-control" name="diagnosa" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Tindakan</label>
                <textarea class="form-control" name="tindakan" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="pemeriksaan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
