<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port = "4000"; // Port standar TiDB Cloud
    public $conn;

    public function __construct() {
        // Membaca data sensitif dari Environment Variables Vercel, jika kosong gunakan fallback teks langsung
        $this->host = getenv('DB_HOST') ? getenv('DB_HOST') : "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";
        $this->db_name = getenv('DB_NAME') ? getenv('DB_NAME') : "learnify";
        $this->username = getenv('DB_USER') ? getenv('DB_USER') : "25qhFyHYwoJyP7o.root";
        $this->password = getenv('DB_PASS') ? getenv('DB_PASS') : "i9dMXmsOdQGUmhkh";
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            
            // Pengaturan parameter keamanan SSL wajib untuk TiDB Cloud via PDO
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => true, // Mengaktifkan transport terenkripsi aman
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );
            
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi Error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>