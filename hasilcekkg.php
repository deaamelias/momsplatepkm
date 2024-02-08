<?php
// Ambil data dari formulir
$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];
$usia = $_POST['usia'];
$jenis_kelamin = $_POST['jenis_kelamin'];

// Hitung BMR (Basal Metabolic Rate) untuk wanita hamil
// Berat badan saat hamil bisa digunakan untuk perhitungan
if ($jenis_kelamin == 'pria') {
    $bmr = 66 + (13.7 * $berat) + (5 * $tinggi) - (6.8 * $usia);
} else {
    $bmr = (655.10 + (9.56 * $berat) + (1.85 * $tinggi) - (4.68 * $usia));
}

// Hitung TEE (Total Energy Expenditure)
$tee = $bmr * 1.55; // Misalnya menggunakan faktor aktivitas 1.55

// Hitung Kebutuhan Protein (gram/hari)
$protein = $tee * 0.15; // Misalnya menggunakan 1.1 gram protein per kilogram berat badan untuk ibu hamil

// Hitung Kebutuhan Lemak (gram/hari)
$lemak = $tee * 0.25; // Misalnya menggunakan 25% dari total kalori, dan 1 gram lemak = 9 kalori

// Hitung Kebutuhan Karbohidrat (gram/hari)
$karbohidrat = $tee * 0.6; // Sisanya dari total kalori

// Tampilkan hasil perhitungan
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan Status Gizi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Roboto -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Font Roboto */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Ganti warna latar belakang */
            padding-top: 20px; /* Beri sedikit padding di atas */
        }

        /* Container untuk hasil */
        .result-container {
            background-color: #fff; /* Warna latar belakang */
            border-radius: 10px; /* Agar tampilan lebih rapi */
            padding: 20px; /* Beri padding */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Efek bayangan untuk kesan lebih tiga dimensi */
        }

        /* Container untuk rekomendasi makanan */
        .recommendation-container {
            margin-top: 20px; /* Beri jarak atas */
        }
        .img-menu {
    max-width: 150px; /* Atur lebar maksimum gambar */
    height: auto; /* Biarkan tinggi gambar menyesuaikan proporsi */
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
                    <a class="nav-link" href="cekgizi.php">Kembali</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="hero" class="py-5 text-center" style="margin-top: 50px;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
        <div class="result-container">
            <h2 class="text-center">Hasil Perhitungan Kebutuhan Zat Gizi untuk Ibu Hamil</h2>
            <img src="cek.png" class="img-fluid mb-3 img-menu" alt="Perhitungan IMT">
            <p>Kebutuhan BMR: <b><?php echo round($bmr, 2); ?> </b>kalori/hari</p>
            <p>Kebutuhan TEE: <b><?php echo round($tee, 2); ?> </b>kalori/hari</p>
            <p>Kebutuhan Protein: <b><?php echo round($protein, 2); ?> </b>gram/hari</p>
            <p>Kebutuhan Lemak: <b><?php echo round($lemak, 2); ?> </b>gram/hari</p>
            <p>Kebutuhan Karbohidrat: <b><?php echo round($karbohidrat, 2); ?> </b>gram/hari</p>
        </div>
    </div>
</div>

            <!-- Container untuk rekomendasi makanan -->
            <div class="recommendation-container" style="margin-top: 50px;">
    <h4 class="text-center mb-3">Rekomendasi Makanan</h4>
    <?php
    switch ($rekomendasi) {
        case "Menu A":
            echo '
            <div class="card mb-3">
                <img src="salad.png" class="card-img-top" alt="Menu A">
                <div class="card-body">
                    <h5 class="card-title">Menu A</h5>
                    <p class="card-text">Rekomendasi makanan untuk berat badan kurang:</p>
                    <ul class="list-unstyled">
                        <li>Makanan A1</li>
                        <li>Makanan A2</li>
                        <li>Makanan A3</li>
                    </ul>
                </div>
            </div>';
            break;
        case "Menu B":
            echo '
            <div class="card mb-3">
                <img src="salad.png" class="card-img-top" alt="Menu B">
                <div class="card-body">
                    <h5 class="card-title">Menu B</h5>
                    <p class="card-text">Rekomendasi makanan untuk berat badan normal:</p>
                    <ul class="list-unstyled">
                        <li>Makanan B1</li>
                        <li>Makanan B2</li>
                        <li>Makanan B3</li>
                    </ul>
                </div>
            </div>';
            break;
        case "Menu C":
            echo '
            <div class="card mb-3">
                <img src="salad.png" class="card-img-top" alt="Menu C">
                <div class="card-body">
                    <h5 class="card-title">Menu C</h5>
                    <p class="card-text">Rekomendasi makanan untuk berat badan berlebih:</p>
                    <ul class="list-unstyled">
                        <li>Makanan C1</li>
                        <li>Makanan C2</li>
                        <li>Makanan C3</li>
                    </ul>
                </div>
            </div>';
            break;
        default:
            echo "<p class='text-center'>Tidak ada rekomendasi makanan untuk status gizi ini.</p>";
    }
    ?>
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

</body>
</html>

