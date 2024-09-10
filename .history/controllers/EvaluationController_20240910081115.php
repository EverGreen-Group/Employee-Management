<?php
// controllers/EvaluationController.php

class EvaluationController {
    public function index() {
        // In a real application, you might fetch data from a model here
        $data = [
            'title' => 'evaluation',
            'page' => 'evaluation'
        ];

        // Load the view
        $this->loadView('evaluation', $data);
    }

    private function loadView($view, $data) {
        // Extract the data array to individual variables
        extract($data);

        // Start output buffering
        ob_start();

        // Include the view file
        include BASE_PATH . "views/pages/{$view}.php";

        // Get the contents of the output buffer
        $content = ob_get_clean();

        // Include the layout file
        include BASE_PATH . 'views/layouts/main.php';
    }
}