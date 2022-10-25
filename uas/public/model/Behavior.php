<?php

include_once "Model.php";

class Behavior extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function findByNim($nim) {
        $query = $this->connection->prepare("SELECT * FROM behavior WHERE nim = '$nim' ORDER BY tanggal DESC");
        $query->execute();
        while($x = $query->fetch()){
			$data[] = $x;
		}
		return $data;
    }

    public function show() {
        $nim = $_SESSION['user']['nim'];
        $query = $this->connection->prepare("SELECT * FROM behavior WHERE nim = '$nim' ORDER BY tanggal DESC");
        $query->execute();
        while($x = $query->fetch()){
			$data[] = $x;
		}
		return $data;
    }

    public function generatePoint($nim) {
        $query = $this->connection->prepare("INSERT INTO behavior (nim, tanggal, keterangan, point) VALUES ('$nim', now(), 'Starting Point', 100)");
        $query->execute();
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert(Array $data) {
        $query = $this->connection->prepare("INSERT INTO behavior (nim, tanggal, keterangan, point) VALUES (?, ?, ?, ?)");  
        $query->execute([$data['nim'], $data['tanggal'], $data['keterangan'], $data['point']]);
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}