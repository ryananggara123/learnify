<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Pulihkan session
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['nama'] = $_COOKIE['nama'] ?? '';
}

// 2. Panggil koneksi dengan Absolute Path agar aman di Vercel
require_once $_SERVER['DOCUMENT_ROOT'] . '/koneksi.php'; 

// 3. Tangkap kata kunci pencarian
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
$videoList = [];

// 4. Ambil data dari database
if ($koneksi) {
    $sql = "SELECT * FROM videos";
    if ($searchQuery !== '') {
        $search_safe = mysqli_real_escape_string($koneksi, $searchQuery);
        // Mendukung kolom bernama 'judul' atau 'judul_video'
        $sql .= " WHERE judul LIKE '%$search_safe%' OR judul_video LIKE '%$search_safe%'"; 
    }
    
    $query_video = mysqli_query($koneksi, $sql);
    
    if ($query_video) {
        // Simpan data ke array agar bisa dipakai di HTML bawah
        while ($row = mysqli_fetch_assoc($query_video)) {
            $videoList[] = $row;
        }
    } else {
        $db_error = mysqli_error($koneksi); // Simpan pesan error jika ada
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Pembelajaran - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/video.css"> </head>
<body>

    <div class="header">
        <div style="display: flex; align-items: center; gap: 15px; flex: 1;">
            <img src="/assets/img/logo.png" alt="Logo" style="max-height: 50px; width: auto;" onerror="this.style.display='none'">
            <div style="flex: 1;">
                <h1>Video Pembelajaran Matematika</h1>
                
                <form action="video.php" method="GET" class="search-form-video">
                    <div class="search-bar-video">
                        <i class="fas fa-search"></i>
                        <input type="text" name="q" placeholder="Cari video..." value="<?= htmlspecialchars($searchQuery) ?>" autocomplete="off">
                        <?php if ($searchQuery !== ''): ?>
                            <a href="video.php" class="search-clear" title="Hapus pencarian"><i class="fas fa-times"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                
                <?php if ($searchQuery !== ''): ?>
                    <p class="search-summary">Hasil pencarian untuk: <strong><?= htmlspecialchars($searchQuery) ?></strong></p>
                <?php endif; ?>
            </div>
        </div>
        <a href="/dashboard" class="btn-back">&laquo; Kembali ke Dashboard</a>
    </div>

    <div class="grid-video">
        <?php 
        // Jika query database error
        if (isset($db_error)) {
            echo "<div style='text-align:center; padding:20px; width:100%; color:#ef4444; background:#fee2e2;'>Error Database: " . htmlspecialchars($db_error) . "</div>";
        }
        // Jika hasil pencarian kosong
        elseif (!empty($searchQuery) && empty($videoList)) {
            echo "<div style='text-align:center; padding:50px; width:100%; color:#64748b;'>Tidak ada video yang cocok dengan pencarian Anda.</div>";
        } 
        // Jika data ada, tampilkan
        elseif (!empty($videoList)) {
            foreach ($videoList as $row) {
                // Antisipasi jika nama kolom di database adalah 'judul' atau 'judul_video'
                $judul = $row['judul_video'] ?? ($row['judul'] ?? 'Tanpa Judul');
                // Antisipasi jika nama kolom di database adalah 'url_youtube' atau 'url'
                $url_asli = trim($row['url_youtube'] ?? ($row['url'] ?? ''));
                $url_siap_putar = '';

                if (!empty($url_asli)) {
                    if (strpos($url_asli, 'embed/') !== false) {
                        $url_siap_putar = $url_asli . (strpos($url_asli, '?') !== false ? "&" : "?") . "enablejsapi=1";
                    } elseif (strpos($url_asli, 'youtu.be/') !== false) {
                        $id_video = explode('?', explode('youtu.be/', $url_asli)[1] ?? '')[0];
                        if(!empty($id_video)) $url_siap_putar = "https://www.youtube.com/embed/" . $id_video . "?enablejsapi=1";
                    } elseif (strpos($url_asli, 'watch?v=') !== false) {
                        $id_video = explode('&', explode('watch?v=', $url_asli)[1] ?? '')[0];
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
                            <iframe class="yt-player" width="100%" height="315" src="<?php echo htmlspecialchars($url_siap_putar); ?>" title="<?php echo htmlspecialchars($judul); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <?php else: ?>
                            <div style="padding: 40px 20px; text-align: center; background: #fee2e2; color: #ef4444; border-radius: 8px;">
                                <strong>Oops!</strong><br>Link video kosong atau format salah.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
        <?php 
            }
        } 
        // Jika tabel kosong dari awal
        else {
            echo "<div style='text-align:center; padding:50px; width:100%; color:#64748b;'>Belum ada video pembelajaran yang ditambahkan ke database.</div>";
        }
        ?>
    </div>

    <script src="/js/video.js"></script>
</body>
</html>