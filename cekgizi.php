<?php
// Ambil ID user dari sesi
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: index.php');
    exit();
}

// Ambil ID user dari sesi
$user_id = $_SESSION['user_id'];

// Sekarang Anda dapat menggunakan $user_id untuk mengakses data yang terkait dengan pengguna tersebut
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Gizi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Roboto -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Font Roboto */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Ubah warna latar belakang menjadi abu-abu muda */
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
    </style>
</head>
<body>

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
                    <a class="nav-link" href="dashboard.php">Kembali</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="hero" class="py-5 text-center">
    <div class="container">
        <div id="form-container" class="col-md-6 mx-auto"> <!-- Menambahkan class "col-md-6" dan "mx-auto" untuk membuat formulir menjadi responsif dan di tengah secara horizontal -->
            <!-- Formulir untuk perhitungan status gizi -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Perhitungan Status Gizi</h3>
                    <form action="hasilcekgizi.php" method="post">
                    <div class="form-group">
                            <label for="tinggi">Tinggi Badan (cm)</label>
                            <input type="number" class="form-control" id="tinggi" name="tinggi" required>
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat Badan (kg)</label>
                            <input type="number" class="form-control" id="berat" name="berat" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Hitung</button> <!-- Mengubah tombol menjadi full width -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
