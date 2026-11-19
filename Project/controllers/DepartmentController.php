<?php
require_once __DIR__ . '/../models/Department.php';

class DepartmentController {
    private Department $model;

    public function __construct(mysqli $db) {
        $this->model = new Department($db);
    }

    public function index(): void {
        $departments = $this->model->getAll();
        $activeMenu = 'department';
        require __DIR__ . '/../views/departments/index.php';
    }

    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create(trim($_POST['department_name']), trim($_POST['faculty']));
            header("Location: index.php?controller=department&action=index");
            exit;
        }
        $activeMenu = 'department';
        require __DIR__ . '/../views/departments/create.php';
    }

    public function edit(): void {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $department = $this->model->getById($id);
        if (!$department) {
            header("Location: index.php?controller=department&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, trim($_POST['department_name']), trim($_POST['faculty']));
            header("Location: index.php?controller=department&action=index");
            exit;
        }

        $activeMenu = 'department';
        require __DIR__ . '/../views/departments/edit.php';
    }

    public function delete(): void {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $this->model->delete($id);
        }
        header("Location: index.php?controller=department&action=index");
        exit;
    }
}
