<?php
function getAllStudies($koneksi) {
    $sql = "SELECT s.*, k.nama AS nama_level 
            FROM tb_input s 
            LEFT JOIN tb_kelas k ON s.idlevel = k.id 
            ORDER BY s.id ASC";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function getStudiesById($koneksi, $id) {
    $id = (int)$id;
    $sql = "SELECT * FROM tb_input WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) return null;
    return mysqli_fetch_assoc($result);
}

function insertStudies($koneksi, $data) {
    $nama         = mysqli_real_escape_string($koneksi, $data['nama']);
    $idlevel      = (int)$data['ilevel'];
    $keterangan   = mysqli_real_escape_string($koneksi, $data['keterangan']);
    $tahun_lulus  = mysqli_real_escape_string($koneksi, $data['tahun_lulus']);
    $foto_sekolah = mysqli_real_escape_string($koneksi, $data['foto_sekolah']);

    $sql = "INSERT INTO tb_input (nama, idlevel, keterangan, tahun_lulus, foto_sekolah) 
            VALUES ('$nama', $idlevel, '$keterangan', '$tahun_lulus', '$foto_sekolah')";
    return mysqli_query($koneksi, $sql);
}

function updateStudies($koneksi, $id, $data) {
    $id           = (int)$id;
    $nama         = mysqli_real_escape_string($koneksi, $data['nama']);
    $idlevel      = (int)$data['ilevel'];
    $keterangan   = mysqli_real_escape_string($koneksi, $data['keterangan']);
    $tahun_lulus  = mysqli_real_escape_string($koneksi, $data['tahun_lulus']);
    $foto_sekolah = mysqli_real_escape_string($koneksi, $data['foto_sekolah']);

    $sql = "UPDATE tb_input 
            SET nama='$nama', idlevel=$idlevel, keterangan='$keterangan', 
                tahun_lulus='$tahun_lulus', foto_sekolah='$foto_sekolah' 
            WHERE id=$id";
    return mysqli_query($koneksi, $sql);
}

function deleteStudies($koneksi, $id) {
    $id  = (int)$id;
    $sql = "DELETE FROM tb_input WHERE id=$id";
    return mysqli_query($koneksi, $sql);
}