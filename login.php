<?php
include 'koneksi.php';
session_start();

// Cek apakah cookie remembered_username sudah diset
if(isset($_COOKIE['remembered_username'])) {
    $remembered_username = $_COOKIE['remembered_username'];
} else {
    $remembered_username = '';
}

if(isset($_COOKIE['remembered_password'])) {
    $remembered_password = $_COOKIE['remembered_password'];
} else {
    $remembered_password = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mom's Plate</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Font Roboto */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        /* Konten Form */
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            animation: fadeInDown 1s;
        }

        .login-container h3 {
            font-size: 2.0rem;
            margin-bottom: 30px;
            
        }

        .login-container .form-group label {
            font-weight: 500;
        }

        .login-container .form-control {
            border-radius: 20px;
        }

        .login-container .btn-primary {
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
        }

        .login-container .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
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
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container login-container">
    <h3 class="text-center">Mom's Plate</h3>
    <form action="proses_login.php" method="post">
        <div class="form-group">
            <label for="inputUsername"><i class="fas fa-user"></i> Username</label>
            <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Masukkan username Anda" value="<?php echo $remembered_username; ?>" required>
        </div>
        <div class="form-group">
            <label for="inputPassword"><i class="fas fa-lock"></i> Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Masukkan kata sandi Anda" value="<?php echo $remembered_password; ?>"required>
                <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <i class="fas fa-eye-slash"></i>
            </button>
        </div>
            </div>
        </div>
        
        <!-- Pesan kesalahan -->
        <?php if(isset($_SESSION['login_error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['login_error']; ?>
            </div>
            <?php
            // Hapus pesan kesalahan dari session setelah ditampilkan
            unset($_SESSION['login_error']);
            ?>
        <?php endif; ?>
        <div class="form-group form-check">
        <?php if(isset($_COOKIE['remembered']) && $_COOKIE['remembered'] === 'true'): ?>
            <input type="checkbox" class="form-check-input" id="rememberCheckbox" name="remember" checked>
        <?php else: ?>
            <input type="checkbox" class="form-check-input" id="rememberCheckbox" name="remember">
        <?php endif; ?>
        <label class="form-check-label" for="rememberCheckbox">Ingat Kata Sandi</label>
    </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    <div class="text-center mt-3">
        Belum punya akun? <a href="register.php">Silakan Daftar</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Mendapatkan referensi elemen input password dan tombol toggle
    const passwordInput = document.getElementById('inputPassword');
    const togglePasswordButton = document.getElementById('togglePassword');
    const rememberCheckbox = document.getElementById('rememberCheckbox');

    // Cek apakah checkbox sebelumnya sudah dicentang
    if (localStorage.getItem('remembered') === 'true') {
        rememberCheckbox.checked = true;
    }

    // Menambahkan event listener untuk mengubah tipe input password
    togglePasswordButton.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Mengubah ikon sesuai dengan tipe input
        this.querySelector('i').classList.toggle('fa-eye-slash');
        this.querySelector('i').classList.toggle('fa-eye');
    });

    // Menambahkan event listener untuk checkbox
    rememberCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Jika checkbox dicentang, set cookie untuk menyimpan statusnya
            localStorage.setItem('remembered', 'true');
        } else {
            // Jika checkbox tidak dicentang, hapus cookie yang menyimpan statusnya
            localStorage.removeItem('remembered');
        }
    });
});
</script>



</body>
</html>
