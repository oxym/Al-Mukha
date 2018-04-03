<?php
require_once('dbh.inc.php');

class SalesRegister extends Dbh {
	public function register($firstName,$lastName,$email,$pwdHash,$address,$phone, $productSpecialization, $storeId) {
		$type = 'sales';

		$sql = "Select * From Store WHERE SID=".$storeId.";";
		$result = $this->connect()->prepare($sql);
		$result->execute();
		if (!$result->fetchColumn()) {
			header("Location: ../salespersonRegistration.php?register=storenotexist");
			exit();
		}		

		$sql = "Select * From User WHERE Email='".$email."';";
		$result = $this->connect()->prepare($sql);
		$result->execute();
		if ($result->fetchColumn()) {
			header("Location: ../salespersonRegistration.php?emailtaken");
			exit();
		}

		$num_of_rows=1;
		$uid;

		//Generate an unique uid	
		while ($num_of_rows>0){
			$uid = mt_rand(pow(10,8),pow(10,9)-1);
			$sql = "Select * From User WHERE User_Id=?";
			$result = $this->connect()->prepare($sql);
			$result->execute([$uid]);
			$num_of_rows = (int) $result->fetchColumn();
		}		

		$sql = "INSERT INTO User (User_Id, FirstName, LastName, Email, Pwd, Account_Type) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$uid, $firstName, $lastName, $email, $pwdHash, $type]);

		$sql = "INSERT INTO SalesPerson (salesperson_Id, Product_Spec, SID) VALUES (?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$uid, $Product_Spec, $storeId]);
	}
}


if (isset($_POST['submit'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$confirmEmail = $_POST['confirmEmail'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$productSpecialization = $_POST['productSpecialization'];
	$storeId = $_POST['storeId'];

	//Error handlers
	//Check for empty fields
	if (empty($firstName)||empty($lastName)||empty($email)||empty($confirmEmail)||empty($password)||empty($confirmPassword)||empty($phone)||empty($productSpecialization)) {
		header("Location: ../salespersonRegistration.php?signup=empty");
		exit();
	} else {
		//Check if characters are valid
		if (!preg_match("/^[a-zA-Z]+$/",$firstName)||!preg_match("/^[a-zA-Z]+$/",$lastName)) {
			header("Location: ../salespersonRegistration.php?signup=invalidname");
			exit();
		
		} else {
			//Check if two emails match
			if (!$email=$confirmEmail) {
				header("Location: ../salespersonRegistration.php?signup=emailnotmatch");
				exit();
			} else {
				//Check if email is valid
				if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
					header("Location: ../salespersonRegistration.php?signup=invalidemail");
					exit();	
				} else {
					//Check if two passwords match
					if (!$password==$confirmPassword) {
						header("Location: ../salespersonRegistration.php?signup=passwordnotmatch");
						exit();			
					} else {
						//Hashing the password
						$pwdHash = password_hash($password, PASSWORD_DEFAULT);
						$sr = new SalesRegister();
						$sr->register($firstName,$lastName,$email,$pwdHash,$address,$phone,productSpecialization, storeId);			
						header("Location: ../index.php?signup=success");
						exit();
					}			
				}
			}		
		}	
	}

} else {
	header("Location: ../404.php");
	exit();
}

?>

