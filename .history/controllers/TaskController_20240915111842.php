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
            $newStatus = $_POST['new_status'] ?? null;

            if ($taskId && $newStatus) {
                $result = $this->taskModel->updateStatus($taskId, $newStatus);

                if ($result) {
                    $_SESSION['message'] = "Task status updated successfully.";
                    header('Location: /view-tasks');
                    exit;
                } else {
                    $_SESSION['error'] = "Failed to update task status.";
                    header('Location: /view-tasks');
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid input for task update.";
                header('Location: /view-tasks');
                exit;
            }
        } else {
            $_SESSION['error'] = "Invalid request method.";
            header('Location: /view-tasks');
            exit;
        }
    }

    private function loadView($view, $data) {
        extract($data);
        ob_start();
        $viewPath = BASE_PATH . "views" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "{$view}.php";
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "Error: View file not found.";
        }
        $content = ob_get_clean();
        include BASE_PATH . 'views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';
    }
}