<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// PENTING UNTUK VERCEL: Pulihkan session dari Cookie Backup jika memori serverless ter-reset
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['nama'] = $_COOKIE['nama'] ?? '';
}

// PROTEKSI HALAMAN: Jika session tetap tidak ada, tendang ke rute bersih
if(!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

// Panggil koneksi database Anda selanjutnya...
include "koneksi.php";
$id_login = $_SESSION['user_id'];

// 1. Ambil status apakah user sudah pernah membaca halaman ini atau belum
$cek_status = mysqli_query($koneksi, "SELECT status_baca_cp FROM users WHERE id = '$id_login'");
$data_user = mysqli_fetch_assoc($cek_status);

// 2. Jika status_baca_cp masih 0 (baru pertama kali membaca)
if(isset($data_user['status_baca_cp']) && $data_user['status_baca_cp'] == 0) {
    // Tambah 50 XP dan kunci status menjadi 1
    mysqli_query($koneksi, "UPDATE users SET xp = xp + 50, status_baca_cp = 1 WHERE id = '$id_login'");
    // Siapkan pesan notifikasi
    $_SESSION['pesan_xp_cp'] = "Selamat! Kamu mendapatkan +50 XP karena telah membaca Capaian Pembelajaran.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capaian Pembelajaran - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="css/capaian_pembelajaran.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        
        <?php if(isset($_SESSION['pesan_xp_cp'])): ?>
            <div class="xp-alert">
                <i class="fas fa-check-circle"></i> <?php echo $_SESSION['pesan_xp_cp']; ?>
            </div>
            <?php unset($_SESSION['pesan_xp_cp']); ?>
        <?php endif; ?>

        <div class="cp-card">
            <div class="cp-header">
                <div class="header-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div>
                    <h1>Capaian Pembelajaran Aljabar & Fungsi</h1>
                    <span class="cp-fase">Fase E (Kelas X SMA/SMK)</span>
                </div>
            </div>
            
            <div class="cp-content">
                <div class="content-text">
                    <i class="fas fa-info-circle info-icon"></i>
                    <p>Di akhir fase E, peserta didik dapat menggeneralisasi sifat-sifat operasi bilangan berpangkat (eksponen) dan logaritma, serta menggunakan barisan dan deret. Mereka dapat menyelesaikan masalah yang berkaitan dengan sistem persamaan linear tiga variabel, sistem pertidaksamaan linear dua variabel, fungsi kuadrat, dan fungsi eksponensial.</p>
                </div>
                
                <h2 class="section-title">Kompentensi Utama:</h2>
                <div class="grid-competence">
                    <div class="comp-item">
                        <i class="fas fa-superscript comp-icon" style="color: #4facfe;"></i>
                        <p>Menggeneralisasi sifat-sifat operasi <strong>bilangan berpangkat (eksponen) dan logaritma</strong>.</p>
                    </div>
                    <div class="comp-item">
                        <i class="fas fa-sort-numeric-up comp-icon" style="color: #43e97b;"></i>
                        <p>Menerapkan konsep <strong>barisan dan deret</strong> aritmetika dan geometri.</p>
                    </div>
                    <div class="comp-item">
                        <i class="fas fa-equals comp-icon" style="color: #fa709a;"></i>
                        <p>Menyelesaikan masalah <strong>sistem persamaan linear dua variabel (SPLDV)</strong> dengan metode eliminasi, substitusi, dan grafik.</p>
                    </div>
                    <div class="comp-item">
                        <i class="fas fa-code-branch comp-icon" style="color: #06b6d4;"></i>
                        <p>Menyelesaikan masalah <strong>sistem persamaan linear tiga variabel (SPLTV)</strong>.</p>
                    </div>
                    <div class="comp-item">
                        <i class="fas fa-greater-than-equal comp-icon" style="color: #f59e0b;"></i>
                        <p>Menyelesaikan masalah <strong>sistem pertidaksamaan linear dua variabel</strong>.</p>
                    </div>
                    <div class="comp-item">
                        <i class="fas fa-chart-area comp-icon" style="color: #8b5cf6;"></i>
                        <p>Menginterpretasi dan menggunakan karakteristik <strong>fungsi kuadrat</strong> dan grafiknya.</p>
                    </div>
                    <div class="comp-item">
                        <i class="fas fa-chart-line comp-icon" style="color: #FF9A9E;"></i>
                        <p>Menginterpretasi dan menggunakan karakteristik <strong>fungsi eksponensial</strong> dan grafiknya.</p>
                    </div>
                </div>
            </div>
            
            <div class="cp-footer">
                <a href="/dashboard" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>