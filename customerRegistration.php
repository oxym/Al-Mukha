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

	<form class="customer-register-details" action="search.php" method="POST">
		<div class="mb-4">
			Customer Registration
		</div>

		<div class="names mb-3">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="firstName" type="text" placeholder="First Name" aria-label="First Name">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="lastName" type="text" placeholder="Last Name" aria-label="Last Name">
		</div>

		<div class="emails mb-3">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="email" type="email" placeholder="Email" aria-label="Email">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="confirmEmail" type="email" placeholder="Confirm Email" aria-label="Email">
		</div>

		<div class="passwords mb-3">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="password" type="password" placeholder="Password" aria-label="Password">	
			<input class="form-control mr-sm-2 search-bar" name="confirmPassword" type="password" placeholder="Confirm Password" aria-label="Password">	
		</div>

		<div class="details mb-4">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="address" type="text" placeholder="Address" aria-label="Address">	
			<input class="form-control mr-sm-2 search-bar" name="phone" type="text" placeholder="Phone Number" aria-label="Phone Number">	
		</div>

		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</button>

	</form>

</body>
</html>
