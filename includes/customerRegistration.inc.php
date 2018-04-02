<?php
require_once('dbh.inc.php');

class CustomerRegister extends Dbh {
	public function register($firstName,$lastName,$email,$pwdHash,$address,$phone) {
		$type = 'customer';
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

		$sql = "INSERT INTO User (User_Id, FirstName, LastName, Email, Pwd, Account_Type) VALUES (?, ?, ?,?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$uid, $firstName, $lastName, $email, $pwdHash, $type]);

		$sql = "INSERT INTO Customer (Customer_Id, Phone, Ship_Address) VALUES (?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$uid, $phone, $address]);
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

	//Error handlers
	//Check for empty fields
	if (empty($firstName)||empty($lastName)||empty($email)||empty($confirmEmail)||empty($password)||empty($confirmPassword)||empty($address)) {
		header("Location: ../customerRegistration.php?signup=empty");
		exit();
	} else {
		if (empty($phone)) {
			$phone = 0;
		}
		//Check if characters are valid
		if (!preg_match("/^[a-zA-Z]+$/",$firstName)||!preg_match("/^[a-zA-Z]+$/",$lastName)) {
			header("Location: ../customerRegistration.php?signup=invalidname");
			exit();
		
		} else {
			//Check if two emails match
			if (!$email=$confirmEmail) {
				header("Location: ../customerRegistration.php?signup=emailnotmatch");
				exit();
			} else {
				//Check if email is valid
				if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
					header("Location: ../customerRegistration.php?signup=invalidemail");
					exit();	
				} else {
					//Check if two passwords match
					if (!$password==$confirmPassword) {
						header("Location: ../customerRegistration.php?signup=passwordnotmatch");
						exit();			
					} else {
						//Hashing the password
						$pwdHash = password_hash($password, PASSWORD_DEFAULT);
						$cr = new CustomerRegister();
						$cr->register($firstName,$lastName,$email,$pwdHash,$address,$phone);			
						header("Location: ../customerRegistration.php?signup=success");
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
