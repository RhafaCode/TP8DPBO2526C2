<?php
require_once __DIR__ . '/../models/Lecturer.php';
require_once __DIR__ . '/../models/Department.php';

class LecturerController {
    private Lecturer $lecturerModel;
    private Department $departmentModel;

    public function __construct(mysqli $db) {
        $this->lecturerModel = new Lecturer($db);
        $this->departmentModel = new Department($db);
    }

    public function index(): void {
        $lecturers = $this->lecturerModel->getAll();
        $activeMenu = 'lecturer';
        require __DIR__ . '/../views/lecturers/index.php';
    }

    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deptId = !empty($_POST['department_id']) ? (int)$_POST['department_id'] : null;
            $this->lecturerModel->create(
                trim($_POST['name']),
                trim($_POST['nidn']),
                trim($_POST['phone']),
                $_POST['join_date'],
                $deptId
            );
            header("Location: index.php?controller=lecturer&action=index");
            exit;
        }

        $departments = $this->departmentModel->getAll();
        $activeMenu = 'lecturer';
        require __DIR__ . '/../views/lecturers/create.php';
    }

    public function edit(): void {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $lecturer = $this->lecturerModel->getById($id);
        if (!$lecturer) {
            header("Location: index.php?controller=lecturer&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $deptId = !empty($_POST['department_id']) ? (int)$_POST['department_id'] : null;
            $this->lecturerModel->update(
                $id,
                trim($_POST['name']),
                trim($_POST['nidn']),
                trim($_POST['phone']),
                $_POST['join_date'],
                $deptId
            );
            header("Location: index.php?controller=lecturer&action=index");
            exit;
        }

        $departments = $this->departmentModel->getAll();
        $activeMenu = 'lecturer';
        require __DIR__ . '/../views/lecturers/edit.php';
    }

    public function delete(): void {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $this->lecturerModel->delete($id);
        }
        header("Location: index.php?controller=lecturer&action=index");
        exit;
    }
}
