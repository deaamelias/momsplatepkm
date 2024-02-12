<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            
        }
        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .form-title {
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
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

<section id="registration" style="margin-top: 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-container">
                    <h2 class="text-center form-title">Pendaftaran Akun</h2>
                    <form action="proses_pendaftaran.php" method="post">
                    <div class="form-group">
    <label for="inputUsername">Username</label>
    <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Masukkan username" required minlength="3">
</div>
<div class="form-group">
    <label for="inputNama">Nama Lengkap</label>
    <input type="text" class="form-control" id="inputNama" name="inputNama" placeholder="Masukkan nama lengkap Anda" required>
</div>
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Masukkan alamat email Anda" required>
</div>
<div class="form-group">
    <label for="inputTelepon">Nomor Telepon</label>
    <input type="tel" class="form-control" id="inputTelepon" name="inputTelepon" placeholder="Masukkan nomor telepon Anda" required>
</div>
<div class="form-group">
    <label for="inputPassword">Password</label>
    <div class="input-group">
        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Buat kata sandi" required minlength="8">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <i class="fas fa-eye-slash"></i>
            </button>
        </div>
    </div>
    <small id="passwordHelp" class="form-text text-muted">Password harus memiliki minimal 8 karakter.</small>
</div>
<div class="form-group">
    <label for="inputConfirmPassword">Konfirmasi Password</label>
    <div class="input-group">
        <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Ulangi kata sandi" required minlength="8">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                <i class="fas fa-eye-slash"></i>
            </button>
        </div>
    </div>
    <small id="passwordHelp" class="form-text text-muted">Password harus memiliki minimal 8 karakter.</small>
</div>
<hr>
    <h4 class="mb-3">Data Diri</h4>
    <div class="form-group">
        <label for="inputRiwayatPenyakit">Riwayat Penyakit</label>
        <input type="text" class="form-control" id="inputRiwayatPenyakit" name="inputRiwayatPenyakit" placeholder="Riwayat penyakit Anda">
    </div>
    <div class="form-group">
        <label for="inputRiwayatAlergi">Riwayat Alergi</label>
        <input type="text" class="form-control" id="inputRiwayatAlergi" name="inputRiwayatAlergi" placeholder="Riwayat alergi Anda">
    </div>
    <div class="form-group">
        <label for="inputJumlahAnak">Jumlah Anak</label>
        <input type="number" class="form-control" id="inputJumlahAnak" name="inputJumlahAnak" placeholder="Jumlah anak yang dimiliki" min="0" required>
    </div>
    <div class="form-group">
        <label for="inputUsiaKehamilan">Usia Kehamilan (Bulan)</label>
        <input type="number" class="form-control" id="inputUsiaKehamilan" name="inputUsiaKehamilan" placeholder="Usia kehamilan Anda" min="1" max="12" required>
    </div>


                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </form>
                    <div class="text-center mt-3">
        Sudah punya akun? <a href="login.php">Silakan Login</a>
    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    // Mendapatkan referensi elemen input password dan tombol toggle
    const passwordInput = document.getElementById('inputPassword');
    const togglePasswordButton = document.getElementById('togglePassword');

    // Menambahkan event listener untuk mengubah tipe input password
    togglePasswordButton.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Mengubah ikon sesuai dengan tipe input
        this.querySelector('i').classList.toggle('fa-eye-slash');
        this.querySelector('i').classList.toggle('fa-eye');
    });
</script>

</body>
</html>
