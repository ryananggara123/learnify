<?php
$host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      // Sama dengan yang di atas
$user = "25qhFyHYwoJyP7o.root";       // Sama dengan yang di atas
$pass = "i9dMXmsOdQGUmhkh";       
$db   = "learnify";       
$port = 4000;                  // Port wajib TiDB

// Inisialisasi MySQLi
$koneksi = mysqli_init();

// Wajib menambahkan konfigurasi SSL/TLS untuk TiDB Serverless
mysqli_ssl_set($koneksi, NULL, NULL, NULL, NULL, NULL);

// Eksekusi koneksi menggunakan mysqli_real_connect (bukan mysqli_connect biasa)
mysqli_real_connect($koneksi, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>