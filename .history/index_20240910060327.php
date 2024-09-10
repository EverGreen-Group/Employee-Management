<?php
// index.php

// Define the base path for includes
define('BASE_PATH', __DIR__ . '/');

// Include the controller files
require_once BASE_PATH . 'controllers/HomeController.php';
require_once BASE_PATH . 'controllers/LeaveController.php';
require_once BASE_PATH . 'controllers/TaskController.php';

// Get the requested page from the URL
$page = $_GET['page'] ?? 'dashboard';

// Route the request to the appropriate controller
switch ($page) {
    case 'dashboard':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'apply-leave':
        $controller = new LeaveController();
        $controller->apply();
        break;
    case 'view-tasks':
        $controller = new TaskController();
        $controller->view();
        break;
    default:
        // Handle 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "Page not found";
        break;
}