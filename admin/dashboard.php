<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

// Data Dummy untuk Grafik
$total_pasien = 50;
$total_kunjungan = 120;
$riwayat_kunjungan = 80;
$data_kunjungan = [10, 15, 20, 25, 30, 35]; // Contoh data per bulan
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
        }
        .content {
            margin-left: 270px;
            padding: 20px;
            width: 100%;
        }
        .card {
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Main Content -->
<div class="content">
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Dashboard -->
    <div class="container mt-4">
        <div id="welcomeNotice" class="alert alert-success text-center alert-dismissible fade show" role="alert">
            🎉 Selamat, Anda berhasil login! <br>
            <strong>Welcome, Admin!</strong> Have a nice day 😊
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeNotice()"></button>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <h5>Total Pasien</h5>
                    <h3 class="text-primary"><i class="fa fa-user"></i> <?php echo $total_pasien; ?></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <h5>Total Kunjungan</h5>
                    <h3 class="text-success"><i class="fa fa-calendar"></i> <?php echo $total_kunjungan; ?></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <h5>Riwayat Kunjungan</h5>
                    <h3 class="text-danger"><i class="fa fa-history"></i> <?php echo $riwayat_kunjungan; ?></h3>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5 class="text-center">Grafik Kunjungan</h5>
                    <canvas id="grafikKunjungan"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h5 class="text-center">Riwayat Kunjungan</h5>
                    <canvas id="riwayatKunjungan"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</div>

<script>
    var ctx1 = document.getElementById('grafikKunjungan').getContext('2d');
    var ctx2 = document.getElementById('riwayatKunjungan').getContext('2d');

    var grafikKunjungan = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Jumlah Kunjungan',
                data: <?php echo json_encode($data_kunjungan); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var riwayatKunjungan = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Riwayat Kunjungan',
                data: <?php echo json_encode($data_kunjungan); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    function closeNotice() {
        document.getElementById("welcomeNotice").style.display = "none";
    }
</script>

</body>
</html>
