<?php

include_once "model/Dosen.php";

//membuat query insert
$dosen = new Dosen();
$exec = $dosen->insert([
            'nidn' => $_POST['nidn'],
            'nama_dosen' => $_POST['nama_dosen'],
            'pendidikan_dosen' => $_POST['pendidikan_dosen'],
            'tgl_lahir_dosen' => $_POST['tgl_lahir_dosen'],
            'gender_dosen' => $_POST['gender_dosen'],
            'alamat_dosen' => $_POST['alamat_dosen'],
            'no_hp_dosen' => $_POST['no_hp_dosen'],
            'email_dosen' => $_POST['email_dosen'],
        ]);

//cek query insert
if ($exec) {
    echo "<script>alert('Data berhasil disimpan');
        window.location='dosen_main.php'</script>";
}else{
    echo "<script>alert('Data Gagal disimpan');
        window.location='dosen_main.php'</script>";
}
