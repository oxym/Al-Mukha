<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Al-Mukha</title>

	<?php include('bootstrap.php'); ?>
	
	<!-- main page stylesheet -->
	<link rel="stylesheet" href="./css/style.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">Al-Mukha Coffee & Tea</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">

				<li>
					<form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
						<input class="form-control mr-sm-2 search-bar" name="pname" type="text" placeholder="Search" aria-label="Search">
						<select name="type" class="mr-sm-2 custom-select search-select">
							<option value="product">Product</option>
							<option value="store">Store</option>
							<option value="owner">Owner</option>
						</select>
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</li>

				<li class="register-button mr-2">
					<a class="nav-link" href="register.php">Register |</a>
				</li>
				<li class="login-button mr-2">
					<a class="nav-link" href="login.php">Login</a>
				</li>
			</ul>

		</div>
	</nav>

	<div class="main-page-content">
		<div class="card">
			<div class="row card-content">
				<ul class="list-group col-md-12 mb-5">
					<li class="list-group-item product-detail-row">
						<div class="product-detail-row-title">Store Name</div>
						<div id="storeName" class="product-detail-row-value">Calgary Roasters</div>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Owner Name</div>
						<div id="ownerName" class="product-detail-row-value">John Doe</div>
					</li>
				</ul>
				<div class="card-content more-info-store-owner">
					<a class="btn btn-success" href="products.php">More Info.</a>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
