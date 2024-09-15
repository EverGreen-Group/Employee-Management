<?php
// models/Leave.php

require_once 'Model.php';

class Leave extends Model {
    private $table = 'leaves';

    public function applyLeave($data) {
        $query = "INSERT INTO " . $this->table . " (user_id, leave_type, start_date, end_date, reason) VALUES (:user_id, :leave_type, :start_date, :end_date, :reason)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $data['user_id']);
        $stmt->bindParam(":leave_type", $data['leave_type']);
        $stmt->bindParam(":start_date", $data['start_date']);
        $stmt->bindParam(":end_date", $data['end_date']);
        $stmt->bindParam(":reason", $data['reason']);

        if($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    // Add other methods as needed (get leaves, update leave status, etc.)
}