<?php

include_once "../Database.php";

class Model {
    protected \PDO $connection;

    public function __construct() {
        $this->connection = Database::getConnection();
    }

    public function get(String $table) {
        $query = $this->connection->prepare("SELECT * FROM $table");
        $query->execute();

        while($x = $query->fetch()){
			$data[] = $x;
		}
		return $data;
    }

    public function delete(String $table, Array $where) {
        $key = array_keys($where)[0];
        $value = array_values($where)[0];
        $query = $this->connection->prepare("DELETE FROM $table WHERE $key = '$value'");
        $query->execute();
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}