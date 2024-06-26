<?php
// Ambil ID user dari sesi
session_start();
include 'koneksi.php';
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
            /* Beri sedikit padding di atas */
        }

        /* Container untuk hasil */
        .result-container {
            background-color: #fff; /* Warna latar belakang */
            border-radius: 10px; /* Agar tampilan lebih rapi */
            padding: 50px; /* Beri padding */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Efek bayangan untuk kesan lebih tiga dimensi */
        }

        /* Container untuk rekomendasi makanan */
        .recommendation-container {
            margin-top: 20px; /* Beri jarak atas */
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
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="hero" class="py-5 text-center" style="margin-top: 50px;">
    <div class="container">
        <div class="row justify-content-center"> <!-- Menengahkan konten -->
            <div class="col-lg-8">
                <div class="result-container"> <!-- Container untuk hasil -->
                    <h3 class="text-center mb-4">Hasil Perhitungan Status Gizi</h3>
                    <?php
                    if (isset($_POST['berat']) && isset($_POST['tinggi'])) {
                        $berat = $_POST['berat'];
                        $tinggi = $_POST['tinggi'];

                        // Hitung indeks massa tubuh (IMT)
                        $tinggi_meter = $tinggi / 100;
                        $imt = $berat / ($tinggi_meter * $tinggi_meter);

                        // Tentukan status gizi berdasarkan IMT
                        if ($imt < 17.0) {
                            $status = "Berat badan kurang tingkat BERAT";
                        } elseif ($imt >= 17.0 && $imt < 18.5) {
                            $status = "Berat badan kurang tingkat RINGAN";
                        } elseif ($imt >= 18.5 && $imt < 25.1) {
                            $status = "Berat badan normal";
                        } elseif ($imt >= 25.1 && $imt < 27.1) {
                            $status = "Berat badan berlebih tingkat RINGAN";
                        } else {
                            $status = "Berat badan berlebih tingkat BERAT";
                        }

                        // Buat kueri SQL untuk memasukkan data ke dalam tabel status_gizi
                        $sql = "INSERT INTO status_gizi (user_id, berat_badan, tinggi_badan, status_gizi) VALUES ('$user_id', '$berat', '$tinggi', '$status')";
                        if ($conn->query($sql) === TRUE) {
                            echo "<p><strong>Berat Badan:</strong> $berat kg</p>";
                            echo "<p><strong>Tinggi Badan:</strong> $tinggi cm</p>";
                            echo "<p><strong>Indeks Massa Tubuh (IMT):</strong> " . number_format($imt, 2) . "</p>";
                            echo "<p><strong>Status Gizi:</strong> <span style='color: green;'>$status</span></p>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Data berat dan tinggi badan belum tersedia.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
