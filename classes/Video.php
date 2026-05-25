<?php

class Video {
    private $conn;
    private $table_name = "videos";

    public $id;
    public $judul_video;
    public $url_youtube;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
}
?>