<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'dokter') {
    header("Location: ../index.php");
    exit();
}

include '../config.php';

// Ambil daftar pasien yang perlu diperiksa
$query = "SELECT * FROM pasien WHERE status = 'Lanjut Pemeriksaan'";
$result = mysqli_query($conn, $query);
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
        <h2>Daftar Pasien Untuk Pemeriksaan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO ANTRIAN</th>
                    <th>NO. RM</th>
                    <th>NAMA</th>
                    <th>STATUS</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['no_antrian']; ?></td>
                        <td><?php echo $row['no_rm']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><a href="periksa.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Periksa</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
