<?php

return [
    '/' => ['TaskController', 'view'],
    '/view-tasks' => ['TaskController', 'view'],
    '/update-task-status' => ['TaskController', 'updateTaskStatus', 'POST'],
];