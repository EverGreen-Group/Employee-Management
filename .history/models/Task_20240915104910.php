<?php
// models/Task.php
require_once BASE_PATH . 'models/Database.php';

class Task {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getTaskById($taskId) {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $taskId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStatus($taskId, $newStatus) {
        $sql = "UPDATE tasks SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':status' => $newStatus, ':id' => $taskId]);
    }
}