<?php
session_start();
include 'koneksi.php';  // Sertakan koneksi database

// Cek apakah sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Query untuk mengambil data konsumen
$sql = "SELECT * FROM konsumen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Sertakan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Sertakan Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #1e1e1e, #3a3a3a);
            color: #fff;
            font-family: 'PT Sans', sans-serif;
        }
        .card {
            background: #262626;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 69, 0, 0.5);
        }
        .card-header {
            background: #ff4500;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }
        .btn-otomotif {
            background: #ff4500;
            color: #fff;
            border: none;
        }
        .btn-otomotif:hover {
            background: #e03c00;
        }
        table {
            width: 100%;
            margin-top: 20px;
            background: #2c2c2c;
            border-radius: 10px;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #ff4500;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #3a3a3a;
        }
        /* Mengubah warna teks dalam data menjadi putih */
        td, tr {
            color: #fff !important;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        Dashboard - Data Konsumen
                    </div>
                    <div class="card-body">
                        <!-- Tombol Logout -->
                        <a href="logout.php" class="btn btn-danger btn-otomotif mb-3">Logout</a>
                        
                        <!-- Tombol navigasi ke halaman input konsumen -->
                        <a href="input_konsumen.php" class="btn btn-primary btn-otomotif mb-3">Tambah Data Konsumen</a>

                        <!-- Tabel Data Konsumen -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="color: #ff4500;">No Polisi</th>
                                    <th style="color: #ff4500;">Jenis Kendaraan</th>
                                    <th style="color: #ff4500;">Nama Konsumen</th>
                                    <th style="color: #ff4500;">Alamat</th>
                                    <th style="color: #ff4500;">Tanggal Masuk</th>
                                    <th style="color: #ff4500;">Jenis Service</th>
                                    <th style="color: #ff4500;">Estimasi Biaya</th>
                                    <th style="color: #ff4500;">Montir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['no_polisi']); ?></td>
                                    <td><?php echo htmlspecialchars($row['jenis_kendaraan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['nama_konsumen']); ?></td>
                                    <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                                    <td><?php echo htmlspecialchars($row['tanggal_masuk']); ?></td>
                                    <td><?php echo htmlspecialchars($row['jenis_service']); ?></td>
                                    <td><?php echo htmlspecialchars($row['estimasi_biaya']); ?></td>
                                    <td><?php echo htmlspecialchars($row['montir']); ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
