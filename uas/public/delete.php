<?php
//menangkap value/data dari form
$nim        = $_GET['nim'];

//membuat koneksi ke db
include "model/Mahasiswa.php";
$mahasiswa = new Mahasiswa();

$exec = $mahasiswa->delete('mahasiswa', ['nim' => $nim]);

//cek query update
if ($exec) {
    echo "<script>alert('Data berhasil di-delete');
        window.location='index.php'</script>";
}else{
    echo "<script>alert('Data Gagal di-delete');
        window.location='index.php'</script>";
}
