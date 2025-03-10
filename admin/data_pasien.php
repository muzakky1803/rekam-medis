<?php
session_start();
include '../config/koneksi.php';
include 'includes/header.php';
include 'includes/sidebar.php';

// Tambah Data Pasien
if (isset($_POST['tambah'])) {
    $kode_pasien = mysqli_real_escape_string($conn, $_POST['kode_pasien']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tanggal_berkunjung = $_POST['tanggal_berkunjung'];
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_kk = mysqli_real_escape_string($conn, $_POST['no_kk']);
    $status = $_POST['status'];

    $query = "INSERT INTO pasien (kode_pasien, nama, tempat_lahir, tanggal_lahir, tanggal_berkunjung, alamat, no_hp, jenis_kelamin, no_kk, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $kode_pasien, $nama, $tempat_lahir, $tanggal_lahir, $tanggal_berkunjung, $alamat, $no_hp, $jenis_kelamin, $no_kk, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data pasien berhasil ditambahkan!'); window.location='data_pasien.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data pasien!');</script>";
    }
}
?>

<!-- Wrapper untuk menyusun layout -->
<div class="wrapper">
    <div class="main-content">
        <div class="container mt-4">
            <h2 class="mb-4">Tambah Data Pasien</h2>

            <form method="POST" action="data_pasien.php" class="border p-4 bg-light shadow-sm rounded">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Kode Pasien</label>
                            <input type="text" name="kode_pasien" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pasien</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Berkunjung</label>
                            <input type="date" name="tanggal_berkunjung" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No KK</label>
                            <input type="text" name="no_kk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="Pekerja">Pekerja</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Pengangguran">Pengangguran</option>
                                <option value="Pelajar">Pelajar</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Pasien</button>
                <a href="data_pasien.php" class="btn btn-secondary">Batal</a>
            </form>

            <h2 class="text-center mt-4">Daftar Pasien</h2>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Pasien</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM pasien");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['kode_pasien']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['alamat']}</td>
                            <td>{$row['no_hp']}</td>
                            <td>
                                <a href='edit_pasien.php?kode_pasien={$row['kode_pasien']}' class='btn btn-warning'>Edit</a>
                                <a href='hapus_pasien.php?kode_pasien={$row['kode_pasien']}' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
