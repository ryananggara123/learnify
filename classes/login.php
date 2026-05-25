// Fungsi untuk Login
    public function login($email, $password) {
        $query = "SELECT id, nama, email, password FROM " . $this->table_name . " WHERE email = :email LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verifikasi password yang dienkripsi
            if(password_verify($password, $row['password'])) {
                $this->id = $row['id'];
                $this->nama = $row['nama'];
                return true;
            }
        }
        return false;
    }