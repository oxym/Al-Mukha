<?php
require_once('dbh.inc.php');
class Product extends Dbh {
		private $sid;
		private $name;
	function __construct($sid=0, $name=null) {
		$this->sid = $sid;
		$this->name = $name;

	}
	public function getCoffeeProductDetails() {
		$sql = "
			SELECT p.SID, p.Name, p.Price, p.Stock, p.Origin, p.Expiry_Date, p.Shelving_Date, p.Product_Type, c.Bean_Type, c.Roast_Type, c.Roast_Date FROM sys.Product AS p
			NATURAL JOIN sys.Coffee AS c 
			WHERE  p.Product_Type = 'Coffee' AND c.SID = p.SID AND p.SID = ? AND p.Name = ?";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->sid, $this->name]);

			$productDetails = $stmt->fetchAll();

			return $productDetails;
	}

	public function getTeaProductDetails() {
		$sql = "
			SELECT p.SID, p.Name, p.Price, p.Stock, p.Origin, p.Expiry_Date, p.Shelving_Date, p.Product_Type, t.Grade, t.Tea_Type FROM sys.Product AS p
			NATURAL JOIN sys.Tea AS t
			WHERE  p.Product_Type = 'Tea' AND t.SID = p.SID AND p.SID = ? AND p.Name = ?";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->sid, $this->name]);

			$productDetails = $stmt->fetchAll();

			return $productDetails;
	}

	public function getAllComments() {
		$sql = "
			SELECT * FROM sys.Purchase_Comment AS p
			JOIN sys.User AS u ON p.UID = u.User_Id
			WHERE p.SID = ? AND p.PName = ?";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->sid, $this->name]);

			$comments = $stmt->fetchAll();

			return $comments;	
	}

	public function search($like) {
		$sql = "SELECT s.Name AS store_name, 
					   p.Name AS product_name, 
					   p.Price AS price,
					   s.SID AS store_id 
					   FROM Product as p JOIN Store as s ON p.SID = s.SID 
					   WHERE p.Name LIKE '%".$like."%' ORDER BY p.Price";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function buy($uid, $amount) {
		$sql = "SELECT * From `Purchase_Comment` WHERE UID = ? AND SID = ? AND PName = ?";
		$result = $this->connect()->prepare($sql);
		$result->execute([$uid, $this->sid, $this->name]);
		if ($result->fetchColumn()) {
			$sql = "UPDATE Purchase_Comment SET Purchase_Date = now(), Amount =(Amount+?) WHERE UID=? AND SID=? AND PName=?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$amount, $uid, $this->sid, $this->name]);

		} else {
			$sql = "INSERT INTO Purchase_Comment (UID, SID, PName, Purchase_Date, Amount) VALUES (?, ?, ?, now(), ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uid, $this->sid, $this->name, $amount]);


		}

		$sql = "UPDATE Product SET Stock = Stock - ? WHERE SID = ? AND Name = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$amount, $this->sid, $this->name]);
	}

	public function getAverageRating() {
		$sql = "
		SELECT AVG(p.Rating)  FROM sys.Purchase_Comment AS p
		WHERE PName = ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$this->name]);

		$averageRating = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

		return $averageRating;
	}
}



