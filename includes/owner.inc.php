<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once('dbh.inc.php');
class Owner extends Dbh {
	public function getStoreCoffees($StoreId) {
		$sql = "
			SELECT p.SID, p.Name, p.Price, p.Stock, p.Origin, p.Expiry_Date, p.Shelving_Date, p.Product_Type, c.Bean_Type, c.Roast_Type, c.Roast_Date FROM sys.Product AS p
			NATURAL JOIN sys.Coffee AS c 
			WHERE  p.Product_Type = 'Coffee' AND c.SID = p.SID AND p.SID = ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$_SESSION['sid']]);

		$storeProducts = $stmt->fetchAll();
		return $storeProducts;
	}

	public function getStoreTeas($StoreId) {
		$sql = "
			SELECT  p.SID, p.Name, p.Price, p.Stock, p.Origin, p.Expiry_Date, p.Shelving_Date, p.Product_Type, t.Grade, t.Tea_Type  FROM sys.Product AS p
			NATURAL JOIN sys.Tea AS t
			WHERE  p.Product_Type = 'Tea' AND t.SID = p.SID AND p.SID = ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$_SESSION['sid']]);

		$storeProducts = $stmt->fetchAll();
		return $storeProducts;
	}

	public function addCoffee($Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Bean, $Roast, $Roast_Date) {
		$sql = "INSERT INTO Product (SID, Name, Price, Stock, Origin, Expiry_Date, Shelving_Date, Product_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$_SESSION['sid'], $Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, 'Coffee']);

		$sql = "INSERT INTO Coffee (SID, name, bean_type, roast_type, roast_date) VALUES (?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);

		if ($stmt->execute([$_SESSION['sid'], $Name, $Bean, $Roast, $Roast_Date])) {
			header("Location: ../ownerStoresProducts.php?coffee added&SID=".$_SESSION['sid']);
		} else {
			header("Location: ../ownerStoresProducts.php?coffee not added");
		}
	}

	public function addTea($Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Tea_Type, $Grade) {
		$sql = "INSERT INTO Product (SID, Name, Price, Stock, Origin, Expiry_Date, Shelving_Date, Product_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$_SESSION['sid'], $Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, 'Tea']);

		$sql = "INSERT INTO Tea (SID, Name, Tea_Type, Grade) VALUES (?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		
		if ($stmt->execute([$_SESSION['sid'], $Name, $Tea_Type, $Grade])) {
			header("Location: ../ownerStoresProducts.php?tea added&SID=".$_SESSION['sid']);	
		} else {
			header("Location: ../ownerStoresProducts.php?tea failed to add");
		}
	}

	public function addStore($Name, $Description, $Opening_Date) {

		$num_of_rows = 1;
		$sid;

		while ($num_of_rows > 0) {
			$sid = mt_rand(pow(10,8),pow(10,9)-1);
			$sql = "SELECT * FROM Store WHERE SID = ?";
			$result = $this->connect()->prepare($sql);
			$result->execute([$sid]);
			$num_of_rows = (int) $result -> fetchColumn();
		}

		$sql = "INSERT INTO Store (SID, Name, Description, Own_ID, Opening_Date) VALUES (?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);

		if ($stmt->execute([$sid, $Name, $Description, $_SESSION['user_id'], $Opening_Date])) {
			header("Location: ../owner.php?Store-added");
		} else {
			header("Location: ../owner.php?Store-add-failed");
		}
	}

	public function getOwnersStores($Own_ID) {
		$sql = "SELECT * FROM Store s WHERE s.Own_ID = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$Own_ID]);
		$ownersStores = $stmt->fetchAll();

		return $ownersStores;
	}

	public function deleteStore($SID) {
		$sql = "DELETE FROM sys.Store WHERE SID = ?";
			
		$stmt = $this->connect()->prepare($sql);
		
		if ($stmt->execute([$SID])) {
			header("Location: ../owner.php?Store_deleted");
		} else {
			header("Location: ../owner.php?Store_delete_FAILED");
		}

	}

}

if (isset($_POST['addTea'])) {
	$owner = new Owner();

	$Name = $_POST['nameVal'];
	$Stock = $_POST['stockVal'];
	$Price = $_POST['priceVal'];
	$Origin = $_POST['originVal'];
	$Expiry_Date = $_POST['expiryDateVal'];
	$Shelving_Date = $_POST['shelveDateVal'];
	$Tea_Type = $_POST['teaTypeVal'];
	$Grade = $_POST['teaGradeVal'];

	$owner->addTea($Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Tea_Type, $Grade);
}

if (isset($_POST['addCoffee'])) {
	$owner = new Owner();
	
	$Name = $_POST['nameVal'];
	$Stock = $_POST['stockVal'];
	$Price = $_POST['priceVal'];
	$Origin = $_POST['originVal'];
	$Expiry_Date = $_POST['expiryDateVal'];
	$Shelving_Date = $_POST['shelveDateVal'];
	$Bean = $_POST['beanTypeVal'];
	$Roast = $_POST['roastTypeVal'];
	$Roast_Date = $_POST['roastDateVal'];

	$owner->addCoffee($Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Bean, $Roast, $Roast_Date);
}

if (isset($_POST['addStore'])) {
	$owner = new Owner();

	$Name = $_POST['storeName'];
	$Description = $_POST['storeDescription'];
	$Opening_Date = $_POST['storeOpeningDate'];

	$owner->addStore($Name, $Description, $Opening_Date);
}

if (isset($_POST['deleteStore'])) {
	$owner = new Owner();

	$storeID = $_POST['storeID'];

	$owner->deleteStore($storeID);
}









