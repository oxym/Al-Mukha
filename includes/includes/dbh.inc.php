<?php
class Dbh {

	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $charset;

	protected function connect() {
		$this->servername = "162.246.156.189";	
		$this->username = "root";
		$this->password = "cpsc471";
		$this->dbname = "sys";
		$this->charset = "utf8mb4";
		try {
		$dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
		$pdo = new PDO($dsn, $this->username,$this->password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
		} catch (PDOException $e) {
			echo "Connection failed: ".$e->getMessage();
		}

	}


}


