<?php

return [
    '/' => ['HomeController', 'index'],
    '/view-tasks' => ['TaskController', 'view'],
    '/update-task-status' => ['TaskController', 'updateTaskStatus', 'POST'],
    // Add other routes as needed
];