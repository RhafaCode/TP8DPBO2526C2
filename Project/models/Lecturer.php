<?php
class Lecturer {
    private mysqli $conn;

    public function __construct(mysqli $db) {
        $this->conn = $db;
    }

    public function getAll(): array {
        $sql = "SELECT lecturers.*, departments.department_name 
                FROM lecturers 
                LEFT JOIN departments ON lecturers.department_id = departments.id 
                ORDER BY lecturers.id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return $res ?: null;
    }

    public function create(string $name, string $nidn, string $phone, string $join_date, ?int $department_id): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("ssssi", $name, $nidn, $phone, $join_date, $department_id);
        return $stmt->execute();
    }

    public function update(int $id, string $name, string $nidn, string $phone, string $join_date, ?int $department_id): bool {
        $stmt = $this->conn->prepare(
            "UPDATE lecturers SET name = ?, nidn = ?, phone = ?, join_date = ?, department_id = ? WHERE id = ?"
        );
        $stmt->bind_param("ssssii", $name, $nidn, $phone, $join_date, $department_id, $id);
        return $stmt->execute();
    }

    public function delete(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
