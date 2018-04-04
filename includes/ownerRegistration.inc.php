<?php
require_once('dbh.inc.php');

class OwnerRegister extends Dbh {
	public function register($firstName,$lastName,$email,$pwdHash,$companyName) {
		$type = 'owner';
		$sql = "Select * From User WHERE Email='".$email."';";
		$result = $this->connect()->prepare($sql);
		$result->execute();
		if ($result->fetchColumn()) {
			header("Location: ../ownerRegistration.php?emailtaken");
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

		$sql = "INSERT INTO User (User_Id, FirstName, LastName, Email, Pwd, Account_Type) VALUES (?, ?, ?,?, ?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$uid, $firstName, $lastName, $email, $pwdHash, $type]);

		$sql = "INSERT INTO Owner (Owner_Id, Co_Name) VALUES (?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$uid, $companyName]);
	}
}


if (isset($_POST['submit'])) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$confirmEmail = $_POST['confirmEmail'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$companyName = $_POST['companyName'];

	//Error handlers
	//Check for empty fields
	if (empty($firstName)||empty($lastName)||empty($email)||empty($confirmEmail)||empty($password)||empty($confirmPassword)) {
		header("Location: ../ownerRegistration.php?signup=empty");
		exit();
	} else {
		//Check if characters are valid
		if (!preg_match("/^[a-zA-Z]+$/",$firstName)||!preg_match("/^[a-zA-Z]+$/",$lastName)) {
			header("Location: ../ownerRegistration.php?signup=invalidname");
			exit();
		
		} else {
			//Check if two emails match
			if (!$email=$confirmEmail) {
				header("Location: ../ownerRegistration.php?signup=emailnotmatch");
				exit();
			} else {
				//Check if email is valid
				if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
					header("Location: ../ownerRegistration.php?signup=invalidemail");
					exit();	
				} else {
					//Check if two passwords match
					if (!$password==$confirmPassword) {
						header("Location: ../ownerRegistration.php?signup=passwordnotmatch");
						exit();			
					} else {
						//Hashing the password
						$pwdHash = password_hash($password, PASSWORD_DEFAULT);
						$or = new OwnerRegister();
						$or->register($firstName,$lastName,$email,$pwdHash,$companyName);		
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
