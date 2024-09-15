<?php
// models/Task.php

require_once 'Model.php';

class Task extends Model {
    private $table = 'tasks';

    public function getTasks($userId) {
        $query = "SELECT task_name, description, status, 
                         DATE_FORMAT(created_at, '%h:%i %p') as time, 
                         DATE_FORMAT(created_at, '%Y-%m-%d') as date,
                         DATE_FORMAT(due_date, '%Y-%m-%d %h:%i %p') as due_date
                  FROM " . $this->table . " 
                  WHERE user_id = :user_id
                  ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add other methods as needed (create task, update task, delete task, etc.)
}