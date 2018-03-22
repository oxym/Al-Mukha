<?php
require('product.inc.php');

class ViewProduct extends Product {
	public function showProductByPartialName($pname) {
		$stmt = $this->getProductByPartialName($pname);
		if ($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
				echo $row['name']."<br>";
				echo $row['price']."<br>";
				echo $row['stock']."<br>";
			}
		}			
	}
}


