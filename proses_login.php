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
    $query = "SELECT id, username, role FROM users WHERE username = '$username' AND password = '$hashed_password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Jika data ditemukan, ambil informasi pengguna
        $user = $result->fetch_assoc();

        // Periksa apakah checkbox "Ingat Saya" dicentang
        if(isset($_POST['remember']) && $_POST['remember'] === 'on') {
            // Set cookie untuk menyimpan username pengguna
            setcookie('remembered_username', $username, time() + (86400 * 30), '/'); 
            setcookie('remembered_password', $password, time() + (86400 * 30), '/');
        } else {
            // Hapus cookie jika checkbox "Ingat Saya" tidak dicentang
            unset($_COOKIE['remembered_username']);
            setcookie('remembered_username', '', time() - 3600, '/');

            unset($_COOKIE['remembered_password']);
            setcookie('remembered_password', '', time() - 3600, '/');
            
        }

        $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user['id'];


        // Redirect berdasarkan peran (role) pengguna
        if ($user['role'] === 'admin') {
            // Jika peran pengguna adalah admin, redirect ke admin.php
            header("Location: admin.php");
            exit();
        } else {
            // Jika peran pengguna adalah user, redirect ke dashboard.php
            header("Location: dashboard.php");
            exit();
        }

    } else {
        // Jika data tidak ditemukan, set pesan kesalahan
        $_SESSION['login_error'] = "Username atau password salah.";

        // Redirect ke halaman login kembali
        header("Location: login.php");
        exit();
    }
}
?>
