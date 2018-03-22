<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- main page stylesheet -->
	<link rel="stylesheet" href="./css/register.css">

</head>
<body>

	<form class="register-details" action="search.php" method="POST">

		<input class="form-control mr-sm-2 mb-2 search-bar" name="email" type="email" placeholder="Email" aria-label="Email">
		<input class="form-control mr-sm-2 mb-2 search-bar" name="confirmEmail" type="email" placeholder="Confirm Email" aria-label="Email">
		<input class="form-control mr-sm-2 mb-4 search-bar" name="password" type="password" placeholder="Password" aria-label="Password">

		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

	</form>

</body>
</html>
