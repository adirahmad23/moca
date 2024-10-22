<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'assets/email/vendor/autoload.php';

date_default_timezone_set('Asia/Jakarta'); // Set timezone Jakarta
$currentDate = date('d-m-Y'); // Format: 01-10-2024
$currentTime = date('H:i:s'); // Format: 13:07:00

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     // Enable verbose debug output
    $mail->isSMTP();                                           // Send using SMTP
    $mail->Host       = 'moca-emission.id';                    // Set the SMTP server to send through (ganti dengan server SMTP)
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = 'moca@moca-emission.id';              // SMTP username (ganti dengan email Anda)
    $mail->Password   = 'samarendah03';                       // SMTP password (ganti dengan password Anda)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           // Enable TLS encryption; 'PHPMailer::ENCRYPTION_STARTTLS' also accepted
    $mail->Port       = 465;                                   // TCP port to connect to (ganti jika server Anda menggunakan port lain)

    // Recipients
    $mail->setFrom('moca@moca-emission.id', 'Admin-Moca');        // Email pengirim
    $mail->addAddress('mainulyaqin2109@gmail.com', 'Ainul');   // Tambahkan penerima (ganti dengan email penerima)

    // Content
    $mail->isHTML(true);                                       // Set email format to HTML
    $mail->Subject = 'Peringatan Bahaya';                      // Subjek email
    $mail->Body    = "---PERINGATAN BAHAYA---<br>"
                   . "Tanggal : $currentDate<br>"
                   . "Waktu   : $currentTime<br><br>"
                   . "Wilayah anda sedang mengalami kenaikan kadar CO2 di udara. "
                   . "Diharapkan untuk memakai masker dan mengurangi kegiatan di luar ruangan.<br><br>"
                   . "Terima Kasih,<br>"
                   . "moca-emission.id";                      // Isi pesan dalam format HTML
    // $mail->AltBody = 'This is a simple test email using PHPMailer.'; // Isi pesan dalam format teks biasa (untuk klien email yang tidak mendukung HTML)

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
