<?php
include_once "model/Dosen.php";

$dosen = new Dosen();

//menangkap value/data dari form
$nidn        = $_GET['nidn'];

$exec = $dosen->delete('dosen', ['nidn' => $nidn]);

if ($exec) {
    echo "<script>alert('Data berhasil di-delete');
        window.location='dosen_main.php'</script>";
}else{
    echo "<script>alert('Data Gagal di-delete');
        window.location='dosen_main.php'</script>";
}
