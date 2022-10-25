<?php

include_once "Model.php";

class Dosen extends Model{

    public function __construct() {
        parent::__construct();
    }

    public function insert(Array $data) {
        $query = $this->connection->prepare("INSERT INTO dosen VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([
            $data['nidn'], 
            $data['nama_dosen'], 
            $data['pendidikan_dosen'], 
            $data['tgl_lahir_dosen'], 
            $data['gender_dosen'], 
            $data['alamat_dosen'], 
            $data['no_hp_dosen'], 
            $data['email_dosen']
        ]);
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update(Array $data) {
        $query = $this->connection->prepare("UPDATE dosen SET nama_dosen = ?, pendidikan_dosen =?, tgl_lahir_dosen = ?, gender_dosen = ?, alamat_dosen = ?, no_hp_dosen = ?, email_dosen = ? WHERE nidn = ?");
        $query->execute([
            $data['nama_dosen'],
            $data['pendidikan_dosen'],
            $data['$tgl_lahir_dosen'],
            $data['gender_dosen'],
            $data['alamat_dosen'],
            $data['no_hp_dosen'],
            $data['email_dosen'],
            $data['nidn'],
        ]);
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function searchByName($cari) {
        $query = $this->connection->prepare("SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%'");
        $query->execute();

        while($x = $query->fetch()){
			$data[] = $x;
		}
		return $data;
    }

    public function findByNidn($nidn) {
        $query = $this->connection->prepare("SELECT * FROM dosen WHERE nidn = '$nidn'");
        $query->execute();
        return $query->fetch();
    }

}