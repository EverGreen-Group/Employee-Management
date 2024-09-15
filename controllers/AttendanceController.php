<?php
// controllers/AttendanceController.php

require_once BASE_PATH . 'models/Attendance.php';

class AttendanceController {
    private $attendanceModel;

    public function __construct() {
        $this->attendanceModel = new Attendance();
    }

    public function viewAttendance() {
        $userId = 1; // This would typically come from a session
        $startDate = $_GET['start_date'] ?? date('Y-m-01');
        $endDate = $_GET['end_date'] ?? date('Y-m-t');

        $attendance = $this->attendanceModel->getAttendance($userId, $startDate, $endDate);

        $data = [
            'title' => 'View Attendance',
            'page' => 'view-attendance',
            'attendance' => $attendance,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];

        $this->loadView('view-attendance', $data);
    }

    public function checkIn($userId, $timeIn) {
        $date = date('Y-m-d');
        $this->attendanceModel->recordAttendance($userId, $date, $timeIn);
    }

    public function checkOut($userId, $timeOut) {
        $date = date('Y-m-d');
        $this->attendanceModel->updateTimeOut($userId, $date, $timeOut);
    }

    private function loadView($view, $data) {
        extract($data);
        ob_start();
        include BASE_PATH . "views/pages/{$view}.php";
        $content = ob_get_clean();
        include BASE_PATH . 'views/layouts/main.php';
    }
}
