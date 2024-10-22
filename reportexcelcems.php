<?php
include_once "proses/koneksi.php"; 
$kon = new Koneksi(); 

$startDate = new DateTime($_GET['filterStartDate'] . ' ' . $_GET['filterStartTime']); 
$endDate = new DateTime($_GET['filterEndDate'] . ' ' . $_GET['filterEndTime']); 

// Ubah format ke 'd-m-y H:i:s' 
$startDateFormatted = $startDate->format('d-m-y H:i:s'); 
$endDateFormatted = $endDate->format('d-m-y H:i:s'); 

// Query untuk mengambil data dari tb_cems1 
$abc = $kon->kueri("SELECT id, co, nh3, no2, dust, co2, no, voltage, datetime FROM tb_cems1 WHERE datetime BETWEEN '$startDateFormatted' AND '$endDateFormatted' ORDER BY id DESC"); 

require 'assets\PHPExcel-1.8\Classes\PHPExcel.php'; // Ganti dengan path ke PHPExcel.php 

// Buat objek PHPExcel 
$objPHPExcel = new PHPExcel(); 
$sheet = $objPHPExcel->getActiveSheet(); 

// Tambahkan judul 
$sheet->setCellValue('A1', 'Laporan Hasil CEMS 1'); 
$sheet->mergeCells('A1:I1'); // Menggabungkan sel untuk judul
$sheet->getStyle('A1')->getFont()->setBold(true); // Teks tebal
$sheet->getStyle('A1')->getFont()->setSize(16); // Ukuran font lebih besar
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Rata tengah

// Tambahkan header kolom 
$sheet->setCellValue('A2', 'No Urut'); 
$sheet->setCellValue('B2', 'Datetime'); 
$sheet->setCellValue('C2', 'CO'); 
$sheet->setCellValue('D2', 'NH3'); 
$sheet->setCellValue('E2', 'NO2'); 
$sheet->setCellValue('F2', 'Dust'); 
$sheet->setCellValue('G2', 'CO2'); 
$sheet->setCellValue('H2', 'NO'); 
$sheet->setCellValue('I2', 'Voltage'); 

// Inisialisasi variabel untuk menghitung rata-rata 
$sum_co = $sum_nh3 = $sum_no2 = $sum_dust = $sum_co2 = $sum_no = $sum_voltage = 0; 
$count = 0; 
$row = 3; // Mulai dari baris ketiga untuk data 

// Loop untuk memasukkan data ke Excel 
$no_urut = 1; 
while ($data = $kon->hasil_data($abc)) { 
    $sheet->setCellValue('A' . $row, $no_urut); // Nomor urut 
    $sheet->setCellValue('B' . $row, $data['datetime']); // Datetime 
    $sheet->setCellValue('C' . $row, $data['co']); 
    $sheet->setCellValue('D' . $row, $data['nh3']); 
    $sheet->setCellValue('E' . $row, $data['no2']); 
    $sheet->setCellValue('F' . $row, $data['dust']); 
    $sheet->setCellValue('G' . $row, $data['co2']); 
    $sheet->setCellValue('H' . $row, $data['no']); 
    $sheet->setCellValue('I' . $row, $data['voltage']); 

    // Hitung total untuk rata-rata 
    $sum_co += $data['co']; 
    $sum_nh3 += $data['nh3']; 
    $sum_no2 += $data['no2']; 
    $sum_dust += $data['dust']; 
    $sum_co2 += $data['co2']; 
    $sum_no += $data['no']; 
    $sum_voltage += $data['voltage']; 

    $count++; 
    $row++; 
    $no_urut++; // Increment nomor urut 
} 

// Hitung rata-rata jika ada data 
$avg_co = $count > 0 ? $sum_co / $count : 0; 
$avg_nh3 = $count > 0 ? $sum_nh3 / $count : 0; 
$avg_no2 = $count > 0 ? $sum_no2 / $count : 0; 
$avg_dust = $count > 0 ? $sum_dust / $count : 0; 
$avg_co2 = $count > 0 ? $sum_co2 / $count : 0; 
$avg_no = $count > 0 ? $sum_no / $count : 0; 
$avg_voltage = $count > 0 ? $sum_voltage / $count : 0; 

// Tambahkan baris rata-rata di akhir 
$sheet->setCellValue('A' . $row, 'Rata-rata'); 
$sheet->setCellValue('C' . $row, $avg_co); 
$sheet->setCellValue('D' . $row, $avg_nh3); 
$sheet->setCellValue('E' . $row, $avg_no2); 
$sheet->setCellValue('F' . $row, $avg_dust); 
$sheet->setCellValue('G' . $row, $avg_co2); 
$sheet->setCellValue('H' . $row, $avg_no); 
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
$filename = 'reportCEMS-' . date('Y-m-d_H-i-s') . '.xlsx'; 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
header('Content-Disposition: attachment; filename="' . $filename . '"'); 
header('Cache-Control: max-age=0'); 

// Menyimpan ke output 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
$objWriter->save('php://output'); 
exit; 
?>
