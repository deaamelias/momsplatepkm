<?php
// Mulai session
session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// Include file koneksi ke database
include 'koneksi.php';

// Ambil username dari session
$username = $_SESSION['username'];

// Query SQL untuk mengambil informasi pengguna berdasarkan username
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);

// Periksa apakah pengguna ditemukan
if ($result->num_rows > 0) {
    // Jika ditemukan, ambil informasi pengguna
    $user = $result->fetch_assoc();
} else {
    // Jika tidak ditemukan, redirect ke halaman dashboard
    header("Location: dashboard.php");
    exit();
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
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

        /* Desain tambahan untuk profil */
        .profile-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin-top: 80px;
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
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="profile-container">
        <h1 class="mb-4">View Profile</h1>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" value="<?php echo $user['username']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo $user['email']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="tel" class="form-control" id="telepon" value="<?php echo $user['telepon']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="riwayat_penyakit">Riwayat Penyakit</label>
            <input type="text" class="form-control" id="riwayat_penyakit" value="<?php echo $user['riwayat_penyakit']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="riwayat_alergi">Riwayat Alergi</label>
            <input type="text" class="form-control" id="riwayat_alergi" value="<?php echo $user['riwayat_alergi']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="jumlah_anak">Jumlah Anak</label>
            <input type="number" class="form-control" id="jumlah_anak" value="<?php echo $user['jumlah_anak']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="usia_kehamilan">Usia Kehamilan</label>
            <input type="text" class="form-control" id="usia_kehamilan" value="<?php echo $user['usia_kehamilan']; ?>" readonly>
        </div>
        <a href="profile.php" class="btn btn-primary">Edit Profile</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
