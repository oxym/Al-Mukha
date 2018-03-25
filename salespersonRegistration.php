<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Salesperson Registration</title>

	<?php include('bootstrap.php'); ?>

	<!-- main page stylesheet -->
	<link rel="stylesheet" href="./css/register.css">

</head>
<body>

	<form class="customer-register-details" action="" method="POST">
		<div class="mb-4">
			Salesperson Registration
		</div>

		<div class="emails mb-3">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="email" type="email" placeholder="Email" aria-label="Email">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="confirmEmail" type="email" placeholder="Confirm Email" aria-label="Email">
		</div>

		<div class="passwords mb-3">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="password" type="password" placeholder="Password" aria-label="Password">	
			<input class="form-control mr-sm-2 search-bar" name="confirmPassword" type="password" placeholder="Confirm Password" aria-label="Password">	
		</div>

		<div class="details mb-3">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="address" type="text" placeholder="Address" aria-label="Address">	
			<input class="form-control mr-sm-2 search-bar" name="phone" type="text" placeholder="Phone Number" aria-label="Phone Number">	
		</div>

		<div class="details mb-4">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="productSpecialization" type="text" placeholder="Product Specialization" aria-label="Product Specialization">	
		</div>

		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</button>

	</form>

</body>
</html>
