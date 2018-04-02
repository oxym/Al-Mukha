<?php
	include 'includes/search.inc.php';

$pname = $_POST['pname'];
$searchType = $_POST['type']

$search = New Search($pname,$searchType);
$msg = $search->searchByPartialName();
echo $msg;
