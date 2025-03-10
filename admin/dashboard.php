<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

// Sertakan header dan sidebar
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/sidebar.php';
?>

<!-- Konten Utama -->
<div class="col-md-9 content">
    <!-- Notifikasi Login -->
    <div id="loginAlert" class="alert alert-success alert-dismissible fade show text-center fw-bold" role="alert">
        🎉 Selamat, Anda berhasil login! <br>
        Welcome, Admin! Have a nice day 😊
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- Statistik -->
    <div class="row">
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <h5>Total Pasien</h5>
                <h3 class="text-primary"><i class="fa fa-user"></i> 50</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <h5>Total Kunjungan</h5>
                <h3 class="text-success"><i class="fa fa-calendar"></i> 120</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center">
                <h5>Riwayat Kunjungan</h5>
                <h3 class="text-danger"><i class="fa fa-history"></i> 80</h3>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="text-center">Grafik Kunjungan</h5>
                <canvas id="kunjunganChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="text-center">Riwayat Kunjungan</h5>
                <canvas id="riwayatChart"></canvas>
            </div>
        </div>
    </div>
</div>

</div> <!-- Penutup row -->
</div> <!-- Penutup container-fluid -->

<!-- Script Chart.js -->
<script>
const kunjunganCtx = document.getElementById('kunjunganChart').getContext('2d');
new Chart(kunjunganCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Jumlah Kunjungan',
            data: [10, 15, 20, 25, 30, 35],
            borderColor: '#3498db',
            backgroundColor: 'rgba(52, 152, 219, 0.2)',
            borderWidth: 2
        }]
    },
    options: { responsive: true }
});

const riwayatCtx = document.getElementById('riwayatChart').getContext('2d');
new Chart(riwayatCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Riwayat Kunjungan',
            data: [5, 10, 15, 20, 25, 30],
            backgroundColor: 'rgba(231, 76, 60, 0.6)',
            borderWidth: 1
        }]
    },
    options: { responsive: true }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
