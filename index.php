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

        .navbar-logo {
      margin-right: 10px;
    }
    .navbar .nav-item:last-child .nav-link {
      background-color: #007bff;
      color: white;
      border-radius: 5px;
      padding: 8px 15px;
    }
    .navbar .nav-item:last-child .nav-link:hover {
      background-color: #0056b3;
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
                    <a class="nav-link" href="#services">Layanan Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#articles">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang Kami</a>
                </li>
                <!-- Form login -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- Modal for Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login Mom's Plate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="proses_login.php" method="post">
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Masukkan username Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Masukkan kata sandi Anda" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Ingat Kata Sandi</label>
                    </div>
                    <!-- Pesan kesalahan -->
                    <?php if(isset($_SESSION['login_error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['login_error']; ?>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section -->
<section id="hero" class="py-5" style="margin-top: 80px;">
    <div class="container mt-5">
        <div class="row">
        <div class="col-lg-6 animate__animated animate__fadeInLeft">
                <h2 class="hero-title text-center "><b><em>Mom's Plate</em></b></h2>
                <p class="lead">Mom’s Plate adalah platform bantuan nutrisi online khusus untuk ibu hamil. Dapatkan panduan makanan yang dipersonalisasi dan konseling nutrisi untuk memastikan kesehatan Anda dan bayi. Mulailah perjalanan kehamilan Anda dengan dukungan Mom’s Plate.</p>
                <a href="register.php" class="btn btn-primary hero-button">Daftar Sekarang</a>
            </div>
            <div class="col-lg-5 animate__animated animate__fadeInRight">
                <img src="eating.png" class="img-fluid hero-image mx-auto d-block mt-3" alt="Gambar Ibu Hamil" style="max-width: 400px; margin-top: 10px;">
            </div>
        </div>
    </div>
</section>


<!-- Services Section -->
<section id="services">
    <div class="container">
        <h2 class="text-center animate__animated animate__fadeInLeft"><b><em>Layanan Kami</em></b></h2>
        <div class="row">
            <div class="col-lg-6 animate__animated animate__fadeInLeft">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <img src="telemedicine.png" class="img-fluid" alt="Layanan 1"> <!-- Gambar layanan -->
                    </div>
                    <div class="col-md-8">
                        <h3>Konsultasi Online</h3>
                        <p>Kami menawarkan layanan konsultasi nutrisi selama kehamilan yang disesuaikan dengan kebutuhan setiap ibu.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="diet.png" class="img-fluid" alt="Layanan 2"> <!-- Gambar layanan -->
                    </div>
                    <div class="col-md-8">
                        <h3>Cek Status Gizi</h3>
                        <p>Layanan kami dapat diakses melalui formulir pendaftaran online.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 animate__animated animate__fadeInRight">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <img src="salad.png" class="img-fluid" alt="Layanan 3"> <!-- Gambar layanan -->
                    </div>
                    <div class="col-md-8">
                        <h3>Rekomendasi Makanan</h3>
                        <p>Kami menyediakan panduan makanan yang dipersonalisasi untuk ibu hamil.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="copywriting.png" class="img-fluid" alt="Layanan 4"> <!-- Gambar layanan -->
                    </div>
                    <div class="col-md-8">
                        <h3>Informasi Gizi</h3>
                        <p>Kami memberikan tips kesehatan dan kebugaran selama masa kehamilan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- Articles Section -->
<section id="articles">
    <div class="container ">
        <h2 class="text-center animate__animated animate__zoomIn"><b><em>Artikel dan Informasi</em></b></h2>
        <div class="row">
            <div class="col-lg-4 animate__animated animate__zoomIn">
                <h3>Blog</h3>
                <p>Area berita dengan artikel yang membahas topik nutrisi selama kehamilan dan tips kesehatan.</p>
            </div>
            <div class="col-lg-4 animate__animated animate__zoomIn">
                <h3>Video dan Infografis</h3>
                <p>Kami menyediakan video dan infografis yang menjelaskan topik-topik penting terkait nutrisi selama kehamilan secara visual.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about">
    <div class="container">
        <h2 class="text-center animate__animated animate__zoomIn"><b><em>Tentang Kami</em></b></h2>
        <div class="row">
            <div class="col-lg-4 animate__animated animate__zoomIn">
                <h3>Tim Ahli Nutrisi dan Dokter</h3>
                <p>Informasi tentang tim ahli nutrisi dan dokter yang bertanggung jawab atas konten situs web.</p>
            </div>
            <div class="col-lg-4 animate__animated animate__zoomIn">
                <h3>Tujuan dan Misi</h3>
                <p>Tujuan dan misi situs web ini adalah memberikan informasi yang akurat dan berguna tentang nutrisi selama kehamilan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
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
