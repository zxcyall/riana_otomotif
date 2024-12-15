<?php
session_start();  // Mulai sesi untuk menyimpan data login
include 'koneksi.php';  // Sertakan file koneksi.php untuk koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengecek username dan password
    $sql = "SELECT * FROM karyawan WHERE username='$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Jika username ditemukan, cek password
        $row = $result->fetch_assoc();
        
        // Bandingkan password (gunakan hashing password jika diperlukan untuk keamanan)
        if ($password == $row['password']) {
            $_SESSION['username'] = $username;  // Simpan username di session
            header('Location: dashboard.php');  // Redirect ke halaman dashboard
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Otomotif</title>
    <!-- Sertakan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Sertakan Google Font untuk tema otomotif -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #1e1e1e, #3a3a3a); /* Warna latar belakang gelap */
            color: #fff;
            font-family: 'PT Sans', sans-serif; /* Font bertema kokoh */
        }
        .login-card {
            background: #262626; /* Card dengan warna abu gelap */
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 69, 0, 0.5); /* Efek cahaya oranye */
        }
        .login-card h3 {
            color: #ff4500; /* Warna aksen oranye */
            text-shadow: 0 0 8px #ff4500;
        }
        .btn-otomotif {
            background: #ff4500; /* Warna tombol oranye */
            color: #fff;
            border: none;
            font-weight: bold;
            text-transform: uppercase;
        }
        .btn-otomotif:hover {
            background: #e03c00;
            color: #fff;
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
        .footer-text {
            text-align: center;
            color: #999;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4">
                <div class="card login-card p-4">
                    <h3 class="text-center mb-4">Riana Otomotif</h3>
                    
                    <!-- Tampilkan error jika ada -->
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-otomotif">Login</button>
                        </div>
                    </form>
                </div>
                <div class="footer-text">
                    © 2024 Sistem Otomotif. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
