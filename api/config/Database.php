<?php
class Database {
    // Kita langsung kunci nilai aslinya di properti class agar aman dari cache getenv
    private $host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";
    private $db_name = "learnify"; 
    private $username = "25qhFyHYwoJyP7o.root";
    private $password = "i9dMXmsOdQGUmhkh";
    private $port = "4000"; 
    public $conn;

    public function __construct() {
        // Kosongkan bagian ini! Jangan ada fungsi getenv() sama sekali
        // Dengan begini, Vercel dipaksa menggunakan teks di atas
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            
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