<?php
class Database {
    private $host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      // Contoh: gateway01.ap-southeast-1.prod.aws.tidbcloud.com
    private $db_name = "learnify";    // Contoh: db_learnify
    private $username = "25qhFyHYwoJyP7o.root";   // Contoh: xxxxx.root
    private $password = "i9dMXmsOdQGUmhkh";
    private $port = "4000";                // Port wajib TiDB
    public $conn;

    public function __construct() {
        // Mengambil data rahasia database dari Environment Variables Vercel
        $this->host = getenv('DB_HOST');
        $this->db_name = getenv('DB_NAME');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASS');
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            $options = array(
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
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