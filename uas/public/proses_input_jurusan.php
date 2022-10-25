<?php
include_once "model/Jurusan.php";

$jurusan = new Jurusan();

//membuat query insert
$exec = $jurusan->insert([
    'kode_jurusan' => $_POST['kode_jurusan'],
    'nama_jurusan' => $_POST['nama_jurusan'],
]);

//cek query insert
if ($exec) {
    echo "<script>alert('Data berhasil disimpan');
        window.location='jurusan.php'</script>";
}else{
    echo "<script>alert('Data Gagal disimpan');
        window.location='jurusan.php'</script>";
}