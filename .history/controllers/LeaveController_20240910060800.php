<?php
// controllers/LeaveController.php

class LeaveController {
    public function apply() {
        // In a real application, you might process form data here
        $data = [
            'title' => 'Apply Leave',
            'page' => 'apply-leave'
        ];

        // Load the view
        $this->loadView('apply-leave', $data);
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