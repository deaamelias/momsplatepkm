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
            padding-top: 80px;
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

<section id="registration">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-container">
                    <h2 class="text-center form-title">Pendaftaran Akun</h2>
                    <form action="proses_pendaftaran.php" method="post">
                        <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Masukkan username" required>
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
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Buat kata sandi" required>
                        </div>
                        <div class="form-group">
                            <label for="inputConfirmPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Ulangi kata sandi" required>
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
                            <input type="number" class="form-control" id="inputJumlahAnak" name="inputJumlahAnak" placeholder="Jumlah anak yang dimiliki">
                        </div>
                        <div class="form-group">
                            <label for="inputParitas">Paritas</label>
                            <input type="text" class="form-control" id="inputParitas" name="inputParitas" placeholder="Paritas">
                        </div>
                        <div class="form-group">
                            <label for="inputUsiaKehamilan">Usia Kehamilan</label>
                            <input type="text" class="form-control" id="inputUsiaKehamilan" name="inputUsiaKehamilan" placeholder="Usia kehamilan Anda">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
