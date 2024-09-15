<?php
// index.php

// Define the base path for includes
define('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);

// Include the controller files
require_once BASE_PATH . 'models/Database.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'HomeController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'LeaveController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'TaskController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'EvaluationController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'SalaryController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'AttendanceController.php';
require_once BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . 'ProfileController.php';


// Load routes
$routes = require BASE_PATH . 'config/routes.php';

// Simple router
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$route = $routes[$request] ?? null;

if ($route) {
    $controllerName = $route[0];
    $methodName = $route[1];
    $allowedMethod = $route[2] ?? 'GET';

    if ($method !== $allowedMethod) {
        header("HTTP/1.0 405 Method Not Allowed");
        echo "Method Not Allowed";
        exit;
    }

    $controller = new $controllerName();
    $controller->$methodName();
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
// Load routes
$routes = require BASE_PATH . 'config/routes.php';

// Simple router
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$route = $routes[$request] ?? null;

if ($route) {
    $controllerName = $route[0];
    $methodName = $route[1];
    $allowedMethod = $route[2] ?? 'GET';

    if ($method !== $allowedMethod) {
        header("HTTP/1.0 405 Method Not Allowed");
        echo "Method Not Allowed";
        exit;
    }

    $controller = new $controllerName();
    $controller->$methodName();
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}

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
    case 'evaluation':
        $controller = new EvaluationController();
        $controller->complete();
    break;
    case 'salary-slip':
        $controller = new SalaryController();
        $controller->salary();
        break;
    case 'view-attendance':
        $controller = new AttendanceController();
        $controller->viewAttendance();
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