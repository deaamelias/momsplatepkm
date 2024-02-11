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
    .info-container {
            background-color: #fff; /* Warna latar belakang */
            border-radius: 10px; /* Agar tampilan lebih rapi */
            padding: 40px; /* Beri padding */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Efek bayangan untuk kesan lebih tiga dimensi */
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
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


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
<section id="services" >
    <div class="container">
        <h2 class="text-center animate__animated animate__fadeInLeft"><b><em>Layanan Kami</em></b></h2>
        <div class="row">
            <div class="col-lg-6 animate__animated animate__fadeInLeft">
            <div class="row mb-4">
    <div class="col-md-4 col-sm-4">
        <img src="telemedicine.png" class="img-fluid" alt="Layanan 1"> <!-- Gambar layanan -->
    </div>
    <div class="col-md-8 col-sm-8">
        <h3>Konsultasi Online</h3>
        <p>Kami menawarkan layanan konsultasi nutrisi selama kehamilan yang disesuaikan dengan kebutuhan setiap ibu.</p>
    </div>
</div>

                <div class="row">
                <div class="col-md-4 col-sm-4">
                        <img src="diet.png" class="img-fluid" alt="Layanan 2"> <!-- Gambar layanan -->
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3>Cek Status Gizi</h3>
                        <p>Layanan kami dapat diakses melalui formulir pendaftaran online.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 animate__animated animate__fadeInRight">
                <div class="row mb-4">
                <div class="col-md-4 col-sm-4">
                        <img src="salad.png" class="img-fluid" alt="Layanan 3"> <!-- Gambar layanan -->
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3>Rekomendasi Makanan</h3>
                        <p>Kami menyediakan panduan makanan yang dipersonalisasi untuk ibu hamil.</p>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4 col-sm-4">
                        <img src="copywriting.png" class="img-fluid" alt="Layanan 4"> <!-- Gambar layanan -->
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3>Informasi Gizi</h3>
                        <p>Kami memberikan tips kesehatan dan kebugaran selama masa kehamilan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section id="articles" >
    <div class="container ">
        <h2 class="text-center animate__animated animate__zoomIn"><b><em>Artikel dan Informasi</em></b></h2>
        <div class="row">
            <?php
            include 'koneksi.php';

            // Deklarasi variabel pencarian
            $query = "SELECT * FROM diabetes_gestasional LIMIT 3";

            
            // Eksekusi query
            $result = $conn->query($query);
// Bagian PHP untuk menampilkan informasi hasil pencarian atau semua informasi jika tidak ada pencarian
if ($result->num_rows > 0) {
    // Tampilkan informasi dalam sebuah card
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4 animate__animated animate__zoomIn">
                <div class="info-container">
                    <div class="info-content">
                        <h3 class="mb-4">' . $row['judul'] . '</h3>
                        <div class="float-left mr-4">
                            <img src="' . $row['gambar'] . '" alt="' . $row['judul'] . '" class="info-img" style="max-width: 100px;">
                        </div>
                        <div class="info-text">
                            <p>' . $row['deskripsi'] . '</p>
                            <p>Informasi lebih lanjut mengenai diabetes bisa ditemukan <a href="informasi.php?id=' . $row['id'] . '">di sini</a>.</p>
                        </div>
                    </div>
                </div>
            </div>';
    }
}  else {
    echo "Tidak ada informasi yang tersedia.";
}
$conn->close();
?>
            <div class="col-lg-4 animate__animated animate__zoomIn">
                <a href="info.php" class="btn btn-primary">More Information</a>
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
