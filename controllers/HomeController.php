<?php
// controllers/HomeController.php

require_once BASE_PATH . 'models/User.php';

class HomeController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        // Example: Fetch user data
        $userId = 1; // This would typically come from a session
        $user = $this->userModel->getUser($userId);

        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
            'user' => $user
        ];

        $this->loadView('dashboard', $data);
    }

    private function loadView($view, $data) {
        extract($data);
        ob_start();
        include BASE_PATH . "views/pages/{$view}.php";
        $content = ob_get_clean();
        include BASE_PATH . 'views/layouts/main.php';
    }
}