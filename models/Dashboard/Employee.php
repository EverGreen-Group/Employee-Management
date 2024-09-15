<?php

class Employee {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getEmployeeCounts() {
        $sql = "SELECT 
                    SUM(CASE WHEN role = 'Normal Worker' THEN 1 ELSE 0 END) as normal_workers,
                    SUM(CASE WHEN role = 'Driver' THEN 1 ELSE 0 END) as drivers,
                    SUM(CASE WHEN role = 'Operator' THEN 1 ELSE 0 END) as operators,
                    SUM(CASE WHEN role = 'Driver Assistant' THEN 1 ELSE 0 END) as driver_assistants
                FROM employees";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function getTotalEmployees() {
        $sql = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN gender = 'Male' THEN 1 ELSE 0 END) as men,
                    SUM(CASE WHEN gender = 'Female' THEN 1 ELSE 0 END) as women
                FROM employees";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function getTalentRequests() {
        $sql = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN gender = 'Male' THEN 1 ELSE 0 END) as men,
                    SUM(CASE WHEN gender = 'Female' THEN 1 ELSE 0 END) as women
                FROM talent_requests
                WHERE status = 'Open'";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
}