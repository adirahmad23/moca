<?php
include_once "proses/koneksi.php";
$kon = new Koneksi();
$startDate = new DateTime($_GET['filterStartDate'] . ' ' . $_GET['filterStartTime']);
$endDate = new DateTime($_GET['filterEndDate'] . ' ' . $_GET['filterEndTime']);

// Ubah format ke 'd-m-y H:i:s'
$startDateFormatted = $startDate->format('d-m-y H:i:s');
$endDateFormatted = $endDate->format('d-m-y H:i:s');

// Query untuk mengambil data dari tb_aq1
$abc = $kon->kueri("SELECT id, humi, temp, co2, nox, nh3, dust, voltage, datetime
          FROM tb_aq1
          WHERE datetime BETWEEN '$startDateFormatted' AND '$endDateFormatted'
          ORDER BY id DESC");

require 'assets\PHPExcel-1.8\Classes\PHPExcel.php'; // Ganti dengan path ke PHPExcel.php

// Buat objek PHPExcel
$objPHPExcel = new PHPExcel();
$sheet = $objPHPExcel->getActiveSheet();

// Tambahkan header kolom
$sheet->setCellValue('A1', 'No Urut');
$sheet->setCellValue('B1', 'Datetime');
$sheet->setCellValue('C1', 'Humidity');
$sheet->setCellValue('D1', 'Temperature');
$sheet->setCellValue('E1', 'CO2');
$sheet->setCellValue('F1', 'NOx');
$sheet->setCellValue('G1', 'NH3');
$sheet->setCellValue('H1', 'Dust');
$sheet->setCellValue('I1', 'Voltage');

// Inisialisasi variabel untuk menghitung rata-rata
$sum_humi = $sum_temp = $sum_co2 = $sum_nox = $sum_nh3 = $sum_dust = $sum_voltage = 0;
$count = 0;
$row = 2; // Mulai dari baris kedua untuk data

// Loop untuk memasukkan data ke Excel
$no_urut = 1;
while ($data = $kon->hasil_data($abc)) {
    $sheet->setCellValue('A' . $row, $no_urut); // Nomor urut
    $sheet->setCellValue('B' . $row, $data['datetime']); // Datetime
    $sheet->setCellValue('C' . $row, $data['humi']);
    $sheet->setCellValue('D' . $row, $data['temp']);
    $sheet->setCellValue('E' . $row, $data['co2']);
    $sheet->setCellValue('F' . $row, $data['nox']);
    $sheet->setCellValue('G' . $row, $data['nh3']);
    $sheet->setCellValue('H' . $row, $data['dust']);
    $sheet->setCellValue('I' . $row, $data['voltage']);

    // Hitung total untuk rata-rata
    $sum_humi += $data['humi'];
    $sum_temp += $data['temp'];
    $sum_co2 += $data['co2'];
    $sum_nox += $data['nox'];
    $sum_nh3 += $data['nh3'];
    $sum_dust += $data['dust'];
    $sum_voltage += $data['voltage'];

    $count++;
    $row++;
    $no_urut++; // Increment nomor urut
}

// Hitung rata-rata
$avg_humi = $sum_humi / $count;
$avg_temp = $sum_temp / $count;
$avg_co2 = $sum_co2 / $count;
$avg_nox = $sum_nox / $count;
$avg_nh3 = $sum_nh3 / $count;
$avg_dust = $sum_dust / $count;
$avg_voltage = $sum_voltage / $count;

// Tambahkan baris rata-rata di akhir
$sheet->setCellValue('A' . $row, 'Rata-rata');
$sheet->setCellValue('C' . $row, $avg_humi);
$sheet->setCellValue('D' . $row, $avg_temp);
$sheet->setCellValue('E' . $row, $avg_co2);
$sheet->setCellValue('F' . $row, $avg_nox);
$sheet->setCellValue('G' . $row, $avg_nh3);
$sheet->setCellValue('H' . $row, $avg_dust);
$sheet->setCellValue('I' . $row, $avg_voltage);

// Terapkan gaya pada baris rata-rata
$sheet->getStyle('A' . $row . ':I' . $row)->applyFromArray([
    'fill' => [
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => ['rgb' => '000000'], // Warna hitam
    ],
    'font' => [
        'bold' => true,
        'color' => ['rgb' => 'FFFFFF'], // Teks putih
    ],
]);

// Mengatur nama file dengan tanggal dan waktu sekarang
$filename = 'report-' . date('Y-m-d_H-i-s') . '.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Menyimpan ke output
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
