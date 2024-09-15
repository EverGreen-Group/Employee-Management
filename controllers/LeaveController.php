<?php
// controllers/LeaveController.php

require_once BASE_PATH . 'models/Leave.php';

class LeaveController {
    private $leaveModel;

    public function __construct() {
        $this->leaveModel = new Leave();
    }

    public function apply() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission
            $leaveData = [
                'user_id' => 1, // This would typically come from a session
                'leave_type' => $_POST['leave_type'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'reason' => $_POST['reason']
            ];

            if ($this->leaveModel->applyLeave($leaveData)) {
                $message = "Leave application submitted successfully.";
            } else {
                $message = "Error submitting leave application.";
            }
        }

        $data = [
            'title' => 'Apply Leave',
            'page' => 'apply-leave',
            'message' => $message ?? null
        ];

        $this->loadView('apply-leave', $data);
    }

    private function loadView($view, $data) {
        extract($data);
        ob_start();
        include BASE_PATH . "views/pages/{$view}.php";
        $content = ob_get_clean();
        include BASE_PATH . 'views/layouts/main.php';
    }
}