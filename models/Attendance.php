<?php
// models/Attendance.php

require_once 'Model.php';

class Attendance extends Model {
    private $table = 'attendance';

    public function getAttendance($userId, $startDate = null, $endDate = null) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id";
        $params = [":user_id" => $userId];

        if ($startDate && $endDate) {
            $query .= " AND date BETWEEN :start_date AND :end_date";
            $params[":start_date"] = $startDate;
            $params[":end_date"] = $endDate;
        }

        $query .= " ORDER BY date DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recordAttendance($userId, $date, $timeIn, $timeOut = null) {
        $query = "INSERT INTO " . $this->table . " (user_id, date, time_in, time_out) VALUES (:user_id, :date, :time_in, :time_out)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":time_in", $timeIn);
        $stmt->bindParam(":time_out", $timeOut);

        return $stmt->execute();
    }

    // New method to update time_out
    public function updateTimeOut($userId, $date, $timeOut) {
        $query = "UPDATE " . $this->table . " SET time_out = :time_out WHERE user_id = :user_id AND date = :date";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":time_out", $timeOut);

        return $stmt->execute();
    }
}
