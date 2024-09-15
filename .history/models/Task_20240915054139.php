<?php
// models/Task.php

class Task {
    private $db;

    public function __construct() {
        $dbConfig = require BASE_PATH . 'config/database.php';
        try {
            $this->db = new PDO(
                "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}",
                $dbConfig['username'],
                $dbConfig['password'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getTasks($userId) {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY due_date ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($taskId, $newStatus) {
        $sql = "UPDATE tasks SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':status' => $newStatus, ':id' => $taskId]);
    }
}