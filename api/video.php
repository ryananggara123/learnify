<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Pulihkan session
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['nama'] = $_COOKIE['nama'] ?? '';
}

require_once 'koneksi.php';

// Ganti bagian pengambilan data di video.php dengan ini:
$sql = "SELECT * FROM videos"; 
$query_video = mysqli_query($koneksi, $sql);

if (!$query_video) {
    die("Error Database: " . mysqli_error($koneksi)); // Jika ini muncul, berarti nama tabel salah
}

if (mysqli_num_rows($query_video) > 0) {
    while ($row = mysqli_fetch_assoc($query_video)) {
        // DEBUG: Print data untuk melihat nama kolom yang benar
        // echo "<pre>"; print_r($row); echo "</pre>"; 
        
        $judul = $row['judul'] ?? 'Tanpa Judul'; // Pastikan 'judul' sesuai nama kolom
        $url = $row['url'] ?? '';               // Pastikan 'url' sesuai nama kolom
        
        // ... tampilkan video ...
    }
} else {
    echo "Database kosong. Pastikan Anda sudah mengisi tabel 'videos' di TiDB Cloud.";
}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Pembelajaran - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/video.css">
</head>
<body>

    <div class="header">
        <div style="display: flex; align-items: center; gap: 15px; flex: 1;">
            <img src="assets/img/logo.png" alt="Logo" style="max-height: 50px; width: auto;">
            <div style="flex: 1;">
                <h1>Video Pembelajaran Matematika</h1>
                
                <!-- Search Bar Video -->
                <form action="video.php" method="GET" class="search-form-video">
                    <div class="search-bar-video">
                        <i class="fas fa-search"></i>
                        <input 
                            type="text" 
                            name="q" 
                            placeholder="Cari video..." 
                            value="<?= htmlspecialchars($searchQuery) ?>"
                            autocomplete="off"
                        >
                        <?php if ($searchQuery !== ''): ?>
                            <a href="video.php" class="search-clear" title="Hapus pencarian">
                                <i class="fas fa-times"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </form>
                
                <?php if ($searchQuery !== ''): ?>
                    <p class="search-summary">Hasil pencarian untuk: <strong><?= htmlspecialchars($searchQuery) ?></strong></p>
                <?php endif; ?>
            </div>
        </div>
        <a href="dashboard.php" class="btn-back">&laquo; Kembali ke Dashboard</a>
    </div>

    <div class="grid-video">
        <?php 
        if (!empty($searchQuery) && empty($videoList)) {
            echo "<div style='text-align:center; padding:50px; width:100%; color:#64748b;'>Tidak ada video yang cocok dengan pencarian Anda.</div>";
        } elseif (!empty($videoList)) {
            foreach ($videoList as $row) {
                // Ambil data dengan aman
                $judul = isset($row['judul_video']) ? $row['judul_video'] : 'Tanpa Judul';
                $url_asli = isset($row['url_youtube']) ? trim($row['url_youtube']) : '';
                $url_siap_putar = '';

                // Logika konversi link YouTube + Otomatis Menyisipkan API Pendeteksi
                if (!empty($url_asli)) {
                    if (strpos($url_asli, 'embed/') !== false) {
                        $url_siap_putar = $url_asli . (strpos($url_asli, '?') !== false ? "&" : "?") . "enablejsapi=1";
                    } elseif (strpos($url_asli, 'youtu.be/') !== false) {
                        $pecah = explode('youtu.be/', $url_asli);
                        $id_video = isset($pecah[1]) ? explode('?', $pecah[1])[0] : '';
                        if(!empty($id_video)) $url_siap_putar = "https://www.youtube.com/embed/" . $id_video . "?enablejsapi=1";
                    } elseif (strpos($url_asli, 'watch?v=') !== false) {
                        $pecah = explode('watch?v=', $url_asli);
                        $id_video = isset($pecah[1]) ? explode('&', $pecah[1])[0] : '';
                        if(!empty($id_video)) $url_siap_putar = "https://www.youtube.com/embed/" . $id_video . "?enablejsapi=1";
                    } else {
                        $url_siap_putar = $url_asli . (strpos($url_asli, '?') !== false ? "&" : "?") . "enablejsapi=1";
                    }
                }
        ?>
                <div class="card-video">
                    <h2><?php echo htmlspecialchars($judul); ?></h2>
                    <div class="video-container">
                        <?php if (!empty($url_siap_putar)): ?>
                            <iframe 
                                class="yt-player"
                                width="100%" 
                                height="315" 
                                src="<?php echo htmlspecialchars($url_siap_putar); ?>" 
                                title="<?php echo htmlspecialchars($judul); ?>" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                referrerpolicy="strict-origin-when-cross-origin" 
                                allowfullscreen>
                            </iframe>
                        <?php else: ?>
                            <div style="padding: 40px 20px; text-align: center; background: #fee2e2; color: #ef4444; border-radius: 8px;">
                                <strong>Oops!</strong><br>Link video kosong atau formatnya tidak dikenali.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
        <?php 
            }
        } elseif ($searchQuery === '') {
            echo "<div style='text-align:center; padding:50px; width:100%; color:#64748b;'>Belum ada video pembelajaran yang ditambahkan ke database.</div>";
        }
        ?>
    </div>

    <script src="/js/video.js"></script>
</body>
</html>