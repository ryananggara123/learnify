<?php
session_start();

if(isset($_SESSION['user_id'])) {
    header("Location: /dashboard.php");
    exit;
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Tembak koneksi langsung di sini secara bersih tanpa memanggil file database.php yang tersangkut cache
    try {
        $host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      
        $db_name = "learnify"; // Kunci nama database yang benar di sini
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

        // Jalankan Query Login
        $query = "SELECT * FROM users WHERE (nisn = :username OR email = :username) AND password = :password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama']    = $row['nama'];
            header("Location: /dashboard.php");
            exit;
        } else {
            $error_message = "NISN/Email atau Kata Sandi salah!";
        }

    } catch (PDOException $e) {
        $error_message = "Gagal memproses data: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Learnify</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <img src="../assets/img/logo.png" alt="Learnify Logo" class="auth-logo" onerror="this.style.display='none'">
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
                    <input type="text" name="username" placeholder="Masukkan NISN or Email" required>
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
                Belum punya akun? <a href="register.php">Daftar di sini</a>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>