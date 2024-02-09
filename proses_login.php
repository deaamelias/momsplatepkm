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

    // Hash password menggunakan SHA-256
    $hashed_password = hash('sha256', $password);

    // Query SQL untuk memeriksa kredensial pengguna
    $query = "SELECT id, username FROM users WHERE username = '$username' AND password = '$hashed_password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Jika data ditemukan, ambil ID pengguna
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        // Set session ID pengguna
        $_SESSION['user_id'] = $user_id;

        // Redirect ke halaman dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Jika data tidak ditemukan, set pesan kesalahan
        $_SESSION['login_error'] = "Username atau password salah.";
        
        // Redirect ke halaman login kembali
        header("Location: index.php");
        exit();
    }
}
?>
