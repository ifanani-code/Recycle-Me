<?php
require_once "Database.php";

Class LPage extends Database {
    public function ShowL(){

        $query = "SELECT * FROM landing_page ";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) return $this->conn->error;

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object();
    }
    public function getAllTeam(){
        $query = "SELECT * FROM our_team";
        $result = $this->conn->query($query);
        $tim = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $tim[] = $row;
            }
        }
        return $tim;
    }
}