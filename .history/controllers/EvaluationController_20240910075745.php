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

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // In a real application, you would validate and sanitize input here
            $evaluationData = [
                'name' => $_POST['name'] ?? '',
                'evaluation_date' => $_POST['todays_date'] ?? '',
                'performance_evaluation' => $_POST['performance_evaluation'] ?? '',
                'task_completion' => $_POST['task_completion'] ?? '',
                'skill_improvement' => $_POST['skill_improvement'] ?? ''
            ];

            // Here you would typically save the data to a database
            // For now, we'll just simulate a successful save
            $saveSuccess = true;

            if ($saveSuccess) {
                // Redirect to a success page or back to the form with a success message
                header('Location: /evaluation?success=1');
                exit;
            } else {
                // Redirect back to the form with an error message
                header('Location: /evaluation?error=1');
                exit;
            }
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