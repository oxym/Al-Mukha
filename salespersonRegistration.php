<?php
include_once "includes/header.php";
?>

	<form class="customer-register-details" action="includes/salespersonRegistration.inc.php" method="POST">
		<div class="mb-4">
			Salesperson Registration
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

		<div class="details mb-3">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="address" type="text" placeholder="Address" aria-label="Address">	
			<input class="form-control mr-sm-2 search-bar" name="phone" type="text" placeholder="Phone Number" aria-label="Phone Number">	
		</div>

		<div class="details mb-4">
			<input class="form-control mr-sm-2 mb-2 search-bar" name="productSpecialization" type="text" placeholder="Product Specialization" aria-label="Product Specialization">	
			<input class="form-control mr-sm-2 mb-2 search-bar" name="storeId" type="text" placeholder="Store ID" aria-label="Store ID">	
		</div>

		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Register</button>

	</form>

</body>
</html>
