<?php
// controllers/HomeController.php

class HomeController {
    public function index() {
        // In a real application, you might fetch data from a model here
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard'
        ];

        // Load the view
        $this->loadView('dashboard', $data);
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