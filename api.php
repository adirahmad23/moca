<?php
// session_start();
include_once "proses/koneksi.php";
$kon = new Koneksi();

// Prepare data for aqi
$aqi1 = $kon->kueri("SELECT * FROM tb_aq1 ORDER BY id DESC LIMIT 1");
$aqi2 = $kon->kueri("SELECT * FROM tb_aq2 ORDER BY id DESC LIMIT 1");
$aqi3 = $kon->kueri("SELECT * FROM tb_aq3 ORDER BY id DESC LIMIT 1");

// Prepare data for cems
$cems1 = $kon->kueri("SELECT * FROM tb_cems1 ORDER BY id DESC LIMIT 1");
$cems2 = $kon->kueri("SELECT * FROM tb_cems2 ORDER BY id DESC LIMIT 1");
$cems3 = $kon->kueri("SELECT * FROM tb_cems3 ORDER BY id DESC LIMIT 1");

//kondisi peta
$kondisi = $kon->kueri("SELECT * FROM tb_kondisipeta WHERE id = '1' ORDER BY id DESC LIMIT 1");
$kondisicems = $kon->kueri("SELECT * FROM tb_kondisipeta WHERE id = '2' ORDER BY id DESC LIMIT 1");

// $mataangin = $_SESSION['arahangin']; // Data dari sesi

$data = array();

// Process aqi data
$data['aqi1'] = array();
while ($row = $kon->hasil_data($aqi1)) {
    $data['aqi1'][] = array(
        "date" => $row['datetime'],
        "dust" => $row['dust'] . " µg/m³",
        "temp" => $row['temp'] . " °C",
        "humi" => $row['humi'] . " %",
        "co2" => $row['co2'],
        "nh3" => $row['nh3'] . " ppm",
        "nox" => $row['nox'] . " ppb",
    );
}

$data['aqi2'] = array();
while ($row = $kon->hasil_data($aqi2)) {
    $data['aqi2'][] = array(
        "date" => $row['datetime'],
        "dust" => $row['dust'] . " µg/m³",
        "temp" => $row['temp'] . " °C",
        "humi" => $row['humi'] . " %",
        "co2" => $row['co2'],
        "nh3" => $row['nh3'] . " ppm",
        "nox" => $row['nox'] . " ppb",
    );
}

$data['aqi3'] = array();
while ($row = $kon->hasil_data($aqi3)) {
    $data['aqi3'][] = array(
        "date" => $row['datetime'],
        "dust" => $row['dust'] . " µg/m³",
        "temp" => $row['temp'] . " °C",
        "humi" => $row['humi'] . " %",
        "co2" => $row['co2'],
        "nh3" => $row['nh3'] . " ppm",
        "nox" => $row['nox'] . " ppb",
    );
}

// Process cems data
$data['cems1'] = array();
while ($row = $kon->hasil_data($cems1)) {
    $data['cems1'][] = array(
        "date" => $row['datetime'],
        "dust" => $row['dust'] . " µg/m³",
        "co" => $row['co'] . " CO",
        "no2" => $row['no2'] . " NO2",
        "co2" => $row['co2'],
        "nh3" => $row['nh3'] . " ppm",
        "no" => $row['no'] . " ppb",
    );
}

$data['cems2'] = array();
while ($row = $kon->hasil_data($cems2)) {
    $data['cems2'][] = array(
        "date" => $row['datetime'],
        "dust" => $row['dust'] . " µg/m³",
        "co" => $row['co'] . " CO",
        "no2" => $row['no2'] . " NO2",
        "co2" => $row['co2'],
        "nh3" => $row['nh3'] . " ppm",
        "no" => $row['no'] . " ppb",
    );
}

$data['cems3'] = array();
while ($row = $kon->hasil_data($cems3)) {
    $data['cems3'][] = array(
        "date" => $row['datetime'],
        "dust" => $row['dust'] . " µg/m³",
        "co" => $row['co'] . " CO",
        "no2" => $row['no2'] . " NO2",
        "co2" => $row['co2'],
        "nh3" => $row['nh3'] . " ppm",
        "no" => $row['no'] . " ppb",
    );
}

$data['kondisi'] = array();
while ($row = $kon->hasil_data($kondisi)) {
    $data['kondisi'][] = array(
        "area1" => $row['area1'],
        "area2" => $row['area2'],
        "area3" => $row['area3'],

    );
}

// $data['kondisicems'] = array();
// while ($row = $kon->hasil_data($kondisicems)) {
//     // Dapatkan nilai arahangin dari database
//     $arahangin = $row['area1'];
    
//     // Buat pengkondisian berdasarkan arahangin
//     // if ($arahangin === $mataangin) {
//     //     $peringatan = 'bahaya';
//     // } else {
//     //     $peringatan = 'normal';
//     // }

//     // // Tambahkan hasil ke dalam array kondisicems
//     // $data['kondisicems'][] = array(
//     //     "arahangin" => $arahangin,
//     //     "peringatan" => $peringatan, // Tambahkan peringatan ke dalam array
//     // );
// }


// Return data in JSON format
echo json_encode($data);
