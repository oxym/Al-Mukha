<?php
session_start();
require_once('dbh.inc.php');

class Login extends Dbh {

	public function execute($email,$password){
		$sql = "Select * From User WHERE Email='".$email."';";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		if ($row = $stmt->fetch()) {
			if(password_verify($password,substr($row['Pwd'],0,60))==True) {
				$_SESSION['user_id'] = $row['User_Id'];
				$_SESSION['account_type'] = $row['Account_Type'];
				header("Location: ../index.php?login=success");
				exit();
			} else {
				header("Location: ../login.php?login=error");
				exit();
			}
		} else {
			header("Location: ../login.php?login=error");
			exit();
		}
	}
}

function getToken() {
	if (!isset($_SESSION['user_token'])) {
		$_SESSION['user_token'] = md5(uniqid());
	}
}

function checkToken($token) {
	if($token != $_SESSION['user_token']) {
		header('location:404.php');
		exit;
	}
}
	
function getTokenField() {
	return '<input type="hidden" name="token" value ="'.$_SESSION['user_token'].'" />';
}

function destroyToken() {
	unset($_SESSION['user_token']);
}

function processLogin($post) {

	checkToken($post['token']);
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	//Error handlers
	//Check if inputs are empty
	if (empty($email)||empty($password)) {
		header("Location: ../login.php?login=empty");
		exit();
	} else {	
			$lg = new Login();
			$lg->execute($email,$password);
	}

} else {
	header("Location: ../404.php");
	exit();
}

