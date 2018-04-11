<?php include 'includes/header.php'; 

if (!$_SESSION['account_type'] == 'customer') {
	header("Location: 404.php");
	exit();
}
?>
<div class="main-page-content">
		<h3>Order History</h3>
<?php
require_once('includes/customer.inc.php');
$customer = new Customer($_SESSION['user_id']);
$purchases = $customer->getAllPurchases();
foreach($purchases as $purchase):
?>
		<div class="card">
			<div class="row card-content">
				<ul class="list-group col-md-12 mb-2">
					<li class="list-group-item product-detail-row">
						<div class="product-detail-row-title">Product Name</div>
						<div id="customerOrderNumber" class="product-detail-row-value"><?=$purchase['PName']?></div>
					</li>
					<li class="list-group-item product-detail-row">
						<div class="product-detail-row-title">Quantity</div>
						<div id="customerOrderNumber" class="product-detail-row-value"><?=$purchase['Amount']?></div>
					</li>
					<li class="list-group-item product-detail-row">
						<div class="product-detail-row-title">Purchase Date</div>
						<div id="customerOrderNumber" class="product-detail-row-value"><?=$purchase['Purchase_Date']?></div>
					</li>
				</ul>
				<!--<form>
					<button class="btn btn-success" data-toggle="modal" data-target="#productCommentModal">Comment</button>
				</form>
				-->
			</div>
		</div>
		<div class="card">
			<form action="includes/comment.inc.php" class="list-group col-md-12" method=POST> 
					<?php
					echo '<input type="hidden" name="sid" value ="'.$purchase['SID'].'" />';
  					echo '<input type="hidden" name="name" value ="'.$purchase['PName'].'" />';?>
  				<div class="row card-content">
  					<ul class="list-group col-md-12 mb-2">
  						<li class="list-group-item product-detail-row">
  							<div class="product-detail-row-title">Rating</div>
  							<div class="product-detail-row-value">
  								<select name="userRating" class="mr-sm-2 custom-select search-select">
							<option >9</option>
							<option >8</option>
							<option >7</option>
							<option >6</option>
							<option >5</option>
							<option >4</option>
							<option >3</option>
							<option >2</option>
							<option >1</option>
							<option >0</option>
						</select>
  							</div>
  							
  						</li>
  					</ul>
  				</div>
					<textarea class="customer-comment-box", name="userComment"></textarea>
					<button class="btn btn-success w-25 mt-2 mx-auto" name="submit" type="submit">Comment</button>
				</form>
			</div>
			<br><br>
<?php endforeach;?>
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
	<div class="modal fade" id="productCommentModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
