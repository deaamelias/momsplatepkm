<?php
// Mulai session
session_start();

// Include file koneksi ke database
include 'koneksi.php';

// Periksa apakah pengguna telah login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// Periksa apakah parameter ID pengguna telah diterima dari URL
if (!isset($_GET['id'])) {
    // Jika tidak, redirect kembali ke halaman dashboard
    header("Location: dashboard.php");
    exit();
}

// Ambil ID pengguna dari parameter GET
$user_id = $_GET['id'];

// Query SQL untuk mengambil informasi detail pengguna berdasarkan ID
$query = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($query);

// Periksa apakah pengguna ditemukan
if ($result->num_rows > 0) {
    // Jika ditemukan, ambil informasi pengguna
    $user = $result->fetch_assoc();
} else {
    // Jika tidak ditemukan, redirect kembali ke halaman dashboard
    header("Location: dashboard.php");
    exit();
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrisi untuk Ibu Hamil</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Roboto -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Font Roboto */
       
        body {

            margin-bottom: 100px; /* Tambahkan margin bottom untuk memberi ruang bagi footer */
            position: relative; /* Atur posisi relatif untuk konten */
            min-height: 100vh; /* Atur tinggi minimum konten setara dengan tinggi viewport */
        }

        /* Desain tambahan untuk card */
        .card {
            margin-top: 20px; /* Tambahkan jarak antara setiap card */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Tambahkan bayangan untuk efek visual */
            transition: 0.3s; /* Efek transisi smooth */
            border: none; /* Hapus border default */
            border-radius: 10px; /* Tambahkan sudut melengkung */
        }

        /* Desain tambahan untuk card saat hover */
        .card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        /* Desain tambahan untuk gambar */
        .img-menu {
            width: 100px; /* Atur lebar gambar */
            height: auto; /* Atur tinggi gambar otomatis sesuai lebar */
        }

        /* Atur posisi footer di bagian bawah halaman */
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
       

        /* Desain tambahan untuk section */
        section {
            padding: 60px 0;
            overflow: hidden;
            margin-bottom: 50px; /* Tambahkan jarak antara setiap bagian */
        }
        

        /* Desain tambahan untuk judul section */
        section h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #343a40;
        }

        /* Desain tambahan untuk konten section */
        section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #666;
        }

        /* Desain tambahan untuk tombol */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Desain tambahan untuk footer */
        footer {
            background-color: #343a40;
            color: #fff;
        }

        /* Atur gambar menjadi lebih menarik */
        .hero-image {
            width: 90%;
            max-width: 600px; /* Atur lebar maksimum gambar */
        }

        
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="pregnant.png" alt="Logo" class="navbar-logo img-fluid mr-2" style="max-height: 40px;"> <!-- Menambahkan class "mr-2" untuk memberi jarak ke judul -->
            <b>Mom's Plate</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="admin.php">Kembali</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="hero" class="py-5 text-center" style="margin-top: 50px;">
<div class="container mt-5">
    <h1 class="mb-4">Detail Pengguna</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Username: <?php echo $user['username']; ?></h5>
            <p class="card-text">Email: <?php echo $user['email']; ?></p>
            <p class="card-text">Role: <?php echo $user['role']; ?></p>
            <!-- Tambahkan informasi pengguna lainnya sesuai kebutuhan -->
        </div>
    </div>
</div>
    </section>
<footer class="py-4 bg-dark text-white text-center">
    <div class="container">
        &copy; 2024  Mom's Plate
    </div>
</footer>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
