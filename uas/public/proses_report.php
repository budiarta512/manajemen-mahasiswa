<?php
include_once "model/Behavior.php";

$behavior = new Behavior();

//membuat query insert
$exec = $behavior->insert([
    'nim' => $_POST['nim'],
    'tanggal' => $_POST['tanggal'],
    'keterangan' => $_POST['keterangan'],
    'point' => $_POST['point'],
]);

//cek query insert
if ($exec) {
    echo "<script>alert('Laporan berhasil disimpan');
        window.location='index.php'</script>";
}else{
    echo "<script>alert('Laporan gagal disimpan');
        window.location='index.php'</script>";
}