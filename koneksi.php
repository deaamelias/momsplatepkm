<?php
// Konfigurasi koneksi ke database
$servername = "localhost"; // Nama server database (biasanya localhost)
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi pengguna database
$dbname = "proyek"; // Nama database yang akan digunakan

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
