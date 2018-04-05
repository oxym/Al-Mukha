<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
require_once('dbh.inc.php');

class HomePage extends Dbh {
	public function getAllStores() {
		$sql = "SELECT * FROM Store";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();

		$stores = $stmt->fetchAll();
		return $stores;
	}
}