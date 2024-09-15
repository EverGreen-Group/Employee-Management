<?php
// controllers/SalaryController.php

class SalaryController {
    public function salary() {
        $data = [
            'title' => 'Salary Summary',
            'page' => 'salary-summary',
            'currentMonth' => $this->getCurrentMonthSalaryData(),
            'previousPayroll' => $this->getPreviousPayrollData(),
            'upcomingPayroll' => $this->getUpcomingPayrollData(),
            'transactions' => $this->getTransactionHistory()
        ];

        // Load the view
        $this->loadView('salary-summary', $data);
    }

    private function getCurrentMonthSalaryData() {
        // Logic to fetch and calculate current month's salary data
        return [
            'start_date' => '1 March, 2024',
            'end_date' => '31 March, 2024',
            'days_attended' => 20,
            'payment_per_day' => 2500.00,
            'total_salary' => 50000.00,
            'payment' => 16700,
            'pending' => 8300,
            'paid' => 25000,
        ];
    }

    private function getPreviousPayrollData() {
        // Logic to fetch previous payroll data
        return [
            'amount' => 58300.00,
            'date' => 'March 1, 2024',
            'status' => 'PAID'
        ];
    }

    private function getUpcomingPayrollData() {
        // Logic to fetch upcoming payroll data
        return [
            'amount' => 16700.00,
            'date' => 'April 1, 2024',
            'status' => 'PENDING',
            'worker' => [
                'name' => 'Theekshana',
                'position' => 'Factory Worker'
            ]
        ];
    }

    private function getTransactionHistory() {
        // Logic to fetch transaction history
        return [
            ['date' => 'Dec 1, 2023', 'amount' => 58300.00, 'time' => '08:00 AM'],
            ['date' => 'Jan 1, 2024', 'amount' => 58300.00, 'time' => '08:00 AM'],
            ['date' => 'Feb 1, 2024', 'amount' => 58300.00, 'time' => '08:00 AM'],
            ['date' => 'Mar 1, 2024', 'amount' => 58300.00, 'time' => '08:00 AM'],
        ];
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
