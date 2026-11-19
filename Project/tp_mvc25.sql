CREATE DATABASE IF NOT EXISTS tp_mvc25;
USE tp_mvc25;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS courses;
DROP TABLE IF EXISTS lecturers;
DROP TABLE IF EXISTS departments;
SET FOREIGN_KEY_CHECKS = 1;

-- Tabel Relasi 1: Program Studi / Departemen
CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    faculty VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Tabel Utama: Dosen (Berelasi ke departments)
CREATE TABLE lecturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nidn VARCHAR(30) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    join_date DATE NOT NULL,
    department_id INT NULL,
    CONSTRAINT fk_lecturer_department
        FOREIGN KEY (department_id) REFERENCES departments(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabel Relasi 2: Mata Kuliah (Berelasi ke lecturers)
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(20) NOT NULL,
    course_name VARCHAR(100) NOT NULL,
    credits INT NOT NULL DEFAULT 3,
    lecturer_id INT NULL,
    CONSTRAINT fk_course_lecturer
        FOREIGN KEY (lecturer_id) REFERENCES lecturers(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Data Awal (Dummy Data)
INSERT INTO departments (department_name, faculty) VALUES
('Ilmu Komputer', 'FPMIPA'),
('Pendidikan Ilmu Komputer', 'FPMIPA'),
('Rekayasa Perangkat Lunak', 'FPTK');

INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES
('Dr. Budi Santoso, M.T.', '0012048501', '081234567890', '2018-09-01', 1),
('Siti Aminah, M.Kom.', '0023089002', '082198765432', '2020-02-15', 2),
('Rizky Pratama, M.Cs.', '0005119203', '085712349876', '2021-08-10', 3);

INSERT INTO courses (course_code, course_name, credits, lecturer_id) VALUES
('IK201', 'Desain dan Pemrograman Berorientasi Objek', 3, 1),
('IK205', 'Basis Data Lanjut', 3, 2),
('RL302', 'Arsitektur Perangkat Lunak', 4, 3);
