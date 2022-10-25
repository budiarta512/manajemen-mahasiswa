<?php
include_once "model/Jurusan.php";
$jurusan = new Jurusan();

//menangkap value/data dari form
$kode_jurusan = $_GET['kode_jurusan'];

$exec = $jurusan->delete('jurusan', ['kode_jurusan' => $kode_jurusan]);

//cek query update
if ($exec) {
    echo "<script>alert('Data berhasil di-delete');
        window.location='jurusan.php'</script>";
}else{
    echo "<script>alert('Data Gagal di-delete');
        window.location='jurusan.php'</script>";
}
