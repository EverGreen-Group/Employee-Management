<?php
// index.php

// Define the base path for includes
define('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);

// Include the controller files
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'HomeController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'LeaveController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'TaskController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'EvaluationController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'SalaryController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'AttendanceController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'ProfileController.php';

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
    case 'complete-evaluation':
        $controller = new EvaluationController();
        $controller->complete();
        break;
    case 'salary-slip':
        $controller = new SalaryController();
        $controller->viewSlip();
        break;
    case 'view-attendance':
        $controller = new AttendanceController();
        $controller->view();
        break;
    case 'personal-detail':
        $controller = new ProfileController();
        $controller->viewDetails();
        break;
    case 'logout':
        // Handle logout logic here
        session_destroy();
        header('Location: login.php');
        exit;
    default:
        // Handle 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "Page not found";
        break;
}