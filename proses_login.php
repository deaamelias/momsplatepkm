<?php
// Mulai session
session_start();

// Include file koneksi ke database
include 'koneksi.php';

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai inputan form
    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];

    // Query SQL untuk memeriksa kredensial pengguna
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Jika data ditemukan, set session dan redirect ke dashboard.php
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit(); // Pastikan tidak ada output lain sebelum header
    } else {
        // Jika data tidak ditemukan, redirect ke halaman login kembali
        header("Location: index.php");
        exit();
    }
}
?>
