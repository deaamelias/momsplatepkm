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
    header("Location: admin.php");
    exit();
}

// Ambil ID pengguna dari parameter GET
$user_id = $_GET['id'];

// Query SQL untuk mengambil informasi detail pengguna dari tabel users
$query = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($query);

// Periksa apakah pengguna ditemukan
if ($result->num_rows == 1) {
    // Jika ditemukan, ambil informasi pengguna
    $row = $result->fetch_assoc();
} else {
    // Jika tidak ditemukan, redirect kembali ke halaman dashboard
    header("Location: admin.php");
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
        body {
            
            background-color: #f8f9fa; /* Ubah warna latar belakang menjadi abu-abu muda */
            margin-bottom: 100px; /* Tambahkan margin bottom untuk memberi ruang bagi footer */
            position: relative; /* Atur posisi relatif untuk konten */
            min-height: 100vh; /* Atur tinggi minimum konten setara dengan tinggi viewport */
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


        .card {
            border-radius: 10px; /* Add border radius to card */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Add box shadow to card */
        }
        .card-header {
            background-color: #007bff; /* Set card header background color to primary color */
            color: #fff; /* Set card header text color to white */
            border-bottom: none; /* Remove bottom border from card header */
            border-radius: 10px 10px 0 0; /* Add border radius to top corners */
        }
        .btn-primary {
            background-color: #007bff; /* Set primary button background color */
            border-color: #007bff; /* Set primary button border color */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Set primary button hover background color */
            border-color: #0056b3; /* Set primary button hover border color */
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
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container" style="margin-top: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Pengguna</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Username:</strong> <?php echo $row['username']; ?></p>
                    <p class="card-text"><strong>Nama:</strong> <?php echo $row['nama']; ?></p>
                    <p class="card-text"><strong>Telepon:</strong> <?php echo $row['telepon']; ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p class="card-text"><strong>Role:</strong> <?php echo $row['role']; ?></p>
                    <p class="card-text"><strong>Riwayat Penyakit:</strong> <?php echo $row['riwayat_penyakit']; ?></p>
                    <p class="card-text"><strong>Riwayat Alergi:</strong> <?php echo $row['riwayat_alergi']; ?></p>
                    <p class="card-text"><strong>Jumlah Anak:</strong> <?php echo $row['jumlah_anak']; ?></p>
                    <p class="card-text"><strong>Paritas:</strong> <?php echo $row['paritas']; ?></p>
                    <p class="card-text"><strong>Usia Kehamilan:</strong> <?php echo $row['usia_kehamilan']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="text-center">
                <a href="detail_status_gizi.php?id=<?php echo $user_id; ?>" class="btn btn-primary mr-3">Lihat Status Gizi</a>
                <a href="detail_kebutuhan_kalori.php?id=<?php echo $user_id; ?>" class="btn btn-primary">Lihat Kebutuhan Kalori</a>
            </div>
        </div>
    </div>
</div>

<footer class="py-4 bg-dark text-white text-center">
    <div class="container">
        &copy; 2024  Mom's Plate
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
