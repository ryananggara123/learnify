<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_learnify");

if (isset($_POST['nama'])) {
    $nama     = $_POST['nama'];
    $nisn     = $_POST['nisn'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah NISN sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE nisn = '$nisn'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NISN sudah terdaftar!'); window.location='register.php';</script>";
    } else {
        $query = "INSERT INTO users (nama, nisn, email, password, xp, grade, badge) VALUES ('$nama', '$nisn', '$email', '$password', 0, 'E', 0)";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Pendaftaran Berhasil! Silakan Login.'); window.location='login.php';</script>";
        }
    }
}
?>