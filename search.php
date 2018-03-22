<?php
	include 'includes/dbh.inc.php';
	include 'includes/product.inc.php';
	include 'includes/viewproduct.inc.php';

$pname = $_POST['pname'];

$vp = New ViewProduct;
$vp->showProductByPartialName($pname);
unset($vp);
