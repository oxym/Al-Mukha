<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Al-Mukha</title>

	<?php include('bootstrap.php'); ?>
	<!-- main page stylesheet -->
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/salesperson.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">Al-Mukha Coffee & Tea</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="productManagementPageOwnerInfo mr-2">
			Salesperson
		</div>
		<div class="logout-button mr-2">
			<a href="index.php">Logout</a>
		</div>
	</nav>

	<div class="main-page-content">
		<button class="btn btn-success mb-2" data-toggle="modal" data-target="#addNewProduct">Add Product</button>
		<button class="btn btn-success mb-2" data-toggle="modal" data-target="#addPromotion">Add Promotion</button>
		<button class="btn btn-success mb-2" data-toggle="modal" data-target="#updateSalespersonModal">Update Salesperson</button>
		<div id="products" class="card">
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
						<input id="stockVal" class="product-detail-row-value text-right" value="123"></input>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Origin</div>
						<input id="originVal" class="product-detail-row-value text-right" value="Venezuela"></input>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Expiry Date</div>
						<input id="expiryDateVal" class="product-detail-row-value text-right" value="May 9, 2018"></input>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Shelve Date</div>
						<input id="shelveDateVal" class="product-detail-row-value text-right" value="April 9, 2018"></input>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Store Name</div>
						<input id="storeName" class="product-detail-row-value text-right" value="Best Coffee Shop"></input>
					</li>
					<li class="list-group-item">
						<div class="product-detail-row-title">Salesperson</div>
						<input id="salesperson" class="product-detail-row-value text-right" value="John Doe"></input>
					</li>
				</ul>

				<ul class="list-group col-md-6">
					<li id="beanType" class="list-group-item">
						<div class="product-detail-row-title">Bean Type</div>
						<input id="beanTypeVal" class="product-detail-row-value text-right" value="Large"></input>
					</li>
					<li id="roastType" class="list-group-item">
						<div class="product-detail-row-title">Roast Type</div>
						<input id="roastTypeVal" class="product-detail-row-value text-right" value="Light"></input>
					</li>
					<li id="teaType" class="list-group-item">
						<div class="product-detail-row-title">Tea Type</div>
						<input id="teaTypeVal" class="product-detail-row-value text-right" value="Green"></input> 
					</li>
					<li id="teaGrade" class="list-group-item">
						<div class="product-detail-row-title">Tea Grade</div>
						<input id="teaGradeVal" class="product-detail-row-value text-right" value="AAA"></input>
					</li>
					<li id="roastDate" class="list-group-item">
						<div class="product-detail-row-title">Roast Date</div>
						<input id="roastDateVal" class="product-detail-row-value text-right" value="April 2, 2018"></input>
					</li>
				</ul>
			</div>

			<div class="row card-content product-save-delete">
				<button type="button" class="btn btn-danger mr-1">Delete</button>
				<button type="button" class="btn btn-success">Save</button>
			</div>
		</div>	

		<div id="promotions" class="card promotion-card">
			<div class="card-title">
				<div id="productTitle">
					Promotion
				</div>
			</div>

			<div class="row card-content">
				<ul class="list-group col-md-12">
					<ul class="list-group col-md-12 ml-2">
						<li class="list-group-item">
							<div class="product-detail-row-title">Product ID</div>
							<input id="productId" class="product-detail-row-value text-right" value="A3F34F"></input>
						</li>						
						<li class="list-group-item">
							<div class="product-detail-row-title">Start Date</div>
							<input id="startDate" class="product-detail-row-value text-right" value="Nov 23, 2019"></input>
						</li>
						<li class="list-group-item">
							<div class="product-detail-row-title">End Date</div>
							<input id="endDate" class="product-detail-row-value text-right" value="Dec 23, 2019"></input>
						</li>
						<li class="list-group-item">
							<div class="product-detail-row-title">Percent Off</div>
							<input id="percentOff" class="product-detail-row-value text-right" value="10%"></input>
						</li>
					</ul>
				</ul>
			</div>
			<div class="row card-content product-save-delete">
				<button type="button" class="btn btn-danger mr-1">Delete</button>
				<button type="button" class="btn btn-success">Save</button>
			</div>
		</div>

		<!-- Modal for adding new product -->
		<div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row card-content">
							<ul class="list-group col-md-6">
								<li class="list-group-item product-detail-row">
									<div class="product-detail-row-title">Stock</div>
									<input id="stockVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Origin</div>
									<input id="originVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Expiry Date</div>
									<input id="expiryDateVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Shelve Date</div>
									<input id="shelveDateVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Store Name</div>
									<input id="storeName" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Salesperson</div>
									<input id="salesperson" class="product-detail-row-value text-right" value=""></input>
								</li>
							</ul>

							<ul class="list-group col-md-6">
								<li id="beanType" class="list-group-item">
									<div class="product-detail-row-title">Bean Type</div>
									<input id="beanTypeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="roastType" class="list-group-item">
									<div class="product-detail-row-title">Roast Type</div>
									<input id="roastTypeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="teaType" class="list-group-item">
									<div class="product-detail-row-title">Tea Type</div>
									<input id="teaTypeVal" class="product-detail-row-value text-right" value=""></input> 
								</li>
								<li id="teaGrade" class="list-group-item">
									<div class="product-detail-row-title">Tea Grade</div>
									<input id="teaGradeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="roastDate" class="list-group-item">
									<div class="product-detail-row-title">Roast Date</div>
									<input id="roastDateVal" class="product-detail-row-value text-right" value=""></input>
								</li>
							</ul>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal for profile update -->
		<div class="modal fade" id="updateSalespersonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Salesperson Account</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<ul class="list-group col-md-12 ml-2">
								<li class="list-group-item">
									<div class="product-detail-row-title">Specialization</div>
									<input id="specialization" class="product-detail-row-value text-right" value="Some specialization"></input>
								</li>
							</ul>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal for adding promotion -->
		<div class="modal fade" id="addPromotion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add New Promotion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<ul class="list-group col-md-12 ml-2">
								
								<li class="list-group-item">
									<div class="product-detail-row-title">Product ID</div>
									<input id="productId" class="product-detail-row-value text-right" value=""></input>
								</li>	
								<li class="list-group-item">
									<div class="product-detail-row-title">Start Date</div>
									<input id="startDate" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">End Date</div>
									<input id="endDate" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Percent Off</div>
									<input id="percentOff" class="product-detail-row-value text-right" value=""></input>
								</li>
							</ul>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal for adding new product -->
		<div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row card-content">
							<ul class="list-group col-md-6">
								<li class="list-group-item product-detail-row">
									<div class="product-detail-row-title">Stock</div>
									<input id="stockVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Origin</div>
									<input id="originVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Expiry Date</div>
									<input id="expiryDateVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Shelve Date</div>
									<input id="shelveDateVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Store Name</div>
									<input id="storeName" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Salesperson</div>
									<input id="salesperson" class="product-detail-row-value text-right" value=""></input>
								</li>
							</ul>

							<ul class="list-group col-md-6">
								<li id="beanType" class="list-group-item">
									<div class="product-detail-row-title">Bean Type</div>
									<input id="beanTypeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="roastType" class="list-group-item">
									<div class="product-detail-row-title">Roast Type</div>
									<input id="roastTypeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="teaType" class="list-group-item">
									<div class="product-detail-row-title">Tea Type</div>
									<input id="teaTypeVal" class="product-detail-row-value text-right" value=""></input> 
								</li>
								<li id="teaGrade" class="list-group-item">
									<div class="product-detail-row-title">Tea Grade</div>
									<input id="teaGradeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="roastDate" class="list-group-item">
									<div class="product-detail-row-title">Roast Date</div>
									<input id="roastDateVal" class="product-detail-row-value text-right" value=""></input>
								</li>
							</ul>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
</html>