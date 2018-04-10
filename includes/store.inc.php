<?php 
require_once('dbh.inc.php');
class Store extends Dbh {
	public function search($like) {
		$sql = "SELECT s.Name AS store_name,
					   s.SID AS store_id 
					   FROM Store as s 
					   WHERE s.Name LIKE '%".$like."%'";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}



?>
