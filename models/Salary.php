<?php
// models/Salary.php

class Salary {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCurrentMonthSalaryData($userId) {
        $sql = "SELECT 
                    s.start_date,
                    s.end_date,
                    s.days_attended,
                    s.payment_per_day,
                    s.total_salary,
                    s.payment,
                    s.pending,
                    s.paid
                FROM salary s
                WHERE s.user_id = :user_id 
                AND s.month = MONTHNAME(CURDATE())
                AND s.year = YEAR(CURDATE())";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPreviousPayrollData($userId) {
        $sql = "SELECT 
                    s.amount,
                    s.date,
                    s.status
                FROM payroll s
                WHERE s.user_id = :user_id 
                AND s.date < CURDATE()
                ORDER BY s.date DESC
                LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUpcomingPayrollData($userId) {
        $sql = "SELECT 
                    s.amount,
                    s.date,
                    s.status,
                    w.name AS worker_name,
                    w.position AS worker_position
                FROM payroll s
                JOIN workers w ON s.user_id = w.id
                WHERE s.user_id = :user_id 
                AND s.date > CURDATE()
                ORDER BY s.date ASC
                LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTransactionHistory($userId) {
        $sql = "SELECT 
                    t.date,
                    t.amount,
                    t.time
                FROM transactions t
                WHERE t.user_id = :user_id
                ORDER BY t.date DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
