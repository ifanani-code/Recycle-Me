<?php
require_once "Database.php";

Class User extends Database {
    public function register($nama, $email, $password, $alamat, $no_hp, $role)
    {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (nama, email, password, alamat, no_hp, role) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
    
            if (!$stmt) return $this->conn->error;
            $stmt->bind_param("ssssss", $nama, $email, $hashedPassword, $alamat, $no_hp, $role);
            $result = $stmt->execute();
            if (!$result) return $this->conn->error;
            return true;
    }

    public function isEmailAvailable($email)
    {
        $query = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) return $this->conn->error;
    
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
    
        $count = $stmt->num_rows;
        if ($count === 0) {
            return true;
        } else {
            return False;
        }
    }

    public function login($email, $password, $role)
    {
        $stmt = $this->conn->prepare("SELECT password FROM users WHERE email = ? AND role = ?");
        $stmt->bind_param("ss", $email, $role);
        $stmt->execute();
        $stmt->bind_result($pw);
        $stmt->fetch();

        if (password_verify($password, $pw)) {
            return true;
        } else {
            return false;
        }
    }
    

    public function ChangePw($email, $password, $role)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE users SET password = ? WHERE email = ? AND role = ?");
        $stmt->bind_param("sss", $password, $email, $role);
        $result = $stmt->execute();

        if ($result == false) return $this->conn->error;
        return true;
    }
    

    public function getEmail($email){
        $email = $this->conn->real_escape_string($email);

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) return $this->conn->error;
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object();
    }

    public function updateProfile($email, $name, $phone, $address){
        $query = "UPDATE users SET nama = ?, no_hp = ?, alamat = ? WHERE email = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $name, $phone, $address, $email);
        $result = $stmt->execute();
        if (!$result) return $this->conn->error;
        $updated = $stmt->affected_rows;
        if ($updated > 0) {
            return true;
        } else {
            return "failed to update your account";
        }
    }

    public function uploadPP($foto, $email) {
        $foto = $this->conn->real_escape_string($foto);
        $stmt = $this->conn->prepare("UPDATE users SET foto = ? WHERE email = ?");

        if(!$stmt) return $this->conn->error;
        $stmt->bind_param("ss", $foto, $email);

        $result = NULL;
        try {
            $result = $stmt->execute();
        } catch(Exception $e) {
            return $e->getMessage();
        }

        if ($result === true) {
            return $result;
        } else {
            return $stmt->error;
        }
    }

    public function updateUser($id, $name, $phone, $address){
        $query = "UPDATE users SET nama = ?, no_hp = ?, alamat = ? WHERE user_id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $name, $phone, $address, $id );
        $result = $stmt->execute();
        if (!$result) return $this->conn->error;
        $updated = $stmt->affected_rows;
        if ($updated > 0) {
            return true;
        } else {
            return "failed to update your account";
        }
    }

    public function deleteProfile($email) {
        $query = "DELETE from users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $result = $stmt->execute();
        if(!$result) return $this->conn->error;
        if (!$stmt->affected_rows > 0) return "user not Found";
        return true;
    }

    public function getAllUsers(){
        $query = "SELECT * FROM users WHERE role = 'konsumen'";
        $result = $this->conn->query($query);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    public function getAllMitra(){
        $query = "SELECT * FROM users WHERE role = 'mitra'";
        $result = $this->conn->query($query);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $users[] = $row;
            }
        }
        return $users;
    }

    public function limitUser($awal, $akhir) {
        $query = "SELECT * FROM users WHERE role = 'konsumen' LIMIT $awal, $akhir";
        $result = $this->conn->query($query);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $users[] = $row;
            }
        }
        return $users;
    }

    public function DeletebyID($id) {
        $query = "DELETE FROM users WHERE user_id=?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) return $this->conn->error;
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();

        if (!$result) return $stmt->error;
        if (!$stmt->affected_rows > 0) return "user not found";

        $stmt->close();
        return TRUE;
    }

    public function getUserById($id){
        $id = $this->conn->real_escape_string($id);

        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) return $this->conn->error;
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows < 1) return "Data pos tidak ditemukan";

        return $result->fetch_object();
    }

    public function getPhotoFileName($email) {
        $query = "SELECT foto FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($photoFileName);
        $stmt->fetch();
        $stmt->close();

        return $photoFileName;
    }

    public function deleteFoto($email) {
        $fileName = $this->getPhotoFileName($email);

        // Hapus file dari folder upload
        $uploadFolder = 'upload/pp/'; // Sesuaikan dengan lokasi folder upload
        $filePath = $uploadFolder . $fileName;

        if (file_exists($filePath)) {
            unlink($filePath); // Hapus file dari folder upload
        }

        // Hapus data kolom foto dari database
        $query = "UPDATE users SET foto = NULL WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function updatePoin($email, $poin) {
        $query = "UPDATE users SET poin = $poin WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

}

?>
