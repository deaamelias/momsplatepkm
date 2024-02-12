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

// Jika ada data yang dikirimkan melalui metode POST (untuk mengupdate profil)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_email = $_POST['new_email'];
    $new_telepon = $_POST['new_telepon'];
    $new_riwayat_penyakit = $_POST['new_riwayat_penyakit'];
    $new_riwayat_alergi = $_POST['new_riwayat_alergi'];
    $new_jumlah_anak = $_POST['new_jumlah_anak'];
    $new_usia_kehamilan = $_POST['new_usia_kehamilan'];
    
    // Query SQL untuk mengupdate informasi pengguna kecuali username
    $update_query = "UPDATE users SET email = '$new_email', telepon = '$new_telepon', riwayat_penyakit = '$new_riwayat_penyakit', riwayat_alergi = '$new_riwayat_alergi', jumlah_anak = '$new_jumlah_anak', usia_kehamilan = '$new_usia_kehamilan' WHERE username = '$username'";
    
    // Lakukan update pada database
    if ($conn->query($update_query) === TRUE) {
        // Redirect kembali ke halaman profil setelah update
        header("Location: view_profile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}



// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

        /* Desain tambahan untuk form */
        .form-group {
            margin-bottom: 20px; /* Tambahkan jarak antara setiap form */
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

<div class="container mt-5">
    <h1 class="mb-4">Edit Profile</h1>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $user['username']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="new_email" value="<?php echo $user['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="telepon" name="new_telepon" value="<?php echo $user['telepon']; ?>">
                </div>
                <div class="form-group">
                    <label for="riwayat_penyakit">Riwayat Penyakit</label>
                    <input type="text" class="form-control" id="riwayat_penyakit" name="new_riwayat_penyakit" value="<?php echo $user['riwayat_penyakit']; ?>">
                </div>
                <div class="form-group">
                    <label for="riwayat_alergi">Riwayat Alergi</label>
                    <input type="text" class="form-control" id="riwayat_alergi" name="new_riwayat_alergi" value="<?php echo $user['riwayat_alergi']; ?>">
                </div>
                <div class="form-group">
                    <label for="jumlah_anak">Jumlah Anak</label>
                    <input type="number" class="form-control" id="jumlah_anak" name="new_jumlah_anak" value="<?php echo $user['jumlah_anak']; ?>" min="0">
                </div>
                <div class="form-group">
                    <label for="usia_kehamilan">Usia Kehamilan</label>
                    <input type="number" class="form-control" id="usia_kehamilan" name="new_usia_kehamilan" value="<?php echo $user['usia_kehamilan']; ?>" min="1" max="12">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="view_profile.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>



<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
