<?php
class Department {
    private mysqli $conn;

    public function __construct(mysqli $db) {
        $this->conn = $db;
    }

    public function getAll(): array {
        $result = $this->conn->query("SELECT * FROM departments ORDER BY id ASC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM departments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return $res ?: null;
    }

    public function create(string $department_name, string $faculty): bool {
        $stmt = $this->conn->prepare("INSERT INTO departments (department_name, faculty) VALUES (?, ?)");
        $stmt->bind_param("ss", $department_name, $faculty);
        return $stmt->execute();
    }

    public function update(int $id, string $department_name, string $faculty): bool {
        $stmt = $this->conn->prepare("UPDATE departments SET department_name = ?, faculty = ? WHERE id = ?");
        $stmt->bind_param("ssi", $department_name, $faculty, $id);
        return $stmt->execute();
    }

    public function delete(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM departments WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
