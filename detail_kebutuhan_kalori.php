<?php
// Mulai session
session_start();

// Include file koneksi ke database
include 'koneksi.php';

// Periksa apakah pengguna telah login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// Periksa apakah parameter ID pengguna telah diterima dari URL
if (!isset($_GET['id'])) {
    // Jika tidak, redirect kembali ke halaman dashboard
    header("Location: admin.php");
    exit();
}

// Ambil ID pengguna dari parameter GET
$user_id = $_GET['id'];

// Query SQL untuk mengambil informasi riwayat kebutuhan kalori
$query = "SELECT * FROM hasil_perhitungan WHERE user_id = $user_id ORDER BY tanggal DESC";
$result = $conn->query($query);

// Tutup koneksi database
$conn->close();
?>

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
        body {
            
            background-color: #f8f9fa; /* Ubah warna latar belakang menjadi abu-abu muda */
            margin-bottom: 100px; /* Tambahkan margin bottom untuk memberi ruang bagi footer */
            position: relative; /* Atur posisi relatif untuk konten */
            min-height: 100vh; /* Atur tinggi minimum konten setara dengan tinggi viewport */
        }

        

        /* Atur posisi footer di bagian bawah halaman */
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

       

        .table {
            background-color: #fff; /* Table background color */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Table box shadow */
        }

        .table th,
        .table td {
            border-top: none; /* Remove top border */
        }

        .table th {
            border-bottom: none; /* Remove bottom border for header */
        }

        .table th,
        .table td,
        .table thead th {
            border-color: #dee2e6; /* Table border color */
        }

        .table thead th {
            background-color: #007bff; /* Header background color */
            color: #fff; /* Header text color */
        }

        .table th,
        .table td {
            vertical-align: middle; /* Vertical alignment */
        }

        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05); /* Hover background color */
        }

        .btn {
            padding: 6px 12px; /* Button padding */
            font-size: 14px; /* Button font size */
            border-radius: 4px; /* Button border radius */
        }

        .btn-primary {
            background-color: #007bff; /* Button primary color */
            border-color: #007bff; /* Button primary border color */
        }

        .btn-danger {
            background-color: #dc3545; /* Button danger color */
            border-color: #dc3545; /* Button danger border color */
        }

        .btn-primary:hover,
        .btn-danger:hover {
            opacity: 0.85; /* Button hover opacity */
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
                    <a class="nav-link" href="admin.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
    <h1 class="mb-4">Riwayat Kebutuhan Kalori</h1>

    <!-- Tabel untuk menampilkan riwayat kebutuhan kalori -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Trimester</th>
                    <th>Berat Badan</th>
                    <th>Tinggi Badan</th>
                    <th>Usia</th>
                    <th>Aktivitas Fisik</th>
                    <th>BMR</th>
                    <th>TEE</th>
                    <th>Protein</th>
                    <th>Lemak</th>
                    <th>Karbohidrat</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['trimester']; ?></td>
                        <td><?php echo $row['bb']; ?></td>
                        <td><?php echo $row['tb']; ?></td>
                        <td><?php echo $row['usia']; ?></td>
                        <td><?php echo $row['aktivitas_fisik']; ?></td>
                        <td><?php echo $row['bmr']; ?></td>
                        <td><?php echo $row['tee']; ?></td>
                        <td><?php echo $row['protein']; ?></td>
                        <td><?php echo $row['lemak']; ?></td>
                        <td><?php echo $row['karbohidrat']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div>
        <a href="detail_user.php?id=<?php echo $user_id; ?>" class="btn btn-primary">Kembali</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>