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
    <title>Dashboard Ibu Hamil</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Roboto -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Font Roboto */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff; /* Ubah warna latar belakang menjadi putih */
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
        .img-menu {
    max-width: 150px; /* Atur lebar maksimum gambar */
    height: auto; /* Biarkan tinggi gambar menyesuaikan proporsi */
}
.card {
            border: none; /* Menghapus border dari card */
            transition: all 0.3s ease; /* Animasi saat hover */
        }
        .card:hover {
            transform: translateY(-5px); /* Mendorong card ke atas saat hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan bayangan saat hover */
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
                    <a class="nav-link" href="#fitur">Cek Gizi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#rekomendasi-makanan">Rekomendasi Makanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#konsultasi-online">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="hero" class="py-5 text-center" style="margin-top: 80px;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5 animate__animated animate__fadeInLeft">
                <img src="pregnancy.png" class="img-fluid hero-image mx-auto d-block mt-3" alt="Gambar Ibu Hamil" style="max-width: 400px; margin-top: 10px;">
            </div>
            <div class="col-lg-6 animate__animated animate__fadeInRight">
                <h2 class="hero-title  "><b><em>Hello Mom's</em></b></h2>
                <p class="lead">Kami sangat senang melihat Anda kembali di Mom's Plate. Di sini, kami siap mendukung perjalanan kehamilan Anda dengan informasi gizi terpercaya, layanan konsultasi online, dan berbagai fitur yang dirancang khusus untuk memastikan kesehatan Anda dan buah hati tercinta.</p>
            </div>
        </div>
    </div>
</section>

<section id="fitur" class="py-5 bg-light text-center" style="margin-top: 80px;">
    <div class="container">
        <div class="row">
            <!-- Perhitungan Status Gizi -->
            <div class="col-lg-6 mb-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="diet.png" class="img-fluid mb-3 img-menu" alt="Perhitungan Status Gizi">
                        <h3 class="card-title">Cek Status Gizi</h3>
                        <p class="card-text">Dengan fitur ini, Anda dapat mengetahui status gizi Anda dengan mudah. Lakukan perhitungan IMT untuk mengetahui apakah berat badan Anda ideal, kurang, atau berlebihan.</p>
                    </div>
                    <div class="card-footer">
                        <a href="cekgizi.php" class="btn btn-primary stretched-link">Mulai</a>
                    </div>
                </div>
            </div>
            
            <!-- Perhitungan IMT -->
            <div class="col-lg-6 mb-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="cek.png" class="img-fluid mb-3 img-menu" alt="Perhitungan IMT">
                        <h3 class="card-title">Cek Kebutuhan Kalori</h3>
                        <p class="card-text">Dengan fitur ini, Anda dapat menghitung kebutuhan kalori harian Anda. Dapatkan informasi yang diperlukan untuk menjaga keseimbangan nutrisi dan gaya hidup sehat.</p>
                    </div>
                    <div class="card-footer">
                        <a href="cekkg.php" class="btn btn-primary stretched-link">Mulai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rekomendasi Makanan Section -->
<section id="rekomendasi-makanan" class="py-5">
<div class="container">
        <h2 class="text-center mb-4"><b>Rekomendasi Makanan untuk Ibu Hamil dan Pencegahan Diabetes Gestasional</b></h2>
        <p class="lead text-center">Diabetes gestasional adalah kondisi di mana wanita hamil mengalami lonjakan gula darah yang tidak normal. Untuk mencegah diabetes gestasional dan menjaga kesehatan ibu dan bayi, berikut adalah rekomendasi makanan yang boleh dan tidak boleh dikonsumsi:</p>

        <!-- Carousel -->
        <div id="foodCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="card">
                        <img src="diet.png" class="card-img-top" alt="Sayuran Segar">
                        <div class="card-body">
                            <h5 class="card-title">Sayuran Segar</h5>
                            <p class="card-text">Sayuran segar seperti bayam, brokoli, wortel, dan kacang hijau.</p>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan item makanan lainnya -->
            </div>
        </div>
        <div class="carousel-item">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="card">
                        <img src="diet.png" class="card-img-top" alt="Buah-buahan">
                        <div class="card-body">
                            <h5 class="card-title">Buah-buahan</h5>
                            <p class="card-text">Buah-buahan seperti apel, pir, jeruk, dan stroberi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="diet.png" class="card-img-top" alt="Buah-buahan">
                        <div class="card-body">
                            <h5 class="card-title">Buah-buahan</h5>
                            <p class="card-text">Buah-buahan seperti apel, pir, jeruk, dan stroberi.</p>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan item makanan lainnya -->
            </div>
        </div>
        <!-- Tambahkan carousel-item untuk item makanan lainnya -->
    </div>
    <a class="carousel-control-prev" href="#foodCarousel" role="button" data-slide="prev" style="top: 50%; transform: translateY(-50%);">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="color: #808080;"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#foodCarousel" role="button" data-slide="next" style="top: 50%; transform: translateY(-50%);">
        <span class="carousel-control-next-icon" aria-hidden="true" style="color: #808080;"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


        <!-- End Carousel -->

        <p class="mt-4">Perhatikan pola makan dan pastikan untuk mengonsumsi makanan seimbang serta berkonsultasi dengan dokter atau ahli gizi untuk rencana diet yang sesuai dengan kebutuhan Anda selama kehamilan.</p>
        <div class="text-center">
            <img src="bumil.jpeg" class="img-fluid mt-4" style="max-width: 500px;" alt="Rekomendasi Makanan untuk Ibu Hamil">
        </div>
    </div>
</section>


<section id="konsultasi-online" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center"><b><em>Konsultasi Online</b></em></h2>
        <p class="card-text">Dapatkan akses langsung untuk konsultasi pribadi tentang nutrisi, rencana diet, dan gaya hidup sehat. Sampaikan pertanyaan Anda, diskusikan tujuan kesehatan Anda, dan dapatkan saran yang disesuaikan untuk mencapai target gizi Anda.</p>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="whatsapp.png" class="img-fluid mb-3 img-menu" alt="Konsultasi Online" style="max-width: 100px;">
                        <h4 class="card-title">Lailaturrahmah</h4>
                    </div>
                    <div class="card-footer">
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-primary btn-block">Chat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="whatsapp.png" class="img-fluid mb-3 img-menu" alt="Konsultasi Online" style="max-width: 100px;">
                        <h4 class="card-title">Izqi</h4>
                    </div>
                    <div class="card-footer">
                        <a href="https://wa.me/6281234567891" target="_blank" class="btn btn-primary btn-block">Chat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="whatsapp.png" class="img-fluid mb-3 img-menu" alt="Konsultasi Online" style="max-width: 100px;">
                        <h4 class="card-title">Nadya</h4>
                    </div>
                    <div class="card-footer">
                        <a href="https://wa.me/6281234567892" target="_blank" class="btn btn-primary btn-block">Chat</a>
                    </div>
                </div>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Letakkan di bagian akhir body -->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/your_widget_code';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

</body>
</html>
