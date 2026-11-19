<?php
class Course {
    private mysqli $conn;

    public function __construct(mysqli $db) {
        $this->conn = $db;
    }

    public function getAll(): array {
        $sql = "SELECT courses.*, lecturers.name AS lecturer_name 
                FROM courses 
                LEFT JOIN lecturers ON courses.lecturer_id = lecturers.id 
                ORDER BY courses.id ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return $res ?: null;
    }

    public function create(string $course_code, string $course_name, int $credits, ?int $lecturer_id): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO courses (course_code, course_name, credits, lecturer_id) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssii", $course_code, $course_name, $credits, $lecturer_id);
        return $stmt->execute();
    }

    public function update(int $id, string $course_code, string $course_name, int $credits, ?int $lecturer_id): bool {
        $stmt = $this->conn->prepare(
            "UPDATE courses SET course_code = ?, course_name = ?, credits = ?, lecturer_id = ? WHERE id = ?"
        );
        $stmt->bind_param("ssiii", $course_code, $course_name, $credits, $lecturer_id, $id);
        return $stmt->execute();
    }

    public function delete(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
