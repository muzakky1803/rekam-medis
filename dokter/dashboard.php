    <?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'dokter') {
        header("Location: ../index.php");
        exit();
    }

    // Koneksi ke database
    include '../config.php';

    // Ambil data pasien dari database
    $query = "SELECT * FROM pasien";
    $result = mysqli_query($conn, $query);
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Dokter</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <style>
            body {
                display: flex;
                height: 100vh;
                overflow: hidden;
            }
            .sidebar {
                width: 250px;
                background: #343a40;
                color: white;
                height: 100vh;
                padding-top: 20px;
            }
            .sidebar a {
                display: block;
                color: white;
                padding: 10px 20px;
                text-decoration: none;
            }
            .sidebar a:hover {
                background: #495057;
            }
            .content {
                flex-grow: 1;
                padding: 20px;
                background: #f8f9fa;
            }
        </style>
    </head>
    <body>
        <!-- Sidebar Menu -->
        <div class="sidebar">
            <h4 class="text-center">ZDC</h4>
            <a href="dashboard_dokter.php">🏠 Dashboard</a>
            <a href="data_pasien.php">🧑‍⚕️ Data Pasien</a>
            <a href="data.php">📁 Data</a>
            <a href="pemeriksaan.php">📝 Pemeriksaan</a>
        </div>

        <!-- Konten Dashboard -->
        <div class="content">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <span class="navbar-brand">Dashboard Dokter</span>
                    <a href="/rekam-medis/logout.php" class="btn btn-danger">Logout</a>
                </div>
            </nav>

            <div class="mt-4">
                <h3>Welcome Dokter!</h3>
                <p>Anda dapat melihat data pasien di sini.</p>
                
                <!-- Statistik -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header">Kunjungan Pasien</div>
                            <div class="card-body">
                                <h4 class="card-title">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Total Pasien</div>
                            <div class="card-body">
                                <h4 class="card-title">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Pendapatan</div>
                            <div class="card-body">
                                <h4 class="card-title">0</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Total Pendapatan</div>
                            <div class="card-body">
                                <h4 class="card-title">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Daftar Antrian Pasien -->
                <div class="card">
                    <div class="card-header bg-info text-white">DAFTAR ANTRIAN PASIEN HARI INI</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>NO ANTRIAN</th>
                                    <th>NO. RM</th>
                                    <th>TGL. BOOKING</th>
                                    <th>NAMA</th>
                                    <th>P/L</th>
                                    <th>STATUS</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['no_antrian']; ?></td>
                                        <td><?php echo $row['no_rm']; ?></td>
                                        <td><?php echo $row['tgl_booking']; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['jenis_kelamin']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><a href="periksa.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Periksa</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
