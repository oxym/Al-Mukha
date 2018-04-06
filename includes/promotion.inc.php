<?php 
require_once('dbh.inc.php');

class Promotion extends Dbh {
	public function all() {
		$sql = "SELECT * FROM Promotion NATURAL JOIN Store Where CURDATE() >= Start_Date AND CURDATE() <= End_Date";
		$result = $this->connect()->prepare($sql);
		$result->execute();
		return $result->fetchAll();
	}
}