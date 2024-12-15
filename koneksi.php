<?php
$servername = "localhost";  // Nama server, biasanya localhost
$username = "root";         // Username untuk MySQL (default: root)
$password = "";             // Password untuk MySQL (default: kosong)
$dbname = "frontdesk";      // Nama database yang sudah kamu buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error); // Jika gagal koneksi, tampilkan error
}
?>
