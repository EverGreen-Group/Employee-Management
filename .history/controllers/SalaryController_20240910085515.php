<?php
// controllers/SalaryController.php

class SalaryController {
    // public function salary() {
    //     // In a real application, you'd fetch this data from a database or service
    //     $data = [
    //         'title' => 'Salary Summary',
    //         'page' => 'salary-slip',
    //         'monthYear' => 'March, 2024',
    //         'daysAttended' => 20,
    //         'paymentPerDay' => 2500.00,
    //         'totalSalary' => 50000.00,
    //         'payment' => 16700.00,
    //         'benefits' => 8300.00,
    //         'tax' => 25000.00,
    //         'previousPayroll' => 58300.00,
    //         'upcomingPayroll' => 16700.00,
    //         'workerName' => 'Theekshana',
    //         'workerRole' => 'Factory Worker',
    //         'transactions' => [
    //             ['date' => 'Dec 1, 2023', 'amount' => 58300.00],
    //             ['date' => 'Jan 1, 2024', 'amount' => 58300.00],
    //             ['date' => 'Feb 1, 2024', 'amount' => 58300.00],
    //             ['date' => 'Mar 1, 2024', 'amount' => 58300.00],
    //         ]
    //     ];

    //     $this->loadView('salary-slip', $data);
    // }

    public function salary() {
        // In a real application, you might process form data here
        $data = [
            'title' => 'Salary Summary',
            'page' => 'salary-slip'
        ];

        // Load the view
        $this->loadView('salary-slip', $data);
    }

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