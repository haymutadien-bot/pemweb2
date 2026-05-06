-- ============================================================
-- DATABASE SETUP : db_data_diri_tia
-- PortoTia — Tugas 1 Pemrograman Web
-- ============================================================

CREATE DATABASE IF NOT EXISTS db_data_diri_tia
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE db_data_diri_tia;

-- ── Tabel users ──────────────────────────────────────────
CREATE TABLE IF NOT EXISTS users (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role     ENUM('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (username, password, role) VALUES
    ('admin123',   'passAdmin#1', 'admin'),
    ('user_biasa', 'passUser#2',  'user')
ON DUPLICATE KEY UPDATE username = username;

-- ── Tabel tb_kelas (Level Pendidikan) ───────────────────
-- Fields: id, nama
CREATE TABLE IF NOT EXISTS tb_kelas (
    id   INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_kelas (nama) VALUES
    ('TK'),
    ('SD'),
    ('SMP'),
    ('SMA'),
    ('D3'),
    ('S1 / Sarjana'),
    ('S2 / Magister'),
    ('S3 / Doktor')
ON DUPLICATE KEY UPDATE nama = nama;

-- ── Tabel tb_input (Studies) ─────────────────────────────
-- Fields: id, nama, ilevel(FK->tb_kelas.id), keterangan, tahun_lulus, foto_sekolah
CREATE TABLE IF NOT EXISTS tb_input (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    nama         VARCHAR(200) NOT NULL,
    ilevel       INT NOT NULL,
    keterangan   TEXT,
    tahun_lulus  VARCHAR(10),
    foto_sekolah VARCHAR(255),
    CONSTRAINT fk_level FOREIGN KEY (ilevel) REFERENCES tb_kelas(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Contoh data awal
INSERT INTO tb_input (nama, ilevel, keterangan, tahun_lulus, foto_sekolah) VALUES
    ('TK Pelita Bangsa', 1, 'Jakarta Selatan', '2008', ''),
    ('SDN 01 Menteng',   2, 'Jakarta Pusat', '2014', ''),
    ('SMPN 7 Jakarta',   3, 'Jakarta Timur', '2017', ''),
    ('SMAN 12 Jakarta',  4, 'Jakarta Barat — IPA', '2020', ''),
    ('Universitas Indonesia', 6, 'Teknik Informatika — Kampus Depok', '2024', '');

-- ============================================================
-- SELESAI. Import file ini ke phpMyAdmin atau jalankan
-- via CLI: mysql -u root -p < db_data_diri_tia.sql
-- ============================================================
