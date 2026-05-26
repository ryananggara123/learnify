<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Hapus semua data Session
$_SESSION = array();
session_unset();
session_destroy();

// 2. Hapus Cookie Backup dari browser dengan path global '/'
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, '/');
}
if (isset($_COOKIE['nama'])) {
    setcookie('nama', '', time() - 3600, '/');
}

// 3. Alihkan ke rute login bersih
header("Location: /login");
exit;
?>