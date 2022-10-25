<?php

function isAdmin() {
    if($_SESSION['user']['level'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

function isMahasiswa() {
    if($_SESSION['user']['level'] == 'mahasiswa') {
        return true;
    } else {
        return false;
    }
}
function isAuth() {
    if($_SESSION['user']) {
        return true;
    } else {
        return false;
    }
}