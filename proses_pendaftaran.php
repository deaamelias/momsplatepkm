<?php
include 'koneksi.php';

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi inputan form
    $username = $_POST['inputUsername'];
    $nama = $_POST['inputNama'];
    $email = $_POST['inputEmail'];
    $telepon = $_POST['inputTelepon'];
    $password = hash('sha256', $_POST['inputPassword']); // Hashing password menggunakan SHA-256
    $role = 'user'; // Tentukan role pengguna
    $riwayat_penyakit = isset($_POST['inputRiwayatPenyakit']) && !empty($_POST['inputRiwayatPenyakit']) ? $_POST['inputRiwayatPenyakit'] : '-';
    $riwayat_alergi = isset($_POST['inputRiwayatAlergi']) && !empty($_POST['inputRiwayatAlergi']) ? $_POST['inputRiwayatAlergi'] : '-';
    $jumlah_anak = $_POST['inputJumlahAnak'];
    $usia_kehamilan = $_POST['inputUsiaKehamilan'];
   
    // Query SQL untuk memeriksa apakah username sudah ada di database
    $check_username_sql = "SELECT * FROM users WHERE username = ?";
    
    // Persiapkan statement
    $check_stmt = $conn->prepare($check_username_sql);
    if ($check_stmt) {
        // Bind parameter ke statement
        $check_stmt->bind_param("s", $username);
        
        // Eksekusi statement
        if ($check_stmt->execute()) {
            // Simpan hasil query dalam variabel
            $check_stmt->store_result();
            
            // Jika username sudah ada, tampilkan pesan kesalahan
            if ($check_stmt->num_rows > 0) {
                echo "<script>alert('Username sudah digunakan, silakan pilih username lain'); window.location.href = 'register.php';</script>";
            } else {
                // Jika username belum ada, lanjutkan dengan proses pendaftaran
                // Query SQL untuk menyimpan data pengguna ke database
                $register_sql = "INSERT INTO users (username, nama, email, telepon, password, riwayat_penyakit, riwayat_alergi, jumlah_anak, usia_kehamilan, role) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
                // Persiapkan statement
                $register_stmt = $conn->prepare($register_sql);
                if ($register_stmt) {
                    // Bind parameter ke statement
                    $register_stmt->bind_param("ssssssssss", $username, $nama, $email, $telepon, $password, $riwayat_penyakit, $riwayat_alergi, $jumlah_anak, $usia_kehamilan, $role);
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $register_stmt['id'];

                    // Eksekusi statement
                    if ($register_stmt->execute()) {
                        // Jika pendaftaran berhasil, langsung redirect ke dashboard.php
                        header("Location: dashboard.php");
                        exit(); // Pastikan tidak ada output lain sebelum header
                    } else {
                        echo "Error: " . $register_stmt->error;
                    }
            
                    // Tutup statement
                    $register_stmt->close();
                } else {
                    echo "Error: " . $conn->error;
                }
            }
            
        } else {
            echo "Error: " . $check_stmt->error;
        }

        // Tutup statement
        $check_stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>
