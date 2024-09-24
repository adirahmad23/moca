<?php
include_once "proses/koneksi.php";

// Membuat instance dari kelas Koneksi
$kon = new Koneksi();

// Mendapatkan waktu lokal Jakarta (WIB) dengan format dd-mm-yy H:i:s
date_default_timezone_set('Asia/Jakarta'); // Set timezone Jakarta
$currentDateTime = date('d-m-y H:i:s');

// Debug: Menampilkan semua parameter GET
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

// Mengecek apakah semua parameter GET ada
if (isset($_GET['co']) && isset($_GET['nh3']) && isset($_GET['no2']) && isset($_GET['co2']) && isset($_GET['dust']) && isset($_GET['no']) && isset($_GET['volt'])) {
    $co = $_GET['co'];
    $nh3 = $_GET['nh3'];
    $no2 = $_GET['no2'];
    $no = $_GET['no'];
    $dust = $_GET['dust'];
    $co2 = $_GET['co2'];
    $voltage = $_GET['volt'];

    // Menyimpan data ke tabel tb_sensor dengan timestamp
    $query = "INSERT INTO tb_cems1 (`co`, `nh3`, `no2`, `dust`, `co2`, `no`, `voltage`, `datetime`) VALUES ('$co', '$nh3', '$no2', '$dust', '$co2', '$no', '$voltage', '$currentDateTime')";
    $result = $kon->kueri($query);

    // Mengecek apakah query berhasil dieksekusi
    if ($result) {
        echo "Sukses";
    } else {
        echo "Gagal";
    }
} else {
    echo "Parameter tidak lengkap";
}
?>
