<?php
include_once "proses/koneksi.php";
$kon = new Koneksi();

// Fetch data from the tb_aq1 table
$sqlAQ1 = $kon->kueri("SELECT `id`, `humi`, `temp`, `co2`, `nox`, `nh3`, `dust`, `voltage`, `datetime` FROM `tb_aq1` WHERE 1");
$dataAQ1 = array();
while ($row = $kon->hasil_data($sqlAQ1)) {
    $formatted_date = date('H:i:s', strtotime($row['datetime']));
    $dataAQ1[] = array(
        "id" => $row['id'],
        "datetime" => $row['datetime'],
        "humidity" => $row['humi'],
        "temperature" => $row['temp'],
        "co2" => $row['co2'],
        "nox" => $row['nox'],
        "nh3" => $row['nh3'],
        "dust" => $row['dust'],
        "voltage" => $row['voltage']
    );
}

// Fetch data from the tb_cems1 table
$sqlCEMS1 = $kon->kueri("SELECT `id`, `co`, `nh3`, `no2`, `dust`, `co2`, `no`, `voltage`, `datetime` FROM `tb_cems1` WHERE 1");
$dataCEMS1 = array();
while ($row = $kon->hasil_data($sqlCEMS1)) {
    $formatted_date = date('H:i:s', strtotime($row['datetime']));
    $dataCEMS1[] = array(
        "id" => $row['id'],
        "datetime" => $row['datetime'],
        "co" => $row['co'],
        "nh3" => $row['nh3'],
        "no2" => $row['no2'],
        "dust" => $row['dust'],
        "co2" => $row['co2'],
        "no" => $row['no'],
        "voltage" => $row['voltage']
    );
}

// Combine both data arrays
$response = array(
    "aq1" => $dataAQ1,
    "cems1" => $dataCEMS1
);

// Return data in JSON format
header('Content-Type: application/json'); // Set the header for JSON response
echo json_encode($response);
?>
