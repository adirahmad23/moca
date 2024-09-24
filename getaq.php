<?php
include_once "proses/koneksi.php";

// Membuat instance dari kelas Koneksi
$kon = new Koneksi();

// Mendapatkan waktu lokal Jakarta (WIB) dengan format dd-mm-yy H:i:s
date_default_timezone_set('Asia/Jakarta'); // Set timezone Jakarta
$currentDateTime = date('d-m-y H:i:s');

// Mengecek apakah semua parameter GET ada
if (isset($_GET['humidity']) && isset($_GET['temperature']) && isset($_GET['co2']) && isset($_GET['nh3']) && isset($_GET['nox']) && isset($_GET['dust']) && isset($_GET['volt'])) {
    $humidity = $_GET['humidity'];
    $temperature = $_GET['temperature'];
    $co2 = $_GET['co2'];
    $nh3 = $_GET['nh3'];
    $nox = $_GET['nox'];
    $dust = $_GET['dust'];
    $voltage = $_GET['volt'];

    // Menyimpan data ke tabel tb_aq1 dengan timestamp
    $query = "INSERT INTO tb_aq1 (`humidity`, `temperature`, `co2`, `nh3`, `nox`, `dust`, `voltage`, `datetime`) VALUES ('$humidity', '$temperature', '$co2', '$nh3', '$nox', '$dust', '$voltage', '$currentDateTime')";
    $result = $kon->kueri($query);
    
    // Mengecek apakah query berhasil dieksekusi
    if ($result) {
        echo "Sukses";
    } else {
        echo "Gagal: " . $kon->error(); // Menampilkan pesan kesalahan jika query gagal
    }
} else {
    echo "Parameter tidak lengkap";
}
?>
