<?php
session_start();
include "koneksi.php";

// Jika menerima sinyal bahwa video selesai ditonton
if(isset($_POST['video_selesai']) && isset($_SESSION['user_id'])) {
    $id_login = $_SESSION['user_id'];
    // Tambah 50 XP
    mysqli_query($koneksi, "UPDATE users SET xp = xp + 50 WHERE id = '$id_login'");
    echo "sukses"; // Balasan untuk JavaScript
    exit; // Stop proses halaman agar tidak reload semua HTML
}
?>
<?php
// Panggil koneksi dan class (Pastikan letak foldernya benar)
require_once (__DIR__ . '/config/Database.php');
require_once (__DIR__ . '/classes/Video.php');

$database = new Database();
$db = $database->getConnection();
$video = new Video($db);

$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
$searchQueryLower = mb_strtolower($searchQuery, 'UTF-8');
$stmt = $video->readAll();
$videoList = [];
if ($stmt && $stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($searchQuery === '' || stripos($row['judul_video'], $searchQuery) !== false) {
            $videoList[] = $row;
        }
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

    <script src="js/video.js"></script>
</body>
</html>