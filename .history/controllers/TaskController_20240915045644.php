<?php
// controllers/TaskController.php
require_once BASE_PATH . 'models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function view() {
        $userId = $_SESSION['user_id'] ?? 1; // Fallback to 1 for testing

        $data = [
            'title' => 'View Tasks',
            'page' => 'view-tasks',
            'tasks' => $this->taskModel->getTasks($userId)
        ];

        $this->loadView('view-tasks', $data);
    }

    public function updateTaskStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taskId = $_POST['task_id'] ?? null;
            $currentStatus = $_POST['current_status'] ?? null;
            $newStatus = ($currentStatus === 'Completed') ? 'Pending' : 'Completed';

            if ($taskId && $newStatus) {
                $result = $this->taskModel->updateStatus($taskId, $newStatus);

                if ($result) {
                    // Redirect back to the view tasks page
                    header('Location: /view-tasks');
                    exit;
                } else {
                    // Handle error (you might want to add an error message to a session variable)
                    header('Location: /view-tasks?error=update_failed');
                    exit;
                }
            } else {
                // Handle invalid input
                header('Location: /view-tasks?error=invalid_input');
                exit;
            }
        } else {
            // Handle invalid request method
            header('Location: /view-tasks?error=invalid_method');
            exit;
        }
    }

    private function loadView($view, $data) {
        // ... (existing code remains unchanged)
    }
}