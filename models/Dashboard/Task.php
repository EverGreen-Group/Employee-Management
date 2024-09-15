<?php

class Task {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUpcomingTasks() {
        $sql = "SELECT name FROM tasks WHERE status = 'Upcoming' ORDER BY due_date ASC LIMIT 4";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
    }
}