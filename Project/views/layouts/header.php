<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik MVC</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'lecturer' ? 'active fw-semibold' : '' ?>" href="index.php?controller=lecturer&action=index">Lecturers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'department' ? 'active fw-semibold' : '' ?>" href="index.php?controller=department&action=index">Departments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activeMenu ?? '') === 'course' ? 'active fw-semibold' : '' ?>" href="index.php?controller=course&action=index">Courses</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
