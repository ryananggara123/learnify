<?php
session_start();
// 1. Koneksi ke Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_learnify"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. Ambil data dari form login.php
if (isset($_POST['login_id'])) {
    $login_id = mysqli_real_escape_string($conn, $_POST['login_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // 3. Cek apakah yang diketik itu Email ATAU NISN
    // Kita cek ke kolom 'email' atau kolom 'nisn' di tabel users
    $query  = "SELECT * FROM users WHERE email = '$login_id' OR nisn = '$login_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // 4. Cek Password (disini kita pakai cek teks biasa dulu sesuai kodingan awalmu)
        if ($password == $row['password']) {
            // Login Berhasil! Set Session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama']    = $row['nama'];
            $_SESSION['nisn']    = $row['nisn'];

            header("Location: dashboard.php");
            exit;
        } else {
            // Password salah
            echo "<script>alert('Password salah!'); window.location='login.php';</script>";
        }
    } else {
        // Akun tidak ditemukan
        echo "<script>alert('NISN atau Email tidak terdaftar!'); window.location='login.php';</script>";
    }
}
?>