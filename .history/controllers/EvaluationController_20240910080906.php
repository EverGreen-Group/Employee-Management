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
            'title' => 'Evaluation Submitted',
            'page' => 'complete_evaluation',
            'name' => $_SESSION['evaluation_data']['name'] ?? '',
            'evaluation_date' => $_SESSION['evaluation_data']['todays_date'] ?? '',
            'performance_evaluation' => $_SESSION['evaluation_data']['performance_evaluation'] ?? '',
            'task_completion' => $_SESSION['evaluation_data']['task_completion'] ?? '',
            'skill_improvement' => $_SESSION['evaluation_data']['skill_improvement'] ?? ''
        ];

        // Clear the session data after displaying
        unset($_SESSION['evaluation_data']);

        // Load the view
        $this->loadView('complete_evaluation', $data);
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Store the submitted data in session
            $_SESSION['evaluation_data'] = [
                'name' => $_POST['name'] ?? '',
                'todays_date' => $_POST['todays_date'] ?? '',
                'performance_evaluation' => $_POST['performance_evaluation'] ?? '',
                'task_completion' => $_POST['task_completion'] ?? '',
                'skill_improvement' => $_POST['skill_improvement'] ?? ''
            ];

            // Redirect to the complete page
            header('Location: ' . BASE_URL . 'evaluation/complete');
            exit;
        } else {
            // If not a POST request, redirect to the form
            header('Location: ' . BASE_URL . 'evaluation');
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