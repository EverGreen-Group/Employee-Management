<?php
// controllers/EvaluationController.php

class EvaluationController {
    public function index() {
        $data = [
            'title' => 'Employee Evaluation',
            'page' => 'evaluation'
        ];

        // Load the view
        $this->loadView('evaluation_form', $data);
    }

    public function complete() {
        $data = [
            'title' => 'Complete Evaluation',
            'page' => 'complete_evaluation'
        ];

        // Load the view
        $this->loadView('evaluation_form', $data);
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission (as in the previous example)
            // ...
        } else {
            // If not a POST request, redirect to the form
            header('Location: /evaluation');
            exit;
        }
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