<?php
	
session_start();
?>
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

				<?php
					if (isset($_SESSION['user_id'])) {
						echo '<li class="logout-button mr-2">
					<form action="includes/logout.inc.php" method="POST"> <button type="submit" name="submit">Logout</button></form>
				</li>';
					} else {
						echo '<li class="register-button mr-2">
					<a class="nav-link" href="register.php">Register |</a>
				</li>'.'<li class="login-button mr-2">
					<a class="nav-link" href="login.php">Login</a>
				</li>';
					}


				?>




			</ul>

		</div>
	</nav>

