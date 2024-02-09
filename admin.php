<?php
// Mulai session
session_start();

// Periksa apakah pengguna telah login sebagai admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    // Jika tidak, redirect ke halaman login
    header("Location: index.php");
    exit();
}

// Include file koneksi ke database
include 'koneksi.php';

$query = "SELECT * FROM users WHERE role = 'user'";
$result = $conn->query($query);

// Mengecek apakah ada pengguna yang ditemukan
if ($result->num_rows > 0) {
    // Jika ada, simpan data pengguna ke dalam array
    $users = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Jika tidak ada pengguna, inisialisasi array kosong
    $users = [];
}


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
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section id="hero" class="py-5 text-center" style="margin-top: 60px;">
<div class="container">
    <h1 class="mb-4">Dashboard Admin</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td>
                            <a href="detail_user.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                            <a href="hapus_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
