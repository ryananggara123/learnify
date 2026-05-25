<?php
session_start();
if(!isset($_SESSION['user_id'])) { 
    header("Location: login.php"); 
    exit; 
}

$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
$searchQueryLower = mb_strtolower($searchQuery, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Aljabar - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="css/materi.css">
</head>
<body>

    <nav class="navbar">
        <a href="dashboard.php" class="brand"><i class="fas fa-graduation-cap"></i> Learnify</a>
        <div class="navbar-subtitle">Modul Aljabar</div>
    </nav>

    <div class="container">
        <div class="header-section">
            <h1>Topik Pembelajaran</h1>
            <p>Pilih sub-bab aljabar yang ingin kamu kuasai hari ini.</p>
            <?php if ($searchQuery !== ''): ?>
                <p class="search-summary">Hasil pencarian untuk: <strong><?= htmlspecialchars($searchQuery) ?></strong></p>
            <?php endif; ?>
        </div>

        <div class="materi-list">
            <?php if ($searchQuery === '' || stripos('1. Mengenal Bentuk Aljabar Penjelasan tentang variabel, koefisien, dan konstanta.', $searchQuery) !== false): ?>
                <a href="isi_materi.php?bab=1" class="materi-item">
                    <div class="materi-info">
                        <div class="icon-circle"><i class="fas fa-square-root-variable"></i></div>
                        <div class="title-text">
                            <h3>1. Mengenal Bentuk Aljabar</h3>
                            <p>Penjelasan tentang variabel, koefisien, dan konstanta.</p>
                        </div>
                    </div>
                    <div class="btn-mulai">Pelajari <i class="fas fa-chevron-right"></i></div>
                </a>
            <?php endif; ?>

            <?php if ($searchQuery === '' || stripos('2. Operasi Hitung Aljabar Cara menjumlahkan dan mengurangkan suku-suku sejenis.', $searchQuery) !== false): ?>
                <a href="isi_materi.php?bab=2" class="materi-item">
                    <div class="materi-info">
                        <div class="icon-circle"><i class="fas fa-plus-minus"></i></div>
                        <div class="title-text">
                            <h3>2. Operasi Hitung Aljabar</h3>
                            <p>Cara menjumlahkan dan mengurangkan suku-suku sejenis.</p>
                        </div>
                    </div>
                    <div class="btn-mulai">Pelajari <i class="fas fa-chevron-right"></i></div>
                </a>
            <?php endif; ?>

            <?php if ($searchQuery === '' || stripos('3. Perkalian & Pembagian Teknik perkalian silang dan pembagian bersusun aljabar.', $searchQuery) !== false): ?>
                <a href="isi_materi.php?bab=3" class="materi-item">
                    <div class="materi-info">
                        <div class="icon-circle"><i class="fas fa-calculator"></i></div>
                        <div class="title-text">
                            <h3>3. Perkalian & Pembagian</h3>
                            <p>Teknik perkalian silang dan pembagian bersusun aljabar.</p>
                        </div>
                    </div>
                    <div class="btn-mulai">Pelajari <i class="fas fa-chevron-right"></i></div>
                </a>
            <?php endif; ?>

            <?php if ($searchQuery === '' || stripos('4. Persamaan Linear Menyelesaikan masalah matematika dengan satu variabel.', $searchQuery) !== false): ?>
                <a href="isi_materi.php?bab=4" class="materi-item">
                    <div class="materi-info">
                        <div class="icon-circle"><i class="fas fa-equals"></i></div>
                        <div class="title-text">
                            <h3>4. Persamaan Linear</h3>
                            <p>Menyelesaikan masalah matematika dengan satu variabel.</p>
                        </div>
                    </div>
                    <div class="btn-mulai">Pelajari <i class="fas fa-chevron-right"></i></div>
                </a>
            <?php endif; ?>

            <?php if ($searchQuery === '' || stripos('5. Sistem Persamaan Linear Dua Variabel Metode eliminasi, substitusi, dan grafik untuk SPLDV.', $searchQuery) !== false): ?>
                <a href="isi_materi.php?bab=5" class="materi-item">
                    <div class="materi-info">
                        <div class="icon-circle"><i class="fas fa-code-branch"></i></div>
                        <div class="title-text">
                            <h3>5. Sistem Persamaan Linear Dua Variabel</h3>
                            <p>Metode eliminasi, substitusi, dan grafik untuk SPLDV.</p>
                        </div>
                    </div>
                    <div class="btn-mulai">Pelajari <i class="fas fa-chevron-right"></i></div>
                </a>
            <?php endif; ?>
        </div>

        <?php if ($searchQuery !== '' &&
                  stripos('1. Mengenal Bentuk Aljabar Penjelasan tentang variabel, koefisien, dan konstanta.', $searchQuery) === false &&
                  stripos('2. Operasi Hitung Aljabar Cara menjumlahkan dan mengurangkan suku-suku sejenis.', $searchQuery) === false &&
                  stripos('3. Perkalian & Pembagian Teknik perkalian silang dan pembagian bersusun aljabar.', $searchQuery) === false &&
                  stripos('4. Persamaan Linear Menyelesaikan masalah matematika dengan satu variabel.', $searchQuery) === false &&
                  stripos('5. Sistem Persamaan Linear Dua Variabel Metode eliminasi, substitusi, dan grafik untuk SPLDV.', $searchQuery) === false): ?>
            <div class="empty-search">Tidak ada materi yang cocok dengan pencarian Anda.</div>
        <?php endif; ?>

        <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali ke Menu Utama</a>
    </div>

</body>
</html>