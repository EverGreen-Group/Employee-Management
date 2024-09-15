<?php
// models/User.php

require_once 'Model.php';

class User extends Model {
    private $table = 'User';

    // Fetch a user by ID
    public function getUser($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new user with role_id, email, password, and full_name
    public function createUser($data) {
        $query = "INSERT INTO " . $this->table . " (role_id, email, password, full_name) 
                  VALUES (:role_id, :email, :password, :full_name)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(":role_id", $data['role_id']);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":password", password_hash($data['password'], PASSWORD_DEFAULT)); // Password hashed for security
        $stmt->bindParam(":full_name", $data['full_name']);

        // Execute the query and return the last inserted ID or false
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    // Additional methods (e.g., update, delete) can be added here as needed
}
