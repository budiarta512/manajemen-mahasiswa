<?php
include_once "model/User.php";

$user = new User();

$exec = $user->login([
    'nim' => $_POST['nim'],
    'password' => $_POST['password']
]);

if ($exec) {
    session_start();
    $_SESSION['user'] = $exec;
    echo "<script>alert('Berhasil Login');
        window.location='index.php'</script>";
}else{
    echo "<script>alert('nim atau password salah');
        window.location='login.php'</script>";
}