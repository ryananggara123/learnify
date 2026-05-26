<?php
$host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      
$db_name = "learnify"; 
$username_db = "25qhFyHYwoJyP7o.root";   
$password_db = "i9dMXmsOdQGUmhkh";
$port = 4000;                

$koneksi = mysqli_init();

// Mengaktifkan SSL opsional agar diizinkan masuk ke server TiDB Cloud
mysqli_ssl_set($koneksi, NULL, NULL, NULL, NULL, NULL); 

// Melakukan koneksi dengan flag SSL khusus Vercel
if (!mysqli_real_connect($koneksi, $host, $username_db, $password_db, $db_name, $port, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT)) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>