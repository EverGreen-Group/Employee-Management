<?php
// models/Task.php
require_once BASE_PATH . 'models/Database.php';

class Task {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getTasks($userId) {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY due_date ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTaskById($taskId) {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $taskId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStatus($taskId, $newStatus) {
        $allowedStatuses = ['Pending', 'In Progress', 'Completed'];
        
        if (!in_array($newStatus, $allowedStatuses)) {
            return false;
        }

        $sql = "UPDATE tasks SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':status' => $newStatus, ':id' => $taskId]);
    }

    public function createTask($userId, $taskName, $description, $dueDate, $status = 'Pending') {
        $sql = "INSERT INTO tasks (user_id, task_name, description, status, due_date) 
                VALUES (:user_id, :task_name, :description, :status, :due_date)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $userId,
            ':task_name' => $taskName,
            ':description' => $description,
            ':status' => $status,
            ':due_date' => $dueDate
        ]);
    }

    public function updateTask($taskId, $taskName, $description, $dueDate, $status) {
        $sql = "UPDATE tasks 
                SET task_name = :task_name, description = :description, 
                    status = :status, due_date = :due_date 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $taskId,
            ':task_name' => $taskName,
            ':description' => $description,
            ':status' => $status,
            ':due_date' => $dueDate
        ]);
    }
}