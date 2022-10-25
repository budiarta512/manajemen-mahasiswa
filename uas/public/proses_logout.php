<?php

session_start();
unset($_SESSION['user']);
echo "<script>alert('Berhasil logout');
            window.location = 'login.php';</script>";