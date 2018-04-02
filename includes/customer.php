<?php include 'includes/header.php'; ?>
	<div class="main-page-content">
		<h3>Order History</h3>
		<div class="card">
			<div class="row card-content">
				<ul class="list-group col-md-10 mb-2">
					<li class="list-group-item product-detail-row">
						<div class="product-detail-row-title">Order Number</div>
						<div id="customerOrderNumber" class="product-detail-row-value">1DB328FHDB</div>
					</li>
				</ul>
				<div class="col-md-2 mt-1">
					<button class="btn btn-success" data-toggle="modal" data-target="#productCommentModal">Comment</button>
				</div>
			</div>
		</div>
		<button class="btn btn-success d-inline-block" data-toggle="modal" data-target="#updateCustomerInfoModal">Update Account</button>
	</div>

	<!-- Modal for profile update -->
	<div class="modal fade" id="updateCustomerInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Update Customer Account</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<ul class="list-group col-md-12 ml-2">
							<li class="list-group-item">
								<div class="product-detail-row-title">Phone Number</div>
								<input id="phoneNumber" class="product-detail-row-value text-right" value="587 823 8372"></input>
							</li>
							<li class="list-group-item">
								<div class="product-detail-row-title">Shipping Address</div>
								<input id="shippingAddress" class="product-detail-row-value text-right" value="123 Abc Street NW"></input>
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


	<!-- Modal for product comment -->
	<div class="modal fade" id="productCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Update Customer Account</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
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
					<div class="mt-2">
						<h4>Comment</h4>
						<textarea class="form-control" id="commentForProduct" rows="6"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
