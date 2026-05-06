<?php
// models/kelas.php

function getAllKelas($koneksi) {
    $sql    = "SELECT * FROM tb_kelas ORDER BY id ASC";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function getKelasById($koneksi, $id) {
    $id     = (int)$id;
    $result = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id = $id");
    if (!$result) return null;
    return mysqli_fetch_assoc($result);
}

function insertKelas($koneksi, $nama) {
    $nama = mysqli_real_escape_string($koneksi, $nama);
    return mysqli_query($koneksi, "INSERT INTO tb_kelas (nama) VALUES ('$nama')");
}

function updateKelas($koneksi, $id, $nama) {
    $id   = (int)$id;
    $nama = mysqli_real_escape_string($koneksi, $nama);
    return mysqli_query($koneksi, "UPDATE tb_kelas SET nama = '$nama' WHERE id = $id");
}

function deleteKelas($koneksi, $id) {
    $id = (int)$id;
    return mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id = $id");
}