<?php
require('dbh.inc.php');
class Product extends Dbh {
	protected function getProductByPartialName($pname) {
		$sql = "SELECT p.name, p.price, p.stock FROM Product as p NATURAL JOIN  Store as s WHERE p.name LIKE '%?%' ORDER BY s.sid";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$pname]);
		return $stmt;
	}

	public function getCoffeeProductDetails($SID, $Name) {
		$sql = "
			SELECT p.SID, p.Name, p.Price, p.Stock, p.Origin, p.Expiry_Date, p.Shelving_Date, p.Product_Type, c.Bean_Type, c.Roast_Type, c.Roast_Date FROM sys.Product AS p
			NATURAL JOIN sys.Coffee AS c 
			WHERE  p.Product_Type = 'Coffee' AND c.SID = p.SID AND p.SID = ? AND p.Name = ?";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$SID, $Name]);

			$productDetails = $stmt->fetchAll();

			return $productDetails;
	}

	public function getTeaProductDetails($SID, $Name) {
		$sql = "
			SELECT p.SID, p.Name, p.Price, p.Stock, p.Origin, p.Expiry_Date, p.Shelving_Date, p.Product_Type, t.Grade, t.Tea_Type FROM sys.Product AS p
			NATURAL JOIN sys.Tea AS t
			WHERE  p.Product_Type = 'Tea' AND t.SID = p.SID AND p.SID = ? AND p.Name = ?";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$SID, $Name]);

			$productDetails = $stmt->fetchAll();

			return $productDetails;
	}
}



