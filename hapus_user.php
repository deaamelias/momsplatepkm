<?php
// Mulai session
session_start();

// Periksa apakah pengguna telah login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// Include file koneksi ke database
include 'koneksi.php';

// Periksa apakah parameter id telah diterima dari URL
if (isset($_GET['id'])) {
    // Escape input untuk mencegah SQL Injection
    $id = $conn->real_escape_string($_GET['id']);

    // Query untuk menghapus pengguna berdasarkan id
    $query = "DELETE FROM users WHERE id = '$id'";

    // Jalankan query
    if ($conn->query($query) === TRUE) {
        // Jika pengguna berhasil dihapus, redirect ke halaman dashboard
        header("Location: admin.php");
        exit();
    } else {
        // Jika terjadi kesalahan saat menjalankan query, tampilkan pesan kesalahan
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Tutup koneksi database
$conn->close();
?>
