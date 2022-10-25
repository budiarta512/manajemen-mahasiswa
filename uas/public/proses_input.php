<?php

include_once "model/Mahasiswa.php";
include_once "model/Behavior.php" ;

$mahasiswa = new Mahasiswa();
$behavior = new Behavior();

//proses foto / file yg di upload
$target_dir = "foto/";
$target_file = $target_dir . basename($_FILES['foto']['name']);
$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$file_name = basename($_FILES['foto']['name']);
$fileUpOK = 1;

//mengecek file yang sama
if (file_exists($target_file)) {
    echo "Maaf, Foto dengan nama yang sama sudah ada";
    $fileUpOK = 0;
}

//mengecek ukuran / size
if ($_FILES['foto']['size'] > 500000) {
    echo "Maaf, ukuran Foto terlalu besar Max. 5 MB";
    $fileUpOK = 0;
}

//mengecek jenis file
if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg') {
    echo "Maaf, Type file tidak di izinkan";
    $fileUpOK = 0;
}

if ($fileUpOK == 1) {
    //proses upload
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {

        //membuat query insert
        $exec = $mahasiswa->insert([
                    'nim' => $_POST['nim'],
                    'nama_mhs' => $_POST['nama_mhs'],
                    'jurusan' => $_POST['jurusan'],
                    'jenis_kelamin' => $_POST['jenis_kelamin'],
                    'alamat' => $_POST['alamat'],
                    'no_hp' => $_POST['no_hp'],
                    'email' => $_POST['email'],
                    'file_name' => $file_name,
                    'nama_dosen' => $_POST['dosen_wali'],
                ]);
        $exec2 = $mahasiswa->generateUser($_POST['nim']);
        $exec3 = $behavior->generatePoint($_POST['nim']);

        //cek insert data
        if ($exec && $exec2 && $exec3) {
            echo "<script>alert('Data berhasil disimpan');
                window.location='mahasiswa.php'</script>";
        }else{
            echo "<script>alert('Data Gagal disimpan');
                window.location='mahasiswa.php'</script>";
        }
    } else {
        echo "<script>alert('Data gagal di simpan, proses upload foto'); 
    window.location = 'input_mahasiswa.php'</script>";
    }
} else {
    //gagal upload
    // echo "<script>alert('Data gagal di simpan, proses upload foto'); 
    // window.location = 'input_mahasiswa.php'</script>";
}