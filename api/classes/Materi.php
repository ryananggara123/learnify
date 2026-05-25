<?php

class Materi {
    private $conn;
    private $table_name = "materis";

    public $id;
    public $judul;
    public $deskripsi;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Fungsi untuk mengambil semua data materi
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
}
?>