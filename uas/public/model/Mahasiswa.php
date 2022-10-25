<?php

include_once "Model.php";

class Mahasiswa extends Model{

    public function __construct() {
        parent::__construct();
    }


    public function insert(Array $data) {
        $query = $this->connection->prepare("INSERT INTO mahasiswa VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");  
        $query->execute([$data['nim'], $data['nama_mhs'], $data['jurusan'], $data['jenis_kelamin'], $data['alamat'], $data['no_hp'], $data['email'], $data['file_name'], $data['nama_dosen']]);
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function generateUser($nim) {
        $query = $this->connection->prepare("INSERT INTO user (nim, password, level) VALUES ('$nim', 'stikombali', 'mahasiswa')");
        $query->execute();
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update(Array $data) {
        $query = $this->connection->prepare("UPDATE mahasiswa SET nama_mhs = ?, kode_jurusan = ?, jenis_kelamin = ?, alamat = ?, no_hp = ?, email = ?, nidn = ? WHERE nim = ?");
        $query->execute([
            $data['nama_mhs'], $data['jurusan'], $data['jenis_kelamin'], $data['alamat'], $data['no_hp'], $data['email'], $data['nama_dosen'], $data['nim']
        ]);
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function searchByName($cari) {
        $query = $this->connection->prepare("SELECT * FROM mahasiswa INNER JOIN jurusan ON mahasiswa.kode_jurusan=jurusan.kode_jurusan INNER JOIN dosen ON mahasiswa.nidn=dosen.nidn WHERE nama_mhs LIKE '%$cari%'");
        $query->execute();
        while($x = $query->fetch()){
			$data[] = $x;
		}
		return $data ?? null;
    }

    public function findByNim($nim) {
        $query = $this->connection->prepare("SELECT * FROM mahasiswa WHERE nim = '$nim'");
        $query->execute();
        return $query->fetch();
    }

    public function show() {
        $nim = $_SESSION['user']['nim'];
        $query = $this->connection->prepare("SELECT * FROM mahasiswa INNER JOIN jurusan ON mahasiswa.kode_jurusan=jurusan.kode_jurusan INNER JOIN dosen ON mahasiswa.nidn=dosen.nidn WHERE nim = '$nim'");
        $query->execute();
        while($x = $query->fetch()){
			$data[] = $x;
		}
		return $data ?? null;
    }

}