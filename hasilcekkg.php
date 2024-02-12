<?php

session_start(); // Mulai sesi
include 'koneksi.php';
// Periksa apakah pengguna sudah login atau belum
if(isset($_SESSION['user_id'])) {
    // Jika sudah login, ambil user_id dari sesi
    $user_id = $_SESSION['user_id'];
    
    // Ambil data dari formulir
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $usia = $_POST['usia'];
    $trimester = $_POST['trimester'];
    $aktivitas = $_POST['aktivitas'];
// Hitung BMR (Basal Metabolic Rate) untuk wanita hamil
// Berat badan saat hamil bisa digunakan untuk perhitungan
$bmr = (655.10 + (9.56 * $berat) + (1.85 * $tinggi) - (4.68 * $usia));
// Ambil data aktivitas dari formulir
switch ($aktivitas) {
    case 'tidur':
        $fa = 1.2;
        break;
    case 'ringan':
        $fa = 1.3;
        break;
    case 'sedang':
        $fa = 1.5;
        break;
    case 'berat':
        $fa = 2.0;
        break;
    default:
        $fa = 1.5; // Default FA jika tidak ada pilihan yang dipilih
}

switch ($trimester) {
    case 'trimester1':
        $energi_plus = 180;
        $protein_plus = 1;
        $lemak_plus = 2.3;
        $karbohidrat_plus = 25;
        break;
    case 'trimester2':
        $energi_plus = 300;
        $protein_plus = 10;
        $lemak_plus = 2.3;
        $karbohidrat_plus = 40;
        break;
    case 'trimester3':
        $energi_plus = 300;
        $protein_plus = 30;
        $lemak_plus = 2.3;
        $karbohidrat_plus = 40;
        break;
    default:
        // Default trimester 1 jika tidak ada pilihan yang dipilih
        $energi_plus = 180;
        $protein_plus = 1;
        $lemak_plus = 2.3;
        $karbohidrat_plus = 25;
}

$fs = 1.1; // Default FS jika tidak ada pilihan yang dipilih

// Hitung TEE (Total Energy Expenditure) dengan memperhitungkan FA dan FS
$tee = $bmr  * $fa * $fs + $energi_plus;

// Hitung Kebutuhan Protein (gram/hari)
$protein = $tee * 0.15 + $protein_plus; // Misalnya menggunakan 1.1 gram protein per kilogram berat badan untuk ibu hamil

// Hitung Kebutuhan Lemak (gram/hari)
$lemak = $tee * 0.25 + $lemak_plus; // Misalnya menggunakan 25% dari total kalori, dan 1 gram lemak = 9 kalori

// Hitung Kebutuhan Karbohidrat (gram/hari)
$karbohidrat = $tee * 0.6 + $karbohidrat_plus; // Sisanya dari total kalori

$sql = "INSERT INTO hasil_perhitungan (user_id, bb, tb, usia, aktivitas_fisik, bmr, tee, protein, lemak, karbohidrat, trimester) 
            VALUES ('$user_id', '$berat', '$tinggi', '$usia', '$aktivitas_fisik', '$bmr', '$tee', '$protein', '$lemak', '$karbohidrat', '$trimester')";
    
    // Eksekusi kueri SQL
    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Jika pengguna belum login, arahkan kembali ke halaman login atau lakukan tindakan yang sesuai
    header("Location: index.php");
    exit;
}
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
            background-color: #ffffff; /* Ubah warna latar belakang menjadi putih */
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
                    <a class="nav-link" href="cekkg.php">Kembali</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
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
            <p>BMR (Basal Metabolic Rate): <b><?php echo round($bmr, 2); ?> </b>kalori/hari</p>
            <p>TEE (Total Energy Expenditure): <b><?php echo round($tee, 2); ?> </b>kalori/hari</p>
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

