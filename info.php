<?php
// Include file koneksi ke database
include 'koneksi.php';

// Deklarasi variabel pencarian
$search_query = '';

// Periksa apakah ada permintaan pencarian dari pengguna
if(isset($_GET['search'])) {
    // Ambil nilai pencarian dari input form
    $search_query = $_GET['search'];

    // Modifikasi query SQL untuk mencocokkan judul atau deskripsi
    $query = "SELECT * FROM diabetes_gestasional WHERE judul LIKE '%$search_query%' OR deskripsi LIKE '%$search_query%'";
} else {
    // Query SQL untuk mengambil semua informasi jika tidak ada pencarian
    $query = "SELECT * FROM diabetes_gestasional";
}

// Eksekusi query
$result = $conn->query($query);

?>

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
            padding: 40px; /* Beri padding */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Efek bayangan untuk kesan lebih tiga dimensi */
        }

        /* Gambar */
        .info-img {
            max-width: 100%;
            height: auto;
            border-radius: 10px; /* Agar ujung gambar membulat */
            margin-bottom: 10px; /* Beri jarak bawah */
        }

        /* Search form */
        .search-form {
            margin-bottom: 20px;
     
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
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="info" class="py-5">
        <div class="container">
            <div class="row">
            <div class="col-md-12 mb-2">
        <form class="form-inline search-form justify-content-center col-md-12" method="GET" action="">
            <input class="form-control mr-sm-2 w-75" type="search" placeholder="Cari informasi..." aria-label="Search" name="search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
                
            
    <?php
// Bagian PHP untuk menampilkan informasi hasil pencarian atau semua informasi jika tidak ada pencarian
if ($result->num_rows > 0) {
    // Tampilkan informasi dalam sebuah card
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-12 mb-4">
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
            </div>
        </div>
        
    </section>

    

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
