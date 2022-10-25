<?php

include_once "../Database.php";
include_once "Model.php";

class Jurusan extends Model{

    public function __construct() {
        parent::__construct();
    }

    public function insert(Array $data) {
        $query = $this->connection->prepare("INSERT INTO jurusan VALUES (?, ?)");
        $query->execute([$data['kode_jurusan'], $data['nama_jurusan']]);
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update(Array $data) {
        $query = $this->connection->prepare("UPDATE jurusan SET kode_jurusan = ?, nama_jurusan = ? WHERE kode_jurusan = ?");
        $query->execute([
            $data['kode_jurusan'],
            $data['nama_jurusan'],
            $data['kode_jurusan'],
        ]);
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function findByKodeJurusan($kode_jurusan) {
        $query = $this->connection->prepare("SELECT * FROM jurusan WHERE kode_jurusan = '$kode_jurusan'");
        $query->execute();

        return $query->fetch();
    }
}