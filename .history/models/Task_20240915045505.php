<?php
// models/Task.php
require_once BASE_PATH . 'models/Database.php';

class Task {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getTasks($userId) {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY due_date ASC";
        $params = [':user_id' => $userId];
        return $this->db->query($sql, $params);
    }

    public function updateStatus($taskId, $newStatus) {
        $sql = "UPDATE tasks SET status = :status WHERE id = :id";
        $params = [':status' => $newStatus, ':id' => $taskId];
        return $this->db->execute($sql, $params);
    }
}