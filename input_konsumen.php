<?php
session_start();
include 'koneksi.php';  // Sertakan koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $no_polisi = $_POST['no_polisi'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $alamat = $_POST['alamat'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jenis_service = $_POST['jenis_service'];
    $estimasi_biaya = $_POST['estimasi_biaya'];
    $montir = $_POST['montir'];

    // Query untuk menyimpan data ke tabel konsumen
    $sql = "INSERT INTO konsumen (no_polisi, jenis_kendaraan, nama_konsumen, alamat, tanggal_masuk, jenis_service, estimasi_biaya, montir)
            VALUES ('$no_polisi', '$jenis_kendaraan', '$nama_konsumen', '$alamat', '$tanggal_masuk', '$jenis_service', '$estimasi_biaya', '$montir')";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        $success = "Data konsumen berhasil disimpan!";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Konsumen</title>
    <!-- Sertakan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Sertakan Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #1e1e1e, #3a3a3a); /* Warna latar belakang gelap */
            color: #fff;
            font-family: 'PT Sans', sans-serif;
        }
        .card {
            background: #262626; /* Card dengan warna abu gelap */
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 69, 0, 0.5); /* Efek cahaya oranye */
        }
        .card-header {
            background: #ff4500; /* Warna aksen oranye */
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }
        .btn-otomotif {
            background: #ff4500; /* Tombol dengan warna aksen */
            color: #fff;
            border: none;
        }
        .btn-otomotif:hover {
            background: #e03c00;
        }
        .form-control {
            background: #1e1e1e;
            color: #ff4500;
            border: 1px solid #ff4500;
        }
        .form-control:focus {
            box-shadow: 0 0 10px #ff4500;
            border-color: #ff4500;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Input Data Konsumen
                    </div>
                    <div class="card-body">
                        <!-- Tampilkan pesan sukses atau error -->
                        <?php if (isset($success)): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $success; ?>
                            </div>
                        <?php elseif (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label for="no_polisi" class="form-label">No Polisi</label>
                                <input type="text" class="form-control" id="no_polisi" name="no_polisi" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                                <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_konsumen" class="form-label">Nama Konsumen</label>
                                <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_service" class="form-label">Jenis Service</label>
                                <input type="text" class="form-control" id="jenis_service" name="jenis_service" required>
                            </div>
                            <div class="mb-3">
                                <label for="estimasi_biaya" class="form-label">Estimasi Biaya</label>
                                <input type="number" class="form-control" id="estimasi_biaya" name="estimasi_biaya" required>
                            </div>
                            <div class="mb-3">
                                <label for="montir" class="form-label">Montir</label>
                                <input type="text" class="form-control" id="montir" name="montir" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-otomotif">Simpan</button>
                                <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                                <a href="logout.php" class="btn btn-danger">Logout</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
