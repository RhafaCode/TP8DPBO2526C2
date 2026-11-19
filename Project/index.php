<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/controllers/LecturerController.php';
require_once __DIR__ . '/controllers/DepartmentController.php';
require_once __DIR__ . '/controllers/CourseController.php';

$database = new Database();
$db = $database->connect();

$controllerName = $_GET['controller'] ?? 'lecturer';
$action = $_GET['action'] ?? 'index';

$controller = match ($controllerName) {
    'department' => new DepartmentController($db),
    'course'     => new CourseController($db),
    default      => new LecturerController($db),
};

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->index();
}
