<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// PENTING UNTUK VERCEL: Pulihkan session dari Cookie Backup jika memori serverless ter-reset
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['nama'] = $_COOKIE['nama'] ?? '';
}

// 1. Proteksi Halaman (Gunakan pengalihan rute bersih /login sesuai vercel.json)
if (!isset($_SESSION['user_id'])) { 
    header("Location: /login");
    exit;
}

// 2. Ambil file koneksi database Anda selanjutnya...
include "koneksi.php";
$id_login = $_SESSION['user_id'];
$pesan_error = "";
$pesan_sukses = "";

// 4. Query data user
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id_login'");
$data  = mysqli_fetch_assoc($query);

// 5. Proses upload foto jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto_profil'])) {
    $file = $_FILES['foto_profil'];
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $max_size = 2 * 1024 * 1024; // 2 MB

    if ($file['error'] === UPLOAD_ERR_OK) {
        $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $check_image = @getimagesize($file['tmp_name']);

        if (!$check_image) {
            $pesan_error = "File harus berupa gambar JPG, PNG, GIF, atau WEBP.";
        } elseif (!in_array($file_ext, $allowed_ext)) {
            $pesan_error = "Ekstensi file tidak diperbolehkan. Gunakan JPG, PNG, GIF, atau WEBP.";
        } elseif ($file['size'] > $max_size) {
            $pesan_error = "Ukuran file terlalu besar. Maksimum 2MB.";
        } else {
            $upload_dir = "assets/img/avatars/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            $new_name = "avatar_user_{$id_login}_" . time() . "." . $file_ext;
            $target_path = $upload_dir . $new_name;

            if (move_uploaded_file($file['tmp_name'], $target_path)) {
                $old_foto = !empty($data['foto']) ? $data['foto'] : "";
                if ($old_foto && file_exists($old_foto) && strpos($old_foto, 'assets/img/avatars/default.png') === false) {
                    @unlink($old_foto);
                }

                $stmt = mysqli_prepare($koneksi, "UPDATE users SET foto = ? WHERE id = ?");
                mysqli_stmt_bind_param($stmt, "si", $target_path, $id_login);

                if (mysqli_stmt_execute($stmt)) {
                    $pesan_sukses = "Foto profil berhasil diunggah.";
                    $data['foto'] = $target_path;
                } else {
                    $pesan_error = "Gagal menyimpan data foto profil ke database.";
                    @unlink($target_path);
                }

                mysqli_stmt_close($stmt);
            } else {
                $pesan_error = "Terjadi kesalahan saat mengunggah file. Coba lagi.";
            }
        }
    } else {
        $pesan_error = "Silakan pilih file foto profil terlebih dahulu.";
    }
}

// 6. Ambil data asli yang sekarang SUDAH ADA di database!
$nama_user  = $data['nama']; 
$email_user = $data['email']; 
$nisn_user  = $data['nisn'];
$xp_user    = $data['xp'];     
$grade_user = $data['grade'];  
$badge_user = $data['badge'];  

// --- LOGIKA FOTO FIX & DINAMIS ---
$foto_dari_db = isset($data['foto']) ? $data['foto'] : "";

$foto_src = "https://ui-avatars.com/api/?name=" . urlencode($_SESSION['nama']) . "&background=4a90e2&color=fff";

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa - Learnify Premium</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link rel="stylesheet" href="css/profil.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="profile-card">
        <div class="profile-cover"></div>

        <div class="profile-content">
            <div class="avatar-container">
                <img src="<?php echo $foto_src; ?>" alt="Foto Profil Siswa">
                <label for="foto_profil" class="avatar-overlay" title="Ubah foto profil">
                    <i class="fa-solid fa-camera"></i>
                </label>
            </div>

            <h1><?php echo htmlspecialchars($nama_user); ?></h1>
            <span class="nisn-badge"><i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars($email_user); ?></span>

            <div class="stats-grid">
                <div class="stat-item">
                    <i class="fa-solid fa-bolt"></i>
                    <span class="stat-number"><?php echo htmlspecialchars($xp_user); ?></span>
                    <span class="stat-label">Poin XP</span>
                </div>
                <div class="stat-item">
                    <i class="fa-solid fa-award"></i>
                    <span class="stat-number"><?php echo htmlspecialchars($grade_user); ?></span>
                    <span class="stat-label">Grade</span>
                </div>
                <div class="stat-item">
                    <i class="fa-solid fa-medal"></i>
                    <span class="stat-number"><?php echo htmlspecialchars($badge_user); ?></span>
                    <span class="stat-label">Badge</span>
                </div>
            </div>

            <?php if (!empty($pesan_error)): ?>
                <div class="upload-message error"><?php echo htmlspecialchars($pesan_error); ?></div>
            <?php endif; ?>
            <?php if (!empty($pesan_sukses)): ?>
                <div class="upload-message success"><?php echo htmlspecialchars($pesan_sukses); ?></div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data" class="upload-form">
                <input type="file" id="foto_profil" name="foto_profil" accept=".jpg,.jpeg,.png,.gif,.webp" onchange="this.form.submit()" required>
                <div class="upload-hint">
            
                
            </form>

            <div class="button-group">
                <a href="/dashboard" class="btn btn-main">
                    <i class="fa-solid fa-graduation-cap"></i> Kembali Belajar
                </a>
                <a href="/logout" class="btn btn-logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar Sistem
                </a>
            </div>
        </div>

        <div class="profile-footer">
            LEARNIFY PREMIUM &bull; ACADEMIC DASHBOARD 2026
        </div>
    </div>

</body>
</html>