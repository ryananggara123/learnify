<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// PERBAIKAN: Gunakan rute bersih Vercel tanpa ekstensi .php
if(!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

$id_login = $_SESSION['user_id'];
$xp = 0;
$streak = 0;
$user_data = [];

// Gunakan koneksi PDO TiDB Cloud yang stabil dan aman dari cache Vercel
try {
    $host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      
    $db_name = "learnify"; 
    $username_db = "25qhFyHYwoJyP7o.root";   
    $password_db = "i9dMXmsOdQGUmhkh";
    $port = "4000";                
    
    $dsn = "mysql:host=$host;port=$port;dbname=$db_name";
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => true, 
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );
    
    $db = new PDO($dsn, $username_db, $password_db, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil data user secara real-time dari TiDB Cloud
    $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id_login, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        // Ambil XP dan Streak asli dari database cloud
        $xp = isset($user_data['xp']) ? (int) $user_data['xp'] : 0;
        $streak = isset($user_data['streak']) ? (int) $user_data['streak'] : 0;
    }
} catch (PDOException $e) {
    // Tulis log jika error agar tidak merusak UI HTML
    error_log("Gagal mengambil data user dari TiDB: " . $e->getMessage());
}

// Logika Badge Dinamis: Setiap 200 XP dapat 1 Badge
$badge = floor($xp / 200); 
$progress = $xp > 0 ? min(100, intval($xp / 1500 * 100)) : 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

    <div class="bg-blob blob-1"></div>
    <div class="bg-blob blob-2"></div>
    <div class="bg-blob blob-3"></div>
    <div class="bg-blob blob-4"></div>
    <div class="bg-blob blob-5"></div>
    <div class="bg-blob blob-6"></div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="sidebar" id="sidebar">
<div class="sidebar-header">
    <img src="assets/img/logo.png" alt="Learnify Logo" class="sidebar-logo">
    <i class="fas fa-times close-btn" id="closeSidebar"></i>
</div>
        <ul class="nav-links">
            <li><a href="dashboard.php" class="active"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="profil.php"><i class="fas fa-user"></i> Profil Saya</a></li>
            <li><a href="logout.php" style="color: #ef4444;"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
        </ul>
    </aside>

    <main class="main-wrapper">
        
        <header class="topbar">
            <div class="hamburger" id="hamburgerBtn">
                <i class="fas fa-bars"></i>
            </div>
            
            <div class="daily-tip-card">
                <i class="fas fa-lightbulb"></i>
                <span id="dailyTip">Tip: Belajar secara konsisten 15 menit sehari lebih baik dari 2 jam sekali seminggu!</span>
            </div>

            <?php
                $avatar_src = "https://ui-avatars.com/api/?name=" . urlencode($_SESSION['nama']) . "&background=4a90e2&color=fff";
                if (!empty($user_data['foto']) && file_exists($user_data['foto'])) {
                    $avatar_src = $user_data['foto'];
                }
            ?>
            <a href="profil.php" class="user-info" title="Lihat Profil">
                <span style="font-weight: 500; color: #64748b;">Halo, <?= htmlspecialchars($_SESSION['nama']) ?>!</span>
                <img src="<?= htmlspecialchars($avatar_src) ?>" alt="User Avatar">
            </a>
        </header>

        <section class="announcement-banner">
    <div class="announcement-badge">
        <i class="fas fa-bullhorn"></i> INFO UTAMA
    </div>
    <div class="marquee-container">
        <div class="marquee-text">
            Selamat datang kembali di Learnify, <strong><?= htmlspecialchars($_SESSION['nama']) ?></strong>! ✨ Selesaikan target kuis mingguanmu hari ini dan kumpulkan poin XP tambahan untuk menaikkan predikat belajarmu! Tetap semangat dan selamat belajar! 🔥
        </div>
    </div>
</section>

        <div class="stats-banner">
            <div class="stat-card">
                <i class="fas fa-fire" style="color: #f59e0b;"></i>
                <div>
                    <h3><?= $streak ?> Hari</h3>
                    <p>Belajar Beruntun</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-trophy" style="color: #10b981;"></i>
                <div>
                    <h3><?= $xp ?> XP</h3>
                    <p>Total Poin Belajar</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-award" style="color: #8b5cf6;"></i>
                <div>
                    <h3><?= $badge ?></h3>
                    <p>Badge Tersimpan</p>
                </div>
            </div>
            <div class="stat-card">
                <i class="fas fa-star" style="color: #fbbf24;"></i>
                <div>
                    <h3><?= $progress ?>%</h3>
                    <p>Target Mingguan</p>
                </div>
            </div>
        </div>

        <h2 class="section-title">Aplikasi Pembelajaran</h2>
        
        <div class="menu-grid">
            <div class="menu-card">
                <div class="card-visual" style="background: linear-gradient(135deg, #FF9A9E 0%, #FECFEF 100%);">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="card-content">
                    <h3>Capaian Pembelajaran</h3>
                    <p>Lihat target dan kompetensi yang harus kamu kuasai di fase E.</p>
                    <a href="capaian_pembelajaran.php" class="card-action"><i class="fas fa-info-circle"></i> Lihat Detail</a>
                </div>
            </div>

            <div class="menu-card">
                <div class="card-visual" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-content">
                    <h3>Materi Aljabar</h3>
                    <p>5 bab komprehensif: mulai dari aljabar dasar hingga Sistem Persamaan Linear Dua Variabel (SPLDV).</p>
                    <a href="materi.php" class="card-action"><i class="fas fa-play"></i> Mulai Belajar</a>
                </div>
            </div>

            <div class="menu-card">
                <div class="card-visual" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="fas fa-video"></i>
                </div>
                <div class="card-content">
                    <h3>Video Pembelajaran</h3>
                    <p>Tonton penjelasan konsep matematika aljabar dengan animasi menarik.</p>
                    <a href="video.php" class="card-action"><i class="fas fa-play-circle"></i> Tonton</a>
                </div>
            </div>

            <div class="menu-card">
                <div class="card-visual" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <i class="fas fa-gamepad"></i>
                </div>
                <div class="card-content">
                    <h3>Evaluasi & Kuis</h3>
                    <p>Uji pemahamanmu dengan kuis interaktif aljabar dan dapatkan skor.</p>
                    <a href="evaluasi.php" class="card-action"><i class="fas fa-laptop-code"></i> Kerjakan</a>
                </div>
            </div>

           <div class="menu-card">
    <div class="card-visual" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <i class="fas fa-question-circle"></i>
    </div>
    <div class="card-content">
        <h3>Pusat Bantuan</h3>
        <p>Butuh bantuan atau panduan sistem? Klik di sini.</p>
        <a href="bantuan.php" class="card-action"><i class="fas fa-info-circle"></i> Buka Bantuan</a>
    </div>
</div>
    </main>

    <script src="js/dashboard.js"></script>
</body>
</html>