<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Pulihkan session
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['nama'] = $_COOKIE['nama'] ?? '';
}

if(!isset($_SESSION['user_id'])) {
    header("Location: /login");
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/koneksi.php';
// Ganti baris pemanggilan dengan ini
$path_soal = $_SERVER['DOCUMENT_ROOT'] . '/includes/bank_soal.php';

if (file_exists($path_soal)) {
    require_once $path_soal;
    // PENTING: Jika variabel tetap tidak ditemukan, mungkin didefinisikan di dalam fungsi atau scope lain
    if (!isset($bank_kuis)) {
        die("Fatal Error: File bank_soal.php ditemukan, TAPI variabel \$bank_kuis tidak ada di dalamnya. Buka file bank_soal.php dan pastikan kodenya dimulai dengan: \$bank_kuis = [...];");
    }
} else {
    die("Fatal Error: File bank_soal.php tidak ditemukan di path: " . $path_soal);
}
// Fungsi untuk menghitung grade berdasarkan total XP
function calculateGradeFromXP($totalXp) {
    if ($totalXp >= 1200) {
        return 'A+';
    } elseif ($totalXp >= 601) {
        return 'B';
    } elseif ($totalXp >= 201) {
        return 'C';
    } else {
        return 'E';
    }
}

$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
$filteredKuis = [];
foreach ($bank_kuis as $id => $data) {
    if ($searchQuery === '' || stripos($data['judul'], $searchQuery) !== false) {
        $filteredKuis[$id] = $data;
    }
}

// Inisialisasi variabel
$score = null;
$current_question = isset($_POST['current_question']) ? (int)$_POST['current_question'] : 0;
$id_kuis = isset($_POST['id_kuis']) || isset($_GET['kuis']) ? (isset($_POST['id_kuis']) ? $_POST['id_kuis'] : $_GET['kuis']) : null;

// Jika mulai kuis baru, reset session
if(isset($_GET['kuis']) && !isset($_POST['current_question'])) {
    $_SESSION['quiz_answers'] = [];
    $_SESSION['current_kuis'] = $_GET['kuis'];
    $id_kuis = $_GET['kuis'];
    $current_question = 0;
}

// Jika ada POST dari form, simpan jawaban
if(isset($_POST['submit_answer']) && isset($_POST['answer'])) {
    if(!isset($_SESSION['quiz_answers'])) {
        $_SESSION['quiz_answers'] = [];
    }
    $_SESSION['quiz_answers'][$current_question] = $_POST['answer'];
    $_SESSION['current_kuis'] = $id_kuis;
}

// Handle tombol Sebelumnya
if(isset($_POST['prev_question'])) {
    $current_question = max(0, $current_question - 1);
}

// Handle tombol Selanjutnya
if(isset($_POST['next_question'])) {
    if(!isset($_SESSION['quiz_answers'])) {
        $_SESSION['quiz_answers'] = [];
    }
    if(isset($_POST['answer'])) {
        $_SESSION['quiz_answers'][$current_question] = $_POST['answer'];
    }
    $current_question++;
}

// Handle submit kuis (soal terakhir)
if(isset($_POST['submit_kuis']) && isset($_POST['answer'])) {
    if(!isset($_SESSION['quiz_answers'])) {
        $_SESSION['quiz_answers'] = [];
    }
    $_SESSION['quiz_answers'][$current_question] = $_POST['answer'];
    
    $soal_kuis = $bank_kuis[$id_kuis]['soal'];
    $jawaban_benar = 0;
    $total_soal = count($soal_kuis);

    if($total_soal > 0) {
        foreach($soal_kuis as $index => $data) {
            if(isset($_SESSION['quiz_answers'][$index]) && $_SESSION['quiz_answers'][$index] == $data['k']) {
                $jawaban_benar++;
            }
        }
        $correctAnswers = $jawaban_benar;
        $score = round(($jawaban_benar / $total_soal) * 100);
        $earnedXp = $jawaban_benar * 10;

        // Nilai kuis (untuk feedback kepada siswa)
        if($score >= 90) {
            $quiz_grade = 'A';
            $result_class = 'excellent';
            $result_message = 'Luar biasa! Kamu siap lanjut ke materi berikutnya.';
        } elseif($score >= 75) {
            $quiz_grade = 'B';
            $result_class = 'good';
            $result_message = 'Bagus! Tingkatkan sedikit lagi untuk hasil yang sempurna.';
        } elseif($score >= 60) {
            $quiz_grade = 'C';
            $result_class = 'good';
            $result_message = 'Bagus! Tingkatkan sedikit lagi untuk hasil yang sempurna.';
        } elseif($score >= 45) {
            $quiz_grade = 'D';
            $result_class = 'needs-improve';
            $result_message = 'Jangan menyerah! Coba kembali dan pelajari lagi materinya.';
        } else {
            $quiz_grade = 'E';
            $result_class = 'needs-improve';
            $result_message = 'Jangan menyerah! Coba kembali dan pelajari lagi materinya.';
        }

        $user_id = intval($_SESSION['user_id']);
        $userData = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT xp, badge FROM users WHERE id = '$user_id'"));
        $currentXp = isset($userData['xp']) ? (int) $userData['xp'] : 0;
        $currentBadge = isset($userData['badge']) ? (int) $userData['badge'] : 0;

        $newXp = $currentXp + $earnedXp;
        $newBadge = $currentBadge + ($score >= 80 ? 1 : 0);
        
        // Hitung grade berdasarkan total XP baru
        $grade = calculateGradeFromXP($newXp);

        mysqli_query($koneksi, "UPDATE users SET xp = '$newXp', grade = '$grade', badge = '$newBadge' WHERE id = '$user_id'");
        $_SESSION['xp'] = $newXp;
        $_SESSION['grade'] = $grade;
        $_SESSION['badge'] = $newBadge;
        
        // Hapus data sesi kuis setelah selesai
        unset($_SESSION['quiz_answers']);
        unset($_SESSION['current_kuis']);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluasi Aljabar - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="css/evaluasi.css">
</head>
<body>

    <div class="container">
        <div class="header">
            <div>
                <h1><i class="fas fa-tasks"></i> Evaluasi Aljabar</h1>
                <p class="intro-text">Pilih kuis yang ingin kamu kerjakan, kumpulkan jawaban cepat, dan lihat hasilnya langsung.</p>
                
                <!-- Search Bar Evaluasi -->
                <form action="evaluasi.php" method="GET" class="search-form-evaluasi">
                    <div class="search-bar-evaluasi">
                        <i class="fas fa-search"></i>
                        <input 
                            type="text" 
                            name="q" 
                            placeholder="Cari paket kuis..." 
                            value="<?= htmlspecialchars($searchQuery) ?>"
                            autocomplete="off"
                        >
                        <?php if ($searchQuery !== ''): ?>
                            <a href="evaluasi.php" class="search-clear" title="Hapus pencarian">
                                <i class="fas fa-times"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </form>

                <?php if ($searchQuery !== ''): ?>
                    <p class="search-summary">Hasil pencarian untuk: <strong><?= htmlspecialchars($searchQuery) ?></strong></p>
                <?php endif; ?>
            </div>
            <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Dashboard</a>
        </div>

        <div class="card">
            <?php if($score !== null): ?>
                <div class="hasil-box <?= $result_class ?>">
                    <div class="hasil-header">
                        <i class="fas fa-chart-line"></i>
                        <div>
                            <span>Hasil Evaluasi</span>
                            <strong><?= $bank_kuis[$_POST['id_kuis']]['judul'] ?></strong>
                        </div>
                    </div>
                    <div class="hasil-body">
                        <div class="result-ring">
                            <span><?= $score ?><small>%</small></span>
                        </div>
                        <div class="result-summary">
                            <p class="hasil-text"><?= $result_message ?></p>
                            <p class="result-detail"><strong><?= $correctAnswers ?>/<?= $total_soal ?></strong> jawaban benar</p>
                            <p class="result-detail"><strong>+<?= $earnedXp ?> XP</strong> didapatkan</p>
                        </div>
                    </div>
                    <a href="evaluasi.php" class="btn-submit btn-secondary">
                        <i class="fas fa-list"></i> Kembali ke Daftar Kuis
                    </a>
                </div>

            <?php elseif($id_kuis && isset($bank_kuis[$id_kuis])): 
                $data_kuis = $bank_kuis[$id_kuis];
                $soal_kuis = $data_kuis['soal'];
                $total_soal = count($soal_kuis);
                $soal_saat_ini = $soal_kuis[$current_question];
                $jawaban_sebelumnya = isset($_SESSION['quiz_answers'][$current_question]) ? $_SESSION['quiz_answers'][$current_question] : '';
            ?>
                <h2 class="section-title"><?= $data_kuis['judul'] ?></h2>
                
                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-text">
                        <span>Soal <strong><?= $current_question + 1 ?></strong> dari <strong><?= $total_soal ?></strong></span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?= (($current_question + 1) / $total_soal) * 100 ?>%"></div>
                    </div>
                </div>

                <form action="evaluasi.php" method="POST" class="form-soal">
                    <input type="hidden" name="id_kuis" value="<?= $id_kuis ?>">
                    <input type="hidden" name="current_question" value="<?= $current_question ?>">
                    
                    <!-- Soal -->
                    <div class="soal-box">
                        <h3><?= ($current_question + 1) . ". " . $soal_saat_ini['t'] ?></h3>
                        <div class="opsi-container">
                            <?php foreach($soal_saat_ini['o'] as $abjad => $teks_opsi): ?>
                                <label class="opsi-label">
                                    <input type="radio" name="answer" value="<?= $abjad ?>" <?= $jawaban_sebelumnya === $abjad ? 'checked' : '' ?> required>
                                    <span><?= strtoupper($abjad) ?>) <?= $teks_opsi ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="button-group">
                        <?php if($current_question > 0): ?>
                            <button type="submit" name="prev_question" class="btn-nav btn-prev">
                                <i class="fas fa-arrow-left"></i> Sebelumnya
                            </button>
                        <?php endif; ?>

                        <div class="spacer"></div>

                        <?php if($current_question < $total_soal - 1): ?>
                            <button type="submit" name="next_question" class="btn-nav btn-next">
                                Selanjutnya <i class="fas fa-arrow-right"></i>
                            </button>
                        <?php else: ?>
                            <button type="submit" name="submit_kuis" class="btn-submit">
                                <i class="fas fa-paper-plane"></i> Selesai & Kumpulkan
                            </button>
                        <?php endif; ?>
                    </div>
                </form>
            <?php else: ?>
                <h2 class="section-title section-center">Pilih Paket Kuis</h2>
                <?php if ($searchQuery !== '' && empty($filteredKuis)): ?>
                    <div class="empty-search">Tidak ada kuis yang cocok dengan pencarian Anda.</div>
                <?php endif; ?>
                <div class="grid-kuis">
                    <?php foreach($filteredKuis as $id => $data): ?>
                        <a href="/evaluasi?kuis=<?= $id ?>" class="kuis-item">
                            <i class="fas fa-file-alt"></i>
                            <h4><?= $data['judul'] ?></h4>
                            <small><?= count($data['soal']) ?> Soal · Cepat & interaktif</small>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>