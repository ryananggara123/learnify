<?php
$host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      // Sama dengan yang di atas
$user = "25qhFyHYwoJyP7o.root";       // Sama dengan yang di atas
$pass = "i9dMXmsOdQGUmhkh";       
$db   = "learnify";       
$port = 4000;                  // Port wajib TiDB

$koneksi = mysqli_init();
mysqli_ssl_set($koneksi, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect($koneksi, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>