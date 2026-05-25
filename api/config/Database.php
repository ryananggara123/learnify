<?php
class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port = "4000"; 
    public $conn;

    public function __construct() {
        // Mengambil data rahasia dari Environment Variables Vercel, jika tidak ada pakai teks langsung (fallback)
        $this->host = getenv('DB_HOST') ? getenv('DB_HOST') : "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";
        $this->db_name = getenv('DB_NAME') ? getenv('DB_NAME') : "learnify";
        $this->username = getenv('DB_USER') ? getenv('DB_USER') : "25qhFyHYwoJyP7o.root";
        $this->password = getenv('DB_PASS') ? getenv('DB_PASS') : "i9dMXmsOdQGUmhkh";
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            
            // Konfigurasi wajib SSL TLS agar TiDB Cloud menerima koneksi dari Vercel
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => true, 
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