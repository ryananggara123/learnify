<?php
$host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      
$db_name = "learnify"; 
$username_db = "25qhFyHYwoJyP7o.root";   
$password_db = "i9dMXmsOdQGUmhkh";
$port = 4000;                

// 1. MATIKAN mode Strict Exception bawaan PHP 8+ agar Vercel tidak mudah crash (Error 500)
mysqli_report(MYSQLI_REPORT_OFF); 

$koneksi = mysqli_init();

// 2. Aktifkan koneksi aman (SSL) karena TiDB Cloud mewajibkannya
mysqli_ssl_set($koneksi, NULL, NULL, NULL, NULL, NULL); 

// 3. Gunakan flag MYSQLI_CLIENT_SSL standar yang pasti dikenali oleh serverless Vercel
$koneksi_berhasil = mysqli_real_connect(
    $koneksi, 
    $host, 
    $username_db, 
    $password_db, 
    $db_name, 
    $port, 
    NULL, 
    MYSQLI_CLIENT_SSL
);

// 4. Tangani error dengan rapi jika server database sedang sibuk
if (!$koneksi_berhasil) {
    die("Sistem gagal terhubung ke Database. Silakan muat ulang halaman. " . mysqli_connect_error());
}
?>