CREATE DATABASE rekam_medis;

USE rekam_medis;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'dokter') NOT NULL
);

INSERT INTO users (username, password, role) VALUES
('admin', MD5('admin123'), 'admin'),
('dokter1', MD5('dokter123'), 'dokter');
