<?php
class Database {
    private $host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      // Contoh: gateway01.ap-southeast-1.prod.aws.tidbcloud.com
    private $db_name = "learnify";    // Contoh: db_learnify
    private $username = "25qhFyHYwoJyP7o.root";   // Contoh: xxxxx.root
    private $password = "i9dMXmsOdQGUmhkh";
    private $port = "4000";                // Port wajib TiDB
    public $conn;

    // Fungsi untuk mendapatkan koneksi database
    public function getConnection() {
        $this->conn = null;

        try {
            // Tambahkan port ke dalam DSN dan opsi SSL untuk TiDB
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            $options = array(
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false, // Agar tidak error sertifikat di Render
            );
            
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // echo "Koneksi Database Berhasil!";
        } catch(PDOException $exception) {
            echo "Koneksi Error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>