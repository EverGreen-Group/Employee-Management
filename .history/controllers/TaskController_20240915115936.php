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

    public function updateTaskStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taskId = $_POST['task_id'] ?? null;
            $newStatus = $_POST['new_status'] ?? null;

            if ($taskId && $newStatus) {
                $result = $this->taskModel->updateStatus($taskId, $newStatus);

                if ($result) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to update status']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid input']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method']);
        }
        exit;
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