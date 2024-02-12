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
    <a class="nav-link" href="view_profile.php">Akun</a>
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
        <p class="lead text-center">Menurut asupan referensi diet, untuk memenuhi kebutuhan gizi makro dan mikro hariannya ibu hamil disarankan untuk mengkonsumsi </p>
        <div class="row">

            <div class="col-lg-6 mb-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="carbohydrates.png" class="img-fluid mb-3 img-menu" alt="Karbohidrat">
                        <h4 class="card-title">Karbohidrat</h4>
                        <p class="card-text">Minimal 175 g (700 kkal)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="protein.png" class="img-fluid mb-3 img-menu" alt="Protein">
                        <h4 class="card-title">Protein</h4>
                        <p class="card-text">Minimal 71 g (300 kkal)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="oil.png" class="img-fluid mb-3 img-menu" alt="Lemak">
                        <h4 class="card-title">Lemak</h4>
                        <p class="card-text">Minimal 56 g (500 kkal)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="vegetable.png" class="img-fluid mb-3 img-menu" alt="Serat">
                        <h4 class="card-title">Serat</h4>
                        <p class="card-text">Minimal 28 g</p>
                    </div>
                </div>
            </div>
            

        </div>
    
        <p class="lead text-center">Selain itu, ibu hamil dengan diabetes gestasional juga perlu memperhatikan jenis karbohidrat yang dikonsumsi. Karbohidrat dengan indeks glikemik yang rendah dan serat yang tinggi serta membatasi konsumsi lemak yang jenuh sangat dianjurkan. Untuk mencegah diabetes gestasional dan menjaga kesehatan ibu dan bayi, berikut adalah rekomendasi makanan yang boleh dan tidak boleh dikonsumsi:</p>
    </div>
    </div>
    </div>
    </section>
    <section id="baik-makanan" class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center mb-4"><b>Makanan yang Dianjurkan</b></h3>
                <p class="lead">Adapun hal-hal yang harus diperhatikan oleh ibu hamil dengan diabetes gestsional dalam satu piring makanan yang dikonsumsi adalah:</p>
                <ul class="lead">
                    <li>Setengah dari piring makan yang dikonsumsi harus berupa sayuran tidak bertepung seperti mentimun, terong, jamur, brokoli, bayam, kol, dan sebagainya.</li>
                    <li>Seperempat dari piring berisi protein tanpa lemak seperti tahu, daging sapi tanpa lemak, ikan nila, ikan tuna, ikan salmon, dan sebagainya</li>
                    <li>Seperempat sisanya berupa karbohidrat atau makanan bertepung seperti kentang, nasi, pasta dan sebagainya</li>
                </ul>
                <p class="lead">Selain itu, penderita diabetes gestasional juga dianjurkan untuk mengkonsumsi makanan yang belum mengalami pengolahan apa pun atau biasa dikenal dengan makanan utuh seperti:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="fruit.png" class="img-fluid mb-3 img-menu" alt="Buah">
                        <h4 class="card-title">Buah-Buahan Segar</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="vegetable.png" class="img-fluid mb-3 img-menu" alt="Sayur">
                        <h4 class="card-title">Sayuran</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="peanut.png" class="img-fluid mb-3 img-menu" alt="Kacang">
                        <h4 class="card-title">Kacang</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="seed.png" class="img-fluid mb-3 img-menu" alt="Biji">
                        <h4 class="card-title">Biji</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="buruk-makanan" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center mb-4"><b>Makanan yang Tidak Dianjurkan</b></h3>
                <p class="lead">Adapun hal-hal yang harus diperhatikan oleh ibu hamil dengan diabetes gestsional dalam satu piring makanan yang dikonsumsi adalah:</p>
                <ul class="lead">
                    <li>Setengah dari piring makan yang dikonsumsi harus berupa sayuran tidak bertepung seperti mentimun, terong, jamur, brokoli, bayam, kol, dan sebagainya.</li>
                    <li>Seperempat dari piring berisi protein tanpa lemak seperti tahu, daging sapi tanpa lemak, ikan nila, ikan tuna, ikan salmon, dan sebagainya</li>
                    <li>Seperempat sisanya berupa karbohidrat atau makanan bertepung seperti kentang, nasi, pasta dan sebagainya</li>
                </ul>
                <p class="lead">Selain itu, penderita diabetes gestasional juga dianjurkan untuk mengkonsumsi makanan yang belum mengalami pengolahan apa pun atau biasa dikenal dengan makanan utuh seperti:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="fruit.png" class="img-fluid mb-3 img-menu" alt="Buah">
                        <h4 class="card-title">Buah-Buahan Segar</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="vegetable.png" class="img-fluid mb-3 img-menu" alt="Sayur">
                        <h4 class="card-title">Sayuran</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="peanut.png" class="img-fluid mb-3 img-menu" alt="Kacang">
                        <h4 class="card-title">Kacang</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="seed.png" class="img-fluid mb-3 img-menu" alt="Biji">
                        <h4 class="card-title">Biji</h4>
                    </div>
                </div>
            </div>
        </div>
        <p class="lead">Perhatikan pola makan dan pastikan untuk mengonsumsi makanan seimbang serta berkonsultasi dengan dokter atau ahli gizi untuk rencana diet yang sesuai dengan kebutuhan Anda selama kehamilan.</p>
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
            <div class="col-lg-12 mb-12">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="whatsapp.png" class="img-fluid mb-3 img-menu" alt="Konsultasi Online" style="max-width: 100px;">
                        <h4 class="card-title">Grup Konsultasi</h4>
                    </div>
                    <div class="card-footer">
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-primary btn-block">Join</a>
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
