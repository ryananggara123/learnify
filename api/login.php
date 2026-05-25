<?php
session_start();


if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}


require_once '../config/Database.php'; 

$error_message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

  
    $database = new Database();
    $db = $database->getConnection();

    if($db) {
        try {
            // Skenario query (Asumsi nama tabelmu adalah 'users')
            // Cek NISN atau Email, dan cocokkan password-nya
            $query = "SELECT * FROM users WHERE (nisn = :username OR email = :username) AND password = :password";
            
            $stmt = $db->prepare($query);
            
            // Bind parameter untuk mencegah SQL Injection (Fitur keunggulan PDO)
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            
            $stmt->execute();

            // Jika ada 1 data yang cocok
            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // === LOGIKA STREAK (HARI BERUNTUN) ===
                $today = date("Y-m-d");
                $yesterday = date("Y-m-d", strtotime("-1 day"));
                $last_login = $row['last_login'];
                $current_streak = isset($row['streak']) ? (int)$row['streak'] : 0;

                if ($last_login == $yesterday) {
                    $new_streak = $current_streak + 1; // Login 2 hari berturut-turut, tambah!
                } elseif ($last_login == $today) {
                    $new_streak = $current_streak; // Hari ini sudah login, streak tidak berubah
                } else {
                    $new_streak = 1; // Bolong login atau baru pertama kali, reset ke 1
                }

                // Update streak dan last_login ke database
                $update_query = "UPDATE users SET streak = :streak, last_login = :today WHERE id = :id";
                $update_stmt = $db->prepare($update_query);
                $update_stmt->execute([
                    ':streak' => $new_streak,
                    ':today' => $today,
                    ':id' => $row['id']
                ]);
                // === AKHIR LOGIKA STREAK ===

                // Simpan data ke session
                $_SESSION['user_id'] = $row['id']; 
                $_SESSION['nama']    = $row['nama'];
                
                // BERHASIL! Langsung pindah ke dashboard
                header("Location: dashboard.php");
                exit;
            } else {
                $error_message = "NISN/Email atau Kata Sandi salah!";
            }
        } catch(PDOException $e) {
            $error_message = "Terjadi kesalahan sistem: " . $e->getMessage();
        }
    } else {
        $error_message = "Gagal terhubung ke database.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="auth-card">
        <img src="assets/img/logo.png" alt="Learnify Logo" class="auth-logo">
        
        <h2>Selamat Datang</h2>
        <p>Masuk dengan NISN atau Email untuk belajar</p>

        <?php if(!empty($error_message)): ?>
            <div style="background-color: #fee2e2; color: #ef4444; padding: 10px; border-radius: 8px; font-size: 13px; margin-bottom: 15px; text-align: left;">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" id="loginForm">
            <div class="form-group">
                <label>NISN atau Email</label>
                <input type="text" name="username" placeholder="Masukkan NISN atau Email" required>
            </div>
            
            <div class="form-group">
                <label>Kata Sandi</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" required>
                    <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                </div>
            </div>
            
            <button type="submit" class="btn-submit" id="btnLogin">Masuk</button>
        </form>

        <div class="auth-links">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>
</html>