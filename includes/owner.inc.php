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

	public function addPromotion($Promo_Code, $Start_Date, $End_Date, $Percent_Off){
		$sql = "INSERT INTO Promotion (SID, Promo_Code, Start_Date, End_Date, Percent_Off) VALUES (?, ?, ?, ?, ?)";

		$stmt = $this->connect()->prepare($sql);

		if ($stmt->execute([$_SESSION['sid'], $Promo_Code, $Start_Date, $End_Date, $Percent_Off])) {
			header("Location: ../ownerStoresProducts.php?promotion added&SID=".$_SESSION['sid']);
		} else {
			header("Location: ../ownerStoresProducts.php?promotion not added");
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

	public function getSalespersonStore($Sales) {
		$sql = "
			SELECT * FROM sys.Store AS st
			NATURAL JOIN sys.SalesPerson AS sa
			WHERE st.SID = sa.SID AND sa.SalesPerson_Id = ?";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$Sales]);

		$salesPersonStore = $stmt->fetchAll();

		return $salesPersonStore;
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

	public function deleteProduct($Name) {
		$sql = "
			DELETE FROM sys.Product
			WHERE Name = ? AND SID = ?";

		$stmt = $this->connect()->prepare($sql);

		if($stmt->execute([$Name, $_SESSION['sid']])) {
			header("Location: ../ownerStoresProducts.php?product_deleted&SID=".$_SESSION['sid']);
		} else {
			header("Location: ../ownerStoresProducts.php?failed_to_delete_product");
		}
	}

	public function search($like) {
		$sql = "SELECT s.Name AS store_name,
					   s.SID AS store_id,
					   u.FirstName AS first_name,
					   u.LastName AS last_name,
					   o.Co_Name AS company_name
					   FROM User as u JOIN Owner as o ON u.User_Id = o.Owner_Id JOIN Store as s ON o.Owner_Id = s.Own_ID 
					   WHERE u.FirstName LIKE '%".$like."%' OR
					   		 u.LastName LIKE '%".$like."%' OR
					   		 o.Co_Name LIKE '%".$like."%'";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function upDateStore($Name){

		$sql = "
			UPDATE sys.Store AS s
		    SET s.Name = ?
		    WHERE s.SID = ? ";

		$stmt = $this->connect()->prepare($sql);

		if($stmt->execute([$Name, $_SESSION['sid']])) {
			header("Location: ../ownerStoresProducts.php?store-updated&SID=".$_SESSION['sid']);
		} else {
			header("Location: ../ownerStoresProducts.php?failed_to_update_store");
		}
	}

	public function updateCoffee($Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Bean, $Roast, $Roast_Date) {
		$sql = "
			UPDATE Product
			SET Price = ?, Stock = ?, Origin = ?, Expiry_Date = ?, Shelving_Date = ?
			WHERE SID = ? AND Name = ?";

		$stmt = $this->connect()->prepare($sql);
		if ($stmt->execute([$Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $_SESSION['sid'], $Name])) {
			header("Location: ../ownerStoresProducts.php?product_updated_successfully&SID=".$_SESSION['sid']);	
		} else {
			header("Location: ../ownerStoresProducts.php?update_failed_product&SID=".$_SESSION['sid']);	
		}


		$sql = "
			UPDATE Coffee
			SET Bean_Type = ?, Roast_Type = ?, Roast_Date = ?
			WHERE SID = ? AND Name = ?";

		$stmt = $this->connect()->prepare($sql);
		if ($stmt->execute([$Bean, $Roast, $Roast_Date, $_SESSION['sid'], $Name])) {
			header("Location: ../ownerStoresProducts.php?product_updated_successfully&SID=".$_SESSION['sid']);	
		} else {
			header("Location: ../ownerStoresProducts.php?update_failed_coffee&SID=".$_SESSION['sid']);	
		}
	}


	public function updateTea($Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Tea_Type, $Grade) {
		$sql = "
			UPDATE Product
			SET Price = ?, Stock = ?, Origin = ?, Expiry_Date = ?, Shelving_Date = ?
			WHERE SID = ? AND Name = ?";

		$stmt = $this->connect()->prepare($sql);
		if ($stmt->execute([$Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $_SESSION['sid'], $Name])) {
			header("Location: ../ownerStoresProducts.php?product_updated_successfully&SID=".$_SESSION['sid']);	
		} else {
			header("Location: ../ownerStoresProducts.php?update_failed_product&SID=".$_SESSION['sid']);	
		}


		$sql = "
			UPDATE Tea
			SET Tea_Type = ?, Grade = ?
			WHERE SID = ? AND name = ?";

		$stmt = $this->connect()->prepare($sql);
		if ($stmt->execute([$Tea_Type, $Grade, $_SESSION['sid'], $Name])) {
			header("Location: ../ownerStoresProducts.php?product_updated_successfully&SID=".$_SESSION['sid']);	
		} else {
			header("Location: ../ownerStoresProducts.php?update_failed_product&SID=".$_SESSION['sid']);	
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

if (isset($_POST['addPromotion'])) {
	$owner = new Owner();

	$Promo_Code = $_POST['promoVal'];
	$Start_Date = $_POST['startVal'];
	$End_Date = $_POST['endVal'];
	$Percent_Off = $_POST['percentVal'];


	$owner->addPromotion($Promo_Code, $Start_Date, $End_Date, $Percent_Off);
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


if (isset($_POST['deleteProduct'])) {
	$owner = new Owner();

	$Name = $_POST['nameVal'];

	$owner->deleteProduct($Name);
}

if (isset($_POST['updateOwnerInfoModal'])) {
	$owner = new Owner();

	$Name = $_POST['companyName'];

	$owner->upDateStore($Name);
}


if (isset($_POST['updateCoffee'])) {
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

	$owner->updateCoffee($Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Bean, $Roast, $Roast_Date);
}

if (isset($_POST['updateTea'])) {
	$owner = new Owner();

	$Name = $_POST['nameVal'];
	$Stock = $_POST['stockVal'];
	$Price = $_POST['priceVal'];
	$Origin = $_POST['originVal'];
	$Expiry_Date = $_POST['expiryDateVal'];
	$Shelving_Date = $_POST['shelveDateVal'];
	$Tea_Type = $_POST['teaTypeVal'];
	$Grade = $_POST['teaGradeVal'];

	$owner->updateTea($Name, $Price, $Stock, $Origin, $Expiry_Date, $Shelving_Date, $Tea_Type, $Grade);
}



