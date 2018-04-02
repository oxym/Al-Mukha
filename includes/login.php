<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<?php include('bootstrap.php'); ?>

	<!-- main page stylesheet -->
	<link rel="stylesheet" href="./css/login.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">Al-Mukha Coffee & Tea</a>
	</nav>
	
	<form class="login-details" action="includes/login.inc.php" method="POST">
		<div class="mb-4">
			Welcome To Al-Mukha
		</div>

		<input class="form-control mr-sm-2 mb-2 search-bar" name="email" type="email" placeholder="Email" aria-label="Email">
		<input class="form-control mr-sm-2 mb-4 search-bar" name="password" type="password" placeholder="Password" aria-label="Password">

		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Login</button>

	</form>

</body>
</html>
