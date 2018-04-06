<?php
session_start();
require_once('dbh.inc.php');

if (!isset($_POST['submit'])) {
	header("Location: ../404.php");
	exit();
} else {
	if (!$_SESSION['account_type']=='customer') {
		header("Location: ../404.php");
		exit();
	} else {
		require_once('product.inc.php');
		$product = new Product($_POST['sid'], $_POST['name']);
		$product->buy($_SESSION['user_id'], $_POST['amount']);
		header("Location: ../customer.php");
		exit();
	}
}



?>