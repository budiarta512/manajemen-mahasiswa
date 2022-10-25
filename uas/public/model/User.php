<?php

include_once "../Database.php";
include_once "Model.php";

class User extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function login(Array $data) {
        $query = $this->connection->prepare("SELECT * FROM user WHERE nim = ? AND password = ?");
        $query->execute([
            $data['nim'],
            $data['password']
        ]);
        return $query->fetch();
    }
}