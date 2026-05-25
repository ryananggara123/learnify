<?php

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $nama;
    public $nisn; 
    public $email;
    public $password;
    public $xp; 
    public $grade; 
    public $badge; 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nama=:nama, nisn=:nisn, email=:email, password=:password, xp=:xp, grade=:grade, badge=:badge";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":nisn", $this->nisn);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":xp", $this->xp);
        $stmt->bindParam(":grade", $this->grade);
        $stmt->bindParam(":badge", $this->badge);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function emailExists() {
        $query = "SELECT id FROM " . $this->table_name . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        
        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return true; 
        }
        return false; 
    }

    public function login($email, $password) {
        $query = "SELECT id, nama, email, password FROM " . $this->table_name . " WHERE email = :email LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // PERUBAHAN DI SINI: Cek password secara langsung (Plain Text)
            if($password === $row['password']) {
                $this->id = $row['id'];
                $this->nama = $row['nama'];
                return true;
            }
        }
        return false;
    }

    // Fungsi untuk memperbarui nama foto profil di database
    public function updateFotoProfil($id_user, $nama_file_foto) {
        $query = "UPDATE " . $this->table_name . " SET foto = :foto WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":foto", $nama_file_foto);
        $stmt->bindParam(":id", $id_user);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Fungsi untuk mengambil data spesifik 1 user (Berguna untuk halaman profil)
    public function getUserById($id_user) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id_user);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
}
?>