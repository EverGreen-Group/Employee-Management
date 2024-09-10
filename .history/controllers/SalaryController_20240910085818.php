<?php
// controllers/SalaryController.php

class SalaryController {
    public function salary() {
        // In a real application, you'd fetch this data from a database or service
        $data = [
            'title' => 'Salary Summary',
            'page' => 'salary-slip',
            
        ];

        $this->loadView('salary-slip', $data);
    }

    // public function salary() {
    //     // In a real application, you might process form data here
    //     $data = [
    //         'title' => 'Salary Summary',
    //         'page' => 'salary-slip'
    //     ];

    //     // Load the view
    //     $this->loadView('salary-slip', $data);
    // }

    private function loadView($view, $data) {
        extract($data);
        $viewPath = BASE_PATH . "views/pages/{$view}.php";
        echo "Attempting to include: " . $viewPath; // Debugging line
        
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "File not found: " . $viewPath; // Debugging line
        }
        
        $content = ob_get_clean();
        include BASE_PATH . 'views/layouts/main.php';
    }
}