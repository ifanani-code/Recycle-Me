<?php
require_once "Database.php";

Class Admins extends Database {

    public function TambahAdmin($nama, $email, $password)
    {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO admins (nama, email, password) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
    
            if (!$stmt) return $this->conn->error;
            $stmt->bind_param("sss", $nama, $email, $hashedPassword);
            $result = $stmt->execute();
            if (!$result) return $this->conn->error;
            return true;
    }

    public function isEmailAvailable($email)
    {
        $query = "SELECT email FROM admins WHERE email = ?";
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
    public function loginA($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT password FROM admins WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($pw);
        $stmt->fetch();

        if (password_verify($password, $pw)) {
            return true;
        } else {
            return false;
        }
    }

    public function ChangePwAdmin($email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("UPDATE admins SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $password, $email);
        $result = $stmt->execute();

        if ($result == false) return $this->conn->error;
        return true;
    }

    public function getAdmin($email) {
        $email = $this->conn->real_escape_string($email);

        $query = "SELECT * FROM admins WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) return $this->conn->error;
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows < 1) return "Data pos tidak ditemukan";

        return $result->fetch_object();
    }

    public function getAllAdmins(){
        $query = "SELECT * FROM admins";
        $result = $this->conn->query($query);
        $admins = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $admins[] = $row;
            }
        }
        return $admins;
    }

    public function limitAdmin($awal, $akhir) {
        $query = "SELECT * FROM admins LIMIT $awal, $akhir";
        $result = $this->conn->query($query);
        $admins = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $admins[] = $row;
            }
        }
        return $admins;
    }

    public function DeleteAdmin($id) {
        $query = "DELETE FROM admins WHERE admin_id=?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) return $this->conn->error;
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();

        if (!$result) return $stmt->error;
        if (!$stmt->affected_rows > 0) return "user not found";

        $stmt->close();
        return TRUE;
    }
}
?>