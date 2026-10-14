CREATE DATABASE IF NOT EXISTS akademik
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE akademik;

CREATE TABLE IF NOT EXISTS mata_kuliah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(10) NOT NULL UNIQUE,
    nama_mk VARCHAR(100) NOT NULL,
    sks TINYINT NOT NULL,
    semester TINYINT NOT NULL,
    dosen VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, semester, dosen) VALUES
('S1SI09D', 'Pengembangan Aplikasi Website', 3, 3, 'Kayla Naura Kanza Manurung'),
('S1SI09A', 'Sistem Operasi', 3, 3, 'Angelina Loria'),
('S1SI09B', 'Perancangan Interaksi', 2, 5, 'Rizky Kurnia');