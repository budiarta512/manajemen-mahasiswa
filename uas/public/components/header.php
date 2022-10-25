<?php

include_once "../helper.php";
session_start();
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    echo "<script>alert('Akses ditolak. silahkan login terlebih dahulu');
            window.location = 'login.php';</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Tugas Pemrograman Web</title>
  </head>
  <body class = "bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Team Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <?php if(isAdmin()) {  ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dosen_main.php">Dosen</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="jurusan.php">Jurusan</a>
                    </li>
                </ul>
                <?php } else { ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="profil.php">Profil</a>
                    </li>
                </ul>
                <?php } ?>
                <a class="btn btn-primary" href="proses_logout.php" role="button">logout</a>
            </div>
        </div>
    </nav>