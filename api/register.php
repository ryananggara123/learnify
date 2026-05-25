<?php
session_start();

if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

require_once (__DIR__ . '/config/Database.php');
require_once (__DIR__ . '/classes/User.php');

$pesan_error = "";
$pesan_sukses = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    $user->nama = htmlspecialchars(strip_tags($_POST['nama']));
    $user->nisn = htmlspecialchars(strip_tags($_POST['nisn']));
    $user->email = htmlspecialchars(strip_tags($_POST['email']));
    $password_mentah = $_POST['password'];

    if (empty($user->nama) || empty($user->nisn) || empty($user->email) || empty($password_mentah)) {
        $pesan_error = "Semua kolom wajib diisi!";
    } else {
        if ($user->emailExists()) {
            $pesan_error = "Email sudah terdaftar. Silakan gunakan email lain atau login.";
        } else {
            // PERUBAHAN DI SINI: Password tidak di-hash, simpan aslinya
            $user->password = $password_mentah; 
            
            $user->xp = 0;
            $user->grade = 'F'; 
            $user->badge = 0;

            if ($user->register()) {
                $pesan_sukses = "Registrasi berhasil! Silakan masuk.";
            } else {
                $pesan_error = "Terjadi kesalahan sistem, pendaftaran gagal.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

    <div class="auth-card">
        <img src="assets/img/logo.png" alt="Learnify Logo" class="auth-logo">
        
        <h2>Buat Akun Baru</h2>
        <p>Daftarkan dirimu untuk akses penuh pembelajaran</p>

        <?php if(!empty($pesan_error)): ?>
            <div style="background: #fee2e2; color: #ef4444; padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 14px; text-align: center;">
                <?php echo $pesan_error; ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($pesan_sukses)): ?>
            <div style="background: #d1fae5; color: #059669; padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 14px; text-align: center;">
                <?php echo $pesan_sukses; ?>
                <br><a href="login.php" style="color: #059669; font-weight: bold; text-decoration: underline;">Klik di sini untuk login</a>
            </div>
        <?php endif; ?>

        <form action="" method="POST" id="registerForm">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label>NISN</label>
                <input type="text" name="nisn" placeholder="Masukkan NISN" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan alamat email" required>
            </div>
            
            <div class="form-group">
                <label>Kata Sandi</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" placeholder="Buat kata sandi baru" required>
                    <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                </div>
            </div>
            
            <button type="submit" class="btn-submit" id="btnRegister">Daftar Sekarang</button>
        </form>

        <div class="auth-links">
            Sudah punya akun? <a href="login.php">Masuk di sini</a>
        </div>
    </div>

    <script src="js/register.js"></script>
</body>
</html>