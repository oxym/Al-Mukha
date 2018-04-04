<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once('dbh.inc.php');
class Owner extends Dbh {
	public function getStoreProducts($StoreId) {
		$sql = "SELECT * FROM Product AS p WHERE p.SID = ? ";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$StoreId]);
	}

	public function addCoffee(/*$Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Bean, $Roast, $Roast_Date*/) {
		/*
		$sql = "INSERT INTO Product (SID, Name, Price, Stock, Origin, Expiry_Date, Shelving_Date, Product_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([@_COOKIE[‘sid’], $Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, @_COOKIE[‘product_type’]]);

		$sql = "INSERT INTO Coffee (SID, name, bean_type, roast_type, roast_date) VALUES (?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([@_COOKIE[‘sid’], $Name, $Bean, $Roast, $Roast_Date]);
		*/
		echo 'you\'re adding coffee !!';
	}

	public function addTea(/*$Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Tea_Type, $Grade*/) {
		/*
		$sql = "INSERT INTO Product (SID, Name, Price, Stock, Origin, Expiry_Date, Shelving_Date, Product_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$_COOKIE['sid'], $Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, 'Tea']);

		$sql = "INSERT INTO Tea (SID, Name, Tea_Type, Grade) VALUES (?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$_COOKIE['sid'], $Name, $Tea_Type, $Grade]);

		//echo 'you\'re adding tea !!!';
		header("Location: ../owner.php?tea added");
		*/
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
	$owner->addCoffee();
}

if (isset($_POST['addStore'])) {
	$owner = new Owner();

	$Name = $_POST['storeName'];
	$Description = $_POST['storeDescription'];
	$Opening_Date = $_POST['storeOpeningDate'];

	$owner->addStore($Name, $Description, $Opening_Date);
}









