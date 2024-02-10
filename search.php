<?php
// Include file koneksi ke database
include 'koneksi.php';

// Periksa apakah ada input pencarian yang dikirimkan
if(isset($_POST['search_query'])) {
    // Tangkap nilai pencarian dari form
    $searchQuery = $_POST['search_query'];

    // Query SQL untuk mencari informasi dari tabel diabetes_gestasional berdasarkan judul atau deskripsi
    $query = "SELECT judul, gambar, deskripsi FROM diabetes_gestasional WHERE judul LIKE '%$searchQuery%' OR deskripsi LIKE '%$searchQuery%'";
    $result = $conn->query($query);

    // Periksa apakah terdapat data yang ditemukan
    if ($result->num_rows > 0) {
        // Loop melalui setiap baris data
        while($row = $result->fetch_assoc()) {
            // Tampilkan informasi dalam sebuah card
            echo '<div class="row mb-4">
            <div class="col-md-12">
                    <div class="info-container">
                        <div class="info-content">
                            <h3 class="mb-4">' . $row['judul'] . '</h3>
                            <div class="float-left mr-4">
                                <img src="' . $row['gambar'] . '" alt="' . $row['judul'] . '" class="info-img" style="max-width: 150px;">
                            </div>
                            <div class="info-text">
                                <p>' . $row['deskripsi'] . '</p>
                                <p>Informasi lebih lanjut mengenai diabetes bisa ditemukan <a href="informasi.php">di sini</a>.</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>';
        }
    } else {
        // Jika tidak ada data yang ditemukan
        echo '<div class="col-md-12 mb-4">
                <div class="info-container">
                    <p class="text-center">Tidak ada informasi yang ditemukan.</p>
                </div>
            </div>';
    }
} else {
    // Jika tidak ada input pencarian
    echo '<div class="col-md-12 mb-4">
            <div class="info-container">
                <p class="text-center">Tidak ada hasil pencarian.</p>
            </div>
        </div>';
}

// Tutup koneksi database
$conn->close();
?>
