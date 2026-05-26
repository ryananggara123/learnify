<?php
class Database {
    private $host = "gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com";      
    private $db_name = "learnify";    
    private $username = "25qhFyHYwoJyP7o.root";   
    private $password = "i9dMXmsOdQGUmhkh";
    private $port = "4000";                
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => true, // Wajib SSL untuk TiDB Cloud
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            // Agar tidak merusak output HTML, kembalikan null atau log errornya
            error_log("Koneksi Error: " . $exception->getMessage());
        }
        return $this->conn;
    }
}
?>