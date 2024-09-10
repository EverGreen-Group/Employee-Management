<?php
// controllers/TaskController.php

class TaskController {
    public function view() {
        // In a real application, you might fetch data from a model here
        $data = [
            'title' => 'View Tasks',
            'page' => 'view-tasks',
            'tasks' => $this->getTasks() // Retrieve tasks from a model or database
        ];

        // Load the view
        $this->loadView('view-tasks', $data);
    }

    private function loadView($view, $data) {
        // Extract the data array to individual variables
        extract($data);

        // Start output buffering
        ob_start();

        // Include the view file
        $viewPath = BASE_PATH . "views" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "{$view}.php";
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            // Handle the case where the view file doesn't exist
            echo "Error: View file not found.";
        }

        // Get the contents of the output buffer
        $content = ob_get_clean();

        // Include the layout file
        include BASE_PATH . 'views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';
    }

    private function getTasks() {
        // Sample tasks, replace with a database call or model logic
        return [
            ['id' => 1, 'title' => 'Task 1', 'description' => 'Description for task 1'],
            ['id' => 2, 'title' => 'Task 2', 'description' => 'Description for task 2'],
            ['id' => 3, 'title' => 'Task 3', 'description' => 'Description for task 3'],
        ];
    }
}
