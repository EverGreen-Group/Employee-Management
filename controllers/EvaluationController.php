<?php
// controllers/complete-evaluation.php

class EvaluationController {
    public function apply() {
        // In a real application, you might process form data here
        $data = [
            'title' => 'Complete-Evaluation',
            'page' => 'complete-evaluation'
        ];

        // Load the view
        $this->loadView('complete-evaluation', $data);
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
}