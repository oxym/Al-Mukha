<?php

class Product extends Dbh {
	protected function getProductByPartialName($pname) {
		$sql = "SELECT p.name, p.price, p.stock FROM Product as p NATURAL JOIN  Store as s WHERE p.name LIKE '%?%' ORDER BY s.sid";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$pname]);
		return $stmt;
	}


}



