<?php

include_once "model/Mahasiswa.php";
$mahasiswa = new Mahasiswa();

$exec = $mahasiswa->update([
            'nim' => $_POST['nim'],
            'nama_mhs' => $_POST['nama_mhs'],
            'jurusan' => $_POST['jurusan'],
            'jenis_kelamin' => $_POST['jenis_kelamin'],
            'alamat' => $_POST['alamat'],
            'no_hp' => $_POST['no_hp'],
            'email' => $_POST['email'],
            'nama_dosen' => $_POST['dosen_wali'],
        ]);


// cek query update
if ($exec) {
    echo "<script>alert('Data berhasil di-update');
        window.location='index.php'</script>";
}else{
    echo "<script>alert('Data Gagal di-update');
        window.location='index.php'</script>";
}
