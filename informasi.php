<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Diabetes Gestasional</title>
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

        /* Container untuk informasi */
        .info-container {
            background-color: #fff; /* Warna latar belakang */
            border-radius: 10px; /* Agar tampilan lebih rapi */
            padding: 20px; /* Beri padding */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Efek bayangan untuk kesan lebih tiga dimensi */
        }
        .info-img {
            max-width: 100%;
            height: auto;
            align : center;
            border-radius: 10px; /* Agar ujung gambar membulat */
            margin-bottom: 10px; /* Beri jarak bawah */
        }
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
                <img src="pregnant.png" alt="Logo" class="navbar-logo img-fluid mr-2" style="max-height: 40px;">
                <b>Mom's Plate</b>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="info.php">Kembali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="info" class="py-5">
    <div class="container">
    <?php
// Include file koneksi ke database
include 'koneksi.php';

// Pastikan id telah diberikan melalui URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query SQL untuk mengambil informasi dari tabel diabetes_gestasional berdasarkan id
    $query = "SELECT * FROM diabetes_gestasional WHERE id = $id";
    $result = $conn->query($query);

    // Periksa apakah terdapat data yang ditemukan
    if ($result->num_rows > 0) {
        // Loop melalui setiap baris data
        while($row = $result->fetch_assoc()) {
            // Tampilkan judul dan informasi dalam sebuah container
            echo '<div class="info-container mb-5">
                    <div class="text-center">
                        <h2 class="mb-4">' . $row['judul'] . '</h2>
                    </div>
                    <div class="text-center">
                        <img src="' . $row['gambar'] . '" alt="' . $row['judul'] . '" class="info-img" style="max-width: 150px;">
                    </div>
                    <div>
                        <p>' . $row['info'] . '</p>
                    </div>
                </div>';
        }
    } else {
        echo "Tidak ada informasi yang tersedia.";
    }
} else {
    echo "ID tidak diberikan.";
}

// Tutup koneksi database
$conn->close();
?>

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
