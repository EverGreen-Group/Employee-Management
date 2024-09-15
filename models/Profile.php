<?php
// models/Profile.php

require_once 'Model.php';

class Profile extends Model {
    private $table = 'User';

    public function getProfile($userId) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($userId, $data) {
        $query = "UPDATE " . $this->table . " SET 
                  full_name = :full_name, 
                  email = :email, 
                  phone = :phone, 
                  address = :address, 
                  department = :department, 
                  position = :position 
                  WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":full_name", $data['full_name']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":phone", $data['phone']);
        $stmt->bindParam(":address", $data['address']);
        $stmt->bindParam(":department", $data['department']);
        $stmt->bindParam(":position", $data['position']);

        return $stmt->execute();
    }
}