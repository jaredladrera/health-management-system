<?php

class Database{

	public $conn;

	public function __construct(){
		$this->conn = mysqli_connect("localhost", "root", "", "health_management");
		if (!$this->conn) {
			echo "Not Connected";
		}
	}
}

?>