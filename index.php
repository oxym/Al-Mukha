<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Al-Mukha</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- main page stylesheet -->
	<link rel="stylesheet" href="./css/style.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Al-Mukha Coffee & Tea</a>
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
			<div class="card-title">
				<div id="productTitle">
					<div id="productType">(Tea/Coffee)</div>
					Product Title
				</div>
				<div id="productPrice" class="col-md-4">$14.00</div>
			</div>

			<div class="row card-content">
				<ul class="list-group col-md-6">
					<li class="list-group-item product-detail-row">
						<div class="product-detail-row-title">Stock</div>
						<div id="stockVal" class="product-detail-row-value">123</div>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Origin</div>
						<div id="originVal" class="product-detail-row-value">Venezuela</div>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Expiry Date</div>
						<div id="expiryDateVal" class="product-detail-row-value">May 9, 2018</div>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Shelve Date</div>
						<div id="shelveDateVal" class="product-detail-row-value">April 9, 2018</div>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Store Name</div>
						<div id="storeName" class="product-detail-row-value">Best Coffee Shop</div>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Salesperson</div>
						<div id="salesperson" class="product-detail-row-value">John Doe</div>
					</li>
				</ul>

				<ul class="list-group col-md-6">
					<li id="beanType" class="list-group-item">
						<div class="product-detail-row-title">Bean Type</div>
						<div id="beanTypeVal" class="product-detail-row-value">Large</div>
					</li>
					<li id="roastType" class="list-group-item">
						<div class="product-detail-row-title">Roast Type</div>
						<div id="roastTypeVal" class="product-detail-row-value">Light</div>
					</li>
					<li id="teaType" class="list-group-item">
						<div class="product-detail-row-title">Tea Type</div>
						<div id="teaTypeVal" class="product-detail-row-value">Green</div>
					</li>
					<li id="teaGrade" class="list-group-item">
						<div class="product-detail-row-title">Tea Grade</div>
						<div id="teaGradeVal" class="product-detail-row-value">AAA</div>
					</li>
					<li id="roastDate" class="list-group-item">
						<div class="product-detail-row-title">Roast Date</div>
						<div id="roastDateVal" class="product-detail-row-value">April 2, 2018</div>
					</li>
				</ul>
			</div>
		</div>
	</div>


</body>
</html>
