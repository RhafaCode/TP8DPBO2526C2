<?php
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Lecturer.php';

class CourseController {
    private Course $courseModel;
    private Lecturer $lecturerModel;

    public function __construct(mysqli $db) {
        $this->courseModel = new Course($db);
        $this->lecturerModel = new Lecturer($db);
    }

    public function index(): void {
        $courses = $this->courseModel->getAll();
        $activeMenu = 'course';
        require __DIR__ . '/../views/courses/index.php';
    }

    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lecturerId = !empty($_POST['lecturer_id']) ? (int)$_POST['lecturer_id'] : null;
            $this->courseModel->create(
                trim($_POST['course_code']),
                trim($_POST['course_name']),
                (int)$_POST['credits'],
                $lecturerId
            );
            header("Location: index.php?controller=course&action=index");
            exit;
        }

        $lecturers = $this->lecturerModel->getAll();
        $activeMenu = 'course';
        require __DIR__ . '/../views/courses/create.php';
    }

    public function edit(): void {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $course = $this->courseModel->getById($id);
        if (!$course) {
            header("Location: index.php?controller=course&action=index");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lecturerId = !empty($_POST['lecturer_id']) ? (int)$_POST['lecturer_id'] : null;
            $this->courseModel->update(
                $id,
                trim($_POST['course_code']),
                trim($_POST['course_name']),
                (int)$_POST['credits'],
                $lecturerId
            );
            header("Location: index.php?controller=course&action=index");
            exit;
        }

        $lecturers = $this->lecturerModel->getAll();
        $activeMenu = 'course';
        require __DIR__ . '/../views/courses/edit.php';
    }

    public function delete(): void {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $this->courseModel->delete($id);
        }
        header("Location: index.php?controller=course&action=index");
        exit;
    }
}
